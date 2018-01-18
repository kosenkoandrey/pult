<?
class Billing {

    public $settings;
    
    private $products_search;
    private $products_types_search;
    private $products_groups_search;
    private $invoices_search;
    private $payments_search;
    
    private $products_actions;
    private $products_types_actions;
    private $products_groups_actions;
    private $invoices_actions;
    private $payments_actions;
    
    private $uwc = [
        'pass_length' => 8,
        'api_url' => 'https://www.glamurnenko.ru/members/wp-content/plugins/uwcart/uwcartapi.php',
        'useragent' => 'php-shell',
        'ecommtools_id' => 'glamurnenko',
        'user' => 'glamurnenko',
        'key' => 'xO56Vj2sAigkL6qt',
        'notification' => [
            'new' => 412,
            'exist' => 413
        ]
    ];
    
    private $reminder_payment = [
        'amount' => 2900,
        'timeout' => '+30 minutes'
    ];

    function __construct($conf) {
        foreach ($conf['routes'] as $route) APP::Module('Routing')->Add($route[0], $route[1], $route[2]);
    }

    public function Init() {
        $this->settings = APP::Module('Registry')->Get([
            'module_billing_db_connection',
            'module_billing_sales_tool'
        ]);

        $this->products_search  = new ProductsSearch();
        $this->products_types_search  = new ProductsTypesSearch();
        $this->products_groups_search  = new ProductsGroupsSearch();
        $this->invoices_search  = new InvoicesSearch();
        $this->payments_search  = new PaymentsSearch();
        
        $this->products_actions = new ProductsActions();
        $this->products_types_actions = new ProductsTypesActions();
        $this->products_groups_actions = new ProductsGroupsActions();
        $this->invoices_actions = new InvoicesActions();
        $this->payments_actions = new PaymentsActions();
    }

    
    public function Admin() {
        return APP::Render('billing/admin/nav', 'content');
    }
    
    public function Dashboard() {
        return APP::Render('billing/admin/dashboard/index', 'return');
    }
    

    public function ProductsSearch($rules) {
        $out = Array();

        foreach ((array) $rules['rules'] as $rule) {
            $out[] = array_flip((array) $this->products_search->{$rule['method']}($rule['settings']));
        }

        if (array_key_exists('children', (array) $rules)) {
            $out[] = array_flip((array) $this->ProductsSearch($rules['children']));
        }

        if (count($out) > 1) {
            switch ($rules['logic']) {
                case 'intersect': return array_keys((array) call_user_func_array('array_intersect_key', $out));
                    break;
                case 'merge': return array_keys((array) call_user_func_array('array_replace', $out));
                    break;
            }
        } else {
            return array_keys($out[0]);
        }
    }
    
    public function ProductsTypesSearch($rules) {
        $out = Array();

        foreach ((array) $rules['rules'] as $rule) {
            $out[] = array_flip((array) $this->products_types_search->{$rule['method']}($rule['settings']));
        }

        if (array_key_exists('children', (array) $rules)) {
            $out[] = array_flip((array) $this->ProductsTypesSearch($rules['children']));
        }

        if (count($out) > 1) {
            switch ($rules['logic']) {
                case 'intersect': return array_keys((array) call_user_func_array('array_intersect_key', $out));
                    break;
                case 'merge': return array_keys((array) call_user_func_array('array_replace', $out));
                    break;
            }
        } else {
            return array_keys($out[0]);
        }
    }
    
    public function ProductsGroupsSearch($rules) {
        $out = Array();

        foreach ((array) $rules['rules'] as $rule) {
            $out[] = array_flip((array) $this->products_groups_search->{$rule['method']}($rule['settings']));
        }

        if (array_key_exists('children', (array) $rules)) {
            $out[] = array_flip((array) $this->ProductsGroupsSearch($rules['children']));
        }

        if (count($out) > 1) {
            switch ($rules['logic']) {
                case 'intersect': return array_keys((array) call_user_func_array('array_intersect_key', $out));
                    break;
                case 'merge': return array_keys((array) call_user_func_array('array_replace', $out));
                    break;
            }
        } else {
            return array_keys($out[0]);
        }
    }
    
    public function InvoicesSearch($rules) {
        $out = Array();

        foreach ((array) $rules['rules'] as $rule) {
            $out[] = array_flip((array) $this->invoices_search->{$rule['method']}($rule['settings']));
        }

        if (array_key_exists('children', (array) $rules)) {
            $out[] = array_flip((array) $this->InvoicesSearch($rules['children']));
        }

        if (count($out) > 1) {
            switch ($rules['logic']) {
                case 'intersect': return array_keys((array) call_user_func_array('array_intersect_key', $out));
                    break;
                case 'merge': return array_keys((array) call_user_func_array('array_replace', $out));
                    break;
            }
        } else {
            return array_keys($out[0]);
        }
    }
    
    public function PaymentsSearch($rules) {
        $out = Array();

        foreach ((array) $rules['rules'] as $rule) {
            $out[] = array_flip((array) $this->payments_search->{$rule['method']}($rule['settings']));
        }

        if (array_key_exists('children', (array) $rules)) {
            $out[] = array_flip((array) $this->PaymentsSearch($rules['children']));
        }

        if (count($out) > 1) {
            switch ($rules['logic']) {
                case 'intersect': return array_keys((array) call_user_func_array('array_intersect_key', $out));
                    break;
                case 'merge': return array_keys((array) call_user_func_array('array_replace', $out));
                    break;
            }
        } else {
            return array_keys($out[0]);
        }
    }
    
    
    public function CreateInvoice($user_id, $author, $products, $state, $comment = false, $date = false, $reminder_payment = false, $notification = false) {
        $amount = 0;
        $invoice_products = [];

        foreach ($products as $product) {
            $amount += $product['amount'];
            $invoice_products[] = $product['id'];
        }

        $invoice_id = APP::Module('DB')->Insert(
            $this->settings['module_billing_db_connection'], 'billing_invoices', [
                'id'      => 'NULL',
                'user_id' => [$user_id, PDO::PARAM_INT],
                'amount'  => [$amount, PDO::PARAM_INT],
                'state'   => [$state, PDO::PARAM_STR],
                'author'  => [$author, PDO::PARAM_INT],
                'up_date' => $date ? [$date, PDO::PARAM_STR] : 'NOW()',
                'cr_date' => $date ? [$date, PDO::PARAM_STR] : 'NOW()'
            ]
        );

        foreach ($products as $product) {
            APP::Module('DB')->Insert(
                $this->settings['module_billing_db_connection'], 'billing_invoices_products', [
                    'id' => 'NULL',
                    'invoice' => [$invoice_id, PDO::PARAM_INT],
                    'type' => ['primary', PDO::PARAM_STR],
                    'product' => [$product['id'], PDO::PARAM_INT],
                    'amount' => [$product['amount'], PDO::PARAM_INT],
                    'cr_date' => $date ? [$date, PDO::PARAM_STR] : 'NOW()'
                ]
            );
        }

        $invoice_data = [
            'id' => $invoice_id,
            'id_hash' => APP::Module('Crypt')->Encode($invoice_id),
            'user' => $user_id,
            'author' => $author,
            'state' => $state,
            'amount' => $amount,
            'products' => $products
        ];
        
        APP::Module('DB')->Insert(
            $this->settings['module_billing_db_connection'], 'billing_invoices_tag', [
                'id' => 'NULL',
                'invoice' => [$invoice_id, PDO::PARAM_INT],
                'action' => ['create_invoice', PDO::PARAM_STR],
                'action_data' => [json_encode($invoice_data), PDO::PARAM_STR],
                'cr_date' => $date ? [$date, PDO::PARAM_STR] : 'NOW()'
            ]
        );

        if ($comment) {
            $comment_object_type = APP::Module('DB')->Select(APP::Module('Comments')->settings['module_comments_db_connection'], ['fetchColumn', 0], ['id'], 'comments_objects', [['name', '=', "Invoice", PDO::PARAM_STR]]);
            
            APP::Module('DB')->Insert(
                APP::Module('Comments')->settings['module_comments_db_connection'], ' comments_messages',
                [
                    'id' => 'NULL',
                    'sub_id' => [0, PDO::PARAM_INT],
                    'user' => [isset(APP::Module('Users')->user['id']) ? APP::Module('Users')->user['id'] : 0, PDO::PARAM_INT],
                    'object_type' => [$comment_object_type, PDO::PARAM_INT],
                    'object_id' => [$invoice_id, PDO::PARAM_INT],
                    'message' => [$comment, PDO::PARAM_STR],
                    'url' => [APP::Module('Routing')->root . 'admin/billing/invoices/details/' . $invoice_data['id_hash'], PDO::PARAM_STR],
                    'up_date' => $date ? [$date, PDO::PARAM_STR] : 'NOW()'
                ]
            );
        }

        if (($amount > 500) && (array_search(53404, $invoice_products) === false)) {
            APP::Module('DB')->Insert(
                $this->settings['module_billing_db_connection'], 'billing_invoices_labels', [
                    'id' => 'NULL',
                    'invoice' => [$invoice_id, PDO::PARAM_INT],
                    'label_id' => ['call', PDO::PARAM_STR],
                    'cr_date' => 'NOW()',
                    'st_date' => [date('Y-m-d H:i:s', strtotime('+10 minutes')), PDO::PARAM_STR]
                ]
            );
        }

        if (($reminder_payment) || (!$reminder_payment && $amount >= $this->reminder_payment['amount'])) {
            if (APP::Module('DB')->Select(
                APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                ['value'], 'users_about',
                [
                    ['user', '=', $user_id, PDO::PARAM_INT],
                    ['item', '=', 'state', PDO::PARAM_STR]
                ]
            ) == 'active') {
                APP::Module('DB')->Delete(
                    APP::Module('TaskManager')->settings['module_taskmanager_db_connection'], 'task_manager',
                    [
                        ['token', '=', 'user_' . $user_id . '_reminder_payment', PDO::PARAM_STR],
                        ['state', '=', 'wait', PDO::PARAM_STR]
                    ]
                );
                
                APP::Module('TaskManager')->Add(
                    'Billing', 'ReminderPayment', 
                    date('Y-m-d H:i:s', strtotime($this->reminder_payment['timeout'])), 
                    json_encode([$user_id, 1]), 
                    'user_' . $user_id . '_reminder_payment', 
                    'wait'
                );
            }
        }
        
        APP::Module('Triggers')->Exec('create_invoice', $invoice_data);
        
        if ($state == 'success') {

            // Получение информации по счету
            $invoice = APP::Module('DB')->Select(
                $this->settings['module_billing_db_connection'],
                ['fetch', PDO::FETCH_ASSOC],
                [
                    'billing_invoices.amount', 
                    'billing_invoices.state',
                    'billing_invoices.amount', 
                    'users.id AS user_id',
                    'users.email'
                ],
                'billing_invoices',
                [
                    ['billing_invoices.id', '=', $invoice_id, PDO::PARAM_INT]
                ],
                [
                    'left join/users' => [
                        ['users.id', '=', 'billing_invoices.user_id']
                    ]
                ]
            );

            // Получение информации по продуктам счета
            $invoice_products = APP::Module('DB')->Select(
                $this->settings['module_billing_db_connection'],
                ['fetchAll', PDO::FETCH_ASSOC],
                [
                    'billing_invoices_products.product AS id',
                    'billing_invoices_products.amount',
                    'billing_products.access_link',
                    'billing_products.name',
                    'billing_products.alt_id',
                    'billing_products.amount AS real_amount',
                    'billing_products.members_access',
                    'billing_products.stop_tunnels',
                    'billing_products.sale_notify_email'
                ],
                'billing_invoices_products',
                [
                    ['billing_invoices_products.invoice', '=', $invoice_id, PDO::PARAM_INT]
                ],
                [
                    'left join/billing_products' => [
                        ['billing_invoices_products.product', '=', 'billing_products.id']
                    ]
                ],
                ['billing_invoices_products.id']
            );

            // Сохранение данных о платеже
            APP::Module('DB')->Insert(
                $this->settings['module_billing_db_connection'], 'billing_payments', [
                    'id' => 'NULL',
                    'invoice' => [$invoice_id, PDO::PARAM_INT],
                    'method' => ['admin', PDO::PARAM_STR],
                    'cr_date' => 'NOW()'
                ]
            );

            if ($invoice['amount']) {

                // Отправка уведомления
                foreach ($invoice_products as $product) {
                    foreach ((array) explode(' ', $product['sale_notify_email']) as $value) {
                        $sale_notify_email = trim($value);

                        if ($sale_notify_email) {
                            APP::Module('Mail')->Send($sale_notify_email, 694, [
                                'invoice_id_hash' => APP::Module('Crypt')->Encode($invoice_id),
                                'invoice_id' => $invoice_id,
                                'amount' => $invoice['amount'],
                                'product_name' => $product['name'],
                                'user_id' => $invoice['user_id'],
                                'user_email' => $invoice['email']
                            ], true, 'billing');
                            break;
                        }
                    }
                }

                APP::Module('Triggers')->Exec('payment', [
                    'invoice' => $invoice_id,
                    'amount' => $invoice['amount'],
                    'products' => $invoice_products
                ]);
            }

            // Удаление меток счета
            APP::Module('DB')->Delete(
                $this->settings['module_billing_db_connection'], 'billing_invoices_labels',
                [
                    ['invoice', '=', $invoice_id, PDO::PARAM_INT]
                ]
            );

            // Остановка туннелей
            foreach ($invoice_products as $product) {
                if ($product['stop_tunnels']) {
                    $this->CompleteUserTunnels($invoice['user_id'], (array) explode(',', $product['stop_tunnels']));
                }
            }

            // Открытие доступа (мемберка)
            $this->AddMembersAccessTask($invoice_id, $invoice_products, $notification);

            // Открытие доступа (UWC)
            $this->GrantProductAccessUWC($invoice['email'], $invoice_id, $invoice_products, $notification);

            // Добавление доп. продуктов
            $this->AddSecondaryProductsTask($invoice_id, APP::Module('DB')->Select(
                $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
                ['product'], 'billing_invoices_products', 
                [['invoice', '=', $invoice_id, PDO::PARAM_INT]]
            ));

            // Остановка туннеля напоминания об оплате
            APP::Module('DB')->Delete(
                APP::Module('TaskManager')->settings['module_taskmanager_db_connection'], 'task_manager',
                [
                    ['token', '=', 'user_' . $invoice['user_id'] . '_reminder_payment', PDO::PARAM_STR],
                    ['state', '=', 'wait', PDO::PARAM_STR]
                ]
            );
        }

        return $invoice_data;
    }

