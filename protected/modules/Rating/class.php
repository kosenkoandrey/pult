<?
class Rating {

    public $settings;
    public $types = ['mail'];
    
    private $search;
    private $actions;
    
    function __construct($conf) {
        foreach ($conf['routes'] as $route) APP::Module('Routing')->Add($route[0], $route[1], $route[2]);
    }
    
    public function Init() {
        $this->settings = APP::Module('Registry')->Get([
            'module_rating_db_connection'
        ]);
        
        $this->search = new RatingSearch();
        $this->actions = new RatingActions();
    }
    
    public function Admin() {
        return APP::Render('rating/admin/nav', 'content');
    }
    
    public function Search($rules) {
        $out = [];

        foreach ((array) $rules['rules'] as $rule) {
            $out[] = array_flip((array) $this->search->{$rule['method']}($rule['settings']));
        }
        
        if (array_key_exists('children', (array) $rules)) {
            $out[] = array_flip((array) $this->Search($rules['children']));
        }
        
        if (count($out) > 1) {
            switch ($rules['logic']) {
                case 'intersect': return array_keys((array) call_user_func_array('array_intersect_key', $out)); break;
                case 'merge': return array_keys((array) call_user_func_array('array_replace', $out)); break;
            }
        } else {
            return array_keys($out[0]);
        }
    }
    
    public function ManageRating() {
        APP::Render('rating/admin/index');
    }
    
