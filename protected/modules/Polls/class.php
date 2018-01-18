<?
class Polls {
    
    public $settings;
    
    function __construct($conf) {
        foreach ($conf['routes'] as $route) APP::Module('Routing')->Add($route[0], $route[1], $route[2]);
    }
    
    public function Init() {
        $this->settings = APP::Module('Registry')->Get([
            'module_polls_db_connection'
        ]);
    }

    public function Admin() {
        return APP::Render('polls/admin/nav', 'content');
    }
    
    public function Poll($id) {
        return APP::Module('DB')->Select(
            APP::Module('Polls')->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_ASSOC], 
            ['id', 'name', 'up_date'], 'polls',
            [['id', '=', $id, PDO::PARAM_INT]]
        );
    }
    
    
    public function Manage() {
        APP::Render('polls/admin/manage', 'include', APP::Module('DB')->Select(
            APP::Module('Polls')->settings['module_polls_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['id', 'name'], 'polls'
        ));
    }
    
    
    public function APIPollsList() {
        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');
        
        echo json_encode(APP::Module('DB')->Select(
            APP::Module('Polls')->settings['module_polls_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['id', 'name'], 'polls'
        ));
        exit;
    }
    
    public function APIPollsData() {
        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');
        
        $questions = [];
        $answers_users = [];
        $polls_users = [];
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Polls')->settings['module_polls_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['user', 'cr_date'], 'polls_users',
            [['poll', '=', $_POST['poll'], PDO::PARAM_INT]]
        ) as $value) {
            $polls_users[$value['user']] = $value['cr_date'];
        }
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Polls')->settings['module_polls_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            ['id', 'question'], 'polls_questions',
            [['poll_id', '=', $_POST['poll'], PDO::PARAM_INT]]
        ) as $value) {
            $questions[$value['id']] = $value['question'];
        }
        
        foreach (APP::Module('DB')->Select(
            APP::Module('Polls')->settings['module_polls_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], 
            [
                'polls_answers_users.user', 
                'polls_answers_users.question', 
                'polls_answers_users.answer', 
                'polls_answers_users.up_date',
                'users.email'
            ], 
            'polls_answers_users',
            [
                ['user', 'IN', array_keys($polls_users)],
                ['question', 'IN', array_keys($questions)]
            ],
            [
                'left join/users' => [
                    ['polls_answers_users.user', '=', 'users.id']
                ]
            ], 
            ['polls_answers_users.id']
        ) as $value) {
            if (!isset($answers_users[$value['user']])) {
                $answers_users[$value['user']] = [
                    'date' => $polls_users[$value['user']],
                    'email' => $value['email'],
                    'questions' => []
                ];
            }

            $answers_users[$value['user']]['questions'][$value['question']] = $value['answer'];
        }

        echo json_encode([
            'questions' => $questions,
            'answers_users' => $answers_users
        ]);
        exit;
    }
    
    
    public function Colors() {
        $poll = 1;
        $step = 1;
        
        $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);

        if (!APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'users',
            [['email', '=', isset($token['email']) ? $token['email'] : 0, PDO::PARAM_STR]]
        )) {
            APP::Render(
                'polls/error', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
            exit;
        }
        
        $user_id = APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['id'], 'users',
            [['email', '=', $token['email'], PDO::PARAM_STR]]
        );
        
        ////////////////////////////////////////////////////////////////////////
        
        if (isset($_POST['answers'])) {
            foreach ($_POST['answers'] as $key => $value) {
                if (APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['COUNT(id)'], 'polls_answers_users',
                    [
                        ['user', '=', $user_id, PDO::PARAM_INT],
                        ['question', '=', $key, PDO::PARAM_INT]
                    ]
                )) {
                    APP::Module('DB')->Update(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        ['answer' => $value],
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['question', '=', $key, PDO::PARAM_INT]
                        ]
                    );
                } else {
                    APP::Module('DB')->Insert(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        Array(
                            'id' => 'NULL',
                            'user' => [$user_id, PDO::PARAM_INT],
                            'question' => [$key, PDO::PARAM_INT],
                            'answer' => [$value, PDO::PARAM_STR],
                            'up_date' => 'NOW()'
                        )
                    );
                }
            }
        }
        
        if (isset($_POST['step'])) {
            switch ($_POST['step']) {
                case 1:
                    $step = 2;
                    break;
                case 2:
                    if (!APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['COUNT(id)'], 'polls_users',
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['poll', '=', $poll, PDO::PARAM_INT]
                        ]
                    )) {
                        APP::Module('DB')->Insert(
                            $this->settings['module_polls_db_connection'], 'polls_users',
                            Array(
                                'id' => 'NULL',
                                'user' => [$user_id, PDO::PARAM_INT],
                                'poll' => [$poll, PDO::PARAM_INT],
                                'up_date' => 'NOW()'
                            )
                        );
                    }
                    break;
            }
        }
        
        ////////////////////////////////////////////////////////////////////////
        
        if (APP::Module('DB')->Select(
            $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'polls_users',
            [
                ['user', '=', $user_id, PDO::PARAM_INT],
                ['poll', '=', $poll, PDO::PARAM_INT]
            ]
        )) {
            APP::Render(
                'polls/colors/complete', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
        } else {
            APP::Render(
                'polls/colors/step', 
                'include', 
                [
                    'step' => $step,
                    'poll' => APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['name'], 'polls',
                        [['id', '=', $poll, PDO::PARAM_INT]]
                    )
                ]
            );
        }
    }
    
    public function Colors2() {
        $poll = 11;
        $step = 1;
        
        $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);

        if (!APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'users',
            [['email', '=', isset($token['email']) ? $token['email'] : 0, PDO::PARAM_STR]]
        )) {
            APP::Render(
                'polls/error', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
            exit;
        }
        
        $user_id = APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['id'], 'users',
            [['email', '=', $token['email'], PDO::PARAM_STR]]
        );
        
        ////////////////////////////////////////////////////////////////////////
        
        if (isset($_POST['answers'])) {
            foreach ($_POST['answers'] as $key => $value) {
                if (APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['COUNT(id)'], 'polls_answers_users',
                    [
                        ['user', '=', $user_id, PDO::PARAM_INT],
                        ['question', '=', $key, PDO::PARAM_INT]
                    ]
                )) {
                    APP::Module('DB')->Update(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        ['answer' => $value],
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['question', '=', $key, PDO::PARAM_INT]
                        ]
                    );
                } else {
                    APP::Module('DB')->Insert(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        Array(
                            'id' => 'NULL',
                            'user' => [$user_id, PDO::PARAM_INT],
                            'question' => [$key, PDO::PARAM_INT],
                            'answer' => [$value, PDO::PARAM_STR],
                            'up_date' => 'NOW()'
                        )
                    );
                }
            }
        }
        
        if (isset($_POST['step'])) {
            switch ($_POST['step']) {
                case 1:
                    $step = 2;
                    break;
                case 2:
                    if (!APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['COUNT(id)'], 'polls_users',
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['poll', '=', $poll, PDO::PARAM_INT]
                        ]
                    )) {
                        APP::Module('DB')->Insert(
                            $this->settings['module_polls_db_connection'], 'polls_users',
                            Array(
                                'id' => 'NULL',
                                'user' => [$user_id, PDO::PARAM_INT],
                                'poll' => [$poll, PDO::PARAM_INT],
                                'up_date' => 'NOW()'
                            )
                        );
                    }
                    break;
            }
        }
        
        ////////////////////////////////////////////////////////////////////////
        
        if (APP::Module('DB')->Select(
            $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'polls_users',
            [
                ['user', '=', $user_id, PDO::PARAM_INT],
                ['poll', '=', $poll, PDO::PARAM_INT]
            ]
        )) {
            APP::Render(
                'polls/colors2/complete', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
        } else {
            APP::Render(
                'polls/colors2/step', 
                'include', 
                [
                    'step' => $step,
                    'poll' => APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['name'], 'polls',
                        [['id', '=', $poll, PDO::PARAM_INT]]
                    )
                ]
            );
        }
    }
    
    public function Imagemaker04() {
        $poll = 2;
        $step = 1;
        
        $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);

        if (!APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'users',
            [['email', '=', isset($token['email']) ? $token['email'] : 0, PDO::PARAM_STR]]
        )) {
            APP::Render(
                'polls/error', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
            exit;
        }
        
        $user_id = APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['id'], 'users',
            [['email', '=', $token['email'], PDO::PARAM_STR]]
        );
        
        ////////////////////////////////////////////////////////////////////////
        
        if (isset($_POST['answers'])) {
            foreach ($_POST['answers'] as $key => $value) {
                if (APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['COUNT(id)'], 'polls_answers_users',
                    [
                        ['user', '=', $user_id, PDO::PARAM_INT],
                        ['question', '=', $key, PDO::PARAM_INT]
                    ]
                )) {
                    APP::Module('DB')->Update(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        ['answer' => $value],
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['question', '=', $key, PDO::PARAM_INT]
                        ]
                    );
                } else {
                    APP::Module('DB')->Insert(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        Array(
                            'id' => 'NULL',
                            'user' => [$user_id, PDO::PARAM_INT],
                            'question' => [$key, PDO::PARAM_INT],
                            'answer' => [$value, PDO::PARAM_STR],
                            'up_date' => 'NOW()'
                        )
                    );
                }
            }
        }
        
        if (isset($_POST['step'])) {
            switch ($_POST['step']) {
                case 1:
                    $step = 2;
                    break;
                case 2:
                    $step = 3;
                    break;
                case 3:
                    if (!APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['COUNT(id)'], 'polls_users',
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['poll', '=', $poll, PDO::PARAM_INT]
                        ]
                    )) {
                        APP::Module('DB')->Insert(
                            $this->settings['module_polls_db_connection'], 'polls_users',
                            Array(
                                'id' => 'NULL',
                                'user' => [$user_id, PDO::PARAM_INT],
                                'poll' => [$poll, PDO::PARAM_INT],
                                'up_date' => 'NOW()'
                            )
                        );
                    }
                    break;
            }
        }
        
        ////////////////////////////////////////////////////////////////////////
        
        if (APP::Module('DB')->Select(
            $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'polls_users',
            [
                ['user', '=', $user_id, PDO::PARAM_INT],
                ['poll', '=', $poll, PDO::PARAM_INT]
            ]
        )) {
            APP::Render(
                'polls/imagemaker/04/complete', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
        } else {
            APP::Render(
                'polls/imagemaker/04/step', 
                'include', 
                [
                    'step' => $step,
                    'poll' => APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['name'], 'polls',
                        [['id', '=', $poll, PDO::PARAM_INT]]
                    )
                ]
            );
        }
    }
    
    public function Imagemaker03() {
        $poll = 6;
        $step = 1;
        
        $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);

        if (!APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'users',
            [['email', '=', isset($token['email']) ? $token['email'] : 0, PDO::PARAM_STR]]
        )) {
            APP::Render(
                'polls/error', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
            exit;
        }
        
        $user_id = APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['id'], 'users',
            [['email', '=', $token['email'], PDO::PARAM_STR]]
        );
        
        ////////////////////////////////////////////////////////////////////////
        
        if (isset($_POST['answers'])) {
            foreach ($_POST['answers'] as $key => $value) {
                if (APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['COUNT(id)'], 'polls_answers_users',
                    [
                        ['user', '=', $user_id, PDO::PARAM_INT],
                        ['question', '=', $key, PDO::PARAM_INT]
                    ]
                )) {
                    APP::Module('DB')->Update(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        ['answer' => $value],
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['question', '=', $key, PDO::PARAM_INT]
                        ]
                    );
                } else {
                    APP::Module('DB')->Insert(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        Array(
                            'id' => 'NULL',
                            'user' => [$user_id, PDO::PARAM_INT],
                            'question' => [$key, PDO::PARAM_INT],
                            'answer' => [$value, PDO::PARAM_STR],
                            'up_date' => 'NOW()'
                        )
                    );
                }
            }
        }
        
        if (isset($_POST['step'])) {
            switch ($_POST['step']) {
                case 1:
                    $step = 2;
                    break;
                case 2:
                    $step = 3;
                    break;
                case 3:
                    $step = 4;
                    break;
                case 4:
                    $step = 5;
                    break;
                case 5:
                    if (!APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['COUNT(id)'], 'polls_users',
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['poll', '=', $poll, PDO::PARAM_INT]
                        ]
                    )) {
                        APP::Module('DB')->Insert(
                            $this->settings['module_polls_db_connection'], 'polls_users',
                            Array(
                                'id' => 'NULL',
                                'user' => [$user_id, PDO::PARAM_INT],
                                'poll' => [$poll, PDO::PARAM_INT],
                                'up_date' => 'NOW()'
                            )
                        );
                    }
                    break;
            }
        }
        
        ////////////////////////////////////////////////////////////////////////
        
        if (APP::Module('DB')->Select(
            $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'polls_users',
            [
                ['user', '=', $user_id, PDO::PARAM_INT],
                ['poll', '=', $poll, PDO::PARAM_INT]
            ]
        )) {
            APP::Render(
                'polls/imagemaker/03/complete', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
        } else {
            APP::Render(
                'polls/imagemaker/03/step', 
                'include', 
                [
                    'step' => $step,
                    'poll' => APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['name'], 'polls',
                        [['id', '=', $poll, PDO::PARAM_INT]]
                    )
                ]
            );
        }
    }
    
    public function Imagemaker02() {
        $poll = 3;
        $step = 1;
        
        $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);

        if (!APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'users',
            [['email', '=', isset($token['email']) ? $token['email'] : 0, PDO::PARAM_STR]]
        )) {
            APP::Render(
                'polls/error', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
            exit;
        }
        
        $user_id = APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['id'], 'users',
            [['email', '=', $token['email'], PDO::PARAM_STR]]
        );
        
        ////////////////////////////////////////////////////////////////////////
        
        if (isset($_POST['answers'])) {
            foreach ($_POST['answers'] as $key => $value) {
                if (APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['COUNT(id)'], 'polls_answers_users',
                    [
                        ['user', '=', $user_id, PDO::PARAM_INT],
                        ['question', '=', $key, PDO::PARAM_INT]
                    ]
                )) {
                    APP::Module('DB')->Update(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        ['answer' => $value],
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['question', '=', $key, PDO::PARAM_INT]
                        ]
                    );
                } else {
                    APP::Module('DB')->Insert(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        Array(
                            'id' => 'NULL',
                            'user' => [$user_id, PDO::PARAM_INT],
                            'question' => [$key, PDO::PARAM_INT],
                            'answer' => [$value, PDO::PARAM_STR],
                            'up_date' => 'NOW()'
                        )
                    );
                }
            }
        }
        
        if (isset($_POST['step'])) {
            switch ($_POST['step']) {
                case 1:
                    $step = 2;
                    break;
                case 2:
                    $step = 3;
                    break;
                case 3:
                    $step = 4;
                    break;
                case 4:
                    if (!APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['COUNT(id)'], 'polls_users',
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['poll', '=', $poll, PDO::PARAM_INT]
                        ]
                    )) {
                        APP::Module('DB')->Insert(
                            $this->settings['module_polls_db_connection'], 'polls_users',
                            Array(
                                'id' => 'NULL',
                                'user' => [$user_id, PDO::PARAM_INT],
                                'poll' => [$poll, PDO::PARAM_INT],
                                'up_date' => 'NOW()'
                            )
                        );
                    }
                    break;
            }
        }
        
        ////////////////////////////////////////////////////////////////////////
        
        if (APP::Module('DB')->Select(
            $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'polls_users',
            [
                ['user', '=', $user_id, PDO::PARAM_INT],
                ['poll', '=', $poll, PDO::PARAM_INT]
            ]
        )) {
            APP::Render(
                'polls/imagemaker/02/complete', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
        } else {
            APP::Render(
                'polls/imagemaker/02/step', 
                'include', 
                [
                    'step' => $step,
                    'poll' => APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['name'], 'polls',
                        [['id', '=', $poll, PDO::PARAM_INT]]
                    )
                ]
            );
        }
    }
    
    public function ShoppingFW05() {
        $poll = 4;
        $step = 1;
        
        $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);

        if (!APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'users',
            [['email', '=', isset($token['email']) ? $token['email'] : 0, PDO::PARAM_STR]]
        )) {
            APP::Render(
                'polls/error', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
            exit;
        }
        
        $user_id = APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['id'], 'users',
            [['email', '=', $token['email'], PDO::PARAM_STR]]
        );
        
        ////////////////////////////////////////////////////////////////////////
        
        if (isset($_POST['answers'])) {
            foreach ($_POST['answers'] as $key => $value) {
                if (APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['COUNT(id)'], 'polls_answers_users',
                    [
                        ['user', '=', $user_id, PDO::PARAM_INT],
                        ['question', '=', $key, PDO::PARAM_INT]
                    ]
                )) {
                    APP::Module('DB')->Update(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        ['answer' => $value],
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['question', '=', $key, PDO::PARAM_INT]
                        ]
                    );
                } else {
                    APP::Module('DB')->Insert(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        Array(
                            'id' => 'NULL',
                            'user' => [$user_id, PDO::PARAM_INT],
                            'question' => [$key, PDO::PARAM_INT],
                            'answer' => [$value, PDO::PARAM_STR],
                            'up_date' => 'NOW()'
                        )
                    );
                }
            }
        }
        
        if (isset($_POST['step'])) {
            switch ($_POST['step']) {
                case 1:
                    $step = 2;
                    break;
                case 2:
                    $step = 3;
                    break;
                case 3:
                    $step = 4;
                    break;
                case 4:
                    if (!APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['COUNT(id)'], 'polls_users',
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['poll', '=', $poll, PDO::PARAM_INT]
                        ]
                    )) {
                        APP::Module('DB')->Insert(
                            $this->settings['module_polls_db_connection'], 'polls_users',
                            Array(
                                'id' => 'NULL',
                                'user' => [$user_id, PDO::PARAM_INT],
                                'poll' => [$poll, PDO::PARAM_INT],
                                'up_date' => 'NOW()'
                            )
                        );
                    }
                    break;
            }
        }
        
        ////////////////////////////////////////////////////////////////////////
        
        if (APP::Module('DB')->Select(
            $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'polls_users',
            [
                ['user', '=', $user_id, PDO::PARAM_INT],
                ['poll', '=', $poll, PDO::PARAM_INT]
            ]
        )) {
            APP::Render(
                'polls/shoppingfw/05/complete', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
        } else {
            APP::Render(
                'polls/shoppingfw/05/step', 
                'include', 
                [
                    'step' => $step,
                    'poll' => APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['name'], 'polls',
                        [['id', '=', $poll, PDO::PARAM_INT]]
                    )
                ]
            );
        }
    }
    
    public function ShoppingFW04() {
        $poll = 5;
        $step = 1;
        
        $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);

        if (!APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'users',
            [['email', '=', isset($token['email']) ? $token['email'] : 0, PDO::PARAM_STR]]
        )) {
            APP::Render(
                'polls/error', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
            exit;
        }
        
        $user_id = APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['id'], 'users',
            [['email', '=', $token['email'], PDO::PARAM_STR]]
        );
        
        ////////////////////////////////////////////////////////////////////////
        
        if (isset($_POST['answers'])) {
            foreach ($_POST['answers'] as $key => $value) {
                if (APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['COUNT(id)'], 'polls_answers_users',
                    [
                        ['user', '=', $user_id, PDO::PARAM_INT],
                        ['question', '=', $key, PDO::PARAM_INT]
                    ]
                )) {
                    APP::Module('DB')->Update(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        ['answer' => $value],
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['question', '=', $key, PDO::PARAM_INT]
                        ]
                    );
                } else {
                    APP::Module('DB')->Insert(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        Array(
                            'id' => 'NULL',
                            'user' => [$user_id, PDO::PARAM_INT],
                            'question' => [$key, PDO::PARAM_INT],
                            'answer' => [$value, PDO::PARAM_STR],
                            'up_date' => 'NOW()'
                        )
                    );
                }
            }
        }
        
        if (isset($_POST['step'])) {
            switch ($_POST['step']) {
                case 1:
                    $step = 2;
                    break;
                case 2:
                    $step = 3;
                    break;
                case 3:
                    $step = 4;
                    break;
                case 4:
                    if (!APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['COUNT(id)'], 'polls_users',
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['poll', '=', $poll, PDO::PARAM_INT]
                        ]
                    )) {
                        APP::Module('DB')->Insert(
                            $this->settings['module_polls_db_connection'], 'polls_users',
                            Array(
                                'id' => 'NULL',
                                'user' => [$user_id, PDO::PARAM_INT],
                                'poll' => [$poll, PDO::PARAM_INT],
                                'up_date' => 'NOW()'
                            )
                        );
                    }
                    break;
            }
        }
        
        ////////////////////////////////////////////////////////////////////////
        
        if (APP::Module('DB')->Select(
            $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'polls_users',
            [
                ['user', '=', $user_id, PDO::PARAM_INT],
                ['poll', '=', $poll, PDO::PARAM_INT]
            ]
        )) {
            APP::Render(
                'polls/shoppingfw/04/complete', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
        } else {
            APP::Render(
                'polls/shoppingfw/04/step', 
                'include', 
                [
                    'step' => $step,
                    'poll' => APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['name'], 'polls',
                        [['id', '=', $poll, PDO::PARAM_INT]]
                    )
                ]
            );
        }
    }
    
    public function Headwear() {
        $poll = 7;
        $step = 1;
        
        $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);

        if (!APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'users',
            [['email', '=', isset($token['email']) ? $token['email'] : 0, PDO::PARAM_STR]]
        )) {
            APP::Render(
                'polls/error', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
            exit;
        }
        
        $user_id = APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['id'], 'users',
            [['email', '=', $token['email'], PDO::PARAM_STR]]
        );
        
        ////////////////////////////////////////////////////////////////////////
        
        if (isset($_POST['answers'])) {
            foreach ($_POST['answers'] as $key => $value) {
                if (APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['COUNT(id)'], 'polls_answers_users',
                    [
                        ['user', '=', $user_id, PDO::PARAM_INT],
                        ['question', '=', $key, PDO::PARAM_INT]
                    ]
                )) {
                    APP::Module('DB')->Update(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        ['answer' => $value],
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['question', '=', $key, PDO::PARAM_INT]
                        ]
                    );
                } else {
                    APP::Module('DB')->Insert(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        Array(
                            'id' => 'NULL',
                            'user' => [$user_id, PDO::PARAM_INT],
                            'question' => [$key, PDO::PARAM_INT],
                            'answer' => [$value, PDO::PARAM_STR],
                            'up_date' => 'NOW()'
                        )
                    );
                }
            }
        }
        
        if (isset($_POST['step'])) {
            switch ($_POST['step']) {
                case 1:
                    $step = 2;
                    break;
                case 2:
                    if (!APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['COUNT(id)'], 'polls_users',
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['poll', '=', $poll, PDO::PARAM_INT]
                        ]
                    )) {
                        APP::Module('DB')->Insert(
                            $this->settings['module_polls_db_connection'], 'polls_users',
                            Array(
                                'id' => 'NULL',
                                'user' => [$user_id, PDO::PARAM_INT],
                                'poll' => [$poll, PDO::PARAM_INT],
                                'up_date' => 'NOW()'
                            )
                        );
                    }
                    break;
            }
        }
        
        ////////////////////////////////////////////////////////////////////////
        
        if (APP::Module('DB')->Select(
            $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'polls_users',
            [
                ['user', '=', $user_id, PDO::PARAM_INT],
                ['poll', '=', $poll, PDO::PARAM_INT]
            ]
        )) {
            APP::Render(
                'polls/headwear/complete', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
        } else {
            APP::Render(
                'polls/headwear/step', 
                'include', 
                [
                    'step' => $step,
                    'poll' => APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['name'], 'polls',
                        [['id', '=', $poll, PDO::PARAM_INT]]
                    )
                ]
            );
        }
    }
    
    public function Outerwear() {
        $poll = 8;
        $step = 1;
        
        $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);

        if (!APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'users',
            [['email', '=', isset($token['email']) ? $token['email'] : 0, PDO::PARAM_STR]]
        )) {
            APP::Render(
                'polls/error', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
            exit;
        }
        
        $user_id = APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['id'], 'users',
            [['email', '=', $token['email'], PDO::PARAM_STR]]
        );
        
        ////////////////////////////////////////////////////////////////////////
        
        if (isset($_POST['answers'])) {
            foreach ($_POST['answers'] as $key => $value) {
                if (APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['COUNT(id)'], 'polls_answers_users',
                    [
                        ['user', '=', $user_id, PDO::PARAM_INT],
                        ['question', '=', $key, PDO::PARAM_INT]
                    ]
                )) {
                    APP::Module('DB')->Update(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        ['answer' => $value],
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['question', '=', $key, PDO::PARAM_INT]
                        ]
                    );
                } else {
                    APP::Module('DB')->Insert(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        Array(
                            'id' => 'NULL',
                            'user' => [$user_id, PDO::PARAM_INT],
                            'question' => [$key, PDO::PARAM_INT],
                            'answer' => [$value, PDO::PARAM_STR],
                            'up_date' => 'NOW()'
                        )
                    );
                }
            }
        }
        
        if (isset($_POST['step'])) {
            switch ($_POST['step']) {
                case 1:
                    if (!APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['COUNT(id)'], 'polls_users',
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['poll', '=', $poll, PDO::PARAM_INT]
                        ]
                    )) {
                        APP::Module('DB')->Insert(
                            $this->settings['module_polls_db_connection'], 'polls_users',
                            Array(
                                'id' => 'NULL',
                                'user' => [$user_id, PDO::PARAM_INT],
                                'poll' => [$poll, PDO::PARAM_INT],
                                'up_date' => 'NOW()'
                            )
                        );
                    }
                    break;
            }
        }
        
        ////////////////////////////////////////////////////////////////////////
        
        if (APP::Module('DB')->Select(
            $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'polls_users',
            [
                ['user', '=', $user_id, PDO::PARAM_INT],
                ['poll', '=', $poll, PDO::PARAM_INT]
            ]
        )) {
            APP::Render(
                'polls/outerwear/complete', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
        } else {
            APP::Render(
                'polls/outerwear/step', 
                'include', 
                [
                    'step' => $step,
                    'poll' => APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['name'], 'polls',
                        [['id', '=', $poll, PDO::PARAM_INT]]
                    )
                ]
            );
        }
    }
    
    public function Wardrobe() {
        $poll = 9;
        $step = 1;
        
        $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);

        if (!APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'users',
            [['email', '=', isset($token['email']) ? $token['email'] : 0, PDO::PARAM_STR]]
        )) {
            APP::Render(
                'polls/error', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
            exit;
        }
        
        $user_id = APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['id'], 'users',
            [['email', '=', $token['email'], PDO::PARAM_STR]]
        );
        
        ////////////////////////////////////////////////////////////////////////
        
        if (isset($_POST['answers'])) {
            foreach ($_POST['answers'] as $key => $value) {
                if (APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['COUNT(id)'], 'polls_answers_users',
                    [
                        ['user', '=', $user_id, PDO::PARAM_INT],
                        ['question', '=', $key, PDO::PARAM_INT]
                    ]
                )) {
                    APP::Module('DB')->Update(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        ['answer' => $value],
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['question', '=', $key, PDO::PARAM_INT]
                        ]
                    );
                } else {
                    APP::Module('DB')->Insert(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        Array(
                            'id' => 'NULL',
                            'user' => [$user_id, PDO::PARAM_INT],
                            'question' => [$key, PDO::PARAM_INT],
                            'answer' => [$value, PDO::PARAM_STR],
                            'up_date' => 'NOW()'
                        )
                    );
                }
            }
        }
        
        if (isset($_POST['step'])) {
            switch ($_POST['step']) {
                case 1:
                    $step = 2;
                    break;
                case 2:
                    if (!APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['COUNT(id)'], 'polls_users',
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['poll', '=', $poll, PDO::PARAM_INT]
                        ]
                    )) {
                        APP::Module('DB')->Insert(
                            $this->settings['module_polls_db_connection'], 'polls_users',
                            Array(
                                'id' => 'NULL',
                                'user' => [$user_id, PDO::PARAM_INT],
                                'poll' => [$poll, PDO::PARAM_INT],
                                'up_date' => 'NOW()'
                            )
                        );
                    }
                    break;
            }
        }
        
        ////////////////////////////////////////////////////////////////////////
        
        if (APP::Module('DB')->Select(
            $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'polls_users',
            [
                ['user', '=', $user_id, PDO::PARAM_INT],
                ['poll', '=', $poll, PDO::PARAM_INT]
            ]
        )) {
            APP::Render(
                'polls/wardrobe/complete', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
        } else {
            APP::Render(
                'polls/wardrobe/step', 
                'include', 
                [
                    'step' => $step,
                    'poll' => APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['name'], 'polls',
                        [['id', '=', $poll, PDO::PARAM_INT]]
                    )
                ]
            );
        }
    }
    
    public function Poll101Office() {
        $poll = 10;
        $step = 1;
        
        $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);

        if (!APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'users',
            [['email', '=', isset($token['email']) ? $token['email'] : 0, PDO::PARAM_STR]]
        )) {
            APP::Render(
                'polls/error', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
            exit;
        }
        
        $user_id = APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['id'], 'users',
            [['email', '=', $token['email'], PDO::PARAM_STR]]
        );
        
        ////////////////////////////////////////////////////////////////////////
        
        if (isset($_POST['answers'])) {
            foreach ($_POST['answers'] as $key => $value) {
                if (APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['COUNT(id)'], 'polls_answers_users',
                    [
                        ['user', '=', $user_id, PDO::PARAM_INT],
                        ['question', '=', $key, PDO::PARAM_INT]
                    ]
                )) {
                    APP::Module('DB')->Update(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        ['answer' => $value],
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['question', '=', $key, PDO::PARAM_INT]
                        ]
                    );
                } else {
                    APP::Module('DB')->Insert(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        Array(
                            'id' => 'NULL',
                            'user' => [$user_id, PDO::PARAM_INT],
                            'question' => [$key, PDO::PARAM_INT],
                            'answer' => [$value, PDO::PARAM_STR],
                            'up_date' => 'NOW()'
                        )
                    );
                }
            }
        }
        
        if (isset($_POST['step'])) {
            switch ($_POST['step']) {
                case 1:
                    $step = 2;
                    break;
                case 2:
                    $step = 3;
                    break;
                case 3:
                    if (!APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['COUNT(id)'], 'polls_users',
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['poll', '=', $poll, PDO::PARAM_INT]
                        ]
                    )) {
                        APP::Module('DB')->Insert(
                            $this->settings['module_polls_db_connection'], 'polls_users',
                            Array(
                                'id' => 'NULL',
                                'user' => [$user_id, PDO::PARAM_INT],
                                'poll' => [$poll, PDO::PARAM_INT],
                                'up_date' => 'NOW()'
                            )
                        );
                    }
                    break;
            }
        }
        
        ////////////////////////////////////////////////////////////////////////
        
        if (APP::Module('DB')->Select(
            $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'polls_users',
            [
                ['user', '=', $user_id, PDO::PARAM_INT],
                ['poll', '=', $poll, PDO::PARAM_INT]
            ]
        )) {
            APP::Render(
                'polls/101office/complete', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
        } else {
            APP::Render(
                'polls/101office/step', 
                'include', 
                [
                    'step' => $step,
                    'poll' => APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['name'], 'polls',
                        [['id', '=', $poll, PDO::PARAM_INT]]
                    )
                ]
            );
        }
    }
    
    public function NY() {
        $poll = 12;
        $step = 1;
        
        $token = json_decode(APP::Module('Crypt')->Decode(APP::Module('Routing')->get['token']), true);

        if (!APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'users',
            [['email', '=', isset($token['email']) ? $token['email'] : 0, PDO::PARAM_STR]]
        )) {
            APP::Render(
                'polls/error', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
            exit;
        }
        
        $user_id = APP::Module('DB')->Select(
            APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['id'], 'users',
            [['email', '=', $token['email'], PDO::PARAM_STR]]
        );
        
        ////////////////////////////////////////////////////////////////////////
        
        if (isset($_POST['answers'])) {
            foreach ($_POST['answers'] as $key => $value) {
                if (APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['COUNT(id)'], 'polls_answers_users',
                    [
                        ['user', '=', $user_id, PDO::PARAM_INT],
                        ['question', '=', $key, PDO::PARAM_INT]
                    ]
                )) {
                    APP::Module('DB')->Update(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        ['answer' => $value],
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['question', '=', $key, PDO::PARAM_INT]
                        ]
                    );
                } else {
                    APP::Module('DB')->Insert(
                        $this->settings['module_polls_db_connection'], 'polls_answers_users',
                        Array(
                            'id' => 'NULL',
                            'user' => [$user_id, PDO::PARAM_INT],
                            'question' => [$key, PDO::PARAM_INT],
                            'answer' => [$value, PDO::PARAM_STR],
                            'up_date' => 'NOW()'
                        )
                    );
                }
            }
        }
        
        if (isset($_POST['step'])) {
            switch ($_POST['step']) {
                case 1:
                    if (!APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['COUNT(id)'], 'polls_users',
                        [
                            ['user', '=', $user_id, PDO::PARAM_INT],
                            ['poll', '=', $poll, PDO::PARAM_INT]
                        ]
                    )) {
                        APP::Module('DB')->Insert(
                            $this->settings['module_polls_db_connection'], 'polls_users',
                            Array(
                                'id' => 'NULL',
                                'user' => [$user_id, PDO::PARAM_INT],
                                'poll' => [$poll, PDO::PARAM_INT],
                                'up_date' => 'NOW()'
                            )
                        );
                    }
                    break;
            }
        }
        
        ////////////////////////////////////////////////////////////////////////
        
        if (APP::Module('DB')->Select(
            $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
            ['COUNT(id)'], 'polls_users',
            [
                ['user', '=', $user_id, PDO::PARAM_INT],
                ['poll', '=', $poll, PDO::PARAM_INT]
            ]
        )) {
            APP::Render(
                'polls/ny/complete', 
                'include', 
                APP::Module('DB')->Select(
                    $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                    ['name'], 'polls',
                    [['id', '=', $poll, PDO::PARAM_INT]]
                )
            );
        } else {
            APP::Render(
                'polls/ny/step', 
                'include', 
                [
                    'step' => $step,
                    'poll' => APP::Module('DB')->Select(
                        $this->settings['module_polls_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
                        ['name'], 'polls',
                        [['id', '=', $poll, PDO::PARAM_INT]]
                    )
                ]
            );
        }
    }

}