    public function SuggestProducts($user_id, $in_products = [], $ignore = []) {
        $out = [];

        $sell_products = [];
        $suggest_products = [];

        // Получение информации о пользовательских счетах (оплаченные)
        $invoices = APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], 
            ['fetchAll', PDO::FETCH_COLUMN], 
            ['id'], 
            'billing_invoices', 
            [
                ['user_id', '=', $user_id, PDO::PARAM_INT],
                ['state', '=', 'success', PDO::PARAM_STR]
            ]
        );

        // Обработка продуктов в счетах
        $products = APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], 
            ['fetchAll', PDO::FETCH_COLUMN], 
            ['product'], 
            'billing_invoices_products', 
            [
                ['invoice', 'IN', $invoices]
            ]
        );

        // Обработка полного списка продуктов
        $all_products = [];
        
        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], 
            ['fetchAll', PDO::FETCH_ASSOC], 
            [
                'billing_products.*',
                'billing_products_groups.name AS group_name',
                'billing_products_groups.descr AS group_descr',
                'billing_products_groups.ignore_group AS group_ignore_group',
                'billing_products_groups.ignore_products AS group_ignore_products',
                'billing_products_groups.ignore_group_sell AS group_ignore_group_sell',
                'billing_products_groups.ignore_products_sell AS group_ignore_products_sell',
                'billing_products_groups.type_id AS group_type_id'
            ], 
            'billing_products', 
            false,
            [
                'left join/billing_products_groups' => [
                    ['billing_products_groups.id', '=', 'billing_products.group_id']
                ]
            ], 
            ['billing_products.id'], 
            false, 
            ['billing_products.sort_index', 'desc']
        ) as $product) {
            $all_products[$product['id']] = $product;
        }
        
        if (isset($in_products)) {
            foreach ((array) $in_products as $product_id) {
                $sell_products[] = $all_products[$product_id];
            }
        }

        $ignore_groups_tmp = Array();
        $ignore_products_tmp = Array();
        
        foreach ($products as $product_id) {
            foreach ((Array) explode(',', $all_products[$product_id]['ignore_group']) as $gid) {
                if ($gid) $ignore_groups_tmp[] = $gid;
            }

            foreach ((Array) explode(',', $all_products[$product_id]['ignore_products']) as $pid) {
                if ($pid) $ignore_products_tmp[] = $pid;
            }

            foreach ((Array) explode(',', $all_products[$product_id]['group_ignore_group']) as $gid) {
                if ($gid) $ignore_groups_tmp[] = $gid;
            }

            foreach ((Array) explode(',', $all_products[$product_id]['group_ignore_products']) as $pid) {
                if ($pid) $ignore_products_tmp[] = $pid;
            }
        }

        foreach ($sell_products as $product_data) {
            foreach ((Array) explode(',', $product_data['ignore_group_sell']) as $gid) {
                if ($gid) $ignore_groups_tmp[] = $gid;
            }

            foreach ((Array) explode(',', $product_data['ignore_products_sell']) as $pid) {
                if ($pid) $ignore_products_tmp[] = $pid;
            }

            foreach ((Array) explode(',', $product_data['group_ignore_group_sell']) as $gid) {
                if ($gid) $ignore_groups_tmp[] = $gid;
            }

            foreach ((Array) explode(',', $product_data['group_ignore_products_sell']) as $pid) {
                if ($pid) $ignore_products_tmp[] = $pid;
            }
        }

        $ignore_groups = array_unique($ignore_groups_tmp);
        $ignore_products = array_unique($ignore_products_tmp);
         
        foreach ($all_products as $product_data) {
            $product_add = false;

            if (array_search($product_data['group_id'], $ignore_groups) === false) {
                if (array_search($product_data['id'], $ignore_products) === false) {
                    $product_add = true;
                }
            }

            if ($product_add) {
                if ($product_data['state'] == 'active') {
                    if (array_search($product_data['id'], $products) !== false) {
                        if ($product_data['multi_sale'] == 'yes') {
                            $suggest_products[] = $product_data;
                        }
                    } else {
                        $suggest_products[] = $product_data;
                    }
                }
            }
        }

        foreach ($suggest_products as $product_data) {
            if (array_search($product_data['id'], (array) $ignore) === false) {
                $out[] = $product_data;
            }
        }

        return $out;
    }
    
    
    public function AddMembersAccessTask($invoice_id, $products, $notification = true) {
        $out = [];
        
        $user_id = APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_COLUMN],
            ['user_id'], 'billing_invoices',
            [['id', '=', $invoice_id, PDO::PARAM_INT]]
        );
        
        foreach ($products as $product) {
            foreach ((array) json_decode($product['members_access'], true) as $item) {
                $item_data = [
                    'type' => substr($item['id'], 0, 1),
                    'id' => substr($item['id'], 1)
                ];

                switch ($item_data['type']) {
                    case 'p': $table = 'members_pages'; break;
                    case 'g': $table = 'members_pages_groups'; break;
                }
                
                if (APP::Module('DB')->Select(
                    APP::Module('Members')->settings['module_members_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                    ['COUNT(id)'], $table,
                    [['id', '=', $item_data['id'], PDO::PARAM_INT]]
                )) {
                    if (!APP::Module('DB')->Select(
                        APP::Module('Members')->settings['module_members_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                        ['COUNT(id)'], 'members_access',
                        [
                            ['user_id', '=', $user_id, PDO::PARAM_INT],
                            ['item', '=', $item_data['type'], PDO::PARAM_STR],
                            ['item_id', '=', $item_data['id'], PDO::PARAM_INT]
                        ]
                    )) {  
                        $out[] = APP::Module('TaskManager')->Add(
                            'Billing', 'ExecMembersAccessTask', 
                            (DateTime::createFromFormat('Y-m-d H:i:s', $item['timeout']) !== false) ? $item['timeout'] : date('Y-m-d H:i:s', strtotime($item['timeout'])),
                            json_encode([$invoice_id, $user_id, $item_data['type'], $item_data['id']]), 
                            'user_' . $user_id . '_add_member_access', 
                            'wait'
                        );
                    }
                } else {
                    APP::Module('DB')->Insert(
                        $this->settings['module_billing_db_connection'], 'billing_invoices_tag', [
                            'id' => 'NULL',
                            'invoice' => [$invoice_id, PDO::PARAM_INT],
                            'action' => ['fail_open_access', PDO::PARAM_STR],
                            'action_data' => [json_encode($item_data), PDO::PARAM_STR],
                            'cr_date' => 'NOW()'
                        ]
                    );
                }
            }
        }

        if (count($products)) {
            APP::Module('Triggers')->Exec('add_members_access_task', [
                'invoice_id' => $invoice_id,
                'products' => $products,
                'notification' => $notification,
                'out' => $out
            ]);
        }

        return $out;
    }
    
    public function AddSecondaryProductsTask($invoice_id, $invoice_products) {
        $out = [];

        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
            ['secondary_products'], 'billing_products', 
            [['id', 'IN', $invoice_products]]
        ) as $secondary_products) {
            foreach ((array) json_decode($secondary_products, true) as $product) {
                $out[] = APP::Module('TaskManager')->Add(
                    'Billing', 'ExecSecondaryProductsTask', 
                    (DateTime::createFromFormat('Y-m-d H:i:s', $product['timeout']) !== false) ? $product['timeout'] : date('Y-m-d H:i:s', strtotime($product['timeout'])), 
                    json_encode([
                        $invoice_id, 
                        $product['id'],
                        ($product['timeout'] != 'now')
                    ]), 
                    'user_' . APP::Module('DB')->Select(
                        $this->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['user_id'], 'billing_invoices', 
                        [['id', '=', $invoice_id, PDO::PARAM_INT]]
                    ) . '_add_secondary_product', 
                    'wait'
                );
            }
        }

        APP::Module('Triggers')->Exec('add_secondary_products_task', [
            'invoice_id' => $invoice_id,
            'out' => $out
        ]);

        return $out;
    }
    
    public function CompleteUserTunnels($user_id, $tunnels) {
        foreach ($tunnels as $tunnel_id) {
            $tunnel_subscription_id = APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchColumn', 0], 
                ['id'], 'tunnels_users', 
                [
                    ['tunnel_id', '=', $tunnel_id, PDO::PARAM_INT],
                    ['user_id', '=', $user_id, PDO::PARAM_INT],
                    ['state', '!=', 'complete', PDO::PARAM_STR]
                ]
            );

            if ((int) $tunnel_subscription_id) {
                APP::Module('DB')->Update(
                    APP::Module('Tunnels')->settings['module_tunnels_db_connection'], 
                    'tunnels_users',
                    [
                        'state' => 'complete',
                        'resume_date' => '0000-00-00 00:00:00',
                        'object' => '',
                        'input_data' => ''
                    ],
                    [
                        ['id', '=', $tunnel_subscription_id, PDO::PARAM_INT]
                    ]
                );

                APP::Module('DB')->Insert(
                    APP::Module('Tunnels')->settings['module_tunnels_db_connection'], 'tunnels_tags',
                    [
                        'id' => 'NULL',
                        'user_tunnel_id' => [$tunnel_subscription_id, PDO::PARAM_INT],
                        'label_id' => ['complete', PDO::PARAM_STR],
                        'token' => 'payment',
                        'info' => 'NULL',
                        'cr_date' => 'NOW()'
                    ]
                );
            } else {
                if (!APP::Module('DB')->Select(
                    APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchColumn', 0], 
                    ['id'], 'tunnels_users', 
                    [
                        ['tunnel_id', '=', $tunnel_id, PDO::PARAM_INT],
                        ['user_id', '=', $user_id, PDO::PARAM_INT]
                    ]
                )) {
                    $user_tunnel_id = APP::Module('DB')->Insert(
                        APP::Module('Tunnels')->settings['module_tunnels_db_connection'], 'tunnels_users',
                        [
                            'id' => 'NULL',
                            'tunnel_id' => [$tunnel_id, PDO::PARAM_INT],
                            'user_id' => [$user_id, PDO::PARAM_INT],
                            'state' => ['complete', PDO::PARAM_STR],
                            'resume_date' => ['0000-00-00 00:00:00', PDO::PARAM_STR],
                            'object' => 'NULL',
                            'input_data' => 'NULL'
                        ]
                    );

                    APP::Module('DB')->Insert(
                        APP::Module('Tunnels')->settings['module_tunnels_db_connection'], 'tunnels_tags',
                        [
                            'id' => 'NULL',
                            'user_tunnel_id' => [$user_tunnel_id, PDO::PARAM_INT],
                            'label_id' => ['subscribe', PDO::PARAM_STR],
                            'token' => 'payment',
                            'info' => 'NULL',
                            'cr_date' => 'NOW()'
                        ]
                    );

                    APP::Module('DB')->Insert(
                        APP::Module('Tunnels')->settings['module_tunnels_db_connection'], 'tunnels_tags',
                        [
                            'id' => 'NULL',
                            'user_tunnel_id' => [$user_tunnel_id, PDO::PARAM_INT],
                            'label_id' => ['complete', PDO::PARAM_STR],
                            'token' => 'payment',
                            'info' => 'NULL',
                            'cr_date' => 'NOW()'
                        ]
                    );

                    APP::Module('Triggers')->Exec('subscribe_tunnel', [
                        'id' => $user_tunnel_id,
                        'input' => [
                            'method' => 'payment',
                            'tunnel_id' => $tunnel_id
                        ]
                    ]);
                }
            }
        }
    }
    
    public function ReminderPayment($user_id, $letter) {
        $out = [];

        $letters = [
            1 => 407,
            2 => 408,
            3 => ((int) APP::Module('DB')->Select(
                $this->settings['module_billing_db_connection'], ['fetchColumn', 0], 
                ['SUM(amount)'], 'billing_invoices', 
                [
                    ['user_id', '=', $user_id, PDO::PARAM_INT],
                    ['amount', '!=', 0, PDO::PARAM_INT],
                    ['state', '=', 'success', PDO::PARAM_STR]
                ]
            ) > 0) ? 623 : 409
        ];

        // Получение неоплаченных счетов пользователя
        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            [
                'id',
                'amount'
            ],
            'billing_invoices', 
            [
                ['user_id', '=', $user_id, PDO::PARAM_INT],
                ['state', '!=', 'success', PDO::PARAM_STR],
                ['cr_date', '>=', date('Y-m-d H:i:s', strtotime('-1 week')), PDO::PARAM_STR]
            ]
        ) as $invoice) {
            
            // Получение продуктов
            $invoice_products = APP::Module('DB')->Select(
                $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
                [
                    'billing_products.name'
                ], 
                'billing_invoices_products', 
                [
                    ['billing_invoices_products.invoice', '=', $invoice['id'], PDO::PARAM_INT]
                ],
                [
                    'left join/billing_products' => [
                        ['billing_invoices_products.product', '=', 'billing_products.id']
                    ]
                ]
            );
            
            if (APP::Module('DB')->Select(
                $this->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                [
                    'COUNT(id)'
                ], 
                'billing_invoices_details', 
                [
                    ['invoice', '=', $invoice['id'], PDO::PARAM_INT]
                ]
            )) {
                // Формирование массива счета
                $out[] = [
                    'id' => $invoice['id'],
                    'amount' => $invoice['amount'],
                    'products' => $invoice_products
                ];
            }
        }

        if (count($out)) {
            APP::Module('Mail')->Send(
                APP::Module('DB')->Select(
                    APP::Module('Users')->settings['module_users_db_connection'], ['fetchColumn', 0],
                    ['email'], 'users',
                    [['id', '=', $user_id, PDO::PARAM_INT]]
                ),
                $letters[$letter], 
                ['invoices' => $out], 
                true, 
                'billing'
            );

            if ($letter != 3) {
                APP::Module('TaskManager')->Add(
                    'Billing', 'ReminderPayment', 
                    date('Y-m-d H:i:s', strtotime('+1 day')), 
                    json_encode([$user_id, ($letter + 1)]), 
                    'user_' . $user_id . '_reminder_payment', 
                    'wait'
                );
            }
        }
        
        return true;
    }
    
    
    /*
     * $products[]['id']
     * $products[]['access']
     * $products[]['name']
     * $products[]['alt_id']
     * $products[]['amount']
     * $products[]['real_amount']
     */
    public function GrantProductAccessUWC($user_email, $invoice_id, $products, $notification = true) {
        $uwc_products = [];
        
        foreach ($products as $product) {
            if ($product['access_link']) {
                if (!array_key_exists($product['id'], $uwc_products)) {
                    $access_data = $this->OpenAccessUWC(
                        'p' . $invoice_id . '.' . time(),
                        $product['alt_id'],
                        $product['amount'],
                        $user_email
                    );
                    
                    APP::Module('DB')->Insert(
                        'auto', 'tmp',
                        [
                            'json_data' => [json_encode([$access_data]), PDO::PARAM_STR],
                            'cr_date' => 'NOW()'
                        ]
                    );

                    $uwc_products[$product['id']] = [
                        'name' => $product['name'],
                        'price' => $product['real_amount'],
                        'price_discount' => $product['amount'],
                        'access' => $product['access_link']
                    ];

                    APP::Module('DB')->Insert(
                        $this->settings['module_billing_db_connection'], 'billing_products_access',
                        [
                            'id' => 'NULL',
                            'invoice' => [$invoice_id, PDO::PARAM_INT],
                            'product' => [$product['id'], PDO::PARAM_INT],
                            'cr_date' => 'NOW()'
                        ]
                    );
                }
            }
        }

        // Отправка уведомления клменту
        if ($notification) {
            if (count($uwc_products)) {
                if (APP::Module('DB')->Select(
                    $this->settings['module_billing_db_connection'], ['fetchColumn', 0], 
                    ['COUNT(id)'], 'billing_uwc_users', 
                    [
                        ['email', '=', $user_email, PDO::PARAM_STR]
                    ]
                )) {
                    APP::Module('Mail')->Send($user_email, $this->uwc['notification']['exist'], [
                        'email' => $user_email,
                        'products' => $uwc_products
                    ], true, 'billing');
                } else {
                    APP::Module('DB')->Insert(
                        $this->settings['module_billing_db_connection'], 'billing_uwc_users',
                        [
                            'id' => 'NULL',
                            'email' => [$user_email, PDO::PARAM_STR],
                            'cr_date' => 'NOW()'
                        ]
                    );

                    APP::Module('Mail')->Send($user_email, $this->uwc['notification']['new'], [
                        'email' => $user_email,
                        'password' => $access_data['pass'],
                        'products' => $uwc_products
                    ], true, 'billing');
                }
            }
        }
    }
    
    public function OpenAccessUWC($orderid, $product, $price, $email) {
        $items = $product . '-1-' . $price . '-----;';
        $pass = substr(strtolower(APP::Module('Crypt')->Encode($email)), 0, $this->uwc['pass_length']);

        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $this->uwc['api_url']);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->uwc['useragent']);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'ecommtools_id' => $this->uwc['ecommtools_id'],
            'user' => $this->uwc['user'],
            'orderstatus' => '2',
            'hash' => md5($this->uwc['user'] . $this->uwc['key'] . $orderid . $items . $email . $price),
            'orderid' => $orderid,
            'email' => $email,
            'amount' => $price,
            'currency' => 'RUR',
            'items' => $items,
            'payby_code' => 'card',
            'payby' => 'card',
            'date' => date('d.m.Y'),
            'time' => date('H:i:s'),
            'refid' => '',
            'ip' => '212.32.239.1',
            'name' => '',
            'courier' => '',
            'destination' => '',
            'totalweight' => '',
            'shippingcost' => '0.00',
            'country' => '',
            'country_code' => '',
            'address' => '',
            'area' => '',
            'city' => '',
            'zip' => '',
            'street' => '',
            'building' => '',
            'apt' => '',
            'phone' => '',
            'posttrackingnumber' => '',
            'totaldiscountvalue' => '0',
            'accessdata' => $product . ':' . $email . ':' . $pass . ':*;',
            'multilogins' => '',
            'channel' => 'created_by_admin',
            'resend' => '',
            'coupon' => '',
            'subscribed' => '',
            'action' => 'paidorder',
            'event' => 'order_paid'
        ]);

        $result = curl_exec($ch);
        curl_close($ch);
        
        return [
            'out' => $result,
            'pass' => $pass
        ];
    }
    
    
    public function ExecMembersAccessTask($invoice_id, $user_id, $object_type, $object_id) {
        $access_id = APP::Module('DB')->Insert(
            APP::Module('Members')->settings['module_members_db_connection'], 'members_access', [
                'id' => 'NULL',
                'user_id' => [$user_id, PDO::PARAM_INT],
                'item' => [$object_type, PDO::PARAM_STR],
                'item_id' => [$object_id, PDO::PARAM_INT],
                'cr_date' => 'NOW()'
            ]
        );

        APP::Module('DB')->Insert(
            $this->settings['module_billing_db_connection'], 'billing_invoices_tag', [
                'id' => 'NULL',
                'invoice_id' => [$invoice_id, PDO::PARAM_INT],
                'action' => ['success_open_access', PDO::PARAM_STR],
                'action_data' => [json_encode([$object_type, $object_id]), PDO::PARAM_STR],
                'cr_date' => 'NOW()'
            ]
        );

        APP::Module('Triggers')->Exec('open_members_access', [
            'invoice_id' => $invoice_id,
            'access_id' => $access_id
        ]);

        return $access_id;
    }
    
    public function ExecSecondaryProductsTask($invoice_id, $product_id, $notification) {
        
        // Получение информации по счету
        $invoice = APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'],
            ['fetch', PDO::FETCH_ASSOC],
            [
                'billing_invoices.amount', 
                'billing_invoices.state',
                'billing_invoices.amount', 
                'users.id AS user_id',
                'users.email'
            ],
            'billing_invoices',
            [
                ['billing_invoices.id', '=', $invoice_id, PDO::PARAM_INT]
            ],
            [
                'left join/users' => [
                    ['users.id', '=', 'billing_invoices.user_id']
                ]
            ]
        );

        // Получение информации по продукту счета
        $invoice_product = APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'],
            ['fetch', PDO::FETCH_ASSOC],
            [
                'id',
                'amount',
                'access_link',
                'name',
                'alt_id',
                'members_access',
                'stop_tunnels',
                'sale_notify_email'
            ],
            'billing_products',
            [
                ['id', '=', $product_id, PDO::PARAM_INT]
            ]
        );
        
        $invoice_product['real_amount'] = $invoice_product['amount'];
        
        // Остановка туннелей
        if ($invoice_product['stop_tunnels']) {
            $this->CompleteUserTunnels($invoice['user_id'], (array) explode(',', $invoice_product['stop_tunnels']));
        }

        // Открытие доступа (мемберка)
        $this->AddMembersAccessTask($invoice_id, [$invoice_product], $notification);

        // Открытие доступа (UWC)
        $this->GrantProductAccessUWC($invoice['email'], $invoice_id, [$invoice_product], $notification);

        // Добавление доп. продуктов
        $this->AddSecondaryProductsTask($invoice_id, [$product_id]);
        
        $invoice_product_id = APP::Module('DB')->Insert(
            $this->settings['module_billing_db_connection'], 'billing_invoices_products', [
                'id' => 'NULL',
                'invoice' => [$invoice_id, PDO::PARAM_INT],
                'type' => ['secondary', PDO::PARAM_STR],
                'product' => [$product_id, PDO::PARAM_INT],
                'amount' => [0, PDO::PARAM_INT],
                'cr_date' => 'NOW()'
            ]
        );
        
        APP::Module('DB')->Insert(
            $this->settings['module_billing_db_connection'], 'billing_invoices_tag', [
                'id' => 'NULL',
                'invoice_id' => [$invoice_id, PDO::PARAM_INT],
                'action' => ['add_secondary_product', PDO::PARAM_STR],
                'action_data' => [json_encode(['product' => $product_id]), PDO::PARAM_STR],
                'cr_date' => 'NOW()'
            ]
        );
        
        APP::Module('Triggers')->Exec('add_secondary_product', [
            'invoice_id' => $invoice_id,
            'invoice_product_id' => $invoice_product_id
        ]);

        return $invoice_product_id;
    }
    
    
    public function FreeCreateInvoice() {
        $email = false;
        
        if (isset(APP::Module('Routing')->get['t'])) {
            $token = APP::Module('Crypt')->Decode(APP::Module('Routing')->get['t']);
            
            if (isset($token['email'])) {
                $email = $token['email'];
            }
        } else {
            if (isset($_COOKIE['engine']['controllers']['TEmailTracking']['email'])) {
                $email = $_COOKIE['engine']['controllers']['TEmailTracking']['email'];
            }

            if (isset($_COOKIE['email'])) {
                $email = $_COOKIE['email'];
            }
        }
        
        if ($email) {
            setcookie('email', $email, time() + 2628000, '/', '.glamurnenko.ru');
        }
        
        APP::Render('billing/invoices/create', 'include', [
            'email' => $email
        ]);
    }
    

    public function ManageProducts() {
        APP::Render('billing/admin/products/index');
    }
    
    public function ManageProductsTypes() {
        APP::Render('billing/admin/products/types/index');
    }
    
    public function ManageProductsGroups() {
        APP::Render('billing/admin/products/groups/index');
    }
    
    public function ManageInvoices() {
        APP::Render('billing/admin/invoices/index');
    }
    
    public function ManagePayments() {
        APP::Render('billing/admin/payments/index');
    }

    
    public function AddProduct() {
        $products = [];
        
        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['id', 'name'], 'billing_products_groups'
        ) as $item) {
            $products[$item['name']] = APP::Module('DB')->Select(
                $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
                ['id', 'name', 'amount'], 'billing_products',
                [
                    ['group_id', '=', $item['id'], PDO::PARAM_INT]
                ]
            );
        }
        
        APP::Render(
            'billing/admin/products/add', 'include', [
            'products_list' => $products,
        ]);
    }
    
    public function AddProductType() {
        APP::Render('billing/admin/products/types/add');
    }
    
    public function AddProductGroup() {
        APP::Render('billing/admin/products/groups/add');
    }
    
    public function AddInvoice() {
        $products = [];
        
        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['id', 'name'], 'billing_products_groups'
        ) as $item) {
            $products[$item['name']] = APP::Module('DB')->Select(
                $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
                ['id', 'name', 'amount'], 'billing_products',
                [
                    ['group_id', '=', $item['id'], PDO::PARAM_INT]
                ]
            );
        }
        
        APP::Render(
            'billing/admin/invoices/add', 'include', [
            'products_list' => $products,
            'email' => isset(APP::Module('Routing')->get['user']) ? APP::Module('DB')->Select(
                APP::Module('Users')->settings['module_users_db_connection'], 
                ['fetch', PDO::FETCH_COLUMN], 
                [
                    'email'
                ], 
                'users', 
                [
                    ['id', '=', APP::Module('Routing')->get['user'], PDO::PARAM_INT]
                ]
            ) : ''
        ]);
    }
    

    public function InvoiceDetails() {
        $invoice_id = is_numeric(APP::Module('Routing')->get['invoice_id_hash']) ? APP::Module('Routing')->get['invoice_id_hash'] : APP::Module('Crypt')->Decode(APP::Module('Routing')->get['invoice_id_hash']);
        
        $invoice = APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_ASSOC],
            [
                'billing_invoices.id', 
                'billing_invoices.user_id', 
                'billing_invoices.amount', 
                'billing_invoices.state', 
                'billing_invoices.author',
                'billing_invoices.up_date',
                'billing_invoices.cr_date',
                'billing_invoices.amount', 
                'users.email'
            ],
            'billing_invoices',
            [
                ['billing_invoices.id', '=', $invoice_id, PDO::PARAM_INT]
            ],
            [
                'left join/users' => [
                    ['users.id', '=', 'billing_invoices.user_id']
                ]
            ]
        );
        
        $author_email = APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], 
            ['fetch', PDO::FETCH_COLUMN], 
            [
                'email'
            ], 
            'users', 
            [
                ['id', '=', $invoice['author'], PDO::PARAM_INT]
            ]
        );

        $author_username = APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], 
            ['fetch', PDO::FETCH_COLUMN], 
            [
                'value'
            ], 
            'users_about', 
            [
                ['user', '=', $invoice['author'], PDO::PARAM_INT],
                ['item', '=', 'username', PDO::PARAM_STR]
            ]
        );

        $invoice['author_name'] = $author_username ? $author_username : $author_email;
        
        $payments = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
            [
                'id', 
                'method',
                'cr_date'
            ], 
            'billing_payments',
            [['invoice', '=', $invoice_id, PDO::PARAM_INT]]
        ) as $payment) {
            $payments[] = [
                'id' => $payment['id'],
                'method' => $payment['method'],
                'cr_date' => $payment['cr_date'],
                'details' => APP::Module('DB')->Select(
                    APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                    [
                        'item', 
                        'value'
                    ], 
                    'billing_payments_details',
                    [['payment', '=', $payment['id'], PDO::PARAM_INT]]
                )
            ];
        }
        
        APP::Render(
            'billing/admin/invoices/details',
            'include', 
            [
                'invoice' => $invoice,
                'details' => APP::Module('DB')->Select(
                    APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                    [
                        'id', 
                        'item', 
                        'value'
                    ], 
                    'billing_invoices_details',
                    [['invoice', '=', $invoice_id, PDO::PARAM_INT]]
                ),
                'products' => APP::Module('DB')->Select(
                    APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                    [
                        'billing_invoices_products.id', 
                        'billing_invoices_products.type', 
                        'billing_invoices_products.product',
                        'billing_invoices_products.amount',
                        'billing_invoices_products.cr_date',
                        
                        'billing_products.name'
                    ], 
                    'billing_invoices_products',
                    [['billing_invoices_products.invoice', '=', $invoice_id, PDO::PARAM_INT]],
                    [
                        'join/billing_products' => [['billing_products.id', '=', 'billing_invoices_products.product']]
                    ],
                    ['billing_invoices_products.id'],
                    false,
                    ['billing_invoices_products.cr_date', 'ASC']
                ),
                'products_access' => APP::Module('DB')->Select(
                    APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN],
                    [
                        'product'
                    ], 
                    'billing_products_access',
                    [['invoice', '=', $invoice_id, PDO::PARAM_INT]]
                ),
                'tags' => APP::Module('DB')->Select(
                    APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                    [
                        'id', 
                        'action', 
                        'action_data',
                        'cr_date'
                    ], 
                    'billing_invoices_tag',
                    [['invoice', '=', $invoice_id, PDO::PARAM_INT]],
                    false, false, false,
                    ['id', 'asc']
                ),
                'payments' => $payments
            ]
        );
    }
    
    public function EditProduct() {
        $product_id = APP::Module('Crypt')->Decode(APP::Module('Routing')->get['product_id_hash']);

        $product = APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
            [
                'group_id',
                'alt_id',
                'name', 
                'description',
                'amount', 
                'ignore_group',
                'ignore_products',
                'ignore_group_sell',
                'ignore_products_sell',
                'related_products',
                'members_access', 
                'secondary_products', 
                'stop_tunnels',
                'state',
                'multi_sale',
                'access_link', 
                'descr_link',
                'sort_index',
                'sale_notify_email'
            ], 'billing_products', 
            [['id', '=', $product_id, PDO::PARAM_INT]]
        );
        
        $product['members_access'] = json_decode($product['members_access'], true);
        $product['secondary_products'] = json_decode($product['secondary_products'], true);

        $products = [];
        
        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['id', 'name'], 'billing_products_groups'
        ) as $item) {
            $products[$item['name']] = APP::Module('DB')->Select(
                $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
                ['id', 'name', 'amount'], 'billing_products',
                [
                    ['group_id', '=', $item['id'], PDO::PARAM_INT]
                ]
            );
        }

        APP::Render(
            'billing/admin/products/edit', 'include', [
                'product'  => $product,
                'products_list' => $products,
            ]
        );
    }
    
    public function EditProductType() {
        $product_type_id = APP::Module('Crypt')->Decode(APP::Module('Routing')->get['product_type_id_hash']);

        $product_type = APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
            ['name'], 'billing_products_types', 
            [['id', '=', $product_type_id, PDO::PARAM_INT]]
        );

        APP::Render(
            'billing/admin/products/types/edit', 'include', [
                'product-type'  => $product_type,
            ]
        );
    }
    
    public function EditProductGroup() {
        $product_group_id = APP::Module('Crypt')->Decode(APP::Module('Routing')->get['product_group_id_hash']);

        $product_group = APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
            [
                'name',
                'descr',
                'ignore_group',
                'ignore_products',
                'ignore_group_sell',
                'ignore_products_sell',
                'type_id'
            ], 'billing_products_groups', 
            [['id', '=', $product_group_id, PDO::PARAM_INT]]
        );

        APP::Render(
            'billing/admin/products/groups/edit', 'include', [
                'product-group'  => $product_group,
            ]
        );
    }

    public function Settings() {
        APP::Render('billing/admin/settings');
    }
    
    public function ImportInvoices() {
        if (isset($_FILES['invoices'])) {
            $users = [];
            $imported = [];

            foreach (file($_FILES['invoices']['tmp_name']) as $string) {
                $invoice = explode(';', trim($string));
                
                for ($i = 0; $i <= 10; $i ++) {
                    if (!isset($invoice[$i])) {
                        $invoice[$i] = false;
                    } 
                }

                if ((((!$invoice[0]) || (!$invoice[1]) || (!$invoice[2]) || (!$invoice[4])))) {
                    continue;
                }

                $user = APP::Module('DB')->Select(
                    APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_ASSOC],
                    ['id', 'UNIX_TIMESTAMP(reg_date) AS reg_date'], 'users',
                    [
                        ['email', '=', $invoice[0], PDO::PARAM_STR]
                    ]
                );

                if (!isset($user['id'])) {
                    continue;
                }
                
                if ((int) strtotime($invoice[4]) < (int) $user['reg_date']) {
                    continue;
                }
                
                $product_id = APP::Module('DB')->Select(
                    $this->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                    ['id'], 'billing_products',
                    [
                        ['name', '=', $invoice[1], PDO::PARAM_STR]
                    ]
                );
                
                if (!$product_id) {
                    continue;
                }
                
                $invoice[11] = $product_id;
                
                if (isset($users[$user['id']])) {
                    $users[$user['id']]['invoices'][] = $invoice;
                    $users[$user['id']]['sum'][] = $invoice[2];
                } else {
                    $users[$user['id']] = [
                        'user_id' => $user['id'],
                        'email' => $invoice[0],
                        'reg_date' => $user['reg_date'],
                        'invoices' => [$invoice],
                        'sum' => [$invoice[2]]
                    ];
                }
            }

            foreach ($users as $user_id => $user_data) {
                $users[$user_id]['pult_sum'] = (int) APP::Module('DB')->Select(
                    $this->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                    ['SUM(amount)'], 'billing_invoices',
                    [
                        ['user_id', '=', $user_id, PDO::PARAM_INT],
                        ['state', '=', 'success', PDO::PARAM_STR],
                        ['cr_date', 'BETWEEN', '"' . $_POST['date_year_from'] . '-' . $_POST['date_month_from'] . '-' . $_POST['date_day_from'] . ' 00:00:00" AND "' . $_POST['date_year_to'] . '-' . $_POST['date_month_to'] . '-' . $_POST['date_day_to'] . ' 23:59:59"', PDO::PARAM_STR]
                    ]
                );

                if ($users[$user_id]['pult_sum'] >= (int) array_sum($user_data['sum'])) {
                    unset($users[$user_id]);
                    continue;
                }
                
                $users[$user_id]['diff_sum'] = array_sum($user_data['sum']) - $users[$user_id]['pult_sum'];

                if (((int)$users[$user_id]['pult_sum'] === 0) && ((int) $users[$user_id]['diff_sum'] !== 0)) {
                    foreach ($user_data['invoices'] as $user_invoice) {
                        $this->CreateInvoice(
                            $user_id, 
                            APP::Module('Users')->user['id'], 
                            [
                                [
                                    'id' => $user_invoice[11],
                                    'amount' => $user_invoice[2]
                                ]
                            ], 
                            'success',
                            $user_invoice[10],
                            $user_invoice[4]
                        );

                        $imported[] = $user_invoice;
                    }
                    
                    unset($users[$user_id]);
                }
            }
            
            APP::Render('billing/admin/invoices/import', 'include', [
                'action' => 'import',
                'users' => $users,
                'imported' => $imported
            ]);
        } else {
            APP::Render('billing/admin/invoices/import', 'include', [
                'action' => 'form'
            ]);
        }
    }
    
    public function PaymentDetails() {
        $payment_id = APP::Module('Crypt')->Decode(APP::Module('Routing')->get['payment_id_hash']);

        APP::Render(
            'billing/admin/payments/details', 
            'include', 
            [
                'payment' => APP::Module('DB')->Select(
                    $this->settings['module_billing_db_connection'],['fetch', PDO::FETCH_ASSOC],
                    [
                        'id',
                        'invoice', 
                        'method', 
                        'cr_date'
                    ],
                    'billing_payments', 
                    [['id', '=', $payment_id, PDO::PARAM_INT]]
                ),
                'details' => APP::Module('DB')->Select(
                    $this->settings['module_billing_db_connection'],['fetchAll', PDO::FETCH_ASSOC],
                    [
                        'id',
                        'item', 
                        'value'
                    ],
                    'billing_payments_details', 
                    [['payment', '=', $payment_id, PDO::PARAM_INT]]
                )
            ]
        );
    }
    

    public function DiffInvoices() {
        if (isset($_FILES['source'])) {
            $users = [];
            $invoices = [];

            foreach (file($_FILES['source']['tmp_name']) as $string) {
                $invoice = explode(';', trim($string));

                if (!isset($email_match[1])) {
                    continue;
                }

                $pult_user = APP::Module('DB')->Select(
                    APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_ASSOC],
                    ['id', 'reg_date'], 'users',
                    [
                        ['email', '=', $email_match[1], PDO::PARAM_STR]
                    ]
                );

                if (!isset($pult_user['id'])) {
                    continue;
                }

                $users[$email_match[1] . '|' . $pult_user['id'] . '|' . strtotime($pult_user['reg_date'])][] = $item[4];

                $invoices[$pult_user['id']][] = [
                    $item[2], $item[3], $item[4], $item[5], $item[8], $item[9], $item[10], $item[11]
                ];
            }
            ?>
            <table border="1" width="100%">
                <tr>
                    <td>E-Mail</td>
                    <td>Дата регистрации</td>
                    <td>Сумма из отчета</td>
                    <td>Сумма всех счетов у нас</td>
                    <td>Не хватает</td>
                    <td>Счета из отчета</td>
                </tr>
                <?
                foreach ($users as $usr_item => $sum) {
                    $id = explode('|', $usr_item);
                
                    $sum2 = APP::Module('DB')->Select(
                        APP::Module('Billing')->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                        ['SUM(amount)'], 'billing_invoices',
                        [
                            ['user_id', '=', $id[1], PDO::PARAM_INT],
                            ['state', '=', 'success', PDO::PARAM_STR]
                        ]
                    );

                    if ((int) $sum2 >= (int) array_sum($sum)) {
                        continue;
                    }

                    if (((int) $sum2 == 0) && ((int) array_sum($sum) != 0)) {
                        $invoice_email = $id[0];

                        foreach ($invoices[$id[1]] as $invoice) {
                            $inv_date = explode('.', $invoice[4]);

                            if (count($inv_date) == 3) {
                                $inv_prod_id = APP::Module('DB')->Select(
                                    APP::Module('Billing')->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                                    ['id'], 'billing_products',
                                    [
                                        ['name', '=', $invoice[3], PDO::PARAM_STR]
                                    ]
                                );

                                if ($inv_prod_id) {
                                    $invoice[8] = '20' . $inv_date[2] . '-' . $inv_date[1] . '-' . $inv_date[0] . ' 12:00:00';
                                    $invoice[9] = $id[0];
                                    $invoice[10] = $inv_prod_id;

                                    if ((int) strtotime($invoice[8]) > (int) $id[2]) {
                                        ?>
                                        <tr>
                                            <td><?= $id[0] ?></td>
                                            <td><?= date('Y-m-d', $id[2]) ?></td>
                                            <td><?= array_sum($sum) ?></td>
                                            <td><?= $sum2 ?></td>
                                            <td><?= array_sum($sum) - $sum2 ?></td>
                                            <td>
                                                <table border="1" width="100%">
                                                    <?
                                                    foreach ($invoices[$id[1]] as $invoice) {
                                                        echo '<tr><td width="11%">' . implode('</td><td width="11%">', $invoice) . '</td><td width="11%"><a target="_blank" href="' . APP::Module('Routing')->root . 'admin/billing/invoices/add?user=' . $id[0] . '&state=success&comment=import' . date('Ymd') . '">Добавить</a></td></tr>';
                                                    }
                                                    ?>
                                                </table>
                                            </td>
                                        </tr>
                                        <?
                                    }
                                }
                            }
                        }
                    }
                }
            ?>
            </table>
            <?
        } else {
            APP::Render('billing/admin/import', 'include', 'form');
        }
    }
    
    public function DiffImportInvoices() {
        if (isset($_FILES['source'])) {
            $users = [];
            $invoices = [];

            foreach (file($_FILES['source']['tmp_name']) as $string) {
                $item = explode(',', trim($string));

                preg_match('/\<(.*)\>/', $item[1], $email_match);

                if (!isset($email_match[1])) {
                    continue;
                }

                $pult_user = APP::Module('DB')->Select(
                    APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_ASSOC],
                    ['id', 'reg_date'], 'users',
                    [
                        ['email', '=', $email_match[1], PDO::PARAM_STR]
                    ]
                );

                if (!isset($pult_user['id'])) {
                    continue;
                }

                $users[$email_match[1] . '|' . $pult_user['id'] . '|' . strtotime($pult_user['reg_date'])][] = $item[4];

                $invoices[$pult_user['id']][] = [
                    $item[2], $item[3], $item[4], $item[5], $item[8], $item[9], $item[10], $item[11]
                ];
            }

            foreach ($users as $usr_item => $sum) {
                $id = explode('|', $usr_item);
                
                $sum2 = APP::Module('DB')->Select(
                    APP::Module('Billing')->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                    ['SUM(amount)'], 'billing_invoices',
                    [
                        ['user_id', '=', $id[1], PDO::PARAM_INT],
                        ['state', '=', 'success', PDO::PARAM_STR]
                    ]
                );

                if ((int) $sum2 >= (int) array_sum($sum)) {
                    continue;
                }

                if (((int) $sum2 == 0) && ((int) array_sum($sum) != 0)) {
                    $invoice_email = $id[0];

                    foreach ($invoices[$id[1]] as $invoice) {
                        $inv_date = explode('.', $invoice[4]);
                        
                        if (count($inv_date) == 3) {
                            $inv_prod_id = APP::Module('DB')->Select(
                                APP::Module('Billing')->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                                ['id'], 'billing_products',
                                [
                                    ['name', '=', $invoice[3], PDO::PARAM_STR]
                                ]
                            );
                            
                            if ($inv_prod_id) {
                                $invoice[8] = '20' . $inv_date[2] . '-' . $inv_date[1] . '-' . $inv_date[0] . ' 12:00:00';
                                $invoice[9] = $id[0];
                                $invoice[10] = $inv_prod_id;
                                
                                if ((int) strtotime($invoice[8]) > (int) $id[2]) {
                                    $message = implode('<br>', $invoice);

                                    if (!APP::Module('DB')->Select(
                                        APP::Module('Comments')->settings['module_comments_db_connection'], ['fetchColumn', 0],
                                        ['COUNT(id)'], 'comments_messages',
                                        [['MD5(message)', '=', md5($message), PDO::PARAM_STR]]
                                    )) {
                                        $this->CreateInvoice(
                                            $id[1], 
                                            0, 
                                            [
                                                [
                                                    'id' => $invoice[10],
                                                    'amount' => $invoice[2]
                                                ]
                                            ], 
                                            'success',
                                            $message,
                                            $invoice[8]
                                        );
                                    }
                                }
                            }
                        }
                    }
                }
            }
            
            echo 'Готово!';
        } else {
            ?>
            <form enctype="multipart/form-data" method="POST">
                <input name="source" type="file">
                <input type="submit" value="Импортировать" />
            </form>
            <?
        }
    }
    
    public function StatProducts() {
        $out = [];
        
        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            [
                'id',
                'name'
            ], 
            'billing_products'
        ) as $product) {
            $filter = [
                ['id', 'IN', APP::Module('DB')->Select(
                    $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
                    [
                        'invoice'
                    ], 
                    'billing_invoices_products',
                    [
                        ['product', '=', $product['id'], PDO::PARAM_INT]
                    ]
                )],
                ['state', '=', 'success', PDO::PARAM_STR],
                ['amount', '!=', '0', PDO::PARAM_INT]
            ];
            
            if (isset(APP::Module('Routing')->get['date'])) {
                $filter = array_merge($filter, [
                    ['cr_date', 'BETWEEN', '"' . APP::Module('Routing')->get['date']['from'] . ' 00:00:00" AND "' . APP::Module('Routing')->get['date']['to'] . ' 23:59:59"', PDO::PARAM_STR]
                ]);
            }
            
            $out[] = [
                'name' => $product['name'],
                'invoices' => APP::Module('DB')->Select(
                    $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
                    [
                        'id'
                    ], 
                    'billing_invoices',
                    $filter
                ),
                'sum' => (int) APP::Module('DB')->Select(
                    $this->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    [
                        'SUM(amount)'
                    ], 
                    'billing_invoices',
                    $filter
                )
            ];
        }

        APP::Render('billing/admin/products/stat', 'include', $out);
    }

    
    public function APIDashboard() {
        $tmp = [];
        
        $metrics = [
            'new',
            'processed',
            'success',
            'revoked',
            'access'
        ];
        
        for ($x = $_POST['date']['to']; $x >= $_POST['date']['from']; $x = $x - 86400) {
            foreach ($metrics as $value) {
                $tmp[$value][date('d-m-Y', $x)] = [];
            }
        }

        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            [
                'amount',
                'state',
                'UNIX_TIMESTAMP(cr_date) AS date'
            ], 
            'billing_invoices',
            [
                ['state', '!=', 'success', PDO::PARAM_STR],
                ['cr_date', 'BETWEEN', '"' . date('Y-m-d 00:00:00', $_POST['date']['from']) . '" AND "' . date('Y-m-d 23:59:59', $_POST['date']['to']) . '"']
            ]
        ) as $data) {
            $tmp[$data['state']][date('d-m-Y', $data['date'])][] = $data['amount'];
        }
        
        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            [
                'billing_invoices.amount',
                'billing_invoices.state',
                'UNIX_TIMESTAMP(billing_payments.cr_date) AS date'
            ], 
            'billing_invoices',
            [
                ['billing_invoices.amount', '!=', 0, PDO::PARAM_INT],
                ['billing_invoices.state', '=', 'success', PDO::PARAM_STR],
                ['billing_payments.cr_date', 'BETWEEN', '"' . date('Y-m-d 00:00:00', $_POST['date']['from']) . '" AND "' . date('Y-m-d 23:59:59', $_POST['date']['to']) . '"']
            ], 
            [
                'join/billing_payments' => [['billing_payments.invoice', '=', 'billing_invoices.id']]
            ],
            ['billing_invoices.id']
        ) as $data) {
            $tmp[$data['state']][date('d-m-Y', $data['date'])][] = $data['amount'];
        }
        
        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            [
                'billing_invoices.state',
                'UNIX_TIMESTAMP(billing_payments.cr_date) AS date'
            ], 
            'billing_invoices',
            [
                ['billing_invoices.amount', '=', 0, PDO::PARAM_INT],
                ['billing_invoices.state', '=', 'success', PDO::PARAM_STR],
                ['billing_payments.cr_date', 'BETWEEN', '"' . date('Y-m-d 00:00:00', $_POST['date']['from']) . '" AND "' . date('Y-m-d 23:59:59', $_POST['date']['to']) . '"']
            ], 
            [
                'join/billing_payments' => [['billing_payments.invoice', '=', 'billing_invoices.id']]
            ],
            ['billing_invoices.id']
        ) as $data) {
            $tmp['access'][date('d-m-Y', $data['date'])][] = 0;
        }

        $out = [
            'range' => [],
            'total' => [
                'new' => APP::Module('Crypt')->Encode('{"logic":"intersect","rules":[{"method":"cr_date","settings":{"date_from":' . strtotime(date('Y-m-d 00:00:00', $_POST['date']['from'])) . ',"date_to":' . strtotime(date('Y-m-d 00:00:00', $_POST['date']['to']) . ' + 1 day') . '}},{"method":"state","settings":{"logic":"=","value":"new"}}]}'),
                'processed' => APP::Module('Crypt')->Encode('{"logic":"intersect","rules":[{"method":"cr_date","settings":{"date_from":' . strtotime(date('Y-m-d 00:00:00', $_POST['date']['from'])) . ',"date_to":' . strtotime(date('Y-m-d 00:00:00', $_POST['date']['to']) . ' + 1 day') . '}},{"method":"state","settings":{"logic":"=","value":"processed"}}]}'),
                'revoked' => APP::Module('Crypt')->Encode('{"logic":"intersect","rules":[{"method":"cr_date","settings":{"date_from":' . strtotime(date('Y-m-d 00:00:00', $_POST['date']['from'])) . ',"date_to":' . strtotime(date('Y-m-d 00:00:00', $_POST['date']['to']) . ' + 1 day') . '}},{"method":"state","settings":{"logic":"=","value":"revoked"}}]}'),
                'success' => APP::Module('Crypt')->Encode('{"logic":"intersect","rules":[{"method":"state","settings":{"logic":"=","value":"success"}},{"method":"amount","settings":{"logic":"!=","value":"0"}},{"method":"pay_date","settings":{"date_from":' . strtotime(date('Y-m-d 00:00:00', $_POST['date']['from'])) . ',"date_to":' . strtotime(date('Y-m-d 00:00:00', $_POST['date']['to']) . ' + 1 day') . '}}]}'),
                'access' => APP::Module('Crypt')->Encode('{"logic":"intersect","rules":[{"method":"state","settings":{"logic":"=","value":"success"}},{"method":"amount","settings":{"logic":"=","value":"0"}},{"method":"pay_date","settings":{"date_from":' . strtotime(date('Y-m-d 00:00:00', $_POST['date']['from'])) . ',"date_to":' . strtotime(date('Y-m-d 00:00:00', $_POST['date']['to']) . ' + 1 day') . '}}]}')
            ]
        ];

        foreach ((array) $tmp as $source => $dates) {
            foreach ((array) $dates as $key => $value) {
                $search_filter = '';
                
                switch ($source) {
                    case 'success': $search_filter = '{"logic":"intersect","rules":[{"method":"state","settings":{"logic":"=","value":"success"}},{"method":"amount","settings":{"logic":"!=","value":"0"}},{"method":"pay_date","settings":{"date_from":' . strtotime($key . ' 00:00:00') . ',"date_to":' . strtotime($key . ' 00:00:00 + 1 day') . '}}]}'; break;
                    case 'access': $search_filter = '{"logic":"intersect","rules":[{"method":"state","settings":{"logic":"=","value":"success"}},{"method":"amount","settings":{"logic":"=","value":"0"}},{"method":"pay_date","settings":{"date_from":' . strtotime($key . ' 00:00:00') . ',"date_to":' . strtotime($key . ' 00:00:00 + 1 day') . '}}]}'; break;
                    default: $search_filter = '{"logic":"intersect","rules":[{"method":"cr_date","settings":{"date_from":' . strtotime($key . ' 00:00:00') . ',"date_to":' . strtotime($key . ' 00:00:00 + 1 day') . '}},{"method":"state","settings":{"logic":"=","value":"' . $source . '"}}]}'; break;
                }

                $out['range'][$source][$key] = [
                    strtotime($key) * 1000, 
                    count($value), 
                    array_sum($value),
                    APP::Module('Crypt')->Encode($search_filter)
                ];
            }
        }
        
        foreach ($out['range'] as $key => $value) {
            $out['range'][$key] = array_values($value);
        }

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');
        
        echo json_encode($out);
        exit;
    }
    
    
    public function APISearchProducts() {
        $request = json_decode(file_get_contents('php://input'), true);
        $out     = $this->ProductsSearch(json_decode($request['search'], 1));
        $rows    = [];

        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], 
            ['fetchAll', PDO::FETCH_ASSOC], 
            [
                'id', 
                'group_id',
                'alt_id',
                'name', 
                'description',
                'amount', 
                'ignore_group',
                'ignore_products',
                'ignore_group_sell',
                'ignore_products_sell',
                'related_products',
                'members_access',
                'secondary_products',
                'stop_tunnels',
                'state', 
                'multi_sale',
                'access_link',
                'descr_link',
                'sort_index',
                'sale_notify_email', 
                'up_date'
            ], 
            'billing_products', 
            [['id', 'IN', $out, PDO::PARAM_INT]], 
            false, false, false, 
            [$request['sort_by'], $request['sort_direction']], 
            $request['rows'] === -1 ? false : [($request['current'] - 1) * $request['rows'], $request['rows']]
        ) as $row) {
            $row['product_id_token'] = APP::Module('Crypt')->Encode($row['id']);
            $row['img'] = [
                'small' => file_exists(ROOT . '/public/modules/billing/products/images/' . $row['id'] . '.png'),
                'big' => file_exists(ROOT . '/public/modules/billing/products/images/' . $row['id'] . '_big.png')
            ]; 
            array_push($rows, $row);
        }

        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        echo json_encode([
            'current'  => $request['current'],
            'rowCount' => $request['rows'],
            'rows'     => $rows,
            'total'    => count($out)
        ]);
        exit;
    }
    
    public function APISearchProductsTypes() {
        $request = json_decode(file_get_contents('php://input'), true);
        $out     = $this->ProductsTypesSearch(json_decode($request['search'], 1));
        $rows    = [];

        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], ['id', 'name', 'up_date'], 'billing_products_types', [['id', 'IN', $out, PDO::PARAM_INT]], false, false, false, [$request['sort_by'], $request['sort_direction']], $request['rows'] === -1 ? false : [($request['current'] - 1) * $request['rows'], $request['rows']]
        ) as $row) {
            $row['product_type_id_token'] = APP::Module('Crypt')->Encode($row['id']);
            array_push($rows, $row);
        }

        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        echo json_encode([
            'current'  => $request['current'],
            'rowCount' => $request['rows'],
            'rows'     => $rows,
            'total'    => count($out)
        ]);
        exit;
    }
    
    public function APISearchProductsGroups() {
        $request = json_decode(file_get_contents('php://input'), true);
        $out     = $this->ProductsGroupsSearch(json_decode($request['search'], 1));
        $rows    = [];

        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], ['id', 'name', 'up_date'], 'billing_products_groups', [['id', 'IN', $out, PDO::PARAM_INT]], false, false, false, [$request['sort_by'], $request['sort_direction']], $request['rows'] === -1 ? false : [($request['current'] - 1) * $request['rows'], $request['rows']]
        ) as $row) {
            $row['product_group_id_token'] = APP::Module('Crypt')->Encode($row['id']);
            array_push($rows, $row);
        }

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode([
            'current'  => $request['current'],
            'rowCount' => $request['rows'],
            'rows'     => $rows,
            'total'    => count($out)
        ]);
        exit;
    }
    
    public function APISearchInvoices() {
        ini_set('max_execution_time', 60); 
        ini_set('memory_limit', '1G');
        
        $request        = json_decode(file_get_contents('php://input'), true);
        $out            = $this->InvoicesSearch(json_decode($request['search'], 1));
        $rows           = [];

        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], 
            ['fetchAll', PDO::FETCH_ASSOC], 
            [
                'billing_invoices.id', 
                'billing_invoices.user_id', 
                'billing_invoices.amount', 
                'billing_invoices.author', 
                'billing_invoices.state', 
                'billing_invoices.cr_date',
                'users.email AS user_email',
                'billing_payments.cr_date AS pay_date',
            ], 
            'billing_invoices', 
            [
                ['billing_invoices.id', 'IN', $out, PDO::PARAM_INT]
            ], 
            [
                'join/users' => [['users.id', '=', 'billing_invoices.user_id']],
                'left join/billing_payments' => [['billing_payments.invoice', '=', 'billing_invoices.id']]
            ],
            ['billing_invoices.id'],
            false,
            [$request['sort_by'], $request['sort_direction']], 
            $request['rows'] === -1 ? false : [($request['current'] - 1) * $request['rows'], $request['rows']]
        ) as $row) {
            $row['invoice_id_token'] = APP::Module('Crypt')->Encode($row['id']);
            $row['invoice_user_token'] = APP::Module('Crypt')->Encode($row['user_id']);
            
            $row['details'] = APP::Module('DB')->Select(
                APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                [
                    'id', 
                    'item', 
                    'value'
                ], 
                'billing_invoices_details',
                [['invoice', '=', $row['id'], PDO::PARAM_INT]]
            );
            
            $author_email = APP::Module('DB')->Select(
                APP::Module('Users')->settings['module_users_db_connection'], 
                ['fetch', PDO::FETCH_COLUMN], 
                [
                    'email'
                ], 
                'users', 
                [
                    ['id', '=', $row['author'], PDO::PARAM_INT]
                ]
            );
            
            $author_username = APP::Module('DB')->Select(
                APP::Module('Users')->settings['module_users_db_connection'], 
                ['fetch', PDO::FETCH_COLUMN], 
                [
                    'value'
                ], 
                'users_about', 
                [
                    ['user', '=', $row['author'], PDO::PARAM_INT],
                    ['item', '=', 'username', PDO::PARAM_STR]
                ]
            );
            
            $row['author_name'] = $author_username ? $author_username : $author_email;

            $row['products'] = APP::Module('DB')->Select(
                APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                [
                    'billing_invoices_products.id', 
                    'billing_invoices_products.type', 
                    'billing_invoices_products.product',
                    'billing_invoices_products.amount',
                    'billing_invoices_products.cr_date',
                    'billing_products.name'
                ], 
                'billing_invoices_products',
                [['billing_invoices_products.invoice', '=', $row['id'], PDO::PARAM_INT]],
                [
                    'join/billing_products' => [['billing_products.id', '=', 'billing_invoices_products.product']]
                ],
                ['billing_invoices_products.id'],
                false,
                ['billing_invoices_products.cr_date', 'ASC']
            );
            
            $row['comments'] = [];
            
            foreach (APP::Module('DB')->Select(
                APP::Module('Comments')->settings['module_comments_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
                [
                    'comments_messages.id',
                    'comments_messages.user', 
                    'comments_messages.message', 
                    'comments_messages.up_date',
                    'users.email',
                    'users_about.value AS username'
                ], 'comments_messages',
                [
                    ['comments_messages.object_type', '=', APP::Module('DB')->Select(APP::Module('Comments')->settings['module_comments_db_connection'], ['fetchColumn', 0], ['id'], 'comments_objects', [['name', '=', "Invoice", PDO::PARAM_STR]]), PDO::PARAM_INT],
                    ['comments_messages.object_id', '=', $row['id'], PDO::PARAM_INT]
                ], 
                [
                    'left join/users' => [['comments_messages.user', '=', 'users.id']],
                    'left join/users_about' => [
                        ['users_about.user', '=', 'users.id'],
                        ['users_about.item', '=', '"username"']
                    ]
                ],
                ['comments_messages.id'], 
                false,
                ['comments_messages.up_date', 'ASC']
            ) as $comment) {
                $comment['author_name'] = $comment['username'] ? $comment['username'] : $comment['email'];
                $row['comments'][] = $comment;
            }

            array_push($rows, $row);
        }
        
        $total_amount = (int) APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], 
            ['fetch', PDO::FETCH_COLUMN], 
            ['SUM(amount)'], 'billing_invoices', 
            [['id', 'IN', $out, PDO::PARAM_INT]]
        );

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode([
            'current'       => $request['current'],
            'rowCount'      => $request['rows'],
            'rows'          => $rows,
            'total'         => count($out),
            'total_amount'  => $total_amount
        ]);
        exit;
    }
    
    public function APISearchPayments() {
        $request = json_decode(file_get_contents('php://input'), true);
        $out     = $this->PaymentsSearch(json_decode($request['search'], 1));
        $rows    = [];

        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], 
            ['fetchAll', PDO::FETCH_ASSOC], 
            [
                'billing_payments.id', 
                'billing_payments.invoice', 
                'billing_payments.method', 
                'billing_payments.cr_date',
                'billing_invoices.amount',
                'users.email AS user_email'
            ], 
            'billing_payments', 
            [
                ['billing_payments.id', 'IN', $out, PDO::PARAM_INT]
            ], 
            [
                'join/billing_invoices' => [['billing_payments.invoice', '=', 'billing_invoices.id']],
                'join/users' => [['users.id', '=', 'billing_invoices.user_id']],
            ],
            ['billing_invoices.id'],
            false,
            [$request['sort_by'], $request['sort_direction']], 
            $request['rows'] === -1 ? false : [($request['current'] - 1) * $request['rows'], $request['rows']]
        ) as $row) {
            $row['payment_id_token'] = APP::Module('Crypt')->Encode($row['id']);
            array_push($rows, $row);
        }

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode([
            'current'  => $request['current'],
            'rowCount' => $request['rows'],
            'rows'     => $rows,
            'total'    => count($out)
        ]);
        exit;
    }

    
    public function APISearchProductsAction() {
        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($this->products_actions->{$_POST['action']}($this->ProductsSearch(json_decode($_POST['rules'], 1)), isset($_POST['settings']) ? $_POST['settings'] : false));
        exit;
    }
    
    public function APISearchProductsTypesAction() {
        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($this->products_types_actions->{$_POST['action']}($this->ProductsTypesSearch(json_decode($_POST['rules'], 1)), isset($_POST['settings']) ? $_POST['settings'] : false));
        exit;
    }
    
    public function APISearchProductsGroupsAction() {
        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($this->products_groups_actions->{$_POST['action']}($this->ProductsGroupsSearch(json_decode($_POST['rules'], 1)), isset($_POST['settings']) ? $_POST['settings'] : false));
        exit;
    }
    
    public function APISearchInvoicesAction() {
        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($this->invoices_actions->{$_POST['action']}($this->InvoicesSearch(json_decode($_POST['rules'], 1)), isset($_POST['settings']) ? $_POST['settings'] : false));
        exit;
    }
    
    public function APISearchPaymentsAction() {
        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($this->payments_actions->{$_POST['action']}($this->PaymentsSearch(json_decode($_POST['rules'], 1)), isset($_POST['settings']) ? $_POST['settings'] : false));
        exit;
    }

    
    public function APIAddInvoice() {
        ini_set('max_execution_time', 3600); 
        ini_set('memory_limit', '10G');
        
        $out = [
            'status' => 'success',
            'errors' => []
        ];

        if (!isset($_POST['users'])) {
            $out['status'] = 'error';
            $out['errors'][] = 1;
        } else {
            $users = APP::Module('DB')->Select(
                APP::Module('Users')->settings['module_users_db_connection'], 
                ['fetchAll', PDO::FETCH_COLUMN], 
                ['id'], 'users', 
                [['email', 'IN', array_map(function($i) { return trim($i); }, explode("\n", $_POST['users']))]]
            );

            if (!count($users)) {
                $out['status'] = 'error';
                $out['errors'][] = 1;
            }
        }

        if ($out['status'] == 'success') {
            foreach ($users as $user_id) {
                $out['invoices'][$user_id] = $this->CreateInvoice(
                    $user_id, 
                    isset(APP::Module('Users')->user['id']) ? APP::Module('Users')->user['id'] : 0, 
                    $_POST['products'], 
                    $_POST['state'],
                    isset($_POST['comment']) ? $_POST['comment'] : false,
                    isset($_POST['date']) ? $_POST['date'] : false,
                    isset($_POST['reminder_payment']),
                    isset($_POST['notification'])
                );
            }
        }

        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        echo json_encode($out);
        exit;
    }
    
    public function APIAddProduct() {
        $out = [
            'status' => 'success',
            'errors' => []
        ];

        if ($out['status'] == 'success') {
            $members_access = [];
            $secondary_products = [];

            if (isset($_POST['members_access'])) {
                foreach ((array) $_POST['members_access'] as $item) {
                    if ($item['id']) {
                        $members_access[] = $item;
                    }
                }
            }
            
            if (isset($_POST['secondary_products'])) {
                foreach ((array) $_POST['secondary_products'] as $product) {
                    if ((int) $product['id']) {
                        $secondary_products[] = $product;
                    }
                }
            }

            $out['product_id'] = APP::Module('DB')->Insert(
                $this->settings['module_billing_db_connection'], 'billing_products', [
                    'id' => 'NULL',
                    'group_id' => $_POST['group_id'] ? [$_POST['group_id'], PDO::PARAM_INT] : 'NULL',
                    'alt_id' => $_POST['alt_id'] ? [$_POST['alt_id'], PDO::PARAM_STR] : 'NULL',
                    'name' => [$_POST['name'], PDO::PARAM_STR],
                    'description' => $_POST['description'] ? [$_POST['description'], PDO::PARAM_STR] : 'NULL',
                    'amount' => [$_POST['amount'], PDO::PARAM_INT],
                    'ignore_group' => $_POST['ignore_group'] ? [$_POST['ignore_group'], PDO::PARAM_STR] : 'NULL',
                    'ignore_products' => $_POST['ignore_products'] ? [$_POST['ignore_products'], PDO::PARAM_STR] : 'NULL',
                    'ignore_group_sell' => $_POST['ignore_group_sell'] ? [$_POST['ignore_group_sell'], PDO::PARAM_STR] : 'NULL',
                    'ignore_products_sell' => $_POST['ignore_products_sell'] ? [$_POST['ignore_products_sell'], PDO::PARAM_STR] : 'NULL',
                    'related_products' => $_POST['related_products'] ? [$_POST['related_products'], PDO::PARAM_STR] : 'NULL',
                    'members_access' => count($members_access) ? [json_encode($members_access), PDO::PARAM_STR] : 'NULL',
                    'secondary_products' => count($secondary_products) ? [json_encode($secondary_products), PDO::PARAM_STR] : 'NULL',
                    'stop_tunnels' => $_POST['stop_tunnels'] ? [$_POST['stop_tunnels'], PDO::PARAM_STR] : 'NULL',
                    'state' => [$_POST['state'], PDO::PARAM_STR],
                    'multi_sale' => [$_POST['multi_sale'], PDO::PARAM_STR],
                    'access_link' => $_POST['access_link'] ? [$_POST['access_link'], PDO::PARAM_STR] : 'NULL',
                    'descr_link' => $_POST['descr_link'] ? [$_POST['descr_link'], PDO::PARAM_STR] : 'NULL',
                    'sort_index' => [$_POST['sort_index'], PDO::PARAM_INT],
                    'sale_notify_email' => $_POST['sale_notify_email'] ? [$_POST['sale_notify_email'], PDO::PARAM_STR] : 'NULL',
                    'up_date' => 'NOW()'
                ]
            );

            APP::Module('Triggers')->Exec('add_product', [
                'id' => $out['product_id'],
                'data' => $_POST
            ]);
        }

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($out);
        exit;
    }
    
    public function APIAddProductType() {
        $out = [
            'status' => 'success',
            'errors' => []
        ];

        if ($out['status'] == 'success') {
            $out['product_type_id'] = APP::Module('DB')->Insert(
                $this->settings['module_billing_db_connection'], 'billing_products_types', [
                    'id' => 'NULL',
                    'name' => [$_POST['name'], PDO::PARAM_STR],
                    'up_date' => 'NOW()'
                ]
            );

            APP::Module('Triggers')->Exec('add_product_type', [
                'id' => $out['product_type_id'],
                'data' => $_POST
            ]);
        }

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($out);
        exit;
    }
    
    public function APIAddProductGroup() {
        $out = [
            'status' => 'success',
            'errors' => []
        ];

        if ($out['status'] == 'success') {
            $out['product_group_id'] = APP::Module('DB')->Insert(
                $this->settings['module_billing_db_connection'], 'billing_products_groups', [
                    'id' => 'NULL',
                    'name' => [$_POST['name'], PDO::PARAM_STR],
                    'descr' => $_POST['descr'] ? [$_POST['descr'], PDO::PARAM_STR] : 'NULL',
                    'ignore_group' => $_POST['ignore_group'] ? [$_POST['ignore_group'], PDO::PARAM_STR] : 'NULL',
                    'ignore_products' => $_POST['ignore_products'] ? [$_POST['ignore_products'], PDO::PARAM_STR] : 'NULL',
                    'ignore_group_sell' => $_POST['ignore_group_sell'] ? [$_POST['ignore_group_sell'], PDO::PARAM_STR] : 'NULL',
                    'ignore_products_sell' => $_POST['ignore_products_sell'] ? [$_POST['ignore_products_sell'], PDO::PARAM_STR] : 'NULL',
                    'type_id' => $_POST['type_id'] ? [$_POST['type_id'], PDO::PARAM_STR] : 'NULL',
                    'up_date' => 'NOW()'
                ]
            );

            APP::Module('Triggers')->Exec('add_product_group', [
                'id' => $out['product_group_id'],
                'data' => $_POST
            ]);
        }

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($out);
        exit;
    }
    
    
    public function APIRemoveProduct() {
        $out = [
            'status' => 'success',
            'errors' => []
        ];

        if (!APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetchColumn', 0], ['COUNT(id)'], 'billing_products', [['id', '=', $_POST['id'], PDO::PARAM_INT]]
        )) {
            $out['status']   = 'error';
            $out['errors'][] = 1;
        }

        if ($out['status'] == 'success') {
            $out['count'] = APP::Module('DB')->Delete(
                $this->settings['module_billing_db_connection'], 'billing_products', [['id', '=', $_POST['id'], PDO::PARAM_INT]]
            );

            APP::Module('Triggers')->Exec('remove_product', ['id' => $_POST['id'], 'result' => $out['count']]);
        }

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($out);
        exit;
    }
    
    public function APIRemoveProductType() {
        $out = [
            'status' => 'success',
            'errors' => []
        ];

        if (!APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetchColumn', 0], ['COUNT(id)'], 'billing_products_types', [['id', '=', $_POST['id'], PDO::PARAM_INT]]
        )) {
            $out['status']   = 'error';
            $out['errors'][] = 1;
        }

        if ($out['status'] == 'success') {
            $out['count'] = APP::Module('DB')->Delete(
                $this->settings['module_billing_db_connection'], 'billing_products_types', [['id', '=', $_POST['id'], PDO::PARAM_INT]]
            );

            APP::Module('Triggers')->Exec('remove_product_type', ['id' => $_POST['id'], 'result' => $out['count']]);
        }

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($out);
        exit;
    }
    
    public function APIRemoveProductGroup() {
        $out = [
            'status' => 'success',
            'errors' => []
        ];

        if (!APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetchColumn', 0], ['COUNT(id)'], 'billing_products_groups', [['id', '=', $_POST['id'], PDO::PARAM_INT]]
        )) {
            $out['status']   = 'error';
            $out['errors'][] = 1;
        }

        if ($out['status'] == 'success') {
            $out['count'] = APP::Module('DB')->Delete(
                $this->settings['module_billing_db_connection'], 'billing_products_groups', [['id', '=', $_POST['id'], PDO::PARAM_INT]]
            );

            APP::Module('Triggers')->Exec('remove_product_group', ['id' => $_POST['id'], 'result' => $out['count']]);
        }

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($out);
        exit;
    }

    
    public function APIUpdateProduct() {
        $out = [
            'status' => 'success',
            'errors' => []
        ];

        $product_id = APP::Module('Crypt')->Decode($_POST['id']);

        if (!APP::Module('DB')->Select($this->settings['module_billing_db_connection'], ['fetchColumn', 0], ['COUNT(id)'], 'billing_products', [['id', '=', $product_id, PDO::PARAM_INT]])) {
            $out['status']   = 'error';
            $out['errors'][] = 1;
        }

        if ($out['status'] == 'success') {
            APP::Module('DB')->Update($this->settings['module_billing_db_connection'], 'billing_products',
                [
                    'group_id' => $_POST['group_id'],
                    'alt_id' => $_POST['alt_id'],
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'amount' => $_POST['amount'],
                    'ignore_group' => $_POST['ignore_group'],
                    'ignore_products' => $_POST['ignore_products'],
                    'ignore_group_sell' => $_POST['ignore_group_sell'],
                    'ignore_products_sell' => $_POST['ignore_products_sell'],
                    'related_products' => $_POST['related_products'],
                    'members_access' => isset($_POST['members_access']) ? json_encode(array_values($_POST['members_access'])) : NULL,
                    'secondary_products' => isset($_POST['secondary_products']) ? json_encode(array_values($_POST['secondary_products'])) : NULL,
                    'stop_tunnels' => $_POST['stop_tunnels'],
                    'state' => $_POST['state'],
                    'multi_sale' => $_POST['multi_sale'],
                    'access_link' => $_POST['access_link'],
                    'descr_link' => $_POST['descr_link'],
                    'sort_index' => $_POST['sort_index'],
                    'sale_notify_email' => $_POST['sale_notify_email']
                ],
                [['id', '=', $product_id, PDO::PARAM_INT]]
            );

            APP::Module('Triggers')->Exec('update_product', [
                'id'  => $product_id,
                'data' => $_POST
            ]);
        }

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($out);
        exit;
    }
    
    public function APIUpdateProductType() {
        $out = [
            'status' => 'success',
            'errors' => []
        ];

        $product_type_id = APP::Module('Crypt')->Decode($_POST['id']);

        if (!APP::Module('DB')->Select($this->settings['module_billing_db_connection'], ['fetchColumn', 0], ['COUNT(id)'], 'billing_products_types', [['id', '=', $product_type_id, PDO::PARAM_INT]])) {
            $out['status']   = 'error';
            $out['errors'][] = 1;
        }

        if ($out['status'] == 'success') {
            APP::Module('DB')->Update($this->settings['module_billing_db_connection'], 'billing_products_types',
                [
                    'name' => $_POST['name'],
                ],
                [['id', '=', $product_type_id, PDO::PARAM_INT]]
            );

            APP::Module('Triggers')->Exec('update_product_type', [
                'id'  => $product_type_id,
                'name' => $_POST['name'],
            ]);
        }

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($out);
        exit;
    }
    
    public function APIUpdateProductGroup() {
        $out = [
            'status' => 'success',
            'errors' => []
        ];

        $product_group_id = APP::Module('Crypt')->Decode($_POST['id']);

        if (!APP::Module('DB')->Select($this->settings['module_billing_db_connection'], ['fetchColumn', 0], ['COUNT(id)'], 'billing_products_groups', [['id', '=', $product_group_id, PDO::PARAM_INT]])) {
            $out['status']   = 'error';
            $out['errors'][] = 1;
        }

        if ($out['status'] == 'success') {
            APP::Module('DB')->Update($this->settings['module_billing_db_connection'], 'billing_products_groups',
                [
                    'name' => $_POST['name'],
                    'descr' => $_POST['descr'],
                    'ignore_group' => $_POST['ignore_group'],
                    'ignore_products' => $_POST['ignore_products'],
                    'ignore_group_sell' => $_POST['ignore_group_sell'],
                    'ignore_products_sell' => $_POST['ignore_products_sell'],
                    'type_id' => $_POST['type_id']
                ],
                [['id', '=', $product_group_id, PDO::PARAM_INT]]
            );

            APP::Module('Triggers')->Exec('update_product_group', [
                'id'  => $product_group_id,
                'name' => $_POST['name'],
            ]);
        }

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($out);
        exit;
    }
    
    
    public function APIUserSuggestProducts() {
        $in = json_decode(file_get_contents('php://input'), true);

        $out = $this->SuggestProducts(
            isset($in['user_id']) ? $in['user_id'] : 0, 
            isset($in['products']) ? $in['products'] : [], 
            isset($in['ignore']) ? $in['ignore'] : []
        );

        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        echo json_encode($out);
        exit;
    }

    
    public function APIUpdateSettings() {
        if(isset($_POST['module_billing_sales_tool_tunnel'])){
            foreach($_POST['module_billing_sales_tool_tunnel'] as $key => $tunnel){
                $sale[$tunnel] = explode(',', $_POST['module_billing_sales_tool_product'][$key]);
            }

            APP::Module('Registry')->Update(['value' => json_encode($sale)], [['item', '=', 'module_billing_sales_tool', PDO::PARAM_STR]]);
        }

        APP::Module('Registry')->Update(['value' => $_POST['module_billing_db_connection']], [['item', '=', 'module_billing_db_connection', PDO::PARAM_STR]]);

        APP::Module('Triggers')->Exec('update_billing_settings', [
            'db_connection' => $_POST['module_billing_db_connection']
        ]);

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode([
            'status' => 'success',
            'errors' => []
        ]);
        exit;
    }

    public function AddRelatedProducts($user_id, $products) {
        $out['access_id'] = [];

        foreach ($products as $product) {
            $out['access_id'][] = APP::Module('DB')->Insert(
                APP::Module('Members')->settings['module_members_db_connection'], 'related_products', Array(
                    'id'         => 'NULL',
                    'user_id'    => [$user_id, PDO::PARAM_INT],
                    'product_id' => [$product, PDO::PARAM_STR]
                )
            );
        }

        APP::Module('Triggers')->Exec('add_related_products', [
            'user_id'  => $user_id,
            'products' => $products
        ]);

        return $out;
    }

    public function EditInvoice() {
        $invoice_id = APP::Module('Crypt')->Decode(APP::Module('Routing')->get['invoice_id_hash']);

        $products_counter = 0;

        // Формирование списка продуктов
        $products_list = Array();

        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], ['name', 'amount', 'id'], 'billing_products'
        ) as $product) {
            $products_list[$product['id']] = [
                'name'   => '[' . $product['id'] . '] ' . $product['name'],
                'amount' => $product['amount']
            ];
        }

        $products = APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], ['product', 'amount', 'id'], 'billing_invoices_products', [['invoice', '=', $invoice_id, PDO::PARAM_INT]]
        );

        // Получение кол-ва продуктов в счете
        $products_counter = APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_COLUMN], ['count(*)'], 'billing_invoices_products'
        );

        APP::Render(
            'billing/admin/invoices/edit', 
            'include', 
            [
                'invoice' => [
                    // Информация о счете
                    'main'     => APP::Module('DB')->Select(
                        $this->settings['module_billing_db_connection'],['fetch', PDO::FETCH_ASSOC],
                        ['users.email','billing_invoices.user_id', 'billing_invoices.state', 'billing_invoices.amount', 'billing_invoices.id', 'UNIX_TIMESTAMP(billing_invoices.up_date) as up_date', 'UNIX_TIMESTAMP(billing_invoices.cr_date) as cr_date'],
                        'billing_invoices', [['billing_invoices.id', '=', $invoice_id, PDO::PARAM_INT]],['join/users'=>[['users.id','=','billing_invoices.user_id']]]
                    ),
                    // Список продуктов счета
                    'products' => $products
                ],
                // Список продуктов
                'products_list' => $products_list,
                // Счетчики
                'counters'      => [
                    'products' => count($products)
                ]
            ]
        );
    }

    
    public function APIUpdateInvoice() {
        $out = [
            'status'     => 'success',
            'errors'     => [],
            'invoice'    => $_POST['invoice']['id']
        ];

        if (!APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetchColumn', 0], ['COUNT(id)'], 'billing_invoices', [['id', '=', $_POST['invoice']['id'], PDO::PARAM_INT]]
        )) {
            $out['status']   = 'error';
            $out['errors'][] = 1;
        }

        // Calculate invoice amount
        $amount = 0;

        foreach ((array) $_POST['invoice']['products'] as $product) {
            $amount += (int) $product[1];
        }
        
        // Update invoice
        APP::Module('DB')->Update($this->settings['module_billing_db_connection'],
            'billing_invoices',
            [
                'amount'  => $amount,
                'state'   => $_POST['invoice']['state'],
                'up_date' => date('Y-m-d H:i:s')
            ], 
            [['id', '=', $_POST['invoice']['id'], PDO::PARAM_INT]]
        );

        // Remove invoice products
        APP::Module('DB')->Delete(
            $this->settings['module_billing_db_connection'], 'billing_invoices_products', [['invoice', '=', $_POST['invoice']['id'], PDO::PARAM_INT]]
        );

        // Insert invoice products
        foreach ($_POST['invoice']['products'] as $product) {
            APP::Module('DB')->Insert(
                $this->settings['module_billing_db_connection'], 'billing_invoices_products', Array(
                    'id'            => 'NULL',
                    'invoice'       => [$_POST['invoice']['id'], PDO::PARAM_INT],
                    'type'          => ['primary', PDO::PARAM_STR],
                    'product'       => [$product[0], PDO::PARAM_INT],
                    'amount'        => [$product[1], PDO::PARAM_INT],
                    'cr_date'       => 'NOW()'
                )
            );
        }

        // Сохранение истории
        $data = [
            'state'      => $_POST['invoice']['state'],
            'amount'     => $amount,
            'products'   => isset($_POST['invoice']['products']) ? $_POST['invoice']['products'] : [],
            'invoice'    => $_POST['invoice']['id']
        ];

        APP::Module('DB')->Insert(
            $this->settings['module_billing_db_connection'], 'billing_invoices_tag', Array(
                'id'          => 'NULL',
                'invoice'     => [$_POST['invoice']['id'], PDO::PARAM_INT],
                'action'      => ['update_invoice', PDO::PARAM_STR],
                'action_data' => [json_encode($data), PDO::PARAM_STR],
                'cr_date'     => 'NOW()'
            )
        );

        APP::Module('Triggers')->Exec('update_invoice', $data);

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($out);
        exit;
    }
    
    public function APIRemoveInvoice() {
        $out = [
            'status' => 'success',
            'errors' => []
        ];

        if (!APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetchColumn', 0], ['COUNT(id)'], 'billing_invoices', [['id', '=', $_POST['id'], PDO::PARAM_INT]]
        )) {
            $out['status']   = 'error';
            $out['errors'][] = 1;
        }

        if ($out['status'] == 'success') {
            $invoice = APP::Module('DB')->Select(
                $this->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_ASSOC],
                ['*'], 'billing_invoices',
                [['id', '=', $_POST['id'], PDO::PARAM_INT]]
            );

            $payments = [];

            foreach (APP::Module('DB')->Select(
                $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                [
                    'id', 
                    'invoice',
                    'method',
                    'cr_date'
                ], 
                'billing_payments',
                [['invoice', '=', $_POST['id'], PDO::PARAM_INT]]
            ) as $payment) {
                $payments[] = [
                    'id' => $payment['id'],
                    'invoice' => $payment['invoice'],
                    'method' => $payment['method'],
                    'cr_date' => $payment['cr_date'],
                    'details' => APP::Module('DB')->Select(
                        $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                        ['*'], 'billing_payments_details',
                        [['payment', '=', $payment['id'], PDO::PARAM_INT]]
                    )
                ];
            }
            
            APP::Module('Triggers')->Exec('remove_invoice_before', [
                'id' => $invoice['id'],
                'invoice' => $invoice,
                'details' => APP::Module('DB')->Select(
                    $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                    ['*'], 'billing_invoices_details',
                    [['invoice', '=', $_POST['id'], PDO::PARAM_INT]]
                ),
                'products' => APP::Module('DB')->Select(
                    $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                    ['*'], 'billing_invoices_products',
                    [['invoice', '=', $_POST['id'], PDO::PARAM_INT]]
                ),
                'products_access' => APP::Module('DB')->Select(
                    $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                    ['*'], 'billing_products_access',
                    [['invoice', '=', $_POST['id'], PDO::PARAM_INT]]
                ),
                'tags' => APP::Module('DB')->Select(
                    $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                    ['*'], 'billing_invoices_tag',
                    [['invoice', '=', $_POST['id'], PDO::PARAM_INT]]
                ),
                'labels' => APP::Module('DB')->Select(
                    $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                    ['*'], 'billing_invoices_labels',
                    [['invoice', '=', $_POST['id'], PDO::PARAM_INT]]
                ),
                'payments' => $payments,
                'comments' => APP::Module('DB')->Select(
                    APP::Module('Comments')->settings['module_comments_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
                    ['*'], 'comments_messages',
                    [
                        ['object_type', '=', APP::Module('DB')->Select(APP::Module('Comments')->settings['module_comments_db_connection'], ['fetchColumn', 0], ['id'], 'comments_objects', [['name', '=', "Invoice", PDO::PARAM_STR]]), PDO::PARAM_INT],
                        ['object_id', '=', $_POST['id'], PDO::PARAM_INT]
                    ]
                )
            ]);
            
            $out['count'] = APP::Module('DB')->Delete(
                $this->settings['module_billing_db_connection'], 'billing_invoices', 
                [['id', '=', $_POST['id'], PDO::PARAM_INT]]
            );
            
            APP::Module('DB')->Delete(
                APP::Module('Comments')->settings['module_comments_db_connection'], 'comments_messages', 
                [
                    ['object_type', '=', APP::Module('DB')->Select(APP::Module('Comments')->settings['module_comments_db_connection'], ['fetchColumn', 0], ['id'], 'comments_objects', [['name', '=', "Invoice", PDO::PARAM_STR]]), PDO::PARAM_INT],
                    ['object_id', '=', $_POST['id'], PDO::PARAM_INT]
                ]
            );

            APP::Module('Triggers')->Exec('remove_invoice_after', ['id' => $_POST['id'], 'result' => $out['count']]);
        }

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($out);
        exit;
    }
    
    public function APIRevokeInvoice() {
        $out = [
            'status' => 'success',
            'errors' => []
        ];

        if (!APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'], ['fetchColumn', 0], ['COUNT(id)'], 'billing_invoices', [['id', '=', $_POST['id'], PDO::PARAM_INT]]
        )) {
            $out['status']   = 'error';
            $out['errors'][] = 1;
        }

        if ($out['status'] == 'success') {
            $out['result'] = APP::Module('DB')->Update(
                $this->settings['module_billing_db_connection'], 
                'billing_invoices',
                [
                    'state' => 'revoked'
                ],
                [
                    ['id', '=', $_POST['id'], PDO::PARAM_INT]
                ]
            );

            // Удаление меток счета
            APP::Module('DB')->Delete(
                $this->settings['module_billing_db_connection'], 'billing_invoices_labels',
                [
                    ['invoice', '=', $_POST['id'], PDO::PARAM_INT]
                ]
            );

            APP::Module('Triggers')->Exec('cancel_invoice', ['id' => $_POST['id'], 'result' => $out['result']]);
        }

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($out);
        exit;
    }
    
    public function APIPayInvoice() {
        $out = [
            'status' => 'success',
            'errors' => []
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, APP::Module('Routing')->root . 'billing/payments/operators/admin/manually');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt(
            $ch, 
            CURLOPT_POSTFIELDS, 
            http_build_query(
                [
                    'invoice_id' => $_POST['invoice_id'],
                    'notification' => $_POST['notification']
                ]
            )
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($out);
        exit;
    }

    public function APIInvoiceDetails() {
        $invoice = APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_ASSOC],
            [
                'billing_invoices.id', 
                'billing_invoices.user_id', 
                'billing_invoices.amount', 
                'billing_invoices.state', 
                'billing_invoices.author',
                'billing_invoices.up_date',
                'billing_invoices.cr_date',
                'billing_invoices.amount', 
                'users.email'
            ],
            'billing_invoices',
            [
                ['billing_invoices.id', '=', $_POST['invoice'], PDO::PARAM_INT]
            ],
            [
                'left join/users' => [
                    ['users.id', '=', 'billing_invoices.user_id']
                ]
            ]
        );
        
        $invoice['id_hash'] = APP::Module('Crypt')->Encode($invoice['id']);
        
        $author_email = APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], 
            ['fetch', PDO::FETCH_COLUMN], 
            [
                'email'
            ], 
            'users', 
            [
                ['id', '=', $invoice['author'], PDO::PARAM_INT]
            ]
        );

        $author_username = APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], 
            ['fetch', PDO::FETCH_COLUMN], 
            [
                'value'
            ], 
            'users_about', 
            [
                ['user', '=', $invoice['author'], PDO::PARAM_INT],
                ['item', '=', 'username', PDO::PARAM_STR]
            ]
        );

        $invoice['author_name'] = $author_username ? $author_username : $author_email;
        
        $payments = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
            [
                'id', 
                'method',
                'cr_date'
            ], 
            'billing_payments',
            [['invoice', '=', $_POST['invoice'], PDO::PARAM_INT]]
        ) as $payment) {
            $payments[] = [
                'id' => $payment['id'],
                'method' => $payment['method'],
                'cr_date' => $payment['cr_date'],
                'details' => APP::Module('DB')->Select(
                    APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                    [
                        'item', 
                        'value'
                    ], 
                    'billing_payments_details',
                    [['payment', '=', $payment['id'], PDO::PARAM_INT]]
                )
            ];
        }
        
        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode([
            'invoice' => $invoice,
            'details' => APP::Module('DB')->Select(
                APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                [
                    'id', 
                    'item', 
                    'value'
                ], 
                'billing_invoices_details',
                [['invoice', '=', $_POST['invoice'], PDO::PARAM_INT]]
            ),
            'products' => APP::Module('DB')->Select(
                APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                [
                    'billing_invoices_products.id', 
                    'billing_invoices_products.type', 
                    'billing_invoices_products.product',
                    'billing_invoices_products.amount',
                    'billing_invoices_products.cr_date',

                    'billing_products.name'
                ], 
                'billing_invoices_products',
                [['billing_invoices_products.invoice', '=', $_POST['invoice'], PDO::PARAM_INT]],
                [
                    'join/billing_products' => [['billing_products.id', '=', 'billing_invoices_products.product']]
                ],
                ['billing_invoices_products.id'],
                false,
                ['billing_invoices_products.cr_date', 'ASC']
            ),
            'products_access' => APP::Module('DB')->Select(
                APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN],
                [
                    'product'
                ], 
                'billing_products_access',
                [['invoice', '=', $_POST['invoice'], PDO::PARAM_INT]]
            ),
            'tags' => APP::Module('DB')->Select(
                APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                [
                    'id', 
                    'action', 
                    'action_data',
                    'cr_date'
                ], 
                'billing_invoices_tag',
                [['invoice', '=', $_POST['invoice'], PDO::PARAM_INT]]
            ),
            'labels' => APP::Module('DB')->Select(
                APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                [
                    'id', 
                    'label_id', 
                    'cr_date',
                    'st_date'
                ], 
                'billing_invoices_labels',
                [['invoice', '=', $_POST['invoice'], PDO::PARAM_INT]]
            ),
            'payments' => $payments,
            'comments' => APP::Module('DB')->Select(
                APP::Module('Comments')->settings['module_comments_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
                [
                    'comments_messages.id',
                    'comments_messages.user', 
                    'comments_messages.message', 
                    'comments_messages.up_date',
                    'users.email',
                    'users_about.value AS username'
                ], 'comments_messages',
                [
                    ['comments_messages.object_type', '=', APP::Module('DB')->Select(APP::Module('Comments')->settings['module_comments_db_connection'], ['fetchColumn', 0], ['id'], 'comments_objects', [['name', '=', "Invoice", PDO::PARAM_STR]]), PDO::PARAM_INT],
                    ['comments_messages.object_id', '=', $_POST['invoice'], PDO::PARAM_INT]
                ], 
                [
                    'left join/users' => [['comments_messages.user', '=', 'users.id']],
                    'left join/users_about' => [
                        ['users_about.user', '=', 'users.id'],
                        ['users_about.item', '=', '"username"']
                    ]
                ],
                ['comments_messages.id'], 
                false,
                ['comments_messages.up_date', 'ASC']
            )
        ]);
        exit;
    }
    
    public function APIUpdateInvoicesDetails() {
        $out = [
            'status' => 'success',
            'errors' => [],
            'details' => []
        ];

        if (isset($_POST['lastname'])) {
            APP::Module('DB')->Delete(
                $this->settings['module_billing_db_connection'], 'billing_invoices_details',
                [
                    ['invoice', '=', $_POST['invoice_id'], PDO::PARAM_INT],
                    ['item', '=', 'lastname', PDO::PARAM_STR]
                ]
            );
            
            APP::Module('DB')->Insert(
                $this->settings['module_billing_db_connection'], 'billing_invoices_details', [
                    'id' => 'NULL',
                    'invoice' => [$_POST['invoice_id'], PDO::PARAM_INT],
                    'item' => ['lastname', PDO::PARAM_STR],
                    'value' => [$_POST['lastname'], PDO::PARAM_STR]
                ]
            );
            
            $out['details']['lastname'] = $_POST['lastname'];
        }

        if (isset($_POST['firstname'])) {
            APP::Module('DB')->Delete(
                $this->settings['module_billing_db_connection'], 'billing_invoices_details',
                [
                    ['invoice', '=', $_POST['invoice_id'], PDO::PARAM_INT],
                    ['item', '=', 'firstname', PDO::PARAM_STR]
                ]
            );
            
            APP::Module('DB')->Insert(
                $this->settings['module_billing_db_connection'], 'billing_invoices_details', [
                    'id' => 'NULL',
                    'invoice' => [$_POST['invoice_id'], PDO::PARAM_INT],
                    'item' => ['firstname', PDO::PARAM_STR],
                    'value' => [$_POST['firstname'], PDO::PARAM_STR]
                ]
            );
            
            $out['details']['firstname'] = $_POST['firstname'];
        }

        if (isset($_POST['tel'])) {
            APP::Module('DB')->Delete(
                $this->settings['module_billing_db_connection'], 'billing_invoices_details',
                [
                    ['invoice', '=', $_POST['invoice_id'], PDO::PARAM_INT],
                    ['item', '=', 'tel', PDO::PARAM_STR]
                ]
            );
            
            APP::Module('DB')->Insert(
                $this->settings['module_billing_db_connection'], 'billing_invoices_details', [
                    'id' => 'NULL',
                    'invoice' => [$_POST['invoice_id'], PDO::PARAM_INT],
                    'item' => ['tel', PDO::PARAM_STR],
                    'value' => [$_POST['tel'], PDO::PARAM_STR]
                ]
            );
            
            $out['details']['tel'] = $_POST['tel'];
        }

        if (isset($_POST['email'])) {
            APP::Module('DB')->Delete(
                $this->settings['module_billing_db_connection'], 'billing_invoices_details',
                [
                    ['invoice', '=', $_POST['invoice_id'], PDO::PARAM_INT],
                    ['item', '=', 'email', PDO::PARAM_STR]
                ]
            );
            
            APP::Module('DB')->Insert(
                $this->settings['module_billing_db_connection'], 'billing_invoices_details', [
                    'id' => 'NULL',
                    'invoice' => [$_POST['invoice_id'], PDO::PARAM_INT],
                    'item' => ['email', PDO::PARAM_STR],
                    'value' => [$_POST['email'], PDO::PARAM_STR]
                ]
            );
            
            $out['details']['email'] = $_POST['email'];
        }

        if (isset($_POST['comment'])) {
            APP::Module('DB')->Delete(
                $this->settings['module_billing_db_connection'], 'billing_invoices_details',
                [
                    ['invoice', '=', $_POST['invoice_id'], PDO::PARAM_INT],
                    ['item', '=', 'comment', PDO::PARAM_STR]
                ]
            );
            
            APP::Module('DB')->Insert(
                $this->settings['module_billing_db_connection'], 'billing_invoices_details', [
                    'id' => 'NULL',
                    'invoice' => [$_POST['invoice_id'], PDO::PARAM_INT],
                    'item' => ['comment', PDO::PARAM_STR],
                    'value' => [$_POST['comment'], PDO::PARAM_STR]
                ]
            );
            
            $out['details']['comment'] = $_POST['comment'];
        }

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($out);
        exit;
    }
    
    
    public function APIUpdateInvoiceLabels() {
        $out = [
            'status' => 'success',
            'labels' => []
        ];

        APP::Module('DB')->Delete(
            $this->settings['module_billing_db_connection'], 'billing_invoices_labels',
            [
                ['invoice', '=', $_POST['invoice'], PDO::PARAM_INT]
            ]
        );

        if (isset($_POST['labels'])) {
            foreach ($_POST['labels'] as $index => $label) {
                $out['labels'][$index] = APP::Module('DB')->Insert(
                    $this->settings['module_billing_db_connection'], 'billing_invoices_labels', [
                        'id' => 'NULL',
                        'invoice' => [$_POST['invoice'], PDO::PARAM_INT],
                        'label_id' => [$label['id'], PDO::PARAM_STR],
                        'cr_date' => 'CURRENT_TIMESTAMP',
                        'st_date' => [$label['date'], PDO::PARAM_STR]
                    ]
                );
            }
        }

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($out);
        exit;
    }
    
    
    public function APIInvoiceAddComment() {
        $out = [
            'status' => 'success',
            'labels' => []
        ];

        if ($_POST['message']) {
            $out['id'] = APP::Module('DB')->Insert(
                APP::Module('Comments')->settings['module_comments_db_connection'], 'comments_messages', [
                    'id' => 'NULL',
                    'sub_id' => [0, PDO::PARAM_INT],
                    'user' => [APP::Module('Users')->user['id'], PDO::PARAM_INT],
                    'object_type' => [APP::Module('DB')->Select(APP::Module('Comments')->settings['module_comments_db_connection'], ['fetchColumn', 0], ['id'], 'comments_objects', [['name', '=', "Invoice", PDO::PARAM_STR]]), PDO::PARAM_INT],
                    'object_id' => [$_POST['invoice'], PDO::PARAM_INT],
                    'message' => [$_POST['message'], PDO::PARAM_STR],
                    'url' => [APP::Module('Routing')->root . 'admin/billing/invoices/details/' . APP::Module('Crypt')->Encode($_POST['invoice']), PDO::PARAM_STR],
                    'up_date' => 'CURRENT_TIMESTAMP'
                ]
            );
        }

        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');

        echo json_encode($out);
        exit;
    }

    
    public function PaymentMake() {
        $invoice_id = APP::Module('Crypt')->Decode(APP::Module('Routing')->get['invoice_id_hash']);
        
        $data = [
            'invoice' => APP::Module('DB')->Select(
                $this->settings['module_billing_db_connection'],
                ['fetch', PDO::FETCH_ASSOC],
                [
                    'billing_invoices.id', 
                    'billing_invoices.user_id',
                    'billing_invoices.amount', 
                    'users.email'
                ],
                'billing_invoices',
                [
                    ['billing_invoices.id', '=', $invoice_id, PDO::PARAM_INT]
                ],
                [
                    'left join/users' => [
                        ['users.id', '=', 'billing_invoices.user_id']
                    ]
                ]
            ),
            'products' => APP::Module('DB')->Select(
                $this->settings['module_billing_db_connection'],
                ['fetchAll', PDO::FETCH_ASSOC],
                [
                    'billing_invoices_products.amount',
                    'billing_products.name',
                ],
                'billing_invoices_products',
                [
                    ['billing_invoices_products.invoice', '=', $invoice_id, PDO::PARAM_INT]
                ],
                [
                    'left join/billing_products' => [
                        ['billing_invoices_products.product', '=', 'billing_products.id']
                    ]
                ],
                ['billing_invoices_products.id']
            )
        ];
        
        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'],
            ['fetchAll', PDO::FETCH_ASSOC],
            [
                'billing_invoices_details.item',
                'billing_invoices_details.value',
            ],
            'billing_invoices_details',
            [
                ['billing_invoices_details.invoice', '=', $invoice_id, PDO::PARAM_INT]
            ]
        ) as $value) {
            $data['invoice_details'][$value['item']] = $value['value'];
        }
        
        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'],
            ['fetchAll', PDO::FETCH_ASSOC],
            [
                'billing_currency.code',
                'billing_currency.value',
            ],
            'billing_currency'
        ) as $value) {
            $data['currency'][$value['code']] = $value['value'];
        }

        APP::Render('billing/payments/make', 'include', $data);
    }
    
    public function PaymentSuccess() {
        $invoice_id = APP::Module('Crypt')->Decode(APP::Module('Routing')->get['invoice_id_hash']);
        
        $data = [
            'invoice' => APP::Module('DB')->Select(
                $this->settings['module_billing_db_connection'],
                ['fetch', PDO::FETCH_ASSOC],
                [
                    'billing_invoices.id', 
                    'billing_invoices.user_id',
                    'billing_invoices.amount', 
                    'users.email'
                ],
                'billing_invoices',
                [
                    ['billing_invoices.id', '=', $invoice_id, PDO::PARAM_INT]
                ],
                [
                    'left join/users' => [
                        ['users.id', '=', 'billing_invoices.user_id']
                    ]
                ]
            ),
            'products' => APP::Module('DB')->Select(
                $this->settings['module_billing_db_connection'],
                ['fetchAll', PDO::FETCH_ASSOC],
                [
                    'billing_invoices_products.amount',
                    'billing_products.name',
                ],
                'billing_invoices_products',
                [
                    ['billing_invoices_products.invoice', '=', $invoice_id, PDO::PARAM_INT]
                ],
                [
                    'left join/billing_products' => [
                        ['billing_invoices_products.product', '=', 'billing_products.id']
                    ]
                ],
                ['billing_invoices_products.id']
            )
        ];
        
        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'],
            ['fetchAll', PDO::FETCH_ASSOC],
            [
                'billing_invoices_details.item',
                'billing_invoices_details.value',
            ],
            'billing_invoices_details',
            [
                ['billing_invoices_details.invoice', '=', $invoice_id, PDO::PARAM_INT]
            ]
        ) as $value) {
            $data['invoice_details'][$value['item']] = $value['value'];
        }
        
        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'],
            ['fetchAll', PDO::FETCH_ASSOC],
            [
                'billing_currency.code',
                'billing_currency.value',
            ],
            'billing_currency'
        ) as $value) {
            $data['currency'][$value['code']] = $value['value'];
        }

        APP::Render('billing/payments/success', 'include', $data);
    }
    
    public function PaymentFail() {
        $invoice_id = APP::Module('Crypt')->Decode(APP::Module('Routing')->get['invoice_id_hash']);
        
        $data = [
            'invoice' => APP::Module('DB')->Select(
                $this->settings['module_billing_db_connection'],
                ['fetch', PDO::FETCH_ASSOC],
                [
                    'billing_invoices.id', 
                    'billing_invoices.user_id',
                    'billing_invoices.amount', 
                    'users.email'
                ],
                'billing_invoices',
                [
                    ['billing_invoices.id', '=', $invoice_id, PDO::PARAM_INT]
                ],
                [
                    'left join/users' => [
                        ['users.id', '=', 'billing_invoices.user_id']
                    ]
                ]
            ),
            'products' => APP::Module('DB')->Select(
                $this->settings['module_billing_db_connection'],
                ['fetchAll', PDO::FETCH_ASSOC],
                [
                    'billing_invoices_products.amount',
                    'billing_products.name',
                ],
                'billing_invoices_products',
                [
                    ['billing_invoices_products.invoice', '=', $invoice_id, PDO::PARAM_INT]
                ],
                [
                    'left join/billing_products' => [
                        ['billing_invoices_products.product', '=', 'billing_products.id']
                    ]
                ],
                ['billing_invoices_products.id']
            )
        ];
        
        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'],
            ['fetchAll', PDO::FETCH_ASSOC],
            [
                'billing_invoices_details.item',
                'billing_invoices_details.value',
            ],
            'billing_invoices_details',
            [
                ['billing_invoices_details.invoice', '=', $invoice_id, PDO::PARAM_INT]
            ]
        ) as $value) {
            $data['invoice_details'][$value['item']] = $value['value'];
        }
        
        foreach (APP::Module('DB')->Select(
            $this->settings['module_billing_db_connection'],
            ['fetchAll', PDO::FETCH_ASSOC],
            [
                'billing_currency.code',
                'billing_currency.value',
            ],
            'billing_currency'
        ) as $value) {
            $data['currency'][$value['code']] = $value['value'];
        }

        APP::Render('billing/payments/fail', 'include', $data);
    }
    
    public function PaymentOperator() {
        $operator_id = APP::Module('Routing')->get['operator_id'];
        $method_id = APP::Module('Routing')->get['method_id'];
        
        switch ($operator_id) {
            case 'admin':
                switch ($method_id) {
                    case 'manually':
                        $invoice_id = (int) $_POST['invoice_id'];
                
                        // Получение информации по счету
                        $invoice = APP::Module('DB')->Select(
                            $this->settings['module_billing_db_connection'],
                            ['fetch', PDO::FETCH_ASSOC],
                            [
                                'billing_invoices.amount', 
                                'billing_invoices.state',
                                'billing_invoices.amount', 
                                'users.id AS user_id',
                                'users.email'
                            ],
                            'billing_invoices',
                            [
                                ['billing_invoices.id', '=', $invoice_id, PDO::PARAM_INT]
                            ],
                            [
                                'left join/users' => [
                                    ['users.id', '=', 'billing_invoices.user_id']
                                ]
                            ]
                        );

                        // Получение информации по продуктам счета
                        $invoice_products = APP::Module('DB')->Select(
                            $this->settings['module_billing_db_connection'],
                            ['fetchAll', PDO::FETCH_ASSOC],
                            [
                                'billing_invoices_products.product AS id',
                                'billing_invoices_products.amount',
                                'billing_products.access_link',
                                'billing_products.name',
                                'billing_products.alt_id',
                                'billing_products.amount AS real_amount',
                                'billing_products.stop_tunnels',
                                'billing_products.members_access',
                                'billing_products.sale_notify_email'
                            ],
                            'billing_invoices_products',
                            [
                                ['billing_invoices_products.invoice', '=', $invoice_id, PDO::PARAM_INT]
                            ],
                            [
                                'left join/billing_products' => [
                                    ['billing_invoices_products.product', '=', 'billing_products.id']
                                ]
                            ],
                            ['billing_invoices_products.id']
                        );

                        // Сохранение данных о платеже
                        $payment_id = APP::Module('DB')->Insert(
                            $this->settings['module_billing_db_connection'], 'billing_payments', [
                                'id' => 'NULL',
                                'invoice' => [$invoice_id, PDO::PARAM_INT],
                                'method' => [$operator_id, PDO::PARAM_STR],
                                'cr_date' => 'NOW()'
                            ]
                        );

                        foreach ($_POST as $item => $value) {
                            APP::Module('DB')->Insert(
                                $this->settings['module_billing_db_connection'], 'billing_payments_details', [
                                    'id' => 'NULL',
                                    'payment' => [$payment_id, PDO::PARAM_INT],
                                    'item' => [$item, PDO::PARAM_STR],
                                    'value' => [$value, PDO::PARAM_STR],
                                ]
                            );
                        }

                        if ($invoice['amount']) {

                            // Отправка уведомления
                            foreach ($invoice_products as $product) {
                                foreach ((array) explode(' ', $product['sale_notify_email']) as $value) {
                                    $sale_notify_email = trim($value);

                                    if ($sale_notify_email) {
                                        APP::Module('Mail')->Send($sale_notify_email, 694, [
                                            'invoice_id_hash' => APP::Module('Crypt')->Encode($invoice_id),
                                            'invoice_id' => $invoice_id,
                                            'amount' => $invoice['amount'],
                                            'product_name' => $product['name'],
                                            'user_id' => $invoice['user_id'],
                                            'user_email' => $invoice['email']
                                        ], true, 'billing');
                                        break;
                                    }
                                }
                            }

                            APP::Module('Triggers')->Exec('payment', [
                                'invoice' => $invoice_id,
                                'amount' => $invoice['amount'],
                                'products' => $invoice_products
                            ]);
                        }

                        // Обновление статуса счета
                        APP::Module('DB')->Update(
                            $this->settings['module_billing_db_connection'], 
                            'billing_invoices',
                            [
                                'state' => 'success'
                            ],
                            [
                                ['id', '=', $invoice_id, PDO::PARAM_INT]
                            ]
                        );

                        // Удаление меток счета
                        APP::Module('DB')->Delete(
                            $this->settings['module_billing_db_connection'], 'billing_invoices_labels',
                            [
                                ['invoice', '=', $invoice_id, PDO::PARAM_INT]
                            ]
                        );

                        // Остановка туннелей
                        foreach ($invoice_products as $product) {
                            if ($product['stop_tunnels']) {
                                $this->CompleteUserTunnels($invoice['user_id'], (array) explode(',', $product['stop_tunnels']));
                            }
                        }

                        // Открытие доступа (мемберка)
                        $this->AddMembersAccessTask($invoice_id, $invoice_products, $_POST['notification']);

                        // Открытие доступа (UWC)
                        $this->GrantProductAccessUWC($invoice['email'], $invoice_id, $invoice_products, $_POST['notification']);

                        // Добавление доп. продуктов
                        $this->AddSecondaryProductsTask($invoice_id, APP::Module('DB')->Select(
                            $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
                            ['product'], 'billing_invoices_products', 
                            [['invoice', '=', $invoice_id, PDO::PARAM_INT]]
                        ));

                        // Остановка туннеля напоминания об оплате
                        APP::Module('DB')->Delete(
                            APP::Module('TaskManager')->settings['module_taskmanager_db_connection'], 'task_manager',
                            [
                                ['token', '=', 'user_' . $invoice['user_id'] . '_reminder_payment', PDO::PARAM_STR],
                                ['state', '=', 'wait', PDO::PARAM_STR]
                            ]
                        );
                        break;
                }
                break;
            case 'yandex':
                switch ($method_id) {
                    case 'check-order':
                        $out = [];
                        
                        if (strtoupper(md5(implode(';', 
                            Array(
                                $_POST['action'],
                                $_POST['orderSumAmount'],
                                $_POST['orderSumCurrencyPaycash'],
                                $_POST['orderSumBankPaycash'],
                                $_POST['shopId'],
                                $_POST['invoiceId'],
                                $_POST['customerNumber'],
                                '76BnuRwf2APG1P'
                            )
                        ))) == $_POST['md5']) {
                            $customerNumber = explode(',', $_POST['customerNumber']);

                            if (count($customerNumber) == 2) {
                                $out = [
                                    'invoiceId' => $_POST['invoiceId'],
                                    'code' => '0'
                                ];
                            } else {
                                if (APP::Module('DB')->Select(
                                    $this->settings['module_billing_db_connection'], ['fetchColumn', 0], 
                                    ['COUNT(id)'], 'billing_invoices', 
                                    [
                                        ['id', '=', $_POST['orderNumber'], PDO::PARAM_INT]
                                    ]
                                )) {
                                    $invoice = APP::Module('DB')->Select(
                                        $this->settings['module_billing_db_connection'],
                                        ['fetch', PDO::FETCH_ASSOC],
                                        [
                                            'billing_invoices.user_id', 
                                            'billing_invoices.amount',
                                            'billing_invoices.state'
                                        ],
                                        'billing_invoices',
                                        [
                                            ['billing_invoices.id', '=', $_POST['orderNumber'], PDO::PARAM_INT]
                                        ]
                                    );

                                    if ($invoice['state'] == 'success') {
                                        $out = [
                                            'invoiceId' => $_POST['invoiceId'],
                                            'code' => '100',
                                            'message' => 'Заказ #' . $_POST['orderNumber'] . ' был оплачен ранее'
                                        ];
                                    } else {
                                        if ((int) $_POST['orderSumAmount'] >= (int) $invoice['amount']) {
                                            $out = [
                                                'invoiceId' => $_POST['invoiceId'],
                                                'code' => '0'
                                            ];          
                                        } else {
                                            $out = [
                                                'invoiceId' => $_POST['invoiceId'],
                                                'code' => '100',
                                                'message' => 'Неверная сумма для заказа #' . $_POST['orderNumber']
                                            ];
                                        }
                                    }
                                } else {
                                    $out = [
                                        'invoiceId' => $_POST['invoiceId'],
                                        'code' => '100',
                                        'message' => 'Заказ #' . $_POST['orderNumber'] . ' не существует'
                                    ];
                                }
                            }
                        } else {
                            $out = [
                                'invoiceId' => $_POST['invoiceId'],
                                'code' => '1'
                            ];
                        }

                        APP::Render('billing/payments/operators/yandex/check-order', 'include', $out);
                        break;
                    case 'check-order-test':
                        $out = [];
                        
                        if (strtoupper(md5(implode(';', 
                            Array(
                                $_POST['action'],
                                $_POST['orderSumAmount'],
                                $_POST['orderSumCurrencyPaycash'],
                                $_POST['orderSumBankPaycash'],
                                $_POST['shopId'],
                                $_POST['invoiceId'],
                                $_POST['customerNumber'],
                                '76BnuRwf2APG1P'
                            )
                        ))) == $_POST['md5']) {
                            $customerNumber = explode(',', $_POST['customerNumber']);

                            if (count($customerNumber) == 2) {
                                $out = [
                                    'invoiceId' => $_POST['invoiceId'],
                                    'code' => '0'
                                ];
                            } else {
                                if (APP::Module('DB')->Select(
                                    $this->settings['module_billing_db_connection'], ['fetchColumn', 0], 
                                    ['COUNT(id)'], 'billing_invoices', 
                                    [
                                        ['id', '=', $_POST['orderNumber'], PDO::PARAM_INT]
                                    ]
                                )) {
                                    $invoice = APP::Module('DB')->Select(
                                        $this->settings['module_billing_db_connection'],
                                        ['fetch', PDO::FETCH_ASSOC],
                                        [
                                            'billing_invoices.user_id', 
                                            'billing_invoices.amount',
                                            'billing_invoices.state'
                                        ],
                                        'billing_invoices',
                                        [
                                            ['billing_invoices.id', '=', $_POST['orderNumber'], PDO::PARAM_INT]
                                        ]
                                    );

                                    if ($invoice['state'] == 'success') {
                                        $out = [
                                            'invoiceId' => $_POST['invoiceId'],
                                            'code' => '100',
                                            'message' => 'Заказ #' . $_POST['orderNumber'] . ' был оплачен ранее'
                                        ];
                                    } else {
                                        if ((int) $_POST['orderSumAmount'] >= (int) $invoice['amount']) {
                                            $out = [
                                                'invoiceId' => $_POST['invoiceId'],
                                                'code' => '0'
                                            ];          
                                        } else {
                                            $out = [
                                                'invoiceId' => $_POST['invoiceId'],
                                                'code' => '100',
                                                'message' => 'Неверная сумма для заказа #' . $_POST['orderNumber']
                                            ];
                                        }
                                    }
                                } else {
                                    $out = [
                                        'invoiceId' => $_POST['invoiceId'],
                                        'code' => '100',
                                        'message' => 'Заказ #' . $_POST['orderNumber'] . ' не существует'
                                    ];
                                }
                            }
                        } else {
                            $out = [
                                'invoiceId' => $_POST['invoiceId'],
                                'code' => '1'
                            ];
                        }

                        APP::Render('billing/payments/operators/yandex/check-order', 'include', $out);
                        break;
                    case 'aviso':
                        $out = Array();
                        $invoice_id = (int) $_POST['orderNumber'];

                        if (strtoupper(md5(implode(';', 
                            Array(
                                $_POST['action'],
                                $_POST['orderSumAmount'],
                                $_POST['orderSumCurrencyPaycash'],
                                $_POST['orderSumBankPaycash'],
                                $_POST['shopId'],
                                $_POST['invoiceId'],
                                $_POST['customerNumber'],
                                '76BnuRwf2APG1P'
                            )
                        ))) == $_POST['md5']) {

                            // Получение информации по счету
                            $invoice = APP::Module('DB')->Select(
                                $this->settings['module_billing_db_connection'],
                                ['fetch', PDO::FETCH_ASSOC],
                                [
                                    'billing_invoices.amount', 
                                    'billing_invoices.state',
                                    'billing_invoices.amount', 
                                    'users.id AS user_id',
                                    'users.email'
                                ],
                                'billing_invoices',
                                [
                                    ['billing_invoices.id', '=', $invoice_id, PDO::PARAM_INT]
                                ],
                                [
                                    'left join/users' => [
                                        ['users.id', '=', 'billing_invoices.user_id']
                                    ]
                                ]
                            );

                            // Получение информации по продуктам счета
                            $invoice_products = APP::Module('DB')->Select(
                                $this->settings['module_billing_db_connection'],
                                ['fetchAll', PDO::FETCH_ASSOC],
                                [
                                    'billing_invoices_products.product AS id',
                                    'billing_invoices_products.amount',
                                    'billing_products.access_link',
                                    'billing_products.name',
                                    'billing_products.alt_id',
                                    'billing_products.amount AS real_amount',
                                    'billing_products.members_access',
                                    'billing_products.stop_tunnels',
                                    'billing_products.sale_notify_email'
                                ],
                                'billing_invoices_products',
                                [
                                    ['billing_invoices_products.invoice', '=', $invoice_id, PDO::PARAM_INT]
                                ],
                                [
                                    'left join/billing_products' => [
                                        ['billing_invoices_products.product', '=', 'billing_products.id']
                                    ]
                                ],
                                ['billing_invoices_products.id']
                            );

                            // Активируем, если юзер не в BL
                            if (APP::Module('DB')->Select(
                                APP::Module('Users')->settings['module_users_db_connection'], ['fetchColumn', 0], 
                                ['value'], 'users_about', 
                                [
                                    ['user', '=', $invoice['user_id'], PDO::PARAM_INT],
                                    ['item', '=', 'state', PDO::PARAM_STR]
                                ]
                            ) != 'blacklist') {
                                APP::Module('DB')->Update(
                                    APP::Module('Users')->settings['module_users_db_connection'], 
                                    'users',
                                    [
                                        'role' => 'user'
                                    ],
                                    [
                                        ['id', '=', $invoice['user_id'], PDO::PARAM_INT]
                                    ]
                                );
                                
                                APP::Module('DB')->Update(
                                    APP::Module('Users')->settings['module_users_db_connection'], 
                                    'users_about',
                                    [
                                        'value' => 'active'
                                    ],
                                    [
                                        ['user', '=', $invoice['user_id'], PDO::PARAM_INT],
                                        ['item', '=', 'state', PDO::PARAM_STR]
                                    ]
                                );
                            }

                            if ($invoice['state'] != 'success') {

                                // Сохранение данных о платеже
                                $payment_id = APP::Module('DB')->Insert(
                                    $this->settings['module_billing_db_connection'], 'billing_payments', [
                                        'id' => 'NULL',
                                        'invoice' => [$invoice_id, PDO::PARAM_INT],
                                        'method' => [$operator_id, PDO::PARAM_STR],
                                        'cr_date' => 'NOW()'
                                    ]
                                );
                                
                                foreach ($_POST as $item => $value) {
                                    APP::Module('DB')->Insert(
                                        $this->settings['module_billing_db_connection'], 'billing_payments_details', [
                                            'id' => 'NULL',
                                            'payment' => [$payment_id, PDO::PARAM_INT],
                                            'item' => [$item, PDO::PARAM_STR],
                                            'value' => [$value, PDO::PARAM_STR],
                                        ]
                                    );
                                }

                                if ($invoice['amount']) {
                                    
                                    // Отправка уведомления
                                    foreach ($invoice_products as $product) {
                                        foreach ((array) explode(' ', $product['sale_notify_email']) as $value) {
                                            $sale_notify_email = trim($value);

                                            if ($sale_notify_email) {
                                                APP::Module('Mail')->Send($sale_notify_email, 694, [
                                                    'invoice_id_hash' => APP::Module('Crypt')->Encode($invoice_id),
                                                    'invoice_id' => $invoice_id,
                                                    'amount' => $invoice['amount'],
                                                    'product_name' => $product['name'],
                                                    'user_id' => $invoice['user_id'],
                                                    'user_email' => $invoice['email']
                                                ], true, 'billing');
                                                break;
                                            }
                                        }
                                    }

                                    APP::Module('Triggers')->Exec('payment', [
                                        'invoice' => $invoice_id,
                                        'amount' => $invoice['amount'],
                                        'products' => $invoice_products
                                    ]);
                                }
                                
                                // Обновление статуса счета
                                APP::Module('DB')->Update(
                                    $this->settings['module_billing_db_connection'], 
                                    'billing_invoices',
                                    [
                                        'state' => 'success'
                                    ],
                                    [
                                        ['id', '=', $invoice_id, PDO::PARAM_INT]
                                    ]
                                );

                                // Удаление меток счета
                                APP::Module('DB')->Delete(
                                    $this->settings['module_billing_db_connection'], 'billing_invoices_labels',
                                    [
                                        ['invoice', '=', $invoice_id, PDO::PARAM_INT]
                                    ]
                                );

                                // Остановка туннелей
                                foreach ($invoice_products as $product) {
                                    if ($product['stop_tunnels']) {
                                        $this->CompleteUserTunnels($invoice['user_id'], (array) explode(',', $product['stop_tunnels']));
                                    }
                                }

                                // Открытие доступа (мемберка)
                                $this->AddMembersAccessTask($invoice_id, $invoice_products, true);
                                
                                // Открытие доступа (UWC)
                                $this->GrantProductAccessUWC($invoice['email'], $invoice_id, $invoice_products, true);

                                // Добавление доп. продуктов
                                $this->AddSecondaryProductsTask($invoice_id, APP::Module('DB')->Select(
                                    $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
                                    ['product'], 'billing_invoices_products', 
                                    [['invoice', '=', $invoice_id, PDO::PARAM_INT]]
                                ));
                                
                                // Остановка туннеля напоминания об оплате
                                APP::Module('DB')->Delete(
                                    APP::Module('TaskManager')->settings['module_taskmanager_db_connection'], 'task_manager',
                                    [
                                        ['token', '=', 'user_' . $invoice['user_id'] . '_reminder_payment', PDO::PARAM_STR],
                                        ['state', '=', 'wait', PDO::PARAM_STR]
                                    ]
                                );
                            }

                            $out = Array(
                                'invoiceId' => $_POST['invoiceId'],
                                'code' => '0'
                            );
                        } else {
                            $out = Array(
                                'invoiceId' => $_POST['invoiceId'],
                                'code' => '1'
                            );
                        }

                        APP::Render('billing/payments/operators/yandex/aviso', 'include', $out);
                        break;
                    case 'aviso-test':
                        $out = Array();
                        $invoice_id = (int) $_POST['orderNumber'];

                        if (strtoupper(md5(implode(';', 
                            Array(
                                $_POST['action'],
                                $_POST['orderSumAmount'],
                                $_POST['orderSumCurrencyPaycash'],
                                $_POST['orderSumBankPaycash'],
                                $_POST['shopId'],
                                $_POST['invoiceId'],
                                $_POST['customerNumber'],
                                '76BnuRwf2APG1P'
                            )
                        ))) == $_POST['md5']) {

                            // Получение информации по счету
                            $invoice = APP::Module('DB')->Select(
                                $this->settings['module_billing_db_connection'],
                                ['fetch', PDO::FETCH_ASSOC],
                                [
                                    'billing_invoices.amount', 
                                    'billing_invoices.state',
                                    'billing_invoices.amount', 
                                    'users.id AS user_id',
                                    'users.email'
                                ],
                                'billing_invoices',
                                [
                                    ['billing_invoices.id', '=', $invoice_id, PDO::PARAM_INT]
                                ],
                                [
                                    'left join/users' => [
                                        ['users.id', '=', 'billing_invoices.user_id']
                                    ]
                                ]
                            );

                            // Получение информации по продуктам счета
                            $invoice_products = APP::Module('DB')->Select(
                                $this->settings['module_billing_db_connection'],
                                ['fetchAll', PDO::FETCH_ASSOC],
                                [
                                    'billing_invoices_products.product AS id',
                                    'billing_invoices_products.amount',
                                    'billing_products.access_link',
                                    'billing_products.name',
                                    'billing_products.alt_id',
                                    'billing_products.amount AS real_amount',
                                    'billing_products.members_access',
                                    'billing_products.stop_tunnels',
                                    'billing_products.sale_notify_email'
                                ],
                                'billing_invoices_products',
                                [
                                    ['billing_invoices_products.invoice', '=', $invoice_id, PDO::PARAM_INT]
                                ],
                                [
                                    'left join/billing_products' => [
                                        ['billing_invoices_products.product', '=', 'billing_products.id']
                                    ]
                                ],
                                ['billing_invoices_products.id']
                            );

                            // Активируем, если юзер не в BL
                            if (APP::Module('DB')->Select(
                                APP::Module('Users')->settings['module_users_db_connection'], ['fetchColumn', 0], 
                                ['value'], 'users_about', 
                                [
                                    ['user', '=', $invoice['user_id'], PDO::PARAM_INT],
                                    ['item', '=', 'state', PDO::PARAM_STR]
                                ]
                            ) != 'blacklist') {
                                APP::Module('DB')->Update(
                                    APP::Module('Users')->settings['module_users_db_connection'], 
                                    'users',
                                    [
                                        'role' => 'user'
                                    ],
                                    [
                                        ['id', '=', $invoice['user_id'], PDO::PARAM_INT]
                                    ]
                                );
                                
                                APP::Module('DB')->Update(
                                    APP::Module('Users')->settings['module_users_db_connection'], 
                                    'users_about',
                                    [
                                        'value' => 'active'
                                    ],
                                    [
                                        ['user', '=', $invoice['user_id'], PDO::PARAM_INT],
                                        ['item', '=', 'state', PDO::PARAM_STR]
                                    ]
                                );
                            }

                            if ($invoice['state'] != 'success') {

                                // Сохранение данных о платеже
                                $payment_id = APP::Module('DB')->Insert(
                                    $this->settings['module_billing_db_connection'], 'billing_payments', [
                                        'id' => 'NULL',
                                        'invoice' => [$invoice_id, PDO::PARAM_INT],
                                        'method' => ['yandex', PDO::PARAM_STR],
                                        'cr_date' => 'NOW()'
                                    ]
                                );
                                
                                foreach ($_POST as $item => $value) {
                                    APP::Module('DB')->Insert(
                                        $this->settings['module_billing_db_connection'], 'billing_payments_details', [
                                            'id' => 'NULL',
                                            'payment' => [$payment_id, PDO::PARAM_INT],
                                            'item' => [$item, PDO::PARAM_STR],
                                            'value' => [$value, PDO::PARAM_STR],
                                        ]
                                    );
                                }

                                if ($invoice['amount']) {
                                    
                                    // Отправка уведомления
                                    foreach ($invoice_products as $product) {
                                        foreach ((array) explode(' ', $product['sale_notify_email']) as $value) {
                                            $sale_notify_email = trim($value);

                                            if ($sale_notify_email) {
                                                APP::Module('Mail')->Send($sale_notify_email, 694, [
                                                    'invoice_id_hash' => APP::Module('Crypt')->Encode($invoice_id),
                                                    'invoice_id' => $invoice_id,
                                                    'amount' => $invoice['amount'],
                                                    'product_name' => $product['name'],
                                                    'user_id' => $invoice['user_id'],
                                                    'user_email' => $invoice['email']
                                                ], true, 'billing');
                                                break;
                                            }
                                        }
                                    }

                                    APP::Module('Triggers')->Exec('payment', [
                                        'invoice' => $invoice_id,
                                        'amount' => $invoice['amount'],
                                        'products' => $invoice_products
                                    ]);
                                }
                                
                                // Обновление статуса счета
                                APP::Module('DB')->Update(
                                    $this->settings['module_billing_db_connection'], 
                                    'billing_invoices',
                                    [
                                        'state' => 'success'
                                    ],
                                    [
                                        ['id', '=', $invoice_id, PDO::PARAM_INT]
                                    ]
                                );

                                // Удаление меток счета
                                APP::Module('DB')->Delete(
                                    $this->settings['module_billing_db_connection'], 'billing_invoices_labels',
                                    [
                                        ['invoice', '=', $invoice_id, PDO::PARAM_INT]
                                    ]
                                );

                                // Остановка туннелей
                                foreach ($invoice_products as $product) {
                                    if ($product['stop_tunnels']) {
                                        $this->CompleteUserTunnels($invoice['user_id'], (array) explode(',', $product['stop_tunnels']));
                                    }
                                }

                                // Открытие доступа (мемберка)
                                $this->AddMembersAccessTask($invoice_id, $invoice_products, true);
                                
                                // Открытие доступа (UWC)
                                $this->GrantProductAccessUWC($invoice['email'], $invoice_id, $invoice_products, true);

                                // Добавление доп. продуктов
                                $this->AddSecondaryProductsTask($invoice_id, APP::Module('DB')->Select(
                                    $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
                                    ['product'], 'billing_invoices_products', 
                                    [['invoice', '=', $invoice_id, PDO::PARAM_INT]]
                                ));
                                
                                // Остановка туннеля напоминания об оплате
                                APP::Module('DB')->Delete(
                                    APP::Module('TaskManager')->settings['module_taskmanager_db_connection'], 'task_manager',
                                    [
                                        ['token', '=', 'user_' . $invoice['user_id'] . '_reminder_payment', PDO::PARAM_STR],
                                        ['state', '=', 'wait', PDO::PARAM_STR]
                                    ]
                                );
                            }

                            $out = Array(
                                'invoiceId' => $_POST['invoiceId'],
                                'code' => '0'
                            );
                        } else {
                            $out = Array(
                                'invoiceId' => $_POST['invoiceId'],
                                'code' => '1'
                            );
                        }

                        APP::Render('billing/payments/operators/yandex/aviso', 'include', $out);
                        break;
                }
                break;
            case 'wm':
                switch ($method_id) {
                    case 'ipn':
                        if (!count($_POST)) {
                            exit;
                        }

                        $invoice_id = (int) $_POST['oid'];
                        
                        // Получение информации по счету
                        $invoice = APP::Module('DB')->Select(
                            $this->settings['module_billing_db_connection'],
                            ['fetch', PDO::FETCH_ASSOC],
                            [
                                'billing_invoices.amount', 
                                'billing_invoices.state',
                                'billing_invoices.amount', 
                                'users.id AS user_id',
                                'users.email'
                            ],
                            'billing_invoices',
                            [
                                ['billing_invoices.id', '=', $invoice_id, PDO::PARAM_INT]
                            ],
                            [
                                'left join/users' => [
                                    ['users.id', '=', 'billing_invoices.user_id']
                                ]
                            ]
                        );

                        // Получение информации по продуктам счета
                        $invoice_products = APP::Module('DB')->Select(
                            $this->settings['module_billing_db_connection'],
                            ['fetchAll', PDO::FETCH_ASSOC],
                            [
                                'billing_invoices_products.product AS id',
                                'billing_invoices_products.amount',
                                'billing_products.access_link',
                                'billing_products.name',
                                'billing_products.alt_id',
                                'billing_products.amount AS real_amount',
                                'billing_products.members_access',
                                'billing_products.stop_tunnels',
                                'billing_products.sale_notify_email'
                            ],
                            'billing_invoices_products',
                            [
                                ['billing_invoices_products.invoice', '=', $invoice_id, PDO::PARAM_INT]
                            ],
                            [
                                'left join/billing_products' => [
                                    ['billing_invoices_products.product', '=', 'billing_products.id']
                                ]
                            ],
                            ['billing_invoices_products.id']
                        );

                        // Активируем, если юзер не в BL
                        if (APP::Module('DB')->Select(
                            APP::Module('Users')->settings['module_users_db_connection'], ['fetchColumn', 0], 
                            ['value'], 'users_about', 
                            [
                                ['user', '=', $invoice['user_id'], PDO::PARAM_INT],
                                ['item', '=', 'state', PDO::PARAM_STR]
                            ]
                        ) != 'blacklist') {
                            APP::Module('DB')->Update(
                                APP::Module('Users')->settings['module_users_db_connection'], 
                                'users',
                                [
                                    'role' => 'user'
                                ],
                                [
                                    ['id', '=', $invoice['user_id'], PDO::PARAM_INT]
                                ]
                            );

                            APP::Module('DB')->Update(
                                APP::Module('Users')->settings['module_users_db_connection'], 
                                'users_about',
                                [
                                    'value' => 'active'
                                ],
                                [
                                    ['user', '=', $invoice['user_id'], PDO::PARAM_INT],
                                    ['item', '=', 'state', PDO::PARAM_STR]
                                ]
                            );
                        }
                        
                        if (!$invoice) {
                            echo "ERR: Неверный номер заказа";
                            exit;
                        }
                        
                        if (isset($_POST['LMI_PREREQUEST'])) {
                            //если сумма платежа меньше суммы заказа то отклоняем платеж
                            if ($_POST['LMI_PAYMENT_AMOUNT'] < $invoice['amount']) {
                                // echo "ERR: Недостаточная сумма платежа";
                                //exit;
                            }
                        }
                        
                        if ((!isset($_POST['LMI_PREREQUEST'])) && ($invoice_id)) {
                            if ($invoice['state'] != 'success') {

                                // Сохранение данных о платеже
                                $payment_id = APP::Module('DB')->Insert(
                                    $this->settings['module_billing_db_connection'], 'billing_payments', [
                                        'id' => 'NULL',
                                        'invoice' => [$invoice_id, PDO::PARAM_INT],
                                        'method' => [$operator_id, PDO::PARAM_STR],
                                        'cr_date' => 'NOW()'
                                    ]
                                );
                                
                                foreach ($_POST as $item => $value) {
                                    APP::Module('DB')->Insert(
                                        $this->settings['module_billing_db_connection'], 'billing_payments_details', [
                                            'id' => 'NULL',
                                            'payment' => [$payment_id, PDO::PARAM_INT],
                                            'item' => [$item, PDO::PARAM_STR],
                                            'value' => [$value, PDO::PARAM_STR],
                                        ]
                                    );
                                }

                                if ($invoice['amount']) {
                                    
                                    // Отправка уведомления
                                    foreach ($invoice_products as $product) {
                                        foreach ((array) explode(' ', $product['sale_notify_email']) as $value) {
                                            $sale_notify_email = trim($value);

                                            if ($sale_notify_email) {
                                                APP::Module('Mail')->Send($sale_notify_email, 694, [
                                                    'invoice_id_hash' => APP::Module('Crypt')->Encode($invoice_id),
                                                    'invoice_id' => $invoice_id,
                                                    'amount' => $invoice['amount'],
                                                    'product_name' => $product['name'],
                                                    'user_id' => $invoice['user_id'],
                                                    'user_email' => $invoice['email']
                                                ], true, 'billing');
                                                break;
                                            }
                                        }
                                    }

                                    APP::Module('Triggers')->Exec('payment', [
                                        'invoice' => $invoice_id,
                                        'amount' => $invoice['amount'],
                                        'products' => $invoice_products
                                    ]);
                                }
                                
                                // Обновление статуса счета
                                APP::Module('DB')->Update(
                                    $this->settings['module_billing_db_connection'], 
                                    'billing_invoices',
                                    [
                                        'state' => 'success'
                                    ],
                                    [
                                        ['id', '=', $invoice_id, PDO::PARAM_INT]
                                    ]
                                );

                                // Удаление меток счета
                                APP::Module('DB')->Delete(
                                    $this->settings['module_billing_db_connection'], 'billing_invoices_labels',
                                    [
                                        ['invoice', '=', $invoice_id, PDO::PARAM_INT]
                                    ]
                                );

                                // Остановка туннелей
                                foreach ($invoice_products as $product) {
                                    if ($product['stop_tunnels']) {
                                        $this->CompleteUserTunnels($invoice['user_id'], (array) explode(',', $product['stop_tunnels']));
                                    }
                                }

                                // Открытие доступа (мемберка)
                                $this->AddMembersAccessTask($invoice_id, $invoice_products, true);
                                
                                // Открытие доступа (UWC)
                                $this->GrantProductAccessUWC($invoice['email'], $invoice_id, $invoice_products, true);

                                // Добавление доп. продуктов
                                $this->AddSecondaryProductsTask($invoice_id, APP::Module('DB')->Select(
                                    $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
                                    ['product'], 'billing_invoices_products', 
                                    [['invoice', '=', $invoice_id, PDO::PARAM_INT]]
                                ));
                                
                                // Остановка туннеля напоминания об оплате
                                APP::Module('DB')->Delete(
                                    APP::Module('TaskManager')->settings['module_taskmanager_db_connection'], 'task_manager',
                                    [
                                        ['token', '=', 'user_' . $invoice['user_id'] . '_reminder_payment', PDO::PARAM_STR],
                                        ['state', '=', 'wait', PDO::PARAM_STR]
                                    ]
                                );
                            }
                        }
                        break;
                }
                break;
            case 'w1':
                switch ($method_id) {
                    case 'ipn':
                        $invoice_id = (int) $_POST['WMI_PAYMENT_NO'];
                
                        if ($_POST['WMI_ORDER_STATE'] == 'Accepted') {
                            
                            // Получение информации по счету
                            $invoice = APP::Module('DB')->Select(
                                $this->settings['module_billing_db_connection'],
                                ['fetch', PDO::FETCH_ASSOC],
                                [
                                    'billing_invoices.amount', 
                                    'billing_invoices.state',
                                    'billing_invoices.amount', 
                                    'users.id AS user_id',
                                    'users.email'
                                ],
                                'billing_invoices',
                                [
                                    ['billing_invoices.id', '=', $invoice_id, PDO::PARAM_INT]
                                ],
                                [
                                    'left join/users' => [
                                        ['users.id', '=', 'billing_invoices.user_id']
                                    ]
                                ]
                            );

                            // Получение информации по продуктам счета
                            $invoice_products = APP::Module('DB')->Select(
                                $this->settings['module_billing_db_connection'],
                                ['fetchAll', PDO::FETCH_ASSOC],
                                [
                                    'billing_invoices_products.product AS id',
                                    'billing_invoices_products.amount',
                                    'billing_products.access_link',
                                    'billing_products.name',
                                    'billing_products.alt_id',
                                    'billing_products.amount AS real_amount',
                                    'billing_products.members_access',
                                    'billing_products.stop_tunnels',
                                    'billing_products.sale_notify_email'
                                ],
                                'billing_invoices_products',
                                [
                                    ['billing_invoices_products.invoice', '=', $invoice_id, PDO::PARAM_INT]
                                ],
                                [
                                    'left join/billing_products' => [
                                        ['billing_invoices_products.product', '=', 'billing_products.id']
                                    ]
                                ],
                                ['billing_invoices_products.id']
                            );

                            // Активируем, если юзер не в BL
                            if (APP::Module('DB')->Select(
                                APP::Module('Users')->settings['module_users_db_connection'], ['fetchColumn', 0], 
                                ['value'], 'users_about', 
                                [
                                    ['user', '=', $invoice['user_id'], PDO::PARAM_INT],
                                    ['item', '=', 'state', PDO::PARAM_STR]
                                ]
                            ) != 'blacklist') {
                                APP::Module('DB')->Update(
                                    APP::Module('Users')->settings['module_users_db_connection'], 
                                    'users',
                                    [
                                        'role' => 'user'
                                    ],
                                    [
                                        ['id', '=', $invoice['user_id'], PDO::PARAM_INT]
                                    ]
                                );

                                APP::Module('DB')->Update(
                                    APP::Module('Users')->settings['module_users_db_connection'], 
                                    'users_about',
                                    [
                                        'value' => 'active'
                                    ],
                                    [
                                        ['user', '=', $invoice['user_id'], PDO::PARAM_INT],
                                        ['item', '=', 'state', PDO::PARAM_STR]
                                    ]
                                );
                            }

                            if ($invoice['state'] != 'success') {

                                // Сохранение данных о платеже
                                $payment_id = APP::Module('DB')->Insert(
                                    $this->settings['module_billing_db_connection'], 'billing_payments', [
                                        'id' => 'NULL',
                                        'invoice' => [$invoice_id, PDO::PARAM_INT],
                                        'method' => [$operator_id, PDO::PARAM_STR],
                                        'cr_date' => 'NOW()'
                                    ]
                                );
                                
                                foreach ($_POST as $item => $value) {
                                    APP::Module('DB')->Insert(
                                        $this->settings['module_billing_db_connection'], 'billing_payments_details', [
                                            'id' => 'NULL',
                                            'payment' => [$payment_id, PDO::PARAM_INT],
                                            'item' => [$item, PDO::PARAM_STR],
                                            'value' => [$value, PDO::PARAM_STR],
                                        ]
                                    );
                                }

                                if ($invoice['amount']) {
                                    
                                    // Отправка уведомления
                                    foreach ($invoice_products as $product) {
                                        foreach ((array) explode(' ', $product['sale_notify_email']) as $value) {
                                            $sale_notify_email = trim($value);

                                            if ($sale_notify_email) {
                                                APP::Module('Mail')->Send($sale_notify_email, 694, [
                                                    'invoice_id_hash' => APP::Module('Crypt')->Encode($invoice_id),
                                                    'invoice_id' => $invoice_id,
                                                    'amount' => $invoice['amount'],
                                                    'product_name' => $product['name'],
                                                    'user_id' => $invoice['user_id'],
                                                    'user_email' => $invoice['email']
                                                ], true, 'billing');
                                                break;
                                            }
                                        }
                                    }

                                    APP::Module('Triggers')->Exec('payment', [
                                        'invoice' => $invoice_id,
                                        'amount' => $invoice['amount'],
                                        'products' => $invoice_products
                                    ]);
                                }
                                
                                // Обновление статуса счета
                                APP::Module('DB')->Update(
                                    $this->settings['module_billing_db_connection'], 
                                    'billing_invoices',
                                    [
                                        'state' => 'success'
                                    ],
                                    [
                                        ['id', '=', $invoice_id, PDO::PARAM_INT]
                                    ]
                                );

                                // Удаление меток счета
                                APP::Module('DB')->Delete(
                                    $this->settings['module_billing_db_connection'], 'billing_invoices_labels',
                                    [
                                        ['invoice', '=', $invoice_id, PDO::PARAM_INT]
                                    ]
                                );

                                // Остановка туннелей
                                foreach ($invoice_products as $product) {
                                    if ($product['stop_tunnels']) {
                                        $this->CompleteUserTunnels($invoice['user_id'], (array) explode(',', $product['stop_tunnels']));
                                    }
                                }

                                // Открытие доступа (мемберка)
                                $this->AddMembersAccessTask($invoice_id, $invoice_products, true);
                                
                                // Открытие доступа (UWC)
                                $this->GrantProductAccessUWC($invoice['email'], $invoice_id, $invoice_products, true);

                                // Добавление доп. продуктов
                                $this->AddSecondaryProductsTask($invoice_id, APP::Module('DB')->Select(
                                    $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
                                    ['product'], 'billing_invoices_products', 
                                    [['invoice', '=', $invoice_id, PDO::PARAM_INT]]
                                ));
                                
                                // Остановка туннеля напоминания об оплате
                                APP::Module('DB')->Delete(
                                    APP::Module('TaskManager')->settings['module_taskmanager_db_connection'], 'task_manager',
                                    [
                                        ['token', '=', 'user_' . $invoice['user_id'] . '_reminder_payment', PDO::PARAM_STR],
                                        ['state', '=', 'wait', PDO::PARAM_STR]
                                    ]
                                );
                            }
                        }
                        break;
                }
                break;
            case 'robokassa':
                switch ($method_id) {
                    case 'ipn':
                        $invoice_id = (int) $_POST['SHP_oid'];
                        
                        // Получение информации по счету
                        $invoice = APP::Module('DB')->Select(
                            $this->settings['module_billing_db_connection'],
                            ['fetch', PDO::FETCH_ASSOC],
                            [
                                'billing_invoices.amount', 
                                'billing_invoices.state',
                                'billing_invoices.amount', 
                                'users.id AS user_id',
                                'users.email'
                            ],
                            'billing_invoices',
                            [
                                ['billing_invoices.id', '=', $invoice_id, PDO::PARAM_INT]
                            ],
                            [
                                'left join/users' => [
                                    ['users.id', '=', 'billing_invoices.user_id']
                                ]
                            ]
                        );

                        // Получение информации по продуктам счета
                        $invoice_products = APP::Module('DB')->Select(
                            $this->settings['module_billing_db_connection'],
                            ['fetchAll', PDO::FETCH_ASSOC],
                            [
                                'billing_invoices_products.product AS id',
                                'billing_invoices_products.amount',
                                'billing_products.access_link',
                                'billing_products.name',
                                'billing_products.alt_id',
                                'billing_products.amount AS real_amount',
                                'billing_products.members_access',
                                'billing_products.stop_tunnels',
                                'billing_products.sale_notify_email'
                            ],
                            'billing_invoices_products',
                            [
                                ['billing_invoices_products.invoice', '=', $invoice_id, PDO::PARAM_INT]
                            ],
                            [
                                'left join/billing_products' => [
                                    ['billing_invoices_products.product', '=', 'billing_products.id']
                                ]
                            ],
                            ['billing_invoices_products.id']
                        );

                        // Активируем, если юзер не в BL
                        if (APP::Module('DB')->Select(
                            APP::Module('Users')->settings['module_users_db_connection'], ['fetchColumn', 0], 
                            ['value'], 'users_about', 
                            [
                                ['user', '=', $invoice['user_id'], PDO::PARAM_INT],
                                ['item', '=', 'state', PDO::PARAM_STR]
                            ]
                        ) != 'blacklist') {
                            APP::Module('DB')->Update(
                                APP::Module('Users')->settings['module_users_db_connection'], 
                                'users',
                                [
                                    'role' => 'user'
                                ],
                                [
                                    ['id', '=', $invoice['user_id'], PDO::PARAM_INT]
                                ]
                            );

                            APP::Module('DB')->Update(
                                APP::Module('Users')->settings['module_users_db_connection'], 
                                'users_about',
                                [
                                    'value' => 'active'
                                ],
                                [
                                    ['user', '=', $invoice['user_id'], PDO::PARAM_INT],
                                    ['item', '=', 'state', PDO::PARAM_STR]
                                ]
                            );
                        }

                        if ($invoice['state'] != 'success') {

                            // Сохранение данных о платеже
                            $payment_id = APP::Module('DB')->Insert(
                                $this->settings['module_billing_db_connection'], 'billing_payments', [
                                    'id' => 'NULL',
                                    'invoice' => [$invoice_id, PDO::PARAM_INT],
                                    'method' => [$operator_id, PDO::PARAM_STR],
                                    'cr_date' => 'NOW()'
                                ]
                            );

                            foreach ($_POST as $item => $value) {
                                APP::Module('DB')->Insert(
                                    $this->settings['module_billing_db_connection'], 'billing_payments_details', [
                                        'id' => 'NULL',
                                        'payment' => [$payment_id, PDO::PARAM_INT],
                                        'item' => [$item, PDO::PARAM_STR],
                                        'value' => [$value, PDO::PARAM_STR],
                                    ]
                                );
                            }

                            if ($invoice['amount']) {

                                // Отправка уведомления
                                foreach ($invoice_products as $product) {
                                    foreach ((array) explode(' ', $product['sale_notify_email']) as $value) {
                                        $sale_notify_email = trim($value);

                                        if ($sale_notify_email) {
                                            APP::Module('Mail')->Send($sale_notify_email, 694, [
                                                'invoice_id_hash' => APP::Module('Crypt')->Encode($invoice_id),
                                                'invoice_id' => $invoice_id,
                                                'amount' => $invoice['amount'],
                                                'product_name' => $product['name'],
                                                'user_id' => $invoice['user_id'],
                                                'user_email' => $invoice['email']
                                            ], true, 'billing');
                                            break;
                                        }
                                    }
                                }

                                APP::Module('Triggers')->Exec('payment', [
                                    'invoice' => $invoice_id,
                                    'amount' => $invoice['amount'],
                                    'products' => $invoice_products
                                ]);
                            }

                            // Обновление статуса счета
                            APP::Module('DB')->Update(
                                $this->settings['module_billing_db_connection'], 
                                'billing_invoices',
                                [
                                    'state' => 'success'
                                ],
                                [
                                    ['id', '=', $invoice_id, PDO::PARAM_INT]
                                ]
                            );

                            // Удаление меток счета
                            APP::Module('DB')->Delete(
                                $this->settings['module_billing_db_connection'], 'billing_invoices_labels',
                                [
                                    ['invoice', '=', $invoice_id, PDO::PARAM_INT]
                                ]
                            );

                            // Остановка туннелей
                            foreach ($invoice_products as $product) {
                                if ($product['stop_tunnels']) {
                                    $this->CompleteUserTunnels($invoice['user_id'], (array) explode(',', $product['stop_tunnels']));
                                }
                            }

                            // Открытие доступа (мемберка)
                            $this->AddMembersAccessTask($invoice_id, $invoice_products, true);

                            // Открытие доступа (UWC)
                            $this->GrantProductAccessUWC($invoice['email'], $invoice_id, $invoice_products, true);

                            // Добавление доп. продуктов
                            $this->AddSecondaryProductsTask($invoice_id, APP::Module('DB')->Select(
                                $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
                                ['product'], 'billing_invoices_products', 
                                [['invoice', '=', $invoice_id, PDO::PARAM_INT]]
                            ));

                            // Остановка туннеля напоминания об оплате
                            APP::Module('DB')->Delete(
                                APP::Module('TaskManager')->settings['module_taskmanager_db_connection'], 'task_manager',
                                [
                                    ['token', '=', 'user_' . $invoice['user_id'] . '_reminder_payment', PDO::PARAM_STR],
                                    ['state', '=', 'wait', PDO::PARAM_STR]
                                ]
                            );
                        }
                        break;
                }
                break;
            case 'zpayment':
                switch ($method_id) {
                    case 'ipn':
                        $invoice_id = (int) $_POST['oid'];
                
                        if ($_POST['LMI_PREREQUEST'] != '1') {

                            // Получение информации по счету
                            $invoice = APP::Module('DB')->Select(
                                $this->settings['module_billing_db_connection'],
                                ['fetch', PDO::FETCH_ASSOC],
                                [
                                    'billing_invoices.amount', 
                                    'billing_invoices.state',
                                    'billing_invoices.amount', 
                                    'users.id AS user_id',
                                    'users.email'
                                ],
                                'billing_invoices',
                                [
                                    ['billing_invoices.id', '=', $invoice_id, PDO::PARAM_INT]
                                ],
                                [
                                    'left join/users' => [
                                        ['users.id', '=', 'billing_invoices.user_id']
                                    ]
                                ]
                            );

                            // Получение информации по продуктам счета
                            $invoice_products = APP::Module('DB')->Select(
                                $this->settings['module_billing_db_connection'],
                                ['fetchAll', PDO::FETCH_ASSOC],
                                [
                                    'billing_invoices_products.product AS id',
                                    'billing_invoices_products.amount',
                                    'billing_products.access_link',
                                    'billing_products.name',
                                    'billing_products.alt_id',
                                    'billing_products.amount AS real_amount',
                                    'billing_products.members_access',
                                    'billing_products.stop_tunnels',
                                    'billing_products.sale_notify_email'
                                ],
                                'billing_invoices_products',
                                [
                                    ['billing_invoices_products.invoice', '=', $invoice_id, PDO::PARAM_INT]
                                ],
                                [
                                    'left join/billing_products' => [
                                        ['billing_invoices_products.product', '=', 'billing_products.id']
                                    ]
                                ],
                                ['billing_invoices_products.id']
                            );

                            // Активируем, если юзер не в BL
                            if (APP::Module('DB')->Select(
                                APP::Module('Users')->settings['module_users_db_connection'], ['fetchColumn', 0], 
                                ['value'], 'users_about', 
                                [
                                    ['user', '=', $invoice['user_id'], PDO::PARAM_INT],
                                    ['item', '=', 'state', PDO::PARAM_STR]
                                ]
                            ) != 'blacklist') {
                                APP::Module('DB')->Update(
                                    APP::Module('Users')->settings['module_users_db_connection'], 
                                    'users',
                                    [
                                        'role' => 'user'
                                    ],
                                    [
                                        ['id', '=', $invoice['user_id'], PDO::PARAM_INT]
                                    ]
                                );

                                APP::Module('DB')->Update(
                                    APP::Module('Users')->settings['module_users_db_connection'], 
                                    'users_about',
                                    [
                                        'value' => 'active'
                                    ],
                                    [
                                        ['user', '=', $invoice['user_id'], PDO::PARAM_INT],
                                        ['item', '=', 'state', PDO::PARAM_STR]
                                    ]
                                );
                            }               

                            if ($invoice['state'] != 'success') {

                                // Сохранение данных о платеже
                                $payment_id = APP::Module('DB')->Insert(
                                    $this->settings['module_billing_db_connection'], 'billing_payments', [
                                        'id' => 'NULL',
                                        'invoice' => [$invoice_id, PDO::PARAM_INT],
                                        'method' => [$operator_id, PDO::PARAM_STR],
                                        'cr_date' => 'NOW()'
                                    ]
                                );

                                foreach ($_POST as $item => $value) {
                                    APP::Module('DB')->Insert(
                                        $this->settings['module_billing_db_connection'], 'billing_payments_details', [
                                            'id' => 'NULL',
                                            'payment' => [$payment_id, PDO::PARAM_INT],
                                            'item' => [$item, PDO::PARAM_STR],
                                            'value' => [$value, PDO::PARAM_STR],
                                        ]
                                    );
                                }

                                if ($invoice['amount']) {

                                    // Отправка уведомления
                                    foreach ($invoice_products as $product) {
                                        foreach ((array) explode(' ', $product['sale_notify_email']) as $value) {
                                            $sale_notify_email = trim($value);

                                            if ($sale_notify_email) {
                                                APP::Module('Mail')->Send($sale_notify_email, 694, [
                                                    'invoice_id_hash' => APP::Module('Crypt')->Encode($invoice_id),
                                                    'invoice_id' => $invoice_id,
                                                    'amount' => $invoice['amount'],
                                                    'product_name' => $product['name'],
                                                    'user_id' => $invoice['user_id'],
                                                    'user_email' => $invoice['email']
                                                ], true, 'billing');
                                                break;
                                            }
                                        }
                                    }

                                    APP::Module('Triggers')->Exec('payment', [
                                        'invoice' => $invoice_id,
                                        'amount' => $invoice['amount'],
                                        'products' => $invoice_products
                                    ]);
                                }

                                // Обновление статуса счета
                                APP::Module('DB')->Update(
                                    $this->settings['module_billing_db_connection'], 
                                    'billing_invoices',
                                    [
                                        'state' => 'success'
                                    ],
                                    [
                                        ['id', '=', $invoice_id, PDO::PARAM_INT]
                                    ]
                                );

                                // Удаление меток счета
                                APP::Module('DB')->Delete(
                                    $this->settings['module_billing_db_connection'], 'billing_invoices_labels',
                                    [
                                        ['invoice', '=', $invoice_id, PDO::PARAM_INT]
                                    ]
                                );

                                // Остановка туннелей
                                foreach ($invoice_products as $product) {
                                    if ($product['stop_tunnels']) {
                                        $this->CompleteUserTunnels($invoice['user_id'], (array) explode(',', $product['stop_tunnels']));
                                    }
                                }

                                // Открытие доступа (мемберка)
                                $this->AddMembersAccessTask($invoice_id, $invoice_products, true);

                                // Открытие доступа (UWC)
                                $this->GrantProductAccessUWC($invoice['email'], $invoice_id, $invoice_products, true);

                                // Добавление доп. продуктов
                                $this->AddSecondaryProductsTask($invoice_id, APP::Module('DB')->Select(
                                    $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
                                    ['product'], 'billing_invoices_products', 
                                    [['invoice', '=', $invoice_id, PDO::PARAM_INT]]
                                ));

                                // Остановка туннеля напоминания об оплате
                                APP::Module('DB')->Delete(
                                    APP::Module('TaskManager')->settings['module_taskmanager_db_connection'], 'task_manager',
                                    [
                                        ['token', '=', 'user_' . $invoice['user_id'] . '_reminder_payment', PDO::PARAM_STR],
                                        ['state', '=', 'wait', PDO::PARAM_STR]
                                    ]
                                );
                            }
                        }
                        break;
                }
                break;
            case '2checkout':
                switch ($method_id) {
                    case 'ipn':
                        $invoice_id = (int) $_POST['merchant_order_id'];
                
                        // Получение информации по счету
                        $invoice = APP::Module('DB')->Select(
                            $this->settings['module_billing_db_connection'],
                            ['fetch', PDO::FETCH_ASSOC],
                            [
                                'billing_invoices.amount', 
                                'billing_invoices.state',
                                'billing_invoices.amount', 
                                'users.id AS user_id',
                                'users.email'
                            ],
                            'billing_invoices',
                            [
                                ['billing_invoices.id', '=', $invoice_id, PDO::PARAM_INT]
                            ],
                            [
                                'left join/users' => [
                                    ['users.id', '=', 'billing_invoices.user_id']
                                ]
                            ]
                        );

                        // Получение информации по продуктам счета
                        $invoice_products = APP::Module('DB')->Select(
                            $this->settings['module_billing_db_connection'],
                            ['fetchAll', PDO::FETCH_ASSOC],
                            [
                                'billing_invoices_products.product AS id',
                                'billing_invoices_products.amount',
                                'billing_products.access_link',
                                'billing_products.name',
                                'billing_products.alt_id',
                                'billing_products.amount AS real_amount',
                                'billing_products.members_access',
                                'billing_products.stop_tunnels',
                                'billing_products.sale_notify_email'
                            ],
                            'billing_invoices_products',
                            [
                                ['billing_invoices_products.invoice', '=', $invoice_id, PDO::PARAM_INT]
                            ],
                            [
                                'left join/billing_products' => [
                                    ['billing_invoices_products.product', '=', 'billing_products.id']
                                ]
                            ],
                            ['billing_invoices_products.id']
                        );

                        // Активируем, если юзер не в BL
                        if (APP::Module('DB')->Select(
                            APP::Module('Users')->settings['module_users_db_connection'], ['fetchColumn', 0], 
                            ['value'], 'users_about', 
                            [
                                ['user', '=', $invoice['user_id'], PDO::PARAM_INT],
                                ['item', '=', 'state', PDO::PARAM_STR]
                            ]
                        ) != 'blacklist') {
                            APP::Module('DB')->Update(
                                APP::Module('Users')->settings['module_users_db_connection'], 
                                'users',
                                [
                                    'role' => 'user'
                                ],
                                [
                                    ['id', '=', $invoice['user_id'], PDO::PARAM_INT]
                                ]
                            );

                            APP::Module('DB')->Update(
                                APP::Module('Users')->settings['module_users_db_connection'], 
                                'users_about',
                                [
                                    'value' => 'active'
                                ],
                                [
                                    ['user', '=', $invoice['user_id'], PDO::PARAM_INT],
                                    ['item', '=', 'state', PDO::PARAM_STR]
                                ]
                            );
                        }

                        if ($invoice['state'] != 'success') {

                            // Сохранение данных о платеже
                            $payment_id = APP::Module('DB')->Insert(
                                $this->settings['module_billing_db_connection'], 'billing_payments', [
                                    'id' => 'NULL',
                                    'invoice' => [$invoice_id, PDO::PARAM_INT],
                                    'method' => [$operator_id, PDO::PARAM_STR],
                                    'cr_date' => 'NOW()'
                                ]
                            );

                            foreach ($_POST as $item => $value) {
                                APP::Module('DB')->Insert(
                                    $this->settings['module_billing_db_connection'], 'billing_payments_details', [
                                        'id' => 'NULL',
                                        'payment' => [$payment_id, PDO::PARAM_INT],
                                        'item' => [$item, PDO::PARAM_STR],
                                        'value' => [$value, PDO::PARAM_STR],
                                    ]
                                );
                            }

                            if ($invoice['amount']) {

                                // Отправка уведомления
                                foreach ($invoice_products as $product) {
                                    foreach ((array) explode(' ', $product['sale_notify_email']) as $value) {
                                        $sale_notify_email = trim($value);

                                        if ($sale_notify_email) {
                                            APP::Module('Mail')->Send($sale_notify_email, 694, [
                                                'invoice_id_hash' => APP::Module('Crypt')->Encode($invoice_id),
                                                'invoice_id' => $invoice_id,
                                                'amount' => $invoice['amount'],
                                                'product_name' => $product['name'],
                                                'user_id' => $invoice['user_id'],
                                                'user_email' => $invoice['email']
                                            ], true, 'billing');
                                            break;
                                        }
                                    }
                                }

                                APP::Module('Triggers')->Exec('payment', [
                                    'invoice' => $invoice_id,
                                    'amount' => $invoice['amount'],
                                    'products' => $invoice_products
                                ]);
                            }

                            // Обновление статуса счета
                            APP::Module('DB')->Update(
                                $this->settings['module_billing_db_connection'], 
                                'billing_invoices',
                                [
                                    'state' => 'success'
                                ],
                                [
                                    ['id', '=', $invoice_id, PDO::PARAM_INT]
                                ]
                            );

                            // Удаление меток счета
                            APP::Module('DB')->Delete(
                                $this->settings['module_billing_db_connection'], 'billing_invoices_labels',
                                [
                                    ['invoice', '=', $invoice_id, PDO::PARAM_INT]
                                ]
                            );

                            // Остановка туннелей
                            foreach ($invoice_products as $product) {
                                if ($product['stop_tunnels']) {
                                    $this->CompleteUserTunnels($invoice['user_id'], (array) explode(',', $product['stop_tunnels']));
                                }
                            }

                            // Открытие доступа (мемберка)
                            $this->AddMembersAccessTask($invoice_id, $invoice_products, true);

                            // Открытие доступа (UWC)
                            $this->GrantProductAccessUWC($invoice['email'], $invoice_id, $invoice_products, true);

                            // Добавление доп. продуктов
                            $this->AddSecondaryProductsTask($invoice_id, APP::Module('DB')->Select(
                                $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
                                ['product'], 'billing_invoices_products', 
                                [['invoice', '=', $invoice_id, PDO::PARAM_INT]]
                            ));

                            // Остановка туннеля напоминания об оплате
                            APP::Module('DB')->Delete(
                                APP::Module('TaskManager')->settings['module_taskmanager_db_connection'], 'task_manager',
                                [
                                    ['token', '=', 'user_' . $invoice['user_id'] . '_reminder_payment', PDO::PARAM_STR],
                                    ['state', '=', 'wait', PDO::PARAM_STR]
                                ]
                            );
                        }
                        break;
                }
                break;
            case 'rbk':
                switch ($method_id) {
                    case 'ipn':
                        $invoice_id = (int) $_POST['orderId'];
                
                        if ($_POST['paymentStatus'] == '5') {
                            
                            // Получение информации по счету
                            $invoice = APP::Module('DB')->Select(
                                $this->settings['module_billing_db_connection'],
                                ['fetch', PDO::FETCH_ASSOC],
                                [
                                    'billing_invoices.amount', 
                                    'billing_invoices.state',
                                    'billing_invoices.amount', 
                                    'users.id AS user_id',
                                    'users.email'
                                ],
                                'billing_invoices',
                                [
                                    ['billing_invoices.id', '=', $invoice_id, PDO::PARAM_INT]
                                ],
                                [
                                    'left join/users' => [
                                        ['users.id', '=', 'billing_invoices.user_id']
                                    ]
                                ]
                            );

                            // Получение информации по продуктам счета
                            $invoice_products = APP::Module('DB')->Select(
                                $this->settings['module_billing_db_connection'],
                                ['fetchAll', PDO::FETCH_ASSOC],
                                [
                                    'billing_invoices_products.product AS id',
                                    'billing_invoices_products.amount',
                                    'billing_products.access_link',
                                    'billing_products.name',
                                    'billing_products.alt_id',
                                    'billing_products.amount AS real_amount',
                                    'billing_products.members_access',
                                    'billing_products.stop_tunnels',
                                    'billing_products.sale_notify_email'
                                ],
                                'billing_invoices_products',
                                [
                                    ['billing_invoices_products.invoice', '=', $invoice_id, PDO::PARAM_INT]
                                ],
                                [
                                    'left join/billing_products' => [
                                        ['billing_invoices_products.product', '=', 'billing_products.id']
                                    ]
                                ],
                                ['billing_invoices_products.id']
                            );

                            // Активируем, если юзер не в BL
                            if (APP::Module('DB')->Select(
                                APP::Module('Users')->settings['module_users_db_connection'], ['fetchColumn', 0], 
                                ['value'], 'users_about', 
                                [
                                    ['user', '=', $invoice['user_id'], PDO::PARAM_INT],
                                    ['item', '=', 'state', PDO::PARAM_STR]
                                ]
                            ) != 'blacklist') {
                                APP::Module('DB')->Update(
                                    APP::Module('Users')->settings['module_users_db_connection'], 
                                    'users',
                                    [
                                        'role' => 'user'
                                    ],
                                    [
                                        ['id', '=', $invoice['user_id'], PDO::PARAM_INT]
                                    ]
                                );

                                APP::Module('DB')->Update(
                                    APP::Module('Users')->settings['module_users_db_connection'], 
                                    'users_about',
                                    [
                                        'value' => 'active'
                                    ],
                                    [
                                        ['user', '=', $invoice['user_id'], PDO::PARAM_INT],
                                        ['item', '=', 'state', PDO::PARAM_STR]
                                    ]
                                );
                            }

                            if ($invoice['state'] != 'success') {

                                // Сохранение данных о платеже
                                $payment_id = APP::Module('DB')->Insert(
                                    $this->settings['module_billing_db_connection'], 'billing_payments', [
                                        'id' => 'NULL',
                                        'invoice' => [$invoice_id, PDO::PARAM_INT],
                                        'method' => [$operator_id, PDO::PARAM_STR],
                                        'cr_date' => 'NOW()'
                                    ]
                                );

                                foreach ($_POST as $item => $value) {
                                    APP::Module('DB')->Insert(
                                        $this->settings['module_billing_db_connection'], 'billing_payments_details', [
                                            'id' => 'NULL',
                                            'payment' => [$payment_id, PDO::PARAM_INT],
                                            'item' => [$item, PDO::PARAM_STR],
                                            'value' => [$value, PDO::PARAM_STR],
                                        ]
                                    );
                                }

                                if ($invoice['amount']) {

                                    // Отправка уведомления
                                    foreach ($invoice_products as $product) {
                                        foreach ((array) explode(' ', $product['sale_notify_email']) as $value) {
                                            $sale_notify_email = trim($value);

                                            if ($sale_notify_email) {
                                                APP::Module('Mail')->Send($sale_notify_email, 694, [
                                                    'invoice_id_hash' => APP::Module('Crypt')->Encode($invoice_id),
                                                    'invoice_id' => $invoice_id,
                                                    'amount' => $invoice['amount'],
                                                    'product_name' => $product['name'],
                                                    'user_id' => $invoice['user_id'],
                                                    'user_email' => $invoice['email']
                                                ], true, 'billing');
                                                break;
                                            }
                                        }
                                    }

                                    APP::Module('Triggers')->Exec('payment', [
                                        'invoice' => $invoice_id,
                                        'amount' => $invoice['amount'],
                                        'products' => $invoice_products
                                    ]);
                                }

                                // Обновление статуса счета
                                APP::Module('DB')->Update(
                                    $this->settings['module_billing_db_connection'], 
                                    'billing_invoices',
                                    [
                                        'state' => 'success'
                                    ],
                                    [
                                        ['id', '=', $invoice_id, PDO::PARAM_INT]
                                    ]
                                );

                                // Удаление меток счета
                                APP::Module('DB')->Delete(
                                    $this->settings['module_billing_db_connection'], 'billing_invoices_labels',
                                    [
                                        ['invoice', '=', $invoice_id, PDO::PARAM_INT]
                                    ]
                                );

                                // Остановка туннелей
                                foreach ($invoice_products as $product) {
                                    if ($product['stop_tunnels']) {
                                        $this->CompleteUserTunnels($invoice['user_id'], (array) explode(',', $product['stop_tunnels']));
                                    }
                                }

                                // Открытие доступа (мемберка)
                                $this->AddMembersAccessTask($invoice_id, $invoice_products, true);

                                // Открытие доступа (UWC)
                                $this->GrantProductAccessUWC($invoice['email'], $invoice_id, $invoice_products, true);

                                // Добавление доп. продуктов
                                $this->AddSecondaryProductsTask($invoice_id, APP::Module('DB')->Select(
                                    $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
                                    ['product'], 'billing_invoices_products', 
                                    [['invoice', '=', $invoice_id, PDO::PARAM_INT]]
                                ));

                                // Остановка туннеля напоминания об оплате
                                APP::Module('DB')->Delete(
                                    APP::Module('TaskManager')->settings['module_taskmanager_db_connection'], 'task_manager',
                                    [
                                        ['token', '=', 'user_' . $invoice['user_id'] . '_reminder_payment', PDO::PARAM_STR],
                                        ['state', '=', 'wait', PDO::PARAM_STR]
                                    ]
                                );
                            }
                        }
                        break;
                }
                break;
            case 'paypal':
                switch ($method_id) {
                    case 'ipn':
                        $invoice_id = (int) $_POST['invoice'];
                
                        // Получение информации по счету
                        $invoice = APP::Module('DB')->Select(
                            $this->settings['module_billing_db_connection'],
                            ['fetch', PDO::FETCH_ASSOC],
                            [
                                'billing_invoices.amount', 
                                'billing_invoices.state',
                                'billing_invoices.amount', 
                                'users.id AS user_id',
                                'users.email'
                            ],
                            'billing_invoices',
                            [
                                ['billing_invoices.id', '=', $invoice_id, PDO::PARAM_INT]
                            ],
                            [
                                'left join/users' => [
                                    ['users.id', '=', 'billing_invoices.user_id']
                                ]
                            ]
                        );

                        // Получение информации по продуктам счета
                        $invoice_products = APP::Module('DB')->Select(
                            $this->settings['module_billing_db_connection'],
                            ['fetchAll', PDO::FETCH_ASSOC],
                            [
                                'billing_invoices_products.product AS id',
                                'billing_invoices_products.amount',
                                'billing_products.access_link',
                                'billing_products.name',
                                'billing_products.alt_id',
                                'billing_products.amount AS real_amount',
                                'billing_products.members_access',
                                'billing_products.stop_tunnels',
                                'billing_products.sale_notify_email'
                            ],
                            'billing_invoices_products',
                            [
                                ['billing_invoices_products.invoice', '=', $invoice_id, PDO::PARAM_INT]
                            ],
                            [
                                'left join/billing_products' => [
                                    ['billing_invoices_products.product', '=', 'billing_products.id']
                                ]
                            ],
                            ['billing_invoices_products.id']
                        );

                        if ($invoice['state'] != 'success') {

                            // Сохранение данных о платеже
                            $payment_id = APP::Module('DB')->Insert(
                                $this->settings['module_billing_db_connection'], 'billing_payments', [
                                    'id' => 'NULL',
                                    'invoice' => [$invoice_id, PDO::PARAM_INT],
                                    'method' => [$operator_id, PDO::PARAM_STR],
                                    'cr_date' => 'NOW()'
                                ]
                            );

                            foreach ($_POST as $item => $value) {
                                APP::Module('DB')->Insert(
                                    $this->settings['module_billing_db_connection'], 'billing_payments_details', [
                                        'id' => 'NULL',
                                        'payment' => [$payment_id, PDO::PARAM_INT],
                                        'item' => [$item, PDO::PARAM_STR],
                                        'value' => [$value, PDO::PARAM_STR],
                                    ]
                                );
                            }

                            if ($invoice['amount']) {

                                // Отправка уведомления
                                foreach ($invoice_products as $product) {
                                    foreach ((array) explode(' ', $product['sale_notify_email']) as $value) {
                                        $sale_notify_email = trim($value);

                                        if ($sale_notify_email) {
                                            APP::Module('Mail')->Send($sale_notify_email, 694, [
                                                'invoice_id_hash' => APP::Module('Crypt')->Encode($invoice_id),
                                                'invoice_id' => $invoice_id,
                                                'amount' => $invoice['amount'],
                                                'product_name' => $product['name'],
                                                'user_id' => $invoice['user_id'],
                                                'user_email' => $invoice['email']
                                            ], true, 'billing');
                                            break;
                                        }
                                    }
                                }

                                APP::Module('Triggers')->Exec('payment', [
                                    'invoice' => $invoice_id,
                                    'amount' => $invoice['amount'],
                                    'products' => $invoice_products
                                ]);
                            }

                            // Обновление статуса счета
                            APP::Module('DB')->Update(
                                $this->settings['module_billing_db_connection'], 
                                'billing_invoices',
                                [
                                    'state' => 'success'
                                ],
                                [
                                    ['id', '=', $invoice_id, PDO::PARAM_INT]
                                ]
                            );

                            // Удаление меток счета
                            APP::Module('DB')->Delete(
                                $this->settings['module_billing_db_connection'], 'billing_invoices_labels',
                                [
                                    ['invoice', '=', $invoice_id, PDO::PARAM_INT]
                                ]
                            );

                            // Остановка туннелей
                            foreach ($invoice_products as $product) {
                                if ($product['stop_tunnels']) {
                                    $this->CompleteUserTunnels($invoice['user_id'], (array) explode(',', $product['stop_tunnels']));
                                }
                            }

                            // Открытие доступа (мемберка)
                            $this->AddMembersAccessTask($invoice_id, $invoice_products, true);

                            // Открытие доступа (UWC)
                            $this->GrantProductAccessUWC($invoice['email'], $invoice_id, $invoice_products, true);

                            // Добавление доп. продуктов
                            $this->AddSecondaryProductsTask($invoice_id, APP::Module('DB')->Select(
                                $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
                                ['product'], 'billing_invoices_products', 
                                [['invoice', '=', $invoice_id, PDO::PARAM_INT]]
                            ));

                            // Остановка туннеля напоминания об оплате
                            APP::Module('DB')->Delete(
                                APP::Module('TaskManager')->settings['module_taskmanager_db_connection'], 'task_manager',
                                [
                                    ['token', '=', 'user_' . $invoice['user_id'] . '_reminder_payment', PDO::PARAM_STR],
                                    ['state', '=', 'wait', PDO::PARAM_STR]
                                ]
                            );
                        }
                        break;
                }
                break;
            case 'bank':
                $invoice_id = APP::Module('Crypt')->Decode(APP::Module('Routing')->get['invoice']);
                
                if (!APP::Module('DB')->Select(
                    $this->settings['module_billing_db_connection'], ['fetchColumn', 0], 
                    ['COUNT(id)'], 'billing_invoices', 
                    [
                        ['id', '=', $invoice_id, PDO::PARAM_INT]
                    ]
                )) {
                    header('HTTP/1.0 404 Not Found');
                    exit;
                }
                
                APP::Render('billing/payments/operators/bank/' . $method_id, 
                    'include', 
                    APP::Module('DB')->Select(
                        $this->settings['module_billing_db_connection'],
                        ['fetch', PDO::FETCH_ASSOC],
                        [
                            'billing_invoices.id', 
                            'billing_invoices.amount', 
                            'users.email'
                        ],
                        'billing_invoices',
                        [
                            ['billing_invoices.id', '=', APP::Module('Crypt')->Decode(APP::Module('Routing')->get['invoice']), PDO::PARAM_INT]
                        ],
                        [
                            'left join/users' => [
                                ['users.id', '=', 'billing_invoices.user_id']
                            ]
                        ]
                    )
                );
                break;
            case 'qiwi':
                switch ($method_id) {
                    case 'create-bill':
                        include ROOT . '/protected/class/qiwi.php';
                        $qiwi = new QIWI();
                        
                        APP::Render(
                            'billing/payments/operators/qiwi/create-bill', 
                            'include', 
                            $qiwi->createBill($_POST['tel'], $_POST['amount'], $_POST['extras'])
                        );
                        break;
                    case 'ipn':
                        $qiwi_bill = explode('_', $_POST['bill_id']);
                        $invoice_id = (int) $qiwi_bill[0];

                        if (APP::Module('DB')->Select(
                            $this->settings['module_billing_db_connection'], ['fetchColumn', 0], 
                            ['COUNT(id)'], 'billing_invoices', 
                            [
                                ['id', '=', $invoice_id, PDO::PARAM_INT]
                            ]
                        )) {

                            // Получение информации по счету
                            $invoice = APP::Module('DB')->Select(
                                $this->settings['module_billing_db_connection'],
                                ['fetch', PDO::FETCH_ASSOC],
                                [
                                    'billing_invoices.amount', 
                                    'billing_invoices.state',
                                    'billing_invoices.amount', 
                                    'users.id AS user_id',
                                    'users.email'
                                ],
                                'billing_invoices',
                                [
                                    ['billing_invoices.id', '=', $invoice_id, PDO::PARAM_INT]
                                ],
                                [
                                    'left join/users' => [
                                        ['users.id', '=', 'billing_invoices.user_id']
                                    ]
                                ]
                            );

                            // Получение информации по продуктам счета
                            $invoice_products = APP::Module('DB')->Select(
                                $this->settings['module_billing_db_connection'],
                                ['fetchAll', PDO::FETCH_ASSOC],
                                [
                                    'billing_invoices_products.product AS id',
                                    'billing_invoices_products.amount',
                                    'billing_products.access_link',
                                    'billing_products.name',
                                    'billing_products.alt_id',
                                    'billing_products.amount AS real_amount',
                                    'billing_products.members_access',
                                    'billing_products.stop_tunnels',
                                    'billing_products.sale_notify_email'
                                ],
                                'billing_invoices_products',
                                [
                                    ['billing_invoices_products.invoice', '=', $invoice_id, PDO::PARAM_INT]
                                ],
                                [
                                    'left join/billing_products' => [
                                        ['billing_invoices_products.product', '=', 'billing_products.id']
                                    ]
                                ],
                                ['billing_invoices_products.id']
                            );

                            // Активируем, если юзер не в BL
                            if (APP::Module('DB')->Select(
                                APP::Module('Users')->settings['module_users_db_connection'], ['fetchColumn', 0], 
                                ['value'], 'users_about', 
                                [
                                    ['user', '=', $invoice['user_id'], PDO::PARAM_INT],
                                    ['item', '=', 'state', PDO::PARAM_STR]
                                ]
                            ) != 'blacklist') {
                                APP::Module('DB')->Update(
                                    APP::Module('Users')->settings['module_users_db_connection'], 
                                    'users',
                                    [
                                        'role' => 'user'
                                    ],
                                    [
                                        ['id', '=', $invoice['user_id'], PDO::PARAM_INT]
                                    ]
                                );

                                APP::Module('DB')->Update(
                                    APP::Module('Users')->settings['module_users_db_connection'], 
                                    'users_about',
                                    [
                                        'value' => 'active'
                                    ],
                                    [
                                        ['user', '=', $invoice['user_id'], PDO::PARAM_INT],
                                        ['item', '=', 'state', PDO::PARAM_STR]
                                    ]
                                );
                            }

                            if (($_POST['status'] == 'paid') && ($invoice['state'] != 'success')) {

                                // Сохранение данных о платеже
                                $payment_id = APP::Module('DB')->Insert(
                                    $this->settings['module_billing_db_connection'], 'billing_payments', [
                                        'id' => 'NULL',
                                        'invoice' => [$invoice_id, PDO::PARAM_INT],
                                        'method' => [$operator_id, PDO::PARAM_STR],
                                        'cr_date' => 'NOW()'
                                    ]
                                );

                                foreach ($_POST as $item => $value) {
                                    APP::Module('DB')->Insert(
                                        $this->settings['module_billing_db_connection'], 'billing_payments_details', [
                                            'id' => 'NULL',
                                            'payment' => [$payment_id, PDO::PARAM_INT],
                                            'item' => [$item, PDO::PARAM_STR],
                                            'value' => [$value, PDO::PARAM_STR],
                                        ]
                                    );
                                }

                                if ($invoice['amount']) {

                                    // Отправка уведомления
                                    foreach ($invoice_products as $product) {
                                        foreach ((array) explode(' ', $product['sale_notify_email']) as $value) {
                                            $sale_notify_email = trim($value);

                                            if ($sale_notify_email) {
                                                APP::Module('Mail')->Send($sale_notify_email, 694, [
                                                    'invoice_id_hash' => APP::Module('Crypt')->Encode($invoice_id),
                                                    'invoice_id' => $invoice_id,
                                                    'amount' => $invoice['amount'],
                                                    'product_name' => $product['name'],
                                                    'user_id' => $invoice['user_id'],
                                                    'user_email' => $invoice['email']
                                                ], true, 'billing');
                                                break;
                                            }
                                        }
                                    }

                                    APP::Module('Triggers')->Exec('payment', [
                                        'invoice' => $invoice_id,
                                        'amount' => $invoice['amount'],
                                        'products' => $invoice_products
                                    ]);
                                }

                                // Обновление статуса счета
                                APP::Module('DB')->Update(
                                    $this->settings['module_billing_db_connection'], 
                                    'billing_invoices',
                                    [
                                        'state' => 'success'
                                    ],
                                    [
                                        ['id', '=', $invoice_id, PDO::PARAM_INT]
                                    ]
                                );

                                // Удаление меток счета
                                APP::Module('DB')->Delete(
                                    $this->settings['module_billing_db_connection'], 'billing_invoices_labels',
                                    [
                                        ['invoice', '=', $invoice_id, PDO::PARAM_INT]
                                    ]
                                );

                                // Остановка туннелей
                                foreach ($invoice_products as $product) {
                                    if ($product['stop_tunnels']) {
                                        $this->CompleteUserTunnels($invoice['user_id'], (array) explode(',', $product['stop_tunnels']));
                                    }
                                }

                                // Открытие доступа (мемберка)
                                $this->AddMembersAccessTask($invoice_id, $invoice_products, true);

                                // Открытие доступа (UWC)
                                $this->GrantProductAccessUWC($invoice['email'], $invoice_id, $invoice_products, true);

                                // Добавление доп. продуктов
                                $this->AddSecondaryProductsTask($invoice_id, APP::Module('DB')->Select(
                                    $this->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
                                    ['product'], 'billing_invoices_products', 
                                    [['invoice', '=', $invoice_id, PDO::PARAM_INT]]
                                ));

                                // Остановка туннеля напоминания об оплате
                                APP::Module('DB')->Delete(
                                    APP::Module('TaskManager')->settings['module_taskmanager_db_connection'], 'task_manager',
                                    [
                                        ['token', '=', 'user_' . $invoice['user_id'] . '_reminder_payment', PDO::PARAM_STR],
                                        ['state', '=', 'wait', PDO::PARAM_STR]
                                    ]
                                );
                            }
                        }

                        APP::Render('billing/payments/operators/qiwi/ipn', 'include', ['code' => 0]);
                        break;
                }
                break;
        }
    }
    
    public function ThnxPayment() {
        $user_email = APP::Module('Crypt')->Decode(APP::Module('Routing')->get['user_email_hash']);
        
        $user_about_firstname = APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch',PDO::FETCH_COLUMN],
            ['value'], 'users_about',
            [
                ['user', '=', APP::Module('DB')->Select(
                    APP::Module('Users')->settings['module_users_db_connection'], ['fetch',PDO::FETCH_COLUMN],
                    ['id'], 'users',
                    [
                        ['email', '=', $user_email, PDO::PARAM_STR]
                    ]
                ), PDO::PARAM_INT], 
                ['item', '=', 'firstname', PDO::PARAM_STR]
            ]
        );

        $firstname = $user_about_firstname ? $user_about_firstname : 'вы супер';

        $font = ROOT . '/public/ui/fonts/OwnHand.ttf';
        $image = ROOT . '/public/modules/billing/payments/thnx.png';

        $img = imagecreatefrompng($image);
        $color = imagecolorallocate($img, 0, 0, 0);
        
        $firstname_len = mb_strlen($firstname, APP::$conf['encoding']);
        $firstname_size = (143 / $firstname_len) * 1.3;
      
        imagettftext($img, 30, 0, 204, 290, $color, $font, 'Спасибо,');
        imagettftext($img, $firstname_size, 0, 210, 339, $color, $font, APP::Module('Utils')->UcFirst($firstname));

        header('Content-type: image/png');
        imagepng($img);
        imagedestroy($img);
    }
    
    
    public function ProductImage() {
        $target_file = ROOT . '/public/modules/billing/products/images/' . APP::Module('Routing')->get['product_id'] . '.png';
        $out_file = file_exists($target_file) ? $target_file : ROOT . '/public/modules/billing/products/images/default.png';

        $im = imagecreatefrompng($out_file);

        imagealphablending($im, false);
        imagesavealpha($im, true);

        header('Content-Type: image/png');

        imagepng($im);
        imagedestroy($im);
    }
    
    
    public function APIEAutopayCreateInvoice() {
        $request = json_encode($_POST);

        $sql = APP::Module('DB')->Open($this->settings['module_billing_db_connection'])->prepare('INSERT INTO billing_eautopay_log VALUES (
            NULL, 
            :request, 
            NOW()
        )');
        $sql->bindParam(':request', $request, PDO::PARAM_STR);
        $sql->execute();

        if (((!isset($_POST['status'])) || (!isset($_POST['email'])) || (!isset($_POST['product_price'])))) {
            exit;
        }
        
        if ((int) $_POST['status'] =! 5) {
            exit;
        }
        
        if (isset($_POST['duplicate'])) {
            exit;
        }

        if (!$user_id = APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetchColumn', 0],
            ['id'], 'users',
            [['email', '=', $_POST['email'], PDO::PARAM_STR]]
        )) {
            exit;
        }

        $comment = Array();

        foreach ($_POST as $key => $value) {
            $comment[] = $key. ' - ' . (is_array($value) ? json_encode($value) : $value);
        }

        $message = implode('<br>', $comment);

        if (!APP::Module('DB')->Select(
            APP::Module('Comments')->settings['module_comments_db_connection'], ['fetchColumn', 0],
            ['COUNT(id)'], 'comments_messages',
            [['MD5(message)', '=', md5($message), PDO::PARAM_STR]]
        )) {
            $this->CreateInvoice(
                $user_id, 
                0, 
                [
                    [
                        'id' => 9,
                        'amount' => $_POST['product_price']
                    ]
                ], 
                'success',
                $message
            );
        }
    }
    
    
    public function UpdateExchangeRate() {
        $xml = simplexml_load_file('http://www.cbr.ru/scripts/XML_daily.asp');

        if (count($xml->Valute)) {
            $code = array_reverse($this->conf['currency_code']);
            
            foreach ($xml->Valute as $item) {
                if (in_array($item->CharCode->__toString(), array_keys($code))) {
                    $curs = (float) $item->Value->__toString() / (int) $item->Nominal->__toString();
                    $value = $curs + $curs * $this->conf['currency_plus'];

                    APP::Module('DB')->Update(
                        $this->settings['module_billing_db_connection'], 'billing_currency', [
                            'value' => $value,
                            'symbol' => $this->conf['currency_code'][$item->CharCode->__toString()]
                        ],
                        [['code', '=', $item->CharCode->__toString(), PDO::PARAM_STR]]
                    );
                }
            }
        }
    }
    
    public function SyncUWC() {
        foreach (APP::Module('DB')->Select('uwc', ['fetchAll', PDO::FETCH_COLUMN], ['user_email'], 'wpUW_users') as $email) {
            if (!APP::Module('DB')->Select(
                APP::Module('Users')->settings['module_users_db_connection'], ['fetchColumn', 0], 
                ['COUNT(id)'], 'users', 
                [
                    ['email', '=', $email, PDO::PARAM_STR]
                ]
            )) {
                $password = APP::Module('Users')->GeneratePassword((int) APP::Module('Users')->settings['module_users_gen_pass_length']);
                APP::Module('Users')->Register($email, $password, 'user', 'active');
            }
            
            if (!APP::Module('DB')->Select(
                $this->settings['module_billing_db_connection'], ['fetchColumn', 0], 
                ['COUNT(id)'], 'billing_uwc_users', 
                [
                    ['email', '=', $email, PDO::PARAM_STR]
                ]
            )) {
                APP::Module('DB')->Insert(
                    $this->settings['module_billing_db_connection'], 'billing_uwc_users',
                    [
                        'id' => 'NULL',
                        'email' => [$email, PDO::PARAM_STR],
                        'cr_date' => 'NOW()'
                    ]
                );
            }
        }
    }

    public function Sales(){

        $comment_object_type = APP::Module('DB')->Select(APP::Module('Comments')->settings['module_comments_db_connection'], ['fetchColumn', 0], ['id'], 'comments_objects', [['name', '=', "Invoice", PDO::PARAM_STR]]);
        $comment_object_type_user = APP::Module('DB')->Select(APP::Module('Comments')->settings['module_comments_db_connection'], ['fetchColumn', 0], ['id'], 'comments_objects', [['name', '=', "UserAdmin", PDO::PARAM_STR]]);
        
        if (isset($_POST['do'])) {
            switch ($_POST['do']) {
                case 'comments':
                    $out = APP::Module('DB')->Select(
                        APP::Module('Comments')->settings['module_comments_db_connection'], ['fetchAll',PDO::FETCH_ASSOC],
                        ['comments_messages.message','comments_messages.up_date', 'users.email'], 'comments_messages',
                        [['comments_messages.object_type', '=', $comment_object_type_user, PDO::PARAM_INT], ['comments_messages.object_id', '=', $_POST['user'], PDO::PARAM_INT],],['left join/users' => [['users.id','=','comments_messages.user']]]
                    );


                    header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
                    header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
                    header('Content-Type: application/json');

                    echo json_encode($out);
                    exit;
                    break;
                case 'post-comment':

                    APP::Module('DB')->Insert(
                        APP::Module('Comments')->settings['module_comments_db_connection'], 'comments_messages',
                        [
                            'id' => 'NULL',
                            'sub_id' => [0, PDO::PARAM_INT],
                            'user' => [APP::Module('Users')->user['id'], PDO::PARAM_INT],
                            'object_type' => [$comment_object_type_user, PDO::PARAM_INT],
                            'object_id' => [$_POST['user'], PDO::PARAM_INT],
                            'message' => [$_POST['comment'], PDO::PARAM_STR],
                            'url' => [$_SERVER['HTTP_REFERER'], PDO::PARAM_STR],
                            'up_date' => 'NOW()'
                        ]
                    );

                    echo json_encode(Array(
                        'full'  => $_POST['comment']
                    ));
                    exit;
                    break;
                case 'invoices':
                    $out = [];

                    foreach (APP::Module('DB')->Select(
                        APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                        ['billing_invoices.*', 'billing_invoices_details.value as comment'], 'billing_invoices',
                        [
                            ['billing_invoices.user_id', '=', $_POST['user'], PDO::PARAM_INT],
                            ['billing_invoices.state', 'IN', ['success', 'processed', 'new'], PDO::PARAM_STR]
                        ],
                        [
                            'left join/billing_invoices_details' => [
                                ['billing_invoices_details.invoice', '=', 'billing_invoices.id'],
                                ['billing_invoices_details.item', '=', '"comment"']
                            ]
                        ], false, false, ['billing_invoices.id', 'desc']
                    ) as $user_invoice) {
                        $user_invoice['hash_id'] = APP::Module('Crypt')->Encode($user_invoice['id']);
                        $invoice_products = APP::Module('DB')->Select(
                            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
                            [
                                'billing_invoices_products.id', 
                                'billing_invoices_products.type', 
                                'billing_invoices_products.product',
                                'billing_invoices_products.amount',
                                'billing_invoices_products.cr_date',
                                'billing_products.name',
                                'billing_invoices_products.invoice'
                            ], 
                            'billing_invoices_products',
                            [['billing_invoices_products.invoice', '=', $user_invoice['id'], PDO::PARAM_INT]],
                            [
                                'join/billing_products' => [['billing_products.id', '=', 'billing_invoices_products.product']]
                            ],
                            ['billing_invoices_products.id'],
                            false,
                            ['billing_invoices_products.id', 'desc']
                        );
                        
                        $adm_comment = APP::Module('DB')->Select(
                            APP::Module('Comments')->settings['module_comments_db_connection'], ['fetchAll',PDO::FETCH_ASSOC],
                            ['comments_messages.message','comments_messages.up_date', 'users.email'], 'comments_messages',
                            [['comments_messages.user', '=', $_POST['user'], PDO::PARAM_INT],['comments_messages.object_type', '=', $comment_object_type, PDO::PARAM_INT], ['comments_messages.object_id', '=', $user_invoice['id'], PDO::PARAM_INT]],['left join/users' => [['users.id','=','comments_messages.user']]]
                        );

                        foreach ($invoice_products as $invoice_product) {
                            $out['user_invoices_products'][] = Array(
                                'id'          => $invoice_product['id'],
                                'name'        => $invoice_product['name'],
                                'amount'       => $invoice_product['amount'],
                                'state'       => $user_invoice['state'] == 'success',
                                'invoice'     => $user_invoice['id'],
                                'comment'     => $user_invoice['comment'],
                                'adm_comment' => $adm_comment
                            );
                        }

                        $out['user_invoices'][] = Array(
                            'main'        => $user_invoice,
                            'products'    => $invoice_products,
                            'comment'     => $user_invoice['comment'],
                            'adm_comment' => $adm_comment
                        );
                    }

                    header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
                    header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
                    header('Content-Type: application/json');

                    echo json_encode($out['user_invoices']);
                    exit;
                    break;
            }
        }
            
        ////////////////////////////////////////////////////////////////////////

        $sale = json_decode($this->settings['module_billing_sales_tool'], true);
        $tunnels = [];
        foreach(APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchAll',PDO::FETCH_ASSOC],
            ['id', 'name'], 'tunnels',
            [['id', 'IN', array_keys($sale), PDO::PARAM_INT], ['state', '=', 'active', PDO::PARAM_STR]]
        ) as $tunnel){
            $tunnels[$tunnel['id']] = $tunnel['name'];
        }

        ////////////////////////////////////////////////////////////////////////

        $uid = APP::Module('Users')->UsersSearch(json_decode($_POST['rules'], true));

        ////////////////////////////////////////////////////////////////////////

        $users = [];

        foreach (APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetchAll',PDO::FETCH_ASSOC],
            ['user', 'value', 'item'], 'users_about',
            [['user', 'IN', $uid, PDO::PARAM_INT], ['item', 'IN', ['firstname', 'tel', 'lastname'], PDO::PARAM_STR]]
        ) as $data) {
            $users[$data['user']][$data['item']] = $data['value'];
        }

        ////////////////////////////////////////////////////////////////////////

        $user_tunnels = [];

        foreach (APP::Module('DB')->Select(
            APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetchAll',PDO::FETCH_ASSOC],
            ['id', 'tunnel_id', 'user_id'], 'tunnels_users',
            [['user_id', 'IN', $uid, PDO::PARAM_INT], ['tunnel_id', 'IN', array_keys($sale), PDO::PARAM_INT], ['state', '=', 'active', PDO::PARAM_STR]]
        ) as $proc) {
            $user_tunnels[$proc['user_id']] = Array($proc['tunnel_id'], $proc['id']);
        }

        $data = [];

        foreach (APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
            [
                'users.id', 
                'users.email',
                'count(billing_invoices.id) as inv_cnt',
            ], 
            'users',
            [['users.id', 'IN', $uid, PDO::PARAM_INT], ['users.id', '>', 0, PDO::PARAM_INT]],
            [
                'left join/billing_invoices' => [['billing_invoices.user_id', '=', 'users.id'],['billing_invoices.state', '=', '"success"']]
            ],
            ['users.id'],
            false,
            ['users.id', 'DESC']
        ) as $user) {

            $comment_data = APP::Module('DB')->Select(
                APP::Module('Comments')->settings['module_comments_db_connection'], ['fetch',PDO::FETCH_ASSOC],
                ['comments_messages.message','comments_messages.up_date'], 'comments_messages',
                [['comments_messages.object_id', '=', $user['id'], PDO::PARAM_INT],['comments_messages.object_type', '=', $comment_object_type_user, PDO::PARAM_INT]],
                false, false, false, ['id', 'desc'], [0, 1]
            );

            $inv_pr_cnt = APP::Module('DB')->Select(
                APP::Module('Users')->settings['module_users_db_connection'], ['fetch',PDO::FETCH_ASSOC],
                ['count(id) as inv_cnt'], 'billing_invoices',
                [['user_id', '=', $user['id'], PDO::PARAM_INT],['state', 'IN', ['processed', 'new'], PDO::PARAM_STR]]
            );

            $sale_token = isset($user_tunnels[$user['id']][1]) ? APP::Module('DB')->Select(
                APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                ['token'], 'tunnels_tags',
                [['user_tunnel_id', '=', $user_tunnels[$user['id']][1], PDO::PARAM_INT],['label_id', '=', 'sendmail', PDO::PARAM_STR]],
                false,false,false, ['id', 'desc'], [0, 1]
            ) : 0;

            $data[] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'inv_cnt' => $user['inv_cnt'],
                'sale_token' => $sale_token,
                'sale' => $sale,
                'comment' => isset($comment_data['message']) ? APP::Module('Utils')->mbCutString($comment_data['message'], 50) . ' (' . $comment_data['up_date'] . ')' : 'Нет',
                'inv'     => $user['inv_cnt'] ? $user['inv_cnt'] : 'Нет',
                'inv_pr'  => $inv_pr_cnt['inv_cnt'] ? $inv_pr_cnt['inv_cnt'] : 'Нет',
                'inv_pr_cnt' => $inv_pr_cnt,
                'comment_data' => $comment_data
            ];

        }
      
        APP::Render('billing/admin/sales', 'include', ['users_data' => $data, 'users' => $users, 'sale' => $sale, 'user_tunnels' => $user_tunnels, 'tunnels' => $tunnels]);
    }
    
    
    public function PaymentTrigger($id, $data) {
        $user_email = APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetchColumn', 0],
            ['email'], 'users',
            [['id', '=', APP::Module('DB')->Select(
                $this->settings['module_billing_db_connection'], ['fetchColumn', 0],
                ['user_id'], 'billing_invoices',
                [['id', '=', $data['invoice'], PDO::PARAM_INT]]
            ), PDO::PARAM_INT]]
        );
        
        if ($data['amount'] == 39) {
            APP::Module('Tunnels')->Subscribe([
                'email' => $user_email,
                'tunnel' => [45, 'actions', 381, 0],
                'activation' => [349, false],
                'source' => 'trigger',
                'roles_tunnel' => false,
                'states_tunnel' => false,
                'welcome' => false,
                'queue_timeout' => false,
                'complete_tunnels' => false,
                'pause_tunnels' => false,
                'input_data' => $data,
                'about_user' => false,
                'auto_save_about' => false,
                'save_utm' => false
            ]);
        }
        
        if ($data['amount'] == 97) {
            APP::Module('Mail')->Send($user_email, 508, null, true, 'billing');
            
            APP::Module('Tunnels')->Subscribe([
                'email' => $user_email,
                'tunnel' => [45, 'conditions', 1004, 0],
                'activation' => [349, false],
                'source' => 'trigger',
                'roles_tunnel' => false,
                'states_tunnel' => false,
                'welcome' => false,
                'queue_timeout' => false,
                'complete_tunnels' => false,
                'pause_tunnels' => false,
                'input_data' => $data,
                'about_user' => false,
                'auto_save_about' => false,
                'save_utm' => false
            ]);
        }
        
        if ($data['amount'] == 5) {
            APP::Module('Mail')->Send($user_email, 501, null, true, 'billing');
        }
        
        if ($data['amount'] >= 100) {
            APP::Module('Tunnels')->Subscribe([
                'email' => $user_email,
                'tunnel' => [45, 'conditions', 1004, 0],
                'activation' => [349, false],
                'source' => 'trigger',
                'roles_tunnel' => false,
                'states_tunnel' => false,
                'welcome' => false,
                'queue_timeout' => false,
                'complete_tunnels' => false,
                'pause_tunnels' => false,
                'input_data' => $data,
                'about_user' => false,
                'auto_save_about' => false,
                'save_utm' => false
            ]);
        }
        
        return $data;
    }
    
}


