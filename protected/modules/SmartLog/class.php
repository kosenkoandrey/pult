<?
class SmartLog {

    public $settings;
    private $search;
    private $actions;
    
    function __construct($conf) {
        foreach ($conf['routes'] as $route) APP::Module('Routing')->Add($route[0], $route[1], $route[2]);
    }
    
    public function Init() {
        $this->settings = APP::Module('Registry')->Get([
            'module_smartlog_db_connection'
        ]);
        
        $this->search = new SmartLogSearch();
        $this->actions = new SmartLogActions();
    }
    
    public function Admin() {
        return APP::Render('smartlog/admin/nav', 'content');
    }
    
    public function Search($rules) {
        $out = Array();

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
    
    public function Manage() {
        APP::Render('smartlog/admin/index');
    }
    
    public function View() {
        $smartlog_id = APP::Module('Crypt')->Decode(APP::Module('Routing')->get['smartlog_id_hash']);
        
        APP::Render(
            'smartlog/admin/view', 'include', 
            [
                'smartlog' => APP::Module('DB')->Select(
                    $this->settings['module_smartlog_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                    ['*'], 'smartlog',
                    [['id', '=', $smartlog_id, PDO::PARAM_INT]]
                ),
            ]
        );
    }
    
    public function Write($action, $data) {
        APP::Module('DB')->Insert(
            $this->settings['module_smartlog_db_connection'], 'smartlog', [
                'id'            => 'NULL',
                'trigger_id'    => [$action, PDO::PARAM_STR],
                'object_id'     => isset($data['id']) ? [$data['id'], PDO::PARAM_INT] : 'NULL',
                'action_data'   => [json_encode($data), PDO::PARAM_STR],
                'user_id'       => [isset($data['target_user_id']) ? $data['target_user_id'] : APP::Module('Users')->user['id'], PDO::PARAM_INT],
                'rollback'      => ['no', PDO::PARAM_STR],
                'cr_date'       => 'NOW()'
            ]
        );
        
        return $data;
    }
    
    
    public function APISearch() {
        $request = json_decode(file_get_contents('php://input'), true);
        $out = $this->Search(json_decode($request['search'], 1));
        $rows = [];

        foreach (APP::Module('DB')->Select(
            $this->settings['module_smartlog_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['id', 'trigger_id', 'object_id', 'user_id', 'cr_date'], 'smartlog',
            [['id', 'IN', $out, PDO::PARAM_INT]], 
            false, false, false,
            [$request['sort_by'], $request['sort_direction']],
            $request['rows'] === -1 ? false : [($request['current'] - 1) * $request['rows'], $request['rows']]
        ) as $row) {
            $row['smartlog_id_token'] = APP::Module('Crypt')->Encode($row['id']);
            
            switch ($row['trigger_id']) {
                case 'user_death':
                    $row['object_email'] = APP::Module('DB')->Select(
                        APP::Module('Users')->settings['module_users_db_connection'], ['fetchColumn', 0],
                        ['email'], 'users',
                        [['id', '=', $row['object_id'], PDO::PARAM_INT]]
                    );
                    break;
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
    
    public function APISearchAction() {
        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($this->actions->{$_POST['action']}($this->Search(json_decode($_POST['rules'], 1)), isset($_POST['settings']) ? $_POST['settings'] : false));
        exit;
    }
    
    public function APIRemove() {
        $out = [
            'status' => 'success',
            'errors' => []
        ];

        if (!APP::Module('DB')->Select(
            $this->settings['module_smartlog_db_connection'], ['fetchColumn', 0], 
            ['COUNT(id)'], 'smartlog',
            [['id', '=', $_POST['id'], PDO::PARAM_INT]]
        )) {
            $out['status'] = 'error';
            $out['errors'][] = 1;
        }
        
        if ($out['status'] == 'success') {
            $out['count'] = APP::Module('DB')->Delete(
                $this->settings['module_smartlog_db_connection'], 'smartlog',
                [['id', '=', $_POST['id'], PDO::PARAM_INT]]
            );
            
            APP::Module('Triggers')->Exec('remove_smartlog', ['id' => $_POST['id'], 'result' => $out['count']]);
        }

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');
        
        echo json_encode($out);
        exit;
    }
    
    public function APIRollback() {
        $out = [
            'status' => 'success',
            'errors' => []
        ];

        if (!APP::Module('DB')->Select(
            $this->settings['module_smartlog_db_connection'], ['fetchColumn', 0], 
            ['COUNT(id)'], 'smartlog',
            [
                ['id', '=', $_POST['id'], PDO::PARAM_INT],
                ['rollback', '=', 'no', PDO::PARAM_STR]
            ]
        )) {
            $out['status'] = 'error';
            $out['errors'][] = 1;
        }
        
        if ($out['status'] == 'success') {
            $item = APP::Module('DB')->Select(
                $this->settings['module_smartlog_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                [
                    'trigger_id',
                    'object_id',
                    'action_data'
                ], 
                'smartlog',
                [['id', '=', $_POST['id'], PDO::PARAM_INT]]
            );
            
            $action_data = json_decode($item['action_data'], true);
            
            switch ($item['trigger_id']) {
                case 'remove_invoice_before':
                    APP::Module('DB')->Insert(
                        APP::Module('Billing')->settings['module_billing_db_connection'], 'billing_invoices', [
                            'id'      => [$action_data['invoice']['id'], PDO::PARAM_INT],
                            'user_id' => [$action_data['invoice']['user_id'], PDO::PARAM_INT],
                            'amount'  => [$action_data['invoice']['amount'], PDO::PARAM_INT],
                            'state'   => [$action_data['invoice']['state'], PDO::PARAM_STR],
                            'author'  => [$action_data['invoice']['author'], PDO::PARAM_INT],
                            'up_date' => [$action_data['invoice']['up_date'], PDO::PARAM_STR],
                            'cr_date' => [$action_data['invoice']['cr_date'], PDO::PARAM_STR],
                        ]
                    );
                    
                    foreach ($action_data['details'] as $detail) {
                        APP::Module('DB')->Insert(
                            APP::Module('Billing')->settings['module_billing_db_connection'], 'billing_invoices_details', [
                                'id' => [$detail['id'], PDO::PARAM_INT],
                                'invoice' => [$detail['invoice'], PDO::PARAM_INT],
                                'item' => [$detail['item'], PDO::PARAM_STR],
                                'value' => [$detail['value'], PDO::PARAM_STR]
                            ]
                        );
                    }
                    
                    foreach ($action_data['labels'] as $label) {
                        APP::Module('DB')->Insert(
                            APP::Module('Billing')->settings['module_billing_db_connection'], 'billing_invoices_labels', [
                                'id' => [$label['id'], PDO::PARAM_INT],
                                'invoice' => [$label['invoice'], PDO::PARAM_INT],
                                'label_id' => [$label['label_id'], PDO::PARAM_STR],
                                'cr_date' => [$label['cr_date'], PDO::PARAM_STR],
                                'st_date' => [$label['st_date'], PDO::PARAM_STR]
                            ]
                        );
                    }
                    
                    foreach ($action_data['products'] as $product) {
                        APP::Module('DB')->Insert(
                            APP::Module('Billing')->settings['module_billing_db_connection'], 'billing_invoices_products', [
                                'id' => [$product['id'], PDO::PARAM_INT],
                                'invoice' => [$product['invoice'], PDO::PARAM_INT],
                                'type' => [$product['type'], PDO::PARAM_STR],
                                'product' => [$product['product'], PDO::PARAM_INT],
                                'amount' => [$product['amount'], PDO::PARAM_INT],
                                'cr_date' => [$product['cr_date'], PDO::PARAM_STR]
                            ]
                        );
                    }
                    
                    foreach ($action_data['tags'] as $tag) {
                        APP::Module('DB')->Insert(
                            APP::Module('Billing')->settings['module_billing_db_connection'], 'billing_invoices_tag', [
                                'id' => [$tag['id'], PDO::PARAM_INT],
                                'invoice' => [$tag['invoice'], PDO::PARAM_INT],
                                'action' => [$tag['action'], PDO::PARAM_STR],
                                'action_data' => [$tag['action_data'], PDO::PARAM_STR],
                                'cr_date' => [$tag['cr_date'], PDO::PARAM_STR]
                            ]
                        );
                    }
                    
                    foreach ($action_data['products_access'] as $product_access) {
                        APP::Module('DB')->Insert(
                            APP::Module('Billing')->settings['module_billing_db_connection'], 'billing_products_access', [
                                'id' => [$product_access['id'], PDO::PARAM_INT],
                                'invoice' => [$product_access['invoice'], PDO::PARAM_INT],
                                'product' => [$product_access['product'], PDO::PARAM_INT],
                                'cr_date' => [$product_access['cr_date'], PDO::PARAM_STR]
                            ]
                        );
                    }
                    
                    foreach ($action_data['payments'] as $payment) {
                        APP::Module('DB')->Insert(
                            APP::Module('Billing')->settings['module_billing_db_connection'], 'billing_payments', [
                                'id' => [$payment['id'], PDO::PARAM_INT],
                                'invoice' => [$payment['invoice'], PDO::PARAM_INT],
                                'method' => [$payment['method'], PDO::PARAM_STR],
                                'cr_date' => [$payment['cr_date'], PDO::PARAM_STR]
                            ]
                        );
                        
                        foreach ($payment['details'] as $payment_detail) {
                            APP::Module('DB')->Insert(
                                APP::Module('Billing')->settings['module_billing_db_connection'], 'billing_payments_details', [
                                    'id' => [$payment_detail['id'], PDO::PARAM_INT],
                                    'payment' => [$payment_detail['payment'], PDO::PARAM_INT],
                                    'item' => [$payment_detail['item'], PDO::PARAM_STR],
                                    'value' => [$payment_detail['value'], PDO::PARAM_STR]
                                ]
                            );
                        }
                    }

                    foreach ($action_data['comments'] as $comment) {
                        APP::Module('DB')->Insert(
                            APP::Module('Comments')->settings['module_comments_db_connection'], ' comments_messages',
                            [
                                'id' => [$comment['id'], PDO::PARAM_INT],
                                'sub_id' => [$comment['sub_id'], PDO::PARAM_INT],
                                'user' => [$comment['user'], PDO::PARAM_INT],
                                'object_type' => [$comment['object_type'], PDO::PARAM_INT],
                                'object_id' => [$comment['object_id'], PDO::PARAM_INT],
                                'message' => [$comment['message'], PDO::PARAM_STR],
                                'url' => [$comment['url'], PDO::PARAM_STR],
                                'up_date' => [$comment['up_date'], PDO::PARAM_STR]
                            ]
                        );
                    }
                    break;
                case 'user_death':
                    APP::Module('DB')->Insert(
                        APP::Module('Users')->settings['module_users_db_connection'], 'users_tags',
                        [
                            'id' => 'NULL',
                            'user' => [$action_data['id'], PDO::PARAM_INT],
                            'item' => ['recover_state', PDO::PARAM_STR],
                            'value' => [$action_data['states']['to'] . ' > ' . $action_data['states']['from'], PDO::PARAM_STR],
                            'cr_date' => 'NOW()'
                        ]
                    );

                    APP::Module('DB')->Update(
                        APP::Module('Users')->settings['module_users_db_connection'], 'users_about', 
                        ['value' => $action_data['states']['from']], 
                        [
                            ['user', '=', $action_data['id'], PDO::PARAM_INT],
                            ['item', '=', 'state', PDO::PARAM_STR]
                        ]
                    );
                    break;
            }
            
            APP::Module('DB')->Update(
                $this->settings['module_smartlog_db_connection'], 
                'smartlog',
                [
                    'rollback' => 'yes'
                ],
                [
                    ['id', '=', $_POST['id'], PDO::PARAM_INT]
                ]
            );
            
            APP::Module('Triggers')->Exec('rollback_smartlog', ['id' => $_POST['id']]);
        }

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');
        
        echo json_encode($out);
        exit;
    }

}

class SmartLogSearch {

    public function trigger_id($settings) {
        return APP::Module('DB')->Select(
            APP::Module('SmartLog')->settings['module_smartlog_db_connection'], 
            ['fetchAll', PDO::FETCH_COLUMN], 
            ['id'], 'smartlog',
            [['trigger_id', $settings['logic'], $settings['value'], PDO::PARAM_INT]]
        );
    }
    
    public function object_id($settings) {
        return APP::Module('DB')->Select(
            APP::Module('SmartLog')->settings['module_smartlog_db_connection'], 
            ['fetchAll', PDO::FETCH_COLUMN], 
            ['id'], 'smartlog',
            [['object_id', $settings['logic'], $settings['value'], PDO::PARAM_STR]]
        );
    }
    
    public function user_id($settings) {
        return APP::Module('DB')->Select(
            APP::Module('SmartLog')->settings['module_smartlog_db_connection'], 
            ['fetchAll', PDO::FETCH_COLUMN], 
            ['id'], 'smartlog',
            [['user_id', $settings['logic'], $settings['value'], PDO::PARAM_STR]]
        );
    }
    
    public function cr_date($settings) {
        return APP::Module('DB')->Select(
            APP::Module('SmartLog')->settings['module_smartlog_db_connection'], 
            ['fetchAll', PDO::FETCH_COLUMN], 
            ['id'], 'smartlog',
            [['UNIX_TIMESTAMP(cr_date)', 'BETWEEN', $settings['date_from'] . ' AND ' . $settings['date_to'], PDO::PARAM_STR]]
        );
    }

}

class SmartLogActions {

    public function remove($id, $settings) {
        return APP::Module('DB')->Delete(APP::Module('SmartLog')->settings['module_smartlog_db_connection'], 'smartlog', [['id', 'IN', $id]]);
    }
    
}