<?
class Pages {

    function __construct($conf) {
        foreach ($conf['routes'] as $route) APP::Module('Routing')->Add($route[0], $route[1], $route[2]);
    }

    
    // Гардероб на 100% Line (основной)
    public function ProductGarderob100Sale() {
        $cookie_tunnel_subscribtion_id = isset($_COOKIE['tunnel_subscribtion_id']) ? $_COOKIE['tunnel_subscribtion_id'] : 0;
        
        if (isset(APP::Module('Routing')->get['token'])) {
            $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);
            $tunnel_subscribtion_id = $token['params']['user_tunnel_id'];
        } else {
            $tunnel_subscribtion_id = $cookie_tunnel_subscribtion_id;
        }

        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        )) {
            setcookie('tunnel_subscribtion_id', $tunnel_subscribtion_id, time() + 31556926, '/', '.glamurnenko.ru');
        } else {
            APP::Render('pages/products/garderob100/0');
            exit;
        }
        
        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [
                ['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                ['tunnel_id', '=', 3, PDO::PARAM_INT]
            ]
        )) {
            $tunnel_subscribtion = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['id', 'user_id', 'state'], 'tunnels_users',
                [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
            );
        } else {
            APP::Render('pages/products/garderob100/0');
            exit;
        }
        
        if ($tunnel_subscribtion['state'] != 'active') {
            APP::Render('pages/products/garderob100/5', 'include', $tunnel_subscribtion);
            exit;
        }
        
        $tunnel_subscription_labels = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['label_id', 'token'], 'tunnels_tags',
            [['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        ) as $label) {
            $tunnel_subscription_labels[$label['label_id']][] = $label['token'];
        }
        
        // Получил 6/7/8 письмо
        if (
            (array_search('23', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('24', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('25', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/garderob100/4', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 5 письмо
        if (array_search('22', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/garderob100/3', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 4 письмо
        if (array_search('21', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/garderob100/2', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 1/2/3 письмо
        if (
            (array_search('18', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('19', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('20', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/garderob100/1', 'include', $tunnel_subscribtion);
            exit;
        }
    }
    
    public function ProductGarderob100Form() {
        APP::Render('pages/products/garderob100/form');
    }
    
    public function ProductGarderob100Activate() {
        APP::Render('pages/products/garderob100/activate');
    }
    
    public function ProductGarderob100PreTrigger($id, $data) {
        switch ((int) $data['letter']) {
            case 15:
            case 16:
            case 17:
                if (preg_match('/^' . str_replace('/', '\/', preg_quote('http://www.glamurnenko.ru/garderob100/formula')) . '/', $data['task']['url'])) {
                    $user_tunnel_id = APP::Module('DB')->Select(
                        APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                        ['id'], 'tunnels_users',
                        [
                            ['tunnel_id', '=', 4, PDO::PARAM_INT],
                            ['user_id', '=', $data['target_user_id'], PDO::PARAM_INT],
                            ['state', '!=', 'complete', PDO::PARAM_STR]
                        ]
                    );

                    if ($user_tunnel_id) {
                        APP::Module('DB')->Insert(
                            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], 'tunnels_tags',
                            [
                                'id' => 'NULL',
                                'user_tunnel_id' => [$user_tunnel_id, PDO::PARAM_INT],
                                'label_id' => ['complete', PDO::PARAM_STR],
                                'token' => 'NULL',
                                'info' => 'NULL',
                                'cr_date' => 'NOW()'
                            ]
                        );

                        APP::Module('DB')->Update(
                            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], 'tunnels_users', 
                            [
                                'state' => 'complete',
                                'resume_date' => '0000-00-00 00:00:00',
                                'object' => '',
                                'input_data' => ''
                            ], 
                            [
                                ['id', '=', $user_tunnel_id, PDO::PARAM_INT]
                            ]
                        );
                    }
                    
                    APP::Module('Tunnels')->Subscribe([
                        'email' => APP::Module('DB')->Select(
                            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                            ['email'], 'users',
                            [['id', '=', $data['target_user_id'], PDO::PARAM_INT]]
                        ),
                        'tunnel' => [3, 'timeouts', 24, 0],
                        'activation' => [349, false],
                        'source' => 'trigger',
                        'roles_tunnel' => false,
                        'states_tunnel' => false,
                        'welcome' => false,
                        'queue_timeout' => false,
                        'complete_tunnels' => false,
                        'pause_tunnels' => false,
                        'input_data' => false,
                        'about_user' => false,
                        'auto_save_about' => false,
                        'save_utm' => false
                    ]);
                }
                break;
        }
        
        return $data;
    }
    
    public function ProductGarderob100TestResultsTrigger($id, $data) {
        switch ((int) $data['letter']) {
            case 134:
                if (preg_match('/^' . str_replace('/', '\/', preg_quote('https://pult.glamurnenko.ru/users/activate/')) . '/', $data['task']['url'])) {
                    $user_tunnel_id = APP::Module('DB')->Select(
                        APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                        ['id'], 'tunnels_users',
                        [
                            ['tunnel_id', '=', 28, PDO::PARAM_INT],
                            ['user_id', '=', $data['target_user_id'], PDO::PARAM_INT],
                            ['state', '!=', 'complete', PDO::PARAM_STR]
                        ]
                    );

                    if ($user_tunnel_id) {
                        APP::Module('DB')->Insert(
                            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], 'tunnels_tags',
                            [
                                'id' => 'NULL',
                                'user_tunnel_id' => [$user_tunnel_id, PDO::PARAM_INT],
                                'label_id' => ['complete', PDO::PARAM_STR],
                                'token' => 'NULL',
                                'info' => 'NULL',
                                'cr_date' => 'NOW()'
                            ]
                        );

                        APP::Module('DB')->Update(
                            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], 'tunnels_users', 
                            [
                                'state' => 'complete',
                                'resume_date' => '0000-00-00 00:00:00',
                                'object' => '',
                                'input_data' => ''
                            ], 
                            [
                                ['id', '=', $user_tunnel_id, PDO::PARAM_INT]
                            ]
                        );
                    }
                    
                    APP::Module('Tunnels')->Subscribe([
                        'email' => APP::Module('DB')->Select(
                            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                            ['email'], 'users',
                            [['id', '=', $data['target_user_id'], PDO::PARAM_INT]]
                        ),
                        'tunnel' => [54, 'actions', 531, 1440],
                        'activation' => [349, false],
                        'source' => 'trigger',
                        'roles_tunnel' => false,
                        'states_tunnel' => false,
                        'welcome' => false,
                        'queue_timeout' => false,
                        'complete_tunnels' => false,
                        'pause_tunnels' => false,
                        'input_data' => false,
                        'about_user' => false,
                        'auto_save_about' => false,
                        'save_utm' => false
                    ]);
                }
                break;
            case 135:
            case 136:
                if (preg_match('/^' . str_replace('/', '\/', preg_quote('http://glamurnenko.ru/garderob100/result2.php')) . '/', $data['task']['url'])) {
                    $user_tunnel_id = APP::Module('DB')->Select(
                        APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                        ['id'], 'tunnels_users',
                        [
                            ['tunnel_id', '=', 28, PDO::PARAM_INT],
                            ['user_id', '=', $data['target_user_id'], PDO::PARAM_INT],
                            ['state', '!=', 'complete', PDO::PARAM_STR]
                        ]
                    );

                    if ($user_tunnel_id) {
                        APP::Module('DB')->Insert(
                            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], 'tunnels_tags',
                            [
                                'id' => 'NULL',
                                'user_tunnel_id' => [$user_tunnel_id, PDO::PARAM_INT],
                                'label_id' => ['complete', PDO::PARAM_STR],
                                'token' => 'NULL',
                                'info' => 'NULL',
                                'cr_date' => 'NOW()'
                            ]
                        );

                        APP::Module('DB')->Update(
                            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], 'tunnels_users', 
                            [
                                'state' => 'complete',
                                'resume_date' => '0000-00-00 00:00:00',
                                'object' => '',
                                'input_data' => ''
                            ], 
                            [
                                ['id', '=', $user_tunnel_id, PDO::PARAM_INT]
                            ]
                        );
                    }
                    
                    APP::Module('Tunnels')->Subscribe([
                        'email' => APP::Module('DB')->Select(
                            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                            ['email'], 'users',
                            [['id', '=', $data['target_user_id'], PDO::PARAM_INT]]
                        ),
                        'tunnel' => [54, 'actions', 531, 1440],
                        'activation' => [349, false],
                        'source' => 'trigger',
                        'roles_tunnel' => false,
                        'states_tunnel' => false,
                        'welcome' => false,
                        'queue_timeout' => false,
                        'complete_tunnels' => false,
                        'pause_tunnels' => false,
                        'input_data' => false,
                        'about_user' => false,
                        'auto_save_about' => false,
                        'save_utm' => false
                    ]);
                }
                break;
        }
        
        return $data;
    }
    
    
    // Школа Имиджмейкеров (основной)
    // Школа Имиджмейкеров (основной) v2
    public function ProductImageSchoolSale() {
        $cookie_tunnel_subscribtion_id = isset($_COOKIE['tunnel_subscribtion_id']) ? $_COOKIE['tunnel_subscribtion_id'] : 0;
        
        if (isset(APP::Module('Routing')->get['token'])) {
            $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);
            $tunnel_subscribtion_id = $token['params']['user_tunnel_id'];
        } else {
            $tunnel_subscribtion_id = $cookie_tunnel_subscribtion_id;
        }

        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        )) {
            setcookie('tunnel_subscribtion_id', $tunnel_subscribtion_id, time() + 31556926, '/', '.glamurnenko.ru');
        } else {
            APP::Render('pages/products/imageschool/0');
            exit;
        }
        
        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [
                ['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                ['tunnel_id', '=', 7, PDO::PARAM_INT]
            ]
        )) {
            $tunnel_subscribtion = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['id', 'user_id', 'state'], 'tunnels_users',
                [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
            );
        } else {
            APP::Render('pages/products/imageschool/0');
            exit;
        }
        
        if ($tunnel_subscribtion['state'] != 'active') {
            APP::Render('pages/products/imageschool/0', 'include', $tunnel_subscribtion);
            exit;
        }
        
        $tunnel_subscription_labels = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['label_id', 'token'], 'tunnels_tags',
            [['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        ) as $label) {
            $tunnel_subscription_labels[$label['label_id']][] = $label['token'];
        }

        // Получил 18/19/20 письмо
        if (
            (array_search('168', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('169', $tunnel_subscription_labels['sendmail']) !== false) ||
            (array_search('170', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/imageschool/0', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 16/17 письмо
        if (
            (array_search('166', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('167', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/imageschool/2', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 8/9/10/11/12/13/14/15 письмо
        if (
            (array_search('158', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('159', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('160', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('161', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('162', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('163', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('164', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('165', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/imageschool/1', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 1/2/3/4/5/6/7 письмо
        if (
            (array_search('151', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('152', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('153', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('154', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('155', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('156', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('157', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/imageschool/0', 'include', $tunnel_subscribtion);
            exit;
        }
    }
    
    public function ProductImageSchoolPreTrigger($id, $data) {
        switch ((int) $data['letter']) {
            case 244:
            case 245:
            case 246:
                if (preg_match('/^' . str_replace('/', '\/', preg_quote('http://www.glamurnenko.ru/imageschool/7veshej')) . '/', $data['task']['url'])) {
                    $user_tunnel_id = APP::Module('DB')->Select(
                        APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                        ['id'], 'tunnels_users',
                        [
                            ['tunnel_id', '=', 8, PDO::PARAM_INT],
                            ['user_id', '=', $data['target_user_id'], PDO::PARAM_INT],
                            ['state', '!=', 'complete', PDO::PARAM_STR]
                        ]
                    );

                    if ($user_tunnel_id) {
                        APP::Module('DB')->Insert(
                            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], 'tunnels_tags',
                            [
                                'id' => 'NULL',
                                'user_tunnel_id' => [$user_tunnel_id, PDO::PARAM_INT],
                                'label_id' => ['complete', PDO::PARAM_STR],
                                'token' => 'NULL',
                                'info' => 'NULL',
                                'cr_date' => 'NOW()'
                            ]
                        );

                        APP::Module('DB')->Update(
                            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], 'tunnels_users', 
                            [
                                'state' => 'complete',
                                'resume_date' => '0000-00-00 00:00:00',
                                'object' => '',
                                'input_data' => ''
                            ], 
                            [
                                ['id', '=', $user_tunnel_id, PDO::PARAM_INT]
                            ]
                        );
                    }
                    
                    APP::Module('Tunnels')->Subscribe([
                        'email' => APP::Module('DB')->Select(
                            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                            ['email'], 'users',
                            [['id', '=', $data['target_user_id'], PDO::PARAM_INT]]
                        ),
                        'tunnel' => [7, 'timeouts', 56, 0],
                        'activation' => [349, false],
                        'source' => 'trigger',
                        'roles_tunnel' => false,
                        'states_tunnel' => false,
                        'welcome' => false,
                        'queue_timeout' => false,
                        'complete_tunnels' => false,
                        'pause_tunnels' => false,
                        'input_data' => false,
                        'about_user' => false,
                        'auto_save_about' => false,
                        'save_utm' => false
                    ]);
                }
                break;
        }
        
        return $data;
    }
    
    
    // 101 рецепт стильного гардероба в офис
    public function Product101OfficeSale() {
        $cookie_tunnel_subscribtion_id = isset($_COOKIE['tunnel_subscribtion_id']) ? $_COOKIE['tunnel_subscribtion_id'] : 0;
        
        if (isset(APP::Module('Routing')->get['token'])) {
            $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);
            $tunnel_subscribtion_id = $token['params']['user_tunnel_id'];
        } else {
            $tunnel_subscribtion_id = $cookie_tunnel_subscribtion_id;
        }

        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        )) {
            setcookie('tunnel_subscribtion_id', $tunnel_subscribtion_id, time() + 31556926, '/', '.glamurnenko.ru');
        } else {
            APP::Render('pages/products/101office/5');
            exit;
        }
        
        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [
                ['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                ['tunnel_id', '=', 13, PDO::PARAM_INT]
            ]
        )) {
            $tunnel_subscribtion = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['id', 'user_id', 'state'], 'tunnels_users',
                [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
            );
        } else {
            APP::Render('pages/products/101office/5');
            exit;
        }
        
        if ($tunnel_subscribtion['state'] != 'active') {
            APP::Render('pages/products/101office/5', 'include', $tunnel_subscribtion);
            exit;
        }
        
        $tunnel_subscription_labels = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['label_id', 'token'], 'tunnels_tags',
            [['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        ) as $label) {
            $tunnel_subscription_labels[$label['label_id']][] = $label['token'];
        }

        // Получил 13 письмо
        if (array_search('118', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/101office/5', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 12 письмо
        if (array_search('117', $tunnel_subscription_labels['sendmail']) !== false) {
            $label = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['label_id', 'token', 'UNIX_TIMESTAMP(cr_date) AS cr_date'], 'tunnels_tags',
                [
                    ['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                    ['label_id', '=', 'sendmail', PDO::PARAM_STR],
                    ['token', '=', '117', PDO::PARAM_STR]
                ]
            );

            // Дата окончания таймера
            $timer_stop = strtotime('+12 hours', $label['cr_date']);

            // Проверка на окончание таймера
            if ($timer_stop < time()) {
                // Если закончился таймер
                APP::Render('pages/products/101office/5', 'include', $tunnel_subscribtion);
            } else {
                // Если не закончился таймер 
                APP::Render('pages/products/101office/4', 'include', $tunnel_subscribtion);
            }
            exit;


            APP::Render('pages/products/101office/4', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 9/10/11/12 письмо
        if (
            (array_search('114', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('115', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('116', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/101office/4', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 8 письмо
        if (array_search('113', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/101office/3', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 7 письмо
        if (array_search('112', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/101office/2', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 1/2/3/4/5/6 письмо
        if (
            (array_search('106', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('107', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('108', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('109', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('110', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('111', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/101office/1', 'include', $tunnel_subscribtion);
            exit;
        }
    }
    
    public function Product101OfficeForm() {
        APP::Render('pages/products/101office/form');
    }
    
    public function Product101OfficeActivate() {
        APP::Render('pages/products/101office/activate');
    }
    
    
    // Шоппинг осень-зима под контролем стилиста
    public function ProductShoppingFWSale() {
        $cookie_tunnel_subscribtion_id = isset($_COOKIE['tunnel_subscribtion_id']) ? $_COOKIE['tunnel_subscribtion_id'] : 0;
        
        if (isset(APP::Module('Routing')->get['token'])) {
            $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);
            $tunnel_subscribtion_id = $token['params']['user_tunnel_id'];
        } else {
            $tunnel_subscribtion_id = $cookie_tunnel_subscribtion_id;
        }

        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        )) {
            setcookie('tunnel_subscribtion_id', $tunnel_subscribtion_id, time() + 31556926, '/', '.glamurnenko.ru');
        } else {
            APP::Render('pages/products/shopping-fw/5');
            exit;
        }
        
        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [
                ['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                ['tunnel_id', 'IN', [2, 49], PDO::PARAM_INT]
            ]
        )) {
            $tunnel_subscribtion = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['id', 'user_id', 'state'], 'tunnels_users',
                [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
            );
        } else {
            APP::Render('pages/products/shopping-fw/5');
            exit;
        }

        if ($tunnel_subscribtion['state'] != 'active') {
            APP::Render('pages/products/shopping-fw/5', 'include', $tunnel_subscribtion);
            exit;
        }
        
        $tunnel_subscription_labels = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['label_id', 'token'], 'tunnels_tags',
            [['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        ) as $label) {
            $tunnel_subscription_labels[$label['label_id']][] = $label['token'];
        }

        // Получил (3 сет) 1/2 письмо
        if (
            (array_search('92', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('93', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            $label = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['label_id', 'token', 'UNIX_TIMESTAMP(cr_date) AS cr_date'], 'tunnels_tags',
                [
                    ['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                    ['label_id', '=', 'sendmail', PDO::PARAM_STR],
                    ['token', '=', '92', PDO::PARAM_STR]
                ]
            );

            // Дата окончания таймера
            $timer_stop = strtotime('+78 hours', $label['cr_date']);

            // Проверка на окончание таймера
            if ($timer_stop < time()) {
                // Если закончился таймер
                APP::Render('pages/products/shopping-fw/5', 'include', $tunnel_subscribtion);
            } else {
                // Если не закончился таймер 
                APP::Render('pages/products/shopping-fw/4', 'include', $tunnel_subscribtion);
            }
            exit;
        }

        ////////////////////////////////////////////////////////////////////////////////

        // Получил (2 сет) 5 письмо
        if (array_search('91', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/shopping-fw/5', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (2 сет) 1/2/3/4 письмо
        if (
            (array_search('87', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('88', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('89', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('90', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            $label = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['label_id', 'token', 'UNIX_TIMESTAMP(cr_date) AS cr_date'], 'tunnels_tags',
                [
                    ['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                    ['label_id', '=', 'sendmail', PDO::PARAM_STR],
                    ['token', '=', '87', PDO::PARAM_STR]
                ]
            );

            // Дата окончания таймера
            $timer_stop = strtotime('+78 hours', $label['cr_date']);

            // Проверка на окончание таймера
            if ($timer_stop < time()) {
                // Если закончился таймер
                APP::Render('pages/products/shopping-fw/5', 'include', $tunnel_subscribtion);
            } else {
                // Если не закончился таймер 
                APP::Render('pages/products/shopping-fw/4', 'include', $tunnel_subscribtion);
            }
            exit;
        }

        ////////////////////////////////////////////////////////////////////////////////

        // Получил (1 сет) 9 письмо
        if (array_search('86', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/shopping-fw/3', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (1 сет) 8 письмо
        if (array_search('85', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/shopping-fw/2', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (1 сет) 7 письмо
        if (array_search('84', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/shopping-fw/1', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (1 сет) 1/2/3/4/5/6 письмо
        if (
            (array_search('78', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('79', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('80', $tunnel_subscription_labels['sendmail']) !== false) ||  
            (array_search('81', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('82', $tunnel_subscription_labels['sendmail']) !== false) ||  
            (array_search('82', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/shopping-fw/5', 'include', $tunnel_subscribtion);
            exit;
        }
    }
    
    public function ProductShoppingFWForm() {
        APP::Render('pages/products/shopping-fw/form');
    }
    
    public function ProductShoppingFWActivate() {
        APP::Render('pages/products/shopping-fw/activate');
    }
    
    
    // Шоппинг весна-лето под контролем стилиста
    public function ProductShoppingSSSale() {
        $cookie_tunnel_subscribtion_id = isset($_COOKIE['tunnel_subscribtion_id']) ? $_COOKIE['tunnel_subscribtion_id'] : 0;
        
        if (isset(APP::Module('Routing')->get['token'])) {
            $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);
            $tunnel_subscribtion_id = $token['params']['user_tunnel_id'];
        } else {
            $tunnel_subscribtion_id = $cookie_tunnel_subscribtion_id;
        }

        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        )) {
            setcookie('tunnel_subscribtion_id', $tunnel_subscribtion_id, time() + 31556926, '/', '.glamurnenko.ru');
        } else {
            APP::Render('pages/products/shopping-ss/4');
            exit;
        }
        
        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [
                ['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                ['tunnel_id', '=', 19, PDO::PARAM_INT]
            ]
        )) {
            $tunnel_subscribtion = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['id', 'user_id', 'state'], 'tunnels_users',
                [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
            );
        } else {
            APP::Render('pages/products/shopping-ss/4');
            exit;
        }
        
        if ($tunnel_subscribtion['state'] != 'active') {
            APP::Render('pages/products/shopping-ss/4', 'include', $tunnel_subscribtion);
            exit;
        }
        
        $tunnel_subscription_labels = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['label_id', 'token'], 'tunnels_tags',
            [['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        ) as $label) {
            $tunnel_subscription_labels[$label['label_id']][] = $label['token'];
        }
        
        // Получил (3 сет) 3 письмо
        if (array_search('272', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/shopping-ss/4', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (3 сет) 2 письмо
        if (array_search('271', $tunnel_subscription_labels['sendmail']) !== false) {
            $label = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['label_id', 'token', 'UNIX_TIMESTAMP(cr_date) AS cr_date'], 'tunnels_tags',
                [
                    ['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                    ['label_id', '=', 'sendmail', PDO::PARAM_STR],
                    ['token', '=', '270', PDO::PARAM_STR]
                ]
            );

            // Дата окончания таймера
            $timer_stop = strtotime('+60 hours', $label['cr_date']);

            // Проверка на окончание таймера
            if ($timer_stop < time()) {
                // Если закончился таймер
                APP::Render('pages/products/shopping-ss/4', 'include', $tunnel_subscribtion);
            } else {
                // Если не закончился таймер 
                APP::Render('pages/products/shopping-ss/3', 'include', $tunnel_subscribtion);
            }
            exit;
        }

        // Получил (3 сет) 1 письмо
        if (array_search('270', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/shopping-ss/3', 'include', $tunnel_subscribtion);
            exit;
        }

        ////////////////////////////////////////////////////////////////////////////////

        // Получил (2 сет) 4 письмо
        if (array_search('269', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/shopping-ss/4', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (2 сет) 3 письмо
        if (array_search('268', $tunnel_subscription_labels['sendmail']) !== false) {
            $label = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['label_id', 'token', 'UNIX_TIMESTAMP(cr_date) AS cr_date'], 'tunnels_tags',
                [
                    ['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                    ['label_id', '=', 'sendmail', PDO::PARAM_STR],
                    ['token', '=', '266', PDO::PARAM_STR]
                ]
            );

            // Дата окончания таймера
            $timer_stop = strtotime('+60 hours', $label['cr_date']);

            // Проверка на окончание таймера
            if ($timer_stop < time()) {
                // Если закончился таймер
                APP::Render('pages/products/shopping-ss/4', 'include', $tunnel_subscribtion);
            } else {
                // Если не закончился таймер 
                APP::Render('pages/products/shopping-ss/3', 'include', $tunnel_subscribtion);
            }
            exit;
        }

        // Получил (2 сет) 2 письмо
        if (array_search('267', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/shopping-ss/3', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (2 сет) 1 письмо
        if (array_search('266', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/shopping-ss/2', 'include', $tunnel_subscribtion);
            exit;
        }

        ////////////////////////////////////////////////////////////////////////////////

        // Получил (1 сет) 4/5/6 письмо
        if (
            (array_search('263', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('264', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('265', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/shopping-ss/1', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (1 сет) 1/2/3 письмо
        if (
            (array_search('260', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('261', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('262', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/shopping-ss/4', 'include', $tunnel_subscribtion);
            exit;
        }
    }
    
    public function ProductShoppingSSForm() {
        APP::Render('pages/products/shopping-ss/form');
    }
    
    public function ProductShoppingSSActivate() {
        APP::Render('pages/products/shopping-ss/activate');
    }
    
    
    // Как выглядеть на 2 размера стройнее с помощью имиджмейкера (основной)
    public function Product2razmeraSale() {
        $cookie_tunnel_subscribtion_id = isset($_COOKIE['tunnel_subscribtion_id']) ? $_COOKIE['tunnel_subscribtion_id'] : 0;
        
        if (isset(APP::Module('Routing')->get['token'])) {
            $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);
            $tunnel_subscribtion_id = $token['params']['user_tunnel_id'];
        } else {
            $tunnel_subscribtion_id = $cookie_tunnel_subscribtion_id;
        }

        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        )) {
            setcookie('tunnel_subscribtion_id', $tunnel_subscribtion_id, time() + 31556926, '/', '.glamurnenko.ru');
        } else {
            APP::Render('pages/products/2razmera/1');
            exit;
        }
        
        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [
                ['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                ['tunnel_id', '=', 5, PDO::PARAM_INT]
            ]
        )) {
            $tunnel_subscribtion = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['id', 'user_id', 'state'], 'tunnels_users',
                [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
            );
        } else {
            APP::Render('pages/products/2razmera/1');
            exit;
        }
        
        if ($tunnel_subscribtion['state'] != 'active') {
            APP::Render('pages/products/2razmera/1', 'include', $tunnel_subscribtion);
            exit;
        }
        
        $tunnel_subscription_labels = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['label_id', 'token'], 'tunnels_tags',
            [['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        ) as $label) {
            $tunnel_subscription_labels[$label['label_id']][] = $label['token'];
        }

        // Получил 18/19 письмо
        if (
            (array_search('189', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('190', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/2razmera/1', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 16/17 письмо
        if (
            (array_search('187', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('188', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/2razmera/3', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 8/9/10/11/12/13/14/15 письмо
        if (
            (array_search('179', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('180', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('181', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('182', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('183', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('184', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('185', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('186', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/2razmera/2', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 1/2/3/4/5/6/7 письмо
        if (
            (array_search('172', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('173', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('174', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('175', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('176', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('177', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('178', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/2razmera/1', 'include', $tunnel_subscribtion);
            exit;
        }
    }
    
    public function Product2razmeraPreTrigger($id, $data) {
        switch ((int) $data['letter']) {
            case 241:
            case 242:
            case 243:
                if (preg_match('/^' . str_replace('/', '\/', preg_quote('http://www.glamurnenko.ru/2razmera/8steps')) . '/', $data['task']['url'])) {
                    $user_tunnel_id = APP::Module('DB')->Select(
                        APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                        ['id'], 'tunnels_users',
                        [
                            ['tunnel_id', '=', 6, PDO::PARAM_INT],
                            ['user_id', '=', $data['target_user_id'], PDO::PARAM_INT],
                            ['state', '!=', 'complete', PDO::PARAM_STR]
                        ]
                    );

                    if ($user_tunnel_id) {
                        APP::Module('DB')->Insert(
                            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], 'tunnels_tags',
                            [
                                'id' => 'NULL',
                                'user_tunnel_id' => [$user_tunnel_id, PDO::PARAM_INT],
                                'label_id' => ['complete', PDO::PARAM_STR],
                                'token' => 'NULL',
                                'info' => 'NULL',
                                'cr_date' => 'NOW()'
                            ]
                        );

                        APP::Module('DB')->Update(
                            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], 'tunnels_users', 
                            [
                                'state' => 'complete',
                                'resume_date' => '0000-00-00 00:00:00',
                                'object' => '',
                                'input_data' => ''
                            ], 
                            [
                                ['id', '=', $user_tunnel_id, PDO::PARAM_INT]
                            ]
                        );
                    }
                    
                    APP::Module('Tunnels')->Subscribe([
                        'email' => APP::Module('DB')->Select(
                            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                            ['email'], 'users',
                            [['id', '=', $data['target_user_id'], PDO::PARAM_INT]]
                        ),
                        'tunnel' => [5, 'timeouts', 35, 0],
                        'activation' => [349, false],
                        'source' => 'trigger',
                        'roles_tunnel' => false,
                        'states_tunnel' => false,
                        'welcome' => false,
                        'queue_timeout' => false,
                        'complete_tunnels' => false,
                        'pause_tunnels' => false,
                        'input_data' => false,
                        'about_user' => false,
                        'auto_save_about' => false,
                        'save_utm' => false
                    ]);
                }
                break;
        }
        
        return $data;
    }
    
    
    // 1000 интернет клиентов для имиджмейкера (основной)
    public function Product1000clientsSale() {
        $cookie_tunnel_subscribtion_id = isset($_COOKIE['tunnel_subscribtion_id']) ? $_COOKIE['tunnel_subscribtion_id'] : 0;
        
        if (isset(APP::Module('Routing')->get['token'])) {
            $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);
            $tunnel_subscribtion_id = $token['params']['user_tunnel_id'];
        } else {
            $tunnel_subscribtion_id = $cookie_tunnel_subscribtion_id;
        }

        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        )) {
            setcookie('tunnel_subscribtion_id', $tunnel_subscribtion_id, time() + 31556926, '/', '.glamurnenko.ru');
        } else {
            APP::Render('pages/products/1000clients/5');
            exit;
        }
        
        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [
                ['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                ['tunnel_id', '=', 9, PDO::PARAM_INT]
            ]
        )) {
            $tunnel_subscribtion = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['id', 'user_id', 'state'], 'tunnels_users',
                [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
            );
        } else {
            APP::Render('pages/products/1000clients/5');
            exit;
        }
        
        if ($tunnel_subscribtion['state'] != 'active') {
            APP::Render('pages/products/1000clients/5', 'include', $tunnel_subscribtion);
            exit;
        }
        
        $tunnel_subscription_labels = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['label_id', 'token'], 'tunnels_tags',
            [['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        ) as $label) {
            $tunnel_subscription_labels[$label['label_id']][] = $label['token'];
        }

        // Получил 9 письмо
        if (array_search('257', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/1000clients/5', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 6/7/8 письмо
        if (
            (array_search('254', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('255', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('256', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/1000clients/4', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 5 письмо
        if (array_search('253', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/1000clients/3', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 4 письмо
        if (array_search('252', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/1000clients/2', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 1/2/3 письмо
        if (
            (array_search('249', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('250', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('251', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/1000clients/1', 'include', $tunnel_subscribtion);
            exit;
        }
    }
    
    public function Product1000clientsPreTrigger($id, $data) {
        switch ((int) $data['letter']) {
            case 247:
            case 248:
                if (preg_match('/^' . str_replace('/', '\/', preg_quote('http://www.glamurnenko.ru/1000clients/activate')) . '/', $data['task']['url'])) {
                    $user_tunnel_id = APP::Module('DB')->Select(
                        APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                        ['id'], 'tunnels_users',
                        [
                            ['tunnel_id', '=', 10, PDO::PARAM_INT],
                            ['user_id', '=', $data['target_user_id'], PDO::PARAM_INT],
                            ['state', '!=', 'complete', PDO::PARAM_STR]
                        ]
                    );

                    if ($user_tunnel_id) {
                        APP::Module('DB')->Insert(
                            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], 'tunnels_tags',
                            [
                                'id' => 'NULL',
                                'user_tunnel_id' => [$user_tunnel_id, PDO::PARAM_INT],
                                'label_id' => ['complete', PDO::PARAM_STR],
                                'token' => 'NULL',
                                'info' => 'NULL',
                                'cr_date' => 'NOW()'
                            ]
                        );

                        APP::Module('DB')->Update(
                            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], 'tunnels_users', 
                            [
                                'state' => 'complete',
                                'resume_date' => '0000-00-00 00:00:00',
                                'object' => '',
                                'input_data' => ''
                            ], 
                            [
                                ['id', '=', $user_tunnel_id, PDO::PARAM_INT]
                            ]
                        );
                    }
                    
                    $res = APP::Module('Tunnels')->Subscribe([
                        'email' => APP::Module('DB')->Select(
                            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                            ['email'], 'users',
                            [['id', '=', $data['target_user_id'], PDO::PARAM_INT]]
                        ),
                        'tunnel' => [9, 'actions', 89, 1380],
                        'activation' => [349, false],
                        'source' => 'trigger',
                        'roles_tunnel' => false,
                        'states_tunnel' => false,
                        'welcome' => false,
                        'queue_timeout' => false,
                        'complete_tunnels' => false,
                        'pause_tunnels' => false,
                        'input_data' => false,
                        'about_user' => false,
                        'auto_save_about' => false,
                        'save_utm' => false
                    ]);
                }
                break;
        }
        
        return $data;
    }
    
    
    // Портфолио для имиджмейкера за 1 месяц (основной)
    public function ProductPortfolioSale() {
        $cookie_tunnel_subscribtion_id = isset($_COOKIE['tunnel_subscribtion_id']) ? $_COOKIE['tunnel_subscribtion_id'] : 0;
        
        if (isset(APP::Module('Routing')->get['token'])) {
            $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);
            $tunnel_subscribtion_id = $token['params']['user_tunnel_id'];
        } else {
            $tunnel_subscribtion_id = $cookie_tunnel_subscribtion_id;
        }

        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        )) {
            setcookie('tunnel_subscribtion_id', $tunnel_subscribtion_id, time() + 31556926, '/', '.glamurnenko.ru');
        } else {
            APP::Render('pages/products/portfolio/4');
            exit;
        }
        
        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [
                ['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                ['tunnel_id', '=', 11, PDO::PARAM_INT]
            ]
        )) {
            $tunnel_subscribtion = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['id', 'user_id', 'state'], 'tunnels_users',
                [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
            );
        } else {
            APP::Render('pages/products/portfolio/4');
            exit;
        }
        
        if ($tunnel_subscribtion['state'] != 'active') {
            APP::Render('pages/products/portfolio/4', 'include', $tunnel_subscribtion);
            exit;
        }
        
        $tunnel_subscription_labels = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['label_id', 'token'], 'tunnels_tags',
            [['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        ) as $label) {
            $tunnel_subscription_labels[$label['label_id']][] = $label['token'];
        }

        // Получил 8 письмо
        if (array_search('207', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/portfolio/4', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 7 письмо
        if (array_search('206', $tunnel_subscription_labels['sendmail']) !== false) {
            $label = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['label_id', 'token', 'UNIX_TIMESTAMP(cr_date) AS cr_date'], 'tunnels_tags',
                [
                    ['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                    ['label_id', '=', 'sendmail', PDO::PARAM_STR],
                    ['token', '=', '206', PDO::PARAM_STR]
                ]
            );

            // Дата окончания таймера
            $timer_stop = strtotime('+6 hours', $label['cr_date']);

            // Проверка на окончание таймера
            if ($timer_stop < time()) {
                // Если закончился таймер
                APP::Render('pages/products/portfolio/4', 'include', $tunnel_subscribtion);
            } else {
                // Если не закончился таймер 
                APP::Render('pages/products/portfolio/3', 'include', $tunnel_subscribtion);
            }
            exit;
        }

        // Получил 6 письмо
        if (array_search('205', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/portfolio/3', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 4/5 письмо
        if (
            (array_search('203', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('204', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/portfolio/2', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 1/2/3 письмо
        if (
            (array_search('200', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('201', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('202', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/portfolio/1', 'include', $tunnel_subscribtion);
            exit;
        }
    }
    
    public function ProductPortfolioForm() {
        APP::Render('pages/products/portfolio/form');
    }
    
    public function ProductPortfolioActivate() {
        APP::Render('pages/products/portfolio/activate');
    }
    
    public function ProductPortfolioPreTrigger($id, $data) {
        switch ((int) $data['letter']) {
            case 197:
            case 198:
                if (preg_match('/^' . str_replace('/', '\/', preg_quote('http://www.glamurnenko.ru/blog/sozdanie-portfolio')) . '/', $data['task']['url'])) {
                    $user_tunnel_id = APP::Module('DB')->Select(
                        APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                        ['id'], 'tunnels_users',
                        [
                            ['tunnel_id', '=', 12, PDO::PARAM_INT],
                            ['user_id', '=', $data['target_user_id'], PDO::PARAM_INT],
                            ['state', '!=', 'complete', PDO::PARAM_STR]
                        ]
                    );

                    if ($user_tunnel_id) {
                        APP::Module('DB')->Insert(
                            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], 'tunnels_tags',
                            [
                                'id' => 'NULL',
                                'user_tunnel_id' => [$user_tunnel_id, PDO::PARAM_INT],
                                'label_id' => ['complete', PDO::PARAM_STR],
                                'token' => 'NULL',
                                'info' => 'NULL',
                                'cr_date' => 'NOW()'
                            ]
                        );

                        APP::Module('DB')->Update(
                            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], 'tunnels_users', 
                            [
                                'state' => 'complete',
                                'resume_date' => '0000-00-00 00:00:00',
                                'object' => '',
                                'input_data' => ''
                            ], 
                            [
                                ['id', '=', $user_tunnel_id, PDO::PARAM_INT]
                            ]
                        );
                    }
                    
                    APP::Module('Tunnels')->Subscribe([
                        'email' => APP::Module('DB')->Select(
                            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                            ['email'], 'users',
                            [['id', '=', $data['target_user_id'], PDO::PARAM_INT]]
                        ),
                        'tunnel' => [11, 'timeouts', 88, 0],
                        'activation' => [349, false],
                        'source' => 'trigger',
                        'roles_tunnel' => false,
                        'states_tunnel' => false,
                        'welcome' => false,
                        'queue_timeout' => false,
                        'complete_tunnels' => false,
                        'pause_tunnels' => false,
                        'input_data' => false,
                        'about_user' => false,
                        'auto_save_about' => false,
                        'save_utm' => false
                    ]);
                }
                break;
        }
        
        return $data;
    }
    
    
    // 5 секретов преображения Вашего гардероба
    public function Product5secretsSale() {
        $cookie_tunnel_subscribtion_id = isset($_COOKIE['tunnel_subscribtion_id']) ? $_COOKIE['tunnel_subscribtion_id'] : 0;
        
        if (isset(APP::Module('Routing')->get['token'])) {
            $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);
            $tunnel_subscribtion_id = $token['params']['user_tunnel_id'];
        } else {
            $tunnel_subscribtion_id = $cookie_tunnel_subscribtion_id;
        }

        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        )) {
            setcookie('tunnel_subscribtion_id', $tunnel_subscribtion_id, time() + 31556926, '/', '.glamurnenko.ru');
        } else {
            APP::Render('pages/products/5secrets/2');
            exit;
        }
        
        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [
                ['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                ['tunnel_id', '=', 14, PDO::PARAM_INT]
            ]
        )) {
            $tunnel_subscribtion = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['id', 'user_id', 'state'], 'tunnels_users',
                [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
            );
        } else {
            APP::Render('pages/products/5secrets/2');
            exit;
        }
        
        if ($tunnel_subscribtion['state'] != 'active') {
            APP::Render('pages/products/5secrets/2', 'include', $tunnel_subscribtion);
            exit;
        }
        
        $tunnel_subscription_labels = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['label_id', 'token'], 'tunnels_tags',
            [['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        ) as $label) {
            $tunnel_subscription_labels[$label['label_id']][] = $label['token'];
        }

        // Получил 9 письмо
        if (array_search('130', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/5secrets/2', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 6/7/8 письмо
        if (
            (array_search('127', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('128', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('129', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/5secrets/1', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 1/2/3/4/5 письмо
        if (
            (array_search('122', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('123', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('124', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('125', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('126', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/5secrets/2', 'include', $tunnel_subscribtion);
            exit;
        }
    }
    
    
    // Революция Цвета
    public function ProductBigColorSale() {
        $cookie_tunnel_subscribtion_id = isset($_COOKIE['tunnel_subscribtion_id']) ? $_COOKIE['tunnel_subscribtion_id'] : 0;
        
        if (isset(APP::Module('Routing')->get['token'])) {
            $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);
            $tunnel_subscribtion_id = $token['params']['user_tunnel_id'];
        } else {
            $tunnel_subscribtion_id = $cookie_tunnel_subscribtion_id;
        }

        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        )) {
            setcookie('tunnel_subscribtion_id', $tunnel_subscribtion_id, time() + 31556926, '/', '.glamurnenko.ru');
        } else {
            APP::Render('pages/products/bigcolor/6');
            exit;
        }
        
        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [
                ['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                ['tunnel_id', '=', 15, PDO::PARAM_INT]
            ]
        )) {
            $tunnel_subscribtion = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['id', 'user_id', 'state'], 'tunnels_users',
                [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
            );
        } else {
            APP::Render('pages/products/bigcolor/6');
            exit;
        }
        
        if ($tunnel_subscribtion['state'] != 'active') {
            APP::Render('pages/products/bigcolor/6', 'include', $tunnel_subscribtion);
            exit;
        }
        
        $tunnel_subscription_labels = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['label_id', 'token'], 'tunnels_tags',
            [['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        ) as $label) {
            $tunnel_subscription_labels[$label['label_id']][] = $label['token'];
        }

        // Получил (3 сет) 3 письмо
        if (array_search('72', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/bigcolor/6', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (3 сет) 1/2 письмо
        if (
            (array_search('70', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('71', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            $label = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['label_id', 'token', 'UNIX_TIMESTAMP(cr_date) AS cr_date'], 'tunnels_tags',
                [
                    ['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                    ['label_id', '=', 'sendmail', PDO::PARAM_STR],
                    ['token', '=', '70', PDO::PARAM_STR]
                ]
            );

            // Дата окончания таймера
            $timer_stop = strtotime('+84 hours', $label['cr_date']);

            // Проверка на окончание таймера
            if ($timer_stop < time()) {
                // Если закончился таймер
                APP::Render('pages/products/bigcolor/6', 'include', $tunnel_subscribtion);
            } else {
                // Если не закончился таймер 
                APP::Render('pages/products/bigcolor/5', 'include', $tunnel_subscribtion);
            }
            exit;
        }

        ////////////////////////////////////////////////////////////////////////////////

        // Получил (2 сет) 5/6 письмо
        if (
            (array_search('68', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('69', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/bigcolor/6', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (2 сет) 3/4 письмо
        if (
            (array_search('66', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('67', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            $label = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['label_id', 'token', 'UNIX_TIMESTAMP(cr_date) AS cr_date'], 'tunnels_tags',
                [
                    ['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                    ['label_id', '=', 'sendmail', PDO::PARAM_STR],
                    ['token', '=', '64', PDO::PARAM_STR]
                ]
            );

            // Дата окончания таймера
            $timer_stop = strtotime('+84 hours', $label['cr_date']);

            // Проверка на окончание таймера
            if ($timer_stop < time()) {
                // Если закончился таймер
                APP::Render('pages/products/bigcolor/6', 'include', $tunnel_subscribtion);
            } else {
                // Если не закончился таймер 
                APP::Render('pages/products/bigcolor/5', 'include', $tunnel_subscribtion);
            }
            exit;
        }

        // Получил (2 сет) 1/2 письмо
        if (
            (array_search('64', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('65', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/bigcolor/4', 'include', $tunnel_subscribtion);
            exit;
        }

        ////////////////////////////////////////////////////////////////////////////////

        // Получил (1 сет) 7 письмо
        if (array_search('63', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/bigcolor/3', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (1 сет) 6 письмо
        if (array_search('62', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/bigcolor/2', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (1 сет) 5 письмо
        if (array_search('61', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/bigcolor/1', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (1 сет) 1/2/3/4 письмо
        if (
            (array_search('57', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('58', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('59', $tunnel_subscription_labels['sendmail']) !== false) ||  
            (array_search('60', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/bigcolor/6', 'include', $tunnel_subscribtion);
            exit;
        }
    }
    
    public function ProductBigColorForm() {
        APP::Render('pages/products/bigcolor/form');
    }
    
    public function ProductBigColorActivate() {
        APP::Render('pages/products/bigcolor/activate');
    }
    
    
    // Революция Цвета v2 (викторина)
    public function ProductBigColor2Sale() {
        $cookie_tunnel_subscribtion_id = isset($_COOKIE['tunnel_subscribtion_id']) ? $_COOKIE['tunnel_subscribtion_id'] : 0;
        
        if (isset(APP::Module('Routing')->get['token'])) {
            $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);
            $tunnel_subscribtion_id = $token['params']['user_tunnel_id'];
        } else {
            $tunnel_subscribtion_id = $cookie_tunnel_subscribtion_id;
        }

        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        )) {
            setcookie('tunnel_subscribtion_id', $tunnel_subscribtion_id, time() + 31556926, '/', '.glamurnenko.ru');
        } else {
            APP::Render('pages/products/bigcolor2/6');
            exit;
        }
        
        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [
                ['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                ['tunnel_id', '=', 48, PDO::PARAM_INT]
            ]
        )) {
            $tunnel_subscribtion = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['id', 'user_id', 'state'], 'tunnels_users',
                [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
            );
        } else {
            APP::Render('pages/products/bigcolor2/6');
            exit;
        }
        
        if ($tunnel_subscribtion['state'] != 'active') {
            APP::Render('pages/products/bigcolor2/6', 'include', $tunnel_subscribtion);
            exit;
        }
        
        $tunnel_subscription_labels = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['label_id', 'token'], 'tunnels_tags',
            [['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        ) as $label) {
            $tunnel_subscription_labels[$label['label_id']][] = $label['token'];
        }

        // Получил (3 сет) 3 письмо
        if (array_search('496', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/bigcolor2/6', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (3 сет) 1/2 письмо
        if (
            (array_search('489', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('495', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            $label = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['label_id', 'token', 'UNIX_TIMESTAMP(cr_date) AS cr_date'], 'tunnels_tags',
                [
                    ['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                    ['label_id', '=', 'sendmail', PDO::PARAM_STR],
                    ['token', '=', '489', PDO::PARAM_STR]
                ]
            );

            // Дата окончания таймера
            $timer_stop = strtotime('+84 hours', $label['cr_date']);

            // Проверка на окончание таймера
            if ($timer_stop < time()) {
                // Если закончился таймер
                APP::Render('pages/products/bigcolor2/6', 'include', $tunnel_subscribtion);
            } else {
                // Если не закончился таймер 
                APP::Render('pages/products/bigcolor2/5', 'include', $tunnel_subscribtion);
            }
            exit;
        }

        ////////////////////////////////////////////////////////////////////////////////

        // Получил (2 сет) 5/6 письмо
        if (
            (array_search('493', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('494', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/bigcolor2/6', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (2 сет) 3/4 письмо
        if (
            (array_search('491', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('492', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            $label = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['label_id', 'token', 'UNIX_TIMESTAMP(cr_date) AS cr_date'], 'tunnels_tags',
                [
                    ['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                    ['label_id', '=', 'sendmail', PDO::PARAM_STR],
                    ['token', '=', '488', PDO::PARAM_STR]
                ]
            );

            // Дата окончания таймера
            $timer_stop = strtotime('+84 hours', $label['cr_date']);

            // Проверка на окончание таймера
            if ($timer_stop < time()) {
                // Если закончился таймер
                APP::Render('pages/products/bigcolor2/6', 'include', $tunnel_subscribtion);
            } else {
                // Если не закончился таймер
                APP::Render('pages/products/bigcolor2/5', 'include', $tunnel_subscribtion);
            }
            exit;
        }

        // Получил (2 сет) 1/2 письмо
        if (
            (array_search('488', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('490', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/bigcolor2/4', 'include', $tunnel_subscribtion);
            exit;
        }

        ////////////////////////////////////////////////////////////////////////////////

        // Получил (1 сет) 7 письмо
        if (array_search('487', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/bigcolor2/3', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (1 сет) 6 письмо
        if (array_search('486', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/bigcolor2/2', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (1 сет) 5 письмо
        if (array_search('485', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/bigcolor2/1', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (1 сет) 1/2/3/4 письмо
        if (
            (array_search('481', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('482', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('483', $tunnel_subscription_labels['sendmail']) !== false) ||  
            (array_search('484', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/bigcolor2/6', 'include', $tunnel_subscribtion);
            exit;
        }
    }
    
    public function ProductBigColor2Form() {
        APP::Render('pages/products/bigcolor2/form');
    }
    
    public function ProductBigColor2Activate() {
        APP::Render('pages/products/bigcolor2/activate');
    }
    
    
    // Верхняя одежда под контролем стилиста
    public function ProductOuterwearSale() {
        $cookie_tunnel_subscribtion_id = isset($_COOKIE['tunnel_subscribtion_id']) ? $_COOKIE['tunnel_subscribtion_id'] : 0;
        
        if (isset(APP::Module('Routing')->get['token'])) {
            $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);
            $tunnel_subscribtion_id = $token['params']['user_tunnel_id'];
        } else {
            $tunnel_subscribtion_id = $cookie_tunnel_subscribtion_id;
        }

        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        )) {
            setcookie('tunnel_subscribtion_id', $tunnel_subscribtion_id, time() + 31556926, '/', '.glamurnenko.ru');
        } else {
            APP::Render('pages/products/outerwear/4');
            exit;
        }
        
        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [
                ['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                ['tunnel_id', 'IN', [16, 50], PDO::PARAM_INT]
            ]
        )) {
            $tunnel_subscribtion = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['id', 'user_id', 'state'], 'tunnels_users',
                [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
            );
        } else {
            APP::Render('pages/products/outerwear/4');
            exit;
        }

        if ($tunnel_subscribtion['state'] != 'active') {
            APP::Render('pages/products/outerwear/4', 'include', $tunnel_subscribtion);
            exit;
        }
        
        $tunnel_subscription_labels = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['label_id', 'token'], 'tunnels_tags',
            [['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        ) as $label) {
            $tunnel_subscription_labels[$label['label_id']][] = $label['token'];
        }
        
        // Получил (3 сет) 1/2 письмо
        if (
            (array_search('35', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('36', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            $label = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['label_id', 'token', 'UNIX_TIMESTAMP(cr_date) AS cr_date'], 'tunnels_tags',
                [
                    ['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                    ['label_id', '=', 'sendmail', PDO::PARAM_STR],
                    ['token', '=', '35', PDO::PARAM_STR]
                ]
            );

            // Дата окончания таймера
            $timer_stop = strtotime('+60 hours', $label['cr_date']);

            // Проверка на окончание таймера
            if ($timer_stop < time()) {
                // Если закончился таймер
                APP::Render('pages/products/outerwear/4', 'include', $tunnel_subscribtion);
            } else {
                // Если не закончился таймер 
                APP::Render('pages/products/outerwear/3', 'include', $tunnel_subscribtion);
            }
            exit;
        }

        ////////////////////////////////////////////////////////////////////////////////

        // Получил (2 сет) 5 письмо
        if (array_search('34', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/outerwear/4', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (2 сет) 1/2/3/4 письмо
        if (
            (array_search('30', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('31', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('32', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('33', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            $label = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['label_id', 'token', 'UNIX_TIMESTAMP(cr_date) AS cr_date'], 'tunnels_tags',
                [
                    ['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                    ['label_id', '=', 'sendmail', PDO::PARAM_STR],
                    ['token', '=', '30', PDO::PARAM_STR]
                ]
            );

            // Дата окончания таймера
            $timer_stop = strtotime('+78 hours', $label['cr_date']);

            // Проверка на окончание таймера
            if ($timer_stop < time()) {
                // Если закончился таймер
                APP::Render('pages/products/outerwear/4', 'include', $tunnel_subscribtion);
            } else {
                // Если не закончился таймер 
                APP::Render('pages/products/outerwear/3', 'include', $tunnel_subscribtion);
            }
            exit;
        }

        ////////////////////////////////////////////////////////////////////////////////

        // Получил (1 сет) 4 письмо
        if (array_search('29', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/outerwear/2', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (1 сет) 1/2/3 письмо
        if (
            (array_search('26', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('27', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('28', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/outerwear/1', 'include', $tunnel_subscribtion);
            exit;
        }
    }
    
    public function ProductOuterwearForm() {
        APP::Render('pages/products/outerwear/form');
    }
    
    public function ProductOuterwearActivate() {
        APP::Render('pages/products/outerwear/activate');
    }
    
    
    // Шоппинг осень-зима под контролем стилиста
    public function ProductHeadwearSale() {
        $cookie_tunnel_subscribtion_id = isset($_COOKIE['tunnel_subscribtion_id']) ? $_COOKIE['tunnel_subscribtion_id'] : 0;
        
        if (isset(APP::Module('Routing')->get['token'])) {
            $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);
            $tunnel_subscribtion_id = $token['params']['user_tunnel_id'];
        } else {
            $tunnel_subscribtion_id = $cookie_tunnel_subscribtion_id;
        }

        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        )) {
            setcookie('tunnel_subscribtion_id', $tunnel_subscribtion_id, time() + 31556926, '/', '.glamurnenko.ru');
        } else {
            APP::Render('pages/products/headwear/3');
            exit;
        }
        
        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [
                ['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                ['tunnel_id', 'IN', [17, 53], PDO::PARAM_INT]
            ]
        )) {
            $tunnel_subscribtion = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['id', 'user_id', 'state'], 'tunnels_users',
                [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
            );
        } else {
            APP::Render('pages/products/headwear/3');
            exit;
        }

        if ($tunnel_subscribtion['state'] != 'active') {
            APP::Render('pages/products/headwear/3', 'include', $tunnel_subscribtion);
            exit;
        }
        
        $tunnel_subscription_labels = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['label_id', 'token'], 'tunnels_tags',
            [['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        ) as $label) {
            $tunnel_subscription_labels[$label['label_id']][] = $label['token'];
        }
        
        // Получил 1/2 письмо 3 сета
        if (
            (array_search('103', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('104', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/headwear/2', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 1/2/3/4/5 письмо 2 сета
        if (
            (array_search('98', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('99', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('100', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('101', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('102', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/headwear/2', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 1/2/3 письмо 1 сета
        if (
            (array_search('95', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('96', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('97', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/headwear/1', 'include', $tunnel_subscribtion);
            exit;
        }
    }
    
    public function ProductHeadwearForm() {
        APP::Render('pages/products/headwear/form');
    }
    
    public function ProductHeadwearActivate() {
        APP::Render('pages/products/headwear/activate');
    }

    
    // MakeUp Must Have
    public function ProductMakeupSale() {
        $cookie_tunnel_subscribtion_id = isset($_COOKIE['tunnel_subscribtion_id']) ? $_COOKIE['tunnel_subscribtion_id'] : 0;
        
        if (isset(APP::Module('Routing')->get['token'])) {
            $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);
            $tunnel_subscribtion_id = $token['params']['user_tunnel_id'];
        } else {
            $tunnel_subscribtion_id = $cookie_tunnel_subscribtion_id;
        }

        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        )) {
            setcookie('tunnel_subscribtion_id', $tunnel_subscribtion_id, time() + 31556926, '/', '.glamurnenko.ru');
        } else {
            APP::Render('pages/products/makeup/5');
            exit;
        }
        
        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [
                ['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                ['tunnel_id', '=', 20, PDO::PARAM_INT]
            ]
        )) {
            $tunnel_subscribtion = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['id', 'user_id', 'state'], 'tunnels_users',
                [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
            );
        } else {
            APP::Render('pages/products/makeup/5');
            exit;
        }
        
        if ($tunnel_subscribtion['state'] != 'active') {
            APP::Render('pages/products/makeup/5', 'include', $tunnel_subscribtion);
            exit;
        }
        
        $tunnel_subscription_labels = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['label_id', 'token'], 'tunnels_tags',
            [['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        ) as $label) {
            $tunnel_subscription_labels[$label['label_id']][] = $label['token'];
        }

        // Получил (3 сет) 2/3 письмо
        if (
            (array_search('298', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('299', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            $label = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['label_id', 'token', 'UNIX_TIMESTAMP(cr_date) AS cr_date'], 'tunnels_tags',
                [
                    ['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                    ['label_id', '=', 'sendmail', PDO::PARAM_STR],
                    ['token', '=', '297', PDO::PARAM_STR]
                ]
            );

            // Дата окончания таймера
            $timer_stop = strtotime('+84 hours', $label['cr_date']);

            // Проверка на окончание таймера
            if ($timer_stop < time()) {
                // Если закончился таймер
                APP::Render('pages/products/makeup/5', 'include', $tunnel_subscribtion);
            } else {
                // Если не закончился таймер 
                APP::Render('pages/products/makeup/4', 'include', $tunnel_subscribtion);
            }
            exit;
        }

        // Получил (3 сет) 1 письмо
        if (array_search('297', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/makeup/3', 'include', $tunnel_subscribtion);
            exit;
        }

        ////////////////////////////////////////////////////////////////////////////////

        // Получил (2 сет) 6 письмо
        if (array_search('296', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/makeup/5', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (2 сет) 2/3/4/5 письмо
        if (
            (array_search('292', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('293', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('294', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('295', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            $label = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['label_id', 'token', 'UNIX_TIMESTAMP(cr_date) AS cr_date'], 'tunnels_tags',
                [
                    ['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                    ['label_id', '=', 'sendmail', PDO::PARAM_STR],
                    ['token', '=', '291', PDO::PARAM_STR]
                ]
            );

            // Дата окончания таймера
            $timer_stop = strtotime('+84 hours', $label['cr_date']);

            // Проверка на окончание таймера
            if ($timer_stop < time()) {
                // Если закончился таймер
                APP::Render('pages/products/makeup/5', 'include', $tunnel_subscribtion);
            } else {
                // Если не закончился таймер 
                APP::Render('pages/products/makeup/4', 'include', $tunnel_subscribtion);
            }
            exit;
        }

        // Получил (2 сет) 1 письмо
        if (array_search('291', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/makeup/3', 'include', $tunnel_subscribtion);
            exit;
        }

        ////////////////////////////////////////////////////////////////////////////////

        // Получил (1 сет) 6 письмо
        if (array_search('290', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/makeup/2', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил (1 сет) 1/2/3/4/5 письмо
        if (
            (array_search('285', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('286', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('287', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('288', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('289', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/makeup/1', 'include', $tunnel_subscribtion);
            exit;
        }
    }
    
    public function ProductMakeupForm() {
        APP::Render('pages/products/makeup/form');
    }
    
    public function ProductMakeupActivate() {
        APP::Render('pages/products/makeup/activate');
    }
    

    // Икона стиля
    public function ProductIconSale() {
        $cookie_tunnel_subscribtion_id = isset($_COOKIE['tunnel_subscribtion_id']) ? $_COOKIE['tunnel_subscribtion_id'] : 0;
        
        if (isset(APP::Module('Routing')->get['token'])) {
            $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);
            $tunnel_subscribtion_id = $token['params']['user_tunnel_id'];
        } else {
            $tunnel_subscribtion_id = $cookie_tunnel_subscribtion_id;
        }

        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        )) {
            setcookie('tunnel_subscribtion_id', $tunnel_subscribtion_id, time() + 31556926, '/', '.glamurnenko.ru');
        } else {
            APP::Render('pages/products/icon/3');
            exit;
        }
        
        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [
                ['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                ['tunnel_id', '=', 54, PDO::PARAM_INT]
            ]
        )) {
            $tunnel_subscribtion = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['id', 'user_id', 'state'], 'tunnels_users',
                [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
            );
        } else {
            APP::Render('pages/products/icon/3');
            exit;
        }
        
        if ($tunnel_subscribtion['state'] != 'active') {
            APP::Render('pages/products/icon/3', 'include', $tunnel_subscribtion);
            exit;
        }
        
        $tunnel_subscription_labels = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['label_id', 'token'], 'tunnels_tags',
            [['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        ) as $label) {
            $tunnel_subscription_labels[$label['label_id']][] = $label['token'];
        }
        
////////////////////////////////////////////////////////////////////////////////
        
        if (array_search('586', $tunnel_subscription_labels['sendmail']) !== false) {
            APP::Render('pages/products/icon/3', 'include', $tunnel_subscribtion);
            exit;
        }

        // 3 сет
        if (
            (array_search('584', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('583', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('582', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('585', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            $label = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['label_id', 'token', 'UNIX_TIMESTAMP(cr_date) AS cr_date'], 'tunnels_tags',
                [
                    ['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                    ['label_id', '=', 'sendmail', PDO::PARAM_STR],
                    ['token', '=', '584', PDO::PARAM_STR]
                ]
            );

            // Дата окончания таймера
            $timer_stop = strtotime('+4 days', $label['cr_date']);

            // Проверка на окончание таймера
            if ($timer_stop < time()) {
                // Если закончился таймер
                APP::Render('pages/products/icon/3', 'include', $tunnel_subscribtion);
            } else {
                // Если не закончился таймер 
                APP::Render('pages/products/icon/2', 'include', $tunnel_subscribtion);
            }
            exit;
        }

        // 2 сет
        if (
            (array_search('578', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('579', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('565', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('581', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('566', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            $label = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['label_id', 'token', 'UNIX_TIMESTAMP(cr_date) AS cr_date'], 'tunnels_tags',
                [
                    ['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                    ['label_id', '=', 'sendmail', PDO::PARAM_STR],
                    ['token', '=', '578', PDO::PARAM_STR]
                ]
            );

            // Дата окончания таймера
            $timer_stop = strtotime('+5 days', $label['cr_date']);

            // Проверка на окончание таймера
            if ($timer_stop < time()) {
                // Если закончился таймер
                APP::Render('pages/products/icon/3', 'include', $tunnel_subscribtion);
            } else {
                // Если не закончился таймер 
                APP::Render('pages/products/icon/2', 'include', $tunnel_subscribtion);
            }
            exit;
        }

        // 1 сет
        if (
            (array_search('561', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('570', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('571', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('562', $tunnel_subscription_labels['sendmail']) !== false) ||
            (array_search('572', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('573', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('563', $tunnel_subscription_labels['sendmail']) !== false) ||
            (array_search('574', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('575', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('564', $tunnel_subscription_labels['sendmail']) !== false) ||
            (array_search('576', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('577', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/icon/1', 'include', $tunnel_subscribtion);
            exit;
        }
    }
    
    public function ProductIconPreentryForm() {
        APP::Render('pages/products/icon/preentry/form');
    }
    
    public function ProductIconPreentrySuccess() {
        APP::Render('pages/products/icon/preentry/success');
    }
    
    public function ProductIconNotificationForm() {
        APP::Render('pages/products/icon/notification/form');
    }
    
    public function ProductIconNotificationSuccess() {
        APP::Render('pages/products/icon/notification/success');
    }

    
    // Гардероб на 100% - Line - 2 - новый поток
    public function ProductGarderob100NewSale() {
        $cookie_tunnel_subscribtion_id = isset($_COOKIE['tunnel_subscribtion_id']) ? $_COOKIE['tunnel_subscribtion_id'] : 0;
        
        if (isset(APP::Module('Routing')->get['token'])) {
            $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);
            $tunnel_subscribtion_id = $token['params']['user_tunnel_id'];
        } else {
            $tunnel_subscribtion_id = $cookie_tunnel_subscribtion_id;
        }

        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        )) {
            setcookie('tunnel_subscribtion_id', $tunnel_subscribtion_id, time() + 31556926, '/', '.glamurnenko.ru');
        } else {
            APP::Render('pages/products/garderob100new/4');
            exit;
        }
        
        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [
                ['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                ['tunnel_id', '=', 57, PDO::PARAM_INT]
            ]
        )) {
            $tunnel_subscribtion = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['id', 'user_id', 'state'], 'tunnels_users',
                [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
            );
        } else {
            APP::Render('pages/products/garderob100new/4');
            exit;
        }
        
        // Если туннель не активный
        if ($tunnel_subscribtion['state'] != 'active') {
            $label = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['label_id', 'token', 'UNIX_TIMESTAMP(cr_date) AS cr_date'], 'tunnels_tags',
                [
                    ['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                    ['label_id', '=', 'complete', PDO::PARAM_STR]
                ]
            );

            // Дата окончания таймера
            $timer_stop = strtotime('+3 days', $label['cr_date']);

            // Проверка на окончание таймера
            if ($timer_stop < time()) {
                // Если закончился таймер
                APP::Render('pages/products/garderob100new/4', 'include', $tunnel_subscribtion);
            } else {
                // Если не закончился таймер 
                APP::Render('pages/products/garderob100new/3', 'include', $tunnel_subscribtion);
            }
            exit;
        }

        $tunnel_subscription_labels = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['label_id', 'token'], 'tunnels_tags',
            [['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        ) as $label) {
            $tunnel_subscription_labels[$label['label_id']][] = $label['token'];
        }

        // Получил 4/5/6/7 письмо
        if (
            (array_search('669', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('670', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('671', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('672', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/garderob100new/2', 'include', [
                'tunnel' => $tunnel_subscribtion, 
                'labels' => $tunnel_subscription_labels['sendmail']
            ]);
            exit;
        }

        // Получил 1/2/3 письмо
        if (
            (array_search('666', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('667', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('668', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/garderob100new/1', 'include', $tunnel_subscribtion);
            exit;
        }
    }
    
    public function ProductGarderob100NewPreentryForm() {
        APP::Render('pages/products/garderob100new/preentry/form');
    }
    
    public function ProductGarderob100NewPreentrySuccess() {
        APP::Render('pages/products/garderob100new/preentry/success');
    }
    
    public function ProductGarderob100NewNotificationForm() {
        APP::Render('pages/products/garderob100new/notification/form');
    }
    
    public function ProductGarderob100NewNotificationSuccess() {
        APP::Render('pages/products/garderob100new/notification/success');
    }
    
    
    // Школа Имиджмейкеров - 2 - новый поток
    public function ProductImageschoolNewSale() {
        $cookie_tunnel_subscribtion_id = isset($_COOKIE['tunnel_subscribtion_id']) ? $_COOKIE['tunnel_subscribtion_id'] : 0;
        
        if (isset(APP::Module('Routing')->get['token'])) {
            $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);
            $tunnel_subscribtion_id = $token['params']['user_tunnel_id'];
        } else {
            $tunnel_subscribtion_id = $cookie_tunnel_subscribtion_id;
        }

        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        )) {
            setcookie('tunnel_subscribtion_id', $tunnel_subscribtion_id, time() + 31556926, '/', '.glamurnenko.ru');
        } else {
            APP::Render('pages/products/imageschool-new/7');
            exit;
        }
        
        if (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'tunnels_users',
            [
                ['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                ['tunnel_id', '=', 61, PDO::PARAM_INT]
            ]
        )) {
            $tunnel_subscribtion = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['id', 'user_id', 'state'], 'tunnels_users',
                [['id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
            );
        } else {
            APP::Render('pages/products/imageschool-new/7');
            exit;
        }

        // Если туннель не активный
        if ($tunnel_subscribtion['state'] != 'active') {
            $label = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
                ['label_id', 'token', 'UNIX_TIMESTAMP(cr_date) AS cr_date'], 'tunnels_tags',
                [
                    ['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT],
                    ['label_id', '=', 'complete', PDO::PARAM_STR]
                ]
            );

            // Дата окончания таймера
            $timer_stop = strtotime('+3 days', $label['cr_date']);

            // Проверка на окончание таймера
            if ($timer_stop < time()) {
                // Если закончился таймер
                APP::Render('pages/products/imageschool-new/7', 'include', $tunnel_subscribtion);
            } else {
                // Если не закончился таймер 
                APP::Render('pages/products/imageschool-new/6', 'include', $tunnel_subscribtion);
            }
            exit;
        }

        $tunnel_subscription_labels = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['label_id', 'token'], 'tunnels_tags',
            [['user_tunnel_id', '=', $tunnel_subscribtion_id, PDO::PARAM_INT]]
        ) as $label) {
            $tunnel_subscription_labels[$label['label_id']][] = $label['token'];
        }

        // Получил 7/8/9 письмо
        if (
            (array_search('691', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('692', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('693', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/imageschool-new/5', 'include', [$tunnel_subscribtion, $tunnel_subscription_labels]);
            exit;
        }

        // Получил 5/6 письмо
        if (
            (array_search('689', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('690', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/imageschool-new/4', 'include', [$tunnel_subscribtion, $tunnel_subscription_labels]);
            exit;
        }

        // Получил 3/4 письмо
        if (
            (array_search('687', $tunnel_subscription_labels['sendmail']) !== false) || 
            (array_search('688', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/imageschool-new/3', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 2 письмо
        if (
            (array_search('686', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/imageschool-new/2', 'include', $tunnel_subscribtion);
            exit;
        }

        // Получил 1 письмо
        if (
            (array_search('685', $tunnel_subscription_labels['sendmail']) !== false)
        ) {
            APP::Render('pages/products/imageschool-new/1', 'include', $tunnel_subscribtion);
            exit;
        }
    }
    
    public function ProductImageschoolNewPreentryForm() {
        APP::Render('pages/products/imageschool-new/preentry/form');
    }
    
    public function ProductImageschoolNewPreentrySuccess() {
        APP::Render('pages/products/imageschool-new/preentry/success');
    }
    
    public function ProductImageschoolNewNotificationForm() {
        APP::Render('pages/products/imageschool-new/notification/form');
    }
    
    public function ProductImageschoolNewNotificationSuccess() {
        APP::Render('pages/products/imageschool-new/notification/success');
    }
    
    
////////////////////////////////////////////////////////////////////////////////

    
    // Новый год для вашего гардероба
    public function ProductNYGarderobPoll() {
        
    }
    
    public function ProductNYGarderobSale() {
        
    }

}