class ProductsSearch {

    public function id($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], ['id'], 'billing_products', [['id', $settings['logic'], $settings['value'], PDO::PARAM_STR]]
        );
    }

    public function name($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], ['id'], 'billing_products', [['name', $settings['logic'], $settings['value'], PDO::PARAM_STR]]
        );
    }

    public function amount($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], ['id'], 'billing_products', [['amount', $settings['logic'], $settings['value'], PDO::PARAM_STR]]
        );
    }
    
}

class ProductsTypesSearch {

    public function id($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], ['id'], 'billing_products_types', [['id', $settings['logic'], $settings['value'], PDO::PARAM_STR]]
        );
    }

    public function name($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], ['id'], 'billing_products_types', [['name', $settings['logic'], $settings['value'], PDO::PARAM_STR]]
        );
    }
    
}

class ProductsGroupsSearch {

    public function id($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], ['id'], 'billing_products_groups', [['id', $settings['logic'], $settings['value'], PDO::PARAM_STR]]
        );
    }

    public function name($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], ['id'], 'billing_products_groups', [['name', $settings['logic'], $settings['value'], PDO::PARAM_STR]]
        );
    }
    
}

class InvoicesSearch {

    public function id($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], ['id'], 'billing_invoices', [['id', $settings['logic'], $settings['value'], PDO::PARAM_STR]]
        );
    }

    public function user($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], ['id'], 'billing_invoices', [['user_id', $settings['logic'], $settings['value'], PDO::PARAM_STR]]
        );
    }

    public function amount($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], ['id'], 'billing_invoices', [['amount', $settings['logic'], $settings['value'], PDO::PARAM_STR]]
        );
    }
    
    public function author($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], ['id'], 'billing_invoices', [['author', $settings['logic'], $settings['value'], PDO::PARAM_STR]]
        );
    }
    
    public function author_comment($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Comments')->settings['module_comments_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
            ['object_id'], 'comments_messages', 
            [
                ['user', $settings['logic'], $settings['value'], PDO::PARAM_INT],
                ['object_type', '=', APP::Module('DB')->Select(
                    APP::Module('Comments')->settings['module_comments_db_connection'], ['fetchColumn', 0], 
                    ['id'], 'comments_objects', 
                    [['name', '=', "Invoice", PDO::PARAM_STR]]
                ), PDO::PARAM_INT]
            ]
        );
    }
    
    public function state($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], ['id'], 'billing_invoices', [['state', $settings['logic'], $settings['value'], PDO::PARAM_STR]]
        );
    }
    
    public function cr_date($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], 
            ['fetchAll', PDO::FETCH_COLUMN], 
            ['id'], 'billing_invoices',
            [
                ['cr_date', 'BETWEEN', '"' . date('Y-m-d 00:00:00', $settings['date_from']) . '" AND "' . date('Y-m-d 00:00:00', $settings['date_to']) . '"']
            ]
        );
    }
    
    public function pay_date($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], 
            ['fetchAll', PDO::FETCH_COLUMN], 
            ['invoice'], 'billing_payments',
            [
                ['cr_date', 'BETWEEN', '"' . date('Y-m-d 00:00:00', $settings['date_from']) . '" AND "' . date('Y-m-d 00:00:00', $settings['date_to']) . '"']
            ]
        );
    }
    
    public function label($settings) {
        $where = [
            ['label_id', '=', $settings['value'], PDO::PARAM_STR]
        ];
        
        if ((!isset($settings['date_from'])) && (!isset($settings['date_to']))) {
            $where[] = ['st_date', 'BETWEEN', '"' . date('Y-m-d 00:00:00', 0) . '" AND "' . date('Y-m-d 23:59:59') . '"'];
        }
        
        if ((isset($settings['date_from'])) && (isset($settings['date_to']))) {
            $where[] = ['st_date', 'BETWEEN', '"' . date('Y-m-d 00:00:00', $settings['date_from']) . '" AND "' . date('Y-m-d 00:00:00', $settings['date_to']) . '"'];
        }
        
        if ((isset($settings['date_from'])) && (!isset($settings['date_to']))) {
            $where[] = ['st_date', 'BETWEEN', '"' . date('Y-m-d 00:00:00', $settings['date_from']) . '" AND "' . date('Y-m-d 23:59:59') . '"'];
        }
        
        if ((!isset($settings['date_from'])) && (isset($settings['date_to']))) {
            $where[] = ['st_date', 'BETWEEN', '"' . date('Y-m-d 00:00:00', 0) . '" AND "' . date('Y-m-d 00:00:00', $settings['date_to']) . '"'];
        }

        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], 
            ['fetchAll', PDO::FETCH_COLUMN], 
            ['invoice'], 'billing_invoices_labels',
            $where
        );
    }
    
}