    public function SetRating() {
        if (array_search(APP::Module('Routing')->get['item'], $this->types) === false) {
            header('HTTP/1.0 404 Not Found');
            exit;
        }
        
        $id = APP::Module('Crypt')->Decode(APP::Module('Routing')->get['id']);
        $rating_id = false;

        switch (APP::Module('Routing')->get['item']) {
            case 'mail':
                if (APP::Module('DB')->Select(
                    APP::Module('Mail')->settings['module_mail_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['COUNT(id)'], 'mail_log',
                    [['id', '=', $id, PDO::PARAM_INT]]
                )) {
                    $mail_log = APP::Module('DB')->Select(
                        APP::Module('Mail')->settings['module_mail_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                        [
                            'user',
                            'letter'
                        ], 
                        'mail_log',
                        [['id', '=', $id, PDO::PARAM_INT]]
                    );
                    
                    if ($rating_id = APP::Module('DB')->Select(
                        $this->settings['module_rating_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['id'], 'rating',
                        [
                            ['item', '=', APP::Module('Routing')->get['item'], PDO::PARAM_STR],
                            ['object', '=', $mail_log['letter'], PDO::PARAM_INT],
                            ['user', '=', $mail_log['user'], PDO::PARAM_INT]
                        ]
                    )) {
                        if (APP::Module('DB')->Select(
                            $this->settings['module_rating_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                            ['COUNT(id)'], 'rating',
                            [
                                ['item', '=', APP::Module('Routing')->get['item'], PDO::PARAM_STR],
                                ['object', '=', $mail_log['letter'], PDO::PARAM_INT],
                                ['user', '=', $mail_log['user'], PDO::PARAM_INT],
                                ['comment', '=', '', PDO::PARAM_STR]
                            ]
                        )) {
                            $result = 'comment';
                        } else {
                            $result = 'exist';
                        }
                    } else {
                        $rating_id = APP::Module('DB')->Insert(
                            $this->settings['module_rating_db_connection'], 'rating',
                            [
                                'id' => 'NULL',
                                'item' => [APP::Module('Routing')->get['item'], PDO::PARAM_STR],
                                'object' => [$mail_log['letter'], PDO::PARAM_INT],
                                'rating' => [APP::Module('Routing')->get['rating'], PDO::PARAM_INT],
                                'user' => [$mail_log['user'], PDO::PARAM_INT],
                                'comment' => 'NULL',
                                'up_date' => 'NOW()'
                            ]
                        );
                        
                        $result = 'success';
                    }
                } else {
                    $result = 'error';
                }
                break;
        }

        APP::Render('rating/result/' . APP::Module('Routing')->get['item'] . '/' . $result, 'include', $rating_id);
    }
    
    public function PostComment() {
        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');
        
        echo json_encode([
            'state' => APP::Module('DB')->Select(
                $this->settings['module_rating_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                ['COUNT(id)'], 'rating',
                [
                    ['id', '=', $_POST['id'], PDO::PARAM_INT]
                ]
            ) ? APP::Module('DB')->Update($this->settings['module_rating_db_connection'], 'rating', [
                'comment' => $_POST['comment']
            ], [
                ['id', '=', $_POST['id'], PDO::PARAM_INT]
            ]) : false
        ]);
    }
    

    public function RenderShortcode($id, $data) {
        $data['letter']['html'] = str_replace(
            '[rating]', 
            APP::Render('rating/widgets/mail', 'content'), 
            $data['letter']['html']
        );
        
        return $data;
    }
    
    
    public function APISearchRating() {
        $request = json_decode(file_get_contents('php://input'), true);
        $out = $this->Search(json_decode($request['search'], 1));
        $rows = [];

        foreach (APP::Module('DB')->Select(
            $this->settings['module_rating_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            [
                'rating.id', 
                'rating.item', 
                'rating.object', 
                'rating.rating', 
                'rating.user', 
                'rating.comment', 
                'rating.up_date', 
                'users.email AS user_email'
            ], 
            'rating',
            [
                ['rating.id', 'IN', $out, PDO::PARAM_INT]
            ], 
            [
                'join/users' => [['users.id', '=', 'rating.user']]
            ],
            ['rating.id'],
            false,
            [$request['sort_by'], $request['sort_direction']], 
            $request['rows'] === -1 ? false : [($request['current'] - 1) * $request['rows'], $request['rows']]
        ) as $row) {
            $row['rating_id_token'] = APP::Module('Crypt')->Encode($row['id']);
            
            switch ($row['item']) {
                case 'mail':
                    $row['object_details'] = APP::Module('DB')->Select(
                        APP::Module('Mail')->settings['module_mail_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                        [
                            'id', 
                            'subject'
                        ], 
                        'mail_letters',
                        [
                            ['id', '=', $row['object'], PDO::PARAM_INT]
                        ]
                    );
                    
                    $row['object_details']['id_hash'] = APP::Module('Crypt')->Encode($row['object_details']['id']);
                    break;
                default: $row['object_details'] = false;
            }
            
            array_push($rows, $row);
        }
        
        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');
        
        echo json_encode([
            'current' => $request['current'],
            'rowCount' => $request['rows'],
            'rows' => $rows,
            'total' => count($out)
        ]);
        exit;
    }
    
    public function APIRatingAction() {
        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($this->actions->{$_POST['action']}($this->Search(json_decode($_POST['rules'], 1)), isset($_POST['settings']) ? $_POST['settings'] : false));
        exit;
    }

}

class RatingSearch {

    public function item($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Rating')->settings['module_rating_db_connection'], 
            ['fetchAll', PDO::FETCH_COLUMN], 
            ['id'], 'rating',
            [['item', $settings['logic'], $settings['value'], PDO::PARAM_STR]]
        );
    }
    
    public function object($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Rating')->settings['module_rating_db_connection'], 
            ['fetchAll', PDO::FETCH_COLUMN], 
            ['id'], 'rating',
            [['object', $settings['logic'], $settings['value'], PDO::PARAM_STR]]
        );
    }
    
    public function rating($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Rating')->settings['module_rating_db_connection'], 
            ['fetchAll', PDO::FETCH_COLUMN], 
            ['id'], 'rating',
            [['rating', $settings['logic'], $settings['value'], PDO::PARAM_STR]]
        );
    }
    
    public function user($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Rating')->settings['module_rating_db_connection'], 
            ['fetchAll', PDO::FETCH_COLUMN], 
            ['id'], 'rating',
            [['user', $settings['logic'], $settings['value'], PDO::PARAM_STR]]
        );
    }
    
    public function comment($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Rating')->settings['module_rating_db_connection'], 
            ['fetchAll', PDO::FETCH_COLUMN], 
            ['id'], 'rating',
            [['comment', $settings['logic'], isset($settings['value']) ? $settings['value'] : '', PDO::PARAM_STR]]
        );
    }

}

class RatingActions {

    public function remove($id, $settings) {
        return APP::Module('DB')->Delete(APP::Module('Rating')->settings['module_rating_db_connection'], 'rating', [['id', 'IN', $id]]);
    }
    
}