class PaymentsSearch {
    
    public function amount($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
            ['id'], 'billing_payments', 
            [
                ['invoice', 'IN', APP::Module('DB')->Select(
                    APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
                    ['id'], 'billing_invoices', 
                    [
                        ['amount', $settings['logic'], $settings['value'], PDO::PARAM_INT]
                    ]
                )]
            ]
        );
    }
    
    public function invoice($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], ['id'], 'billing_payments', [['invoice', $settings['logic'], $settings['value'], PDO::PARAM_INT]]
        );
    }
    
    public function method($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], ['id'], 'billing_payments', [['method', $settings['logic'], $settings['value'], PDO::PARAM_STR]]
        );
    }
    
    public function user($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
            ['id'], 'billing_payments', 
            [
                ['invoice', 'IN', APP::Module('DB')->Select(
                    APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_COLUMN], 
                    ['id'], 'billing_invoices', 
                    [
                        ['user_id', $settings['logic'], $settings['value'], PDO::PARAM_INT]
                    ]
                )]
            ]
        );
    }
    
    public function cr_date($settings) {
        return APP::Module('DB')->Select(
            APP::Module('Billing')->settings['module_billing_db_connection'], 
            ['fetchAll', PDO::FETCH_COLUMN], 
            ['id'], 'billing_payments',
            [
                ['cr_date', 'BETWEEN', '"' . date('Y-m-d 00:00:00', $settings['date_from']) . '" AND "' . date('Y-m-d 00:00:00', $settings['date_to']) . '"']
            ]
        );
    }
    
}


class ProductsActions {
    
    public function remove($id, $settings) {
        return APP::Module('DB')->Delete(APP::Module('Billing')->settings['module_billing_db_connection'], 'billing_products', [['id', 'IN', $id]]);
    }
    
}

class ProductsTypesActions {
    
    public function remove($id, $settings) {
        return APP::Module('DB')->Delete(APP::Module('Billing')->settings['module_billing_db_connection'], 'billing_products_types', [['id', 'IN', $id]]);
    }
    
}

class ProductsGroupsActions {
    
    public function remove($id, $settings) {
        return APP::Module('DB')->Delete(APP::Module('Billing')->settings['module_billing_db_connection'], 'billing_products_groups', [['id', 'IN', $id]]);
    }
    
}

class InvoicesActions {
    
    public function remove($id, $settings) {
        return APP::Module('DB')->Delete(APP::Module('Billing')->settings['module_billing_db_connection'], 'billing_invoices', [['id', 'IN', $id]]);
    }
}

class PaymentsActions {
    
    public function remove($id, $settings) {
        return APP::Module('DB')->Delete(APP::Module('Billing')->settings['module_billing_db_connection'], 'billing_payments', [['id', 'IN', $id]]);
    }
    
}
