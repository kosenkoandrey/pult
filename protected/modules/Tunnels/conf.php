<?
return [
    'init' => true,
    'routes' => [
        ['admin\/tunnels(\?.*)?',                                   'Tunnels', 'ManageTunnels'],
        ['admin\/tunnels\/add(\?.*)?',                              'Tunnels', 'AddTunnel'],
        ['admin\/tunnels\/edit\/(?P<tunnel_id_hash>.*)',            'Tunnels', 'EditTunnel'],
        ['admin\/tunnels\/smartlog\/(?P<tunnel_id_hash>.*)',        'Tunnels', 'SmartlogTunnel'],
        ['admin\/tunnels\/scheme\/(?P<tunnel_id_hash>.*)',          'Tunnels', 'TunnelScheme'],
        ['admin\/tunnels\/settingss(\?.*)?',                         'Tunnels', 'Settings'],
        ['admin\/tunnels\/monitor(\?.*)?',                          'Tunnels', 'Monitor'],
        
        ['admin\/tunnels\/api\/dashboard\.json(\?.*)?',             'Tunnels', 'APIDashboard'],
        ['admin\/tunnels\/api\/search\.json(\?.*)?',                'Tunnels', 'APISearchTunnels'],
        ['admin\/tunnels\/api\/action\.json(\?.*)?',                'Tunnels', 'APISearchAction'],
        ['admin\/tunnels\/api\/add\.json(\?.*)?',                   'Tunnels', 'APIAddTunnel'],
        ['admin\/tunnels\/api\/remove\.json(\?.*)?',                'Tunnels', 'APIRemoveTunnel'],
        ['admin\/tunnels\/api\/update\.json(\?.*)?',                'Tunnels', 'APIUpdateTunnel'],
        ['admin\/tunnels\/api\/settingss\/update\.json(\?.*)?',      'Tunnels', 'APIUpdateSettings'],
        
        ['admin\/tunnels\/api\/scheme\.json(\?.*)?',                'Tunnels', 'APIScheme'],
        ['admin\/tunnels\/api\/manage\.json(\?.*)?',                'Tunnels', 'APIManage'],
        
        ['admin\/tunnels\/api\/actions\/create\.json(\?.*)?',       'Tunnels', 'APICreateAction'],
        ['admin\/tunnels\/api\/actions\/update\.json(\?.*)?',       'Tunnels', 'APIUpdateAction'],
        ['admin\/tunnels\/api\/actions\/remove\.json(\?.*)?',       'Tunnels', 'APIRemoveAction'],
        
        ['admin\/tunnels\/api\/conditions\/create\.json(\?.*)?',    'Tunnels', 'APICreateCondition'],
        ['admin\/tunnels\/api\/conditions\/update\.json(\?.*)?',    'Tunnels', 'APIUpdateCondition'],
        ['admin\/tunnels\/api\/conditions\/remove\.json(\?.*)?',    'Tunnels', 'APIRemoveCondition'],
        
        ['admin\/tunnels\/api\/timeouts\/create\.json(\?.*)?',      'Tunnels', 'APICreateTimeout'],
        ['admin\/tunnels\/api\/timeouts\/update\.json(\?.*)?',      'Tunnels', 'APIUpdateTimeout'],
        ['admin\/tunnels\/api\/timeouts\/remove\.json(\?.*)?',      'Tunnels', 'APIRemoveTimeout'],
        
        ['admin\/tunnels\/api\/users\/state\.json(\?.*)?',          'Tunnels', 'APIChangeUserState'],
        
        ['tunnels\/api\/subscribe\.json(\?.*)?',                    'Tunnels', 'APISubscribe'],
        ['tunnels\/api\/tags\/add\.json(\?.*)?',                    'Tunnels', 'APIAddTag'],
        ['tunnels\/api\/next\.json(\?.*)?',                         'Tunnels', 'APINext'],
        
        ['tunnels\/exec(\?.*)?',                                    'Tunnels', 'Exec'],
        ['tunnels\/queue(\?.*)?',                                   'Tunnels', 'Queue'],
        ['tunnels\/timer\/(?P<input>.*)',                           'Tunnels', 'Timer'],
        ['tunnels\/unsubscribe\/(?P<user_tunnel_hash>.*)',          'Tunnels', 'Unsubscribe'],
        ['tunnels\/next\/(?P<token>[a-zA-Z0-9-_]+)\/(?P<groups_hash>[a-zA-Z0-9-_]+)(\?.*)?',    'Tunnels', 'Next'],
        
        ['admin\/tunnels\/test\/subscribe(\?.*)?',                  'Tunnels', 'TestSubscribe'],   
    ],
    'next' => [
        'style' => [
            3 => [
                'id' => [3, 4],
                'name' => 'какие вещи должны быть в гардеробе и как правильно составлять комплекты',
                'settings' => [
                    'tunnel' => [3, 'actions', 27, 0],
                    'activation' => [349, 'https://www.glamurnenko.ru']
                ]
            ],
            5 => [
                'id' => [5],
                'name' => 'как выглядеть стройнее на 2 размера с помощью правильно подобранной одежды',
                'settings' => [
                    'tunnel' => [5, 'actions', 40, 0],
                    'activation' => [349, 'https://www.glamurnenko.ru']
                ]
            ],
            13 => [
                'id' => [13],
                'name' => 'как составлять вкусные и интересные комплекты в офис',
                'settings' => [
                    'tunnel' => [13, 'actions', 114, 0],
                    'activation' => [349, 'https://www.glamurnenko.ru']
                ]
            ],
            14 => [
                'id' => [14],
                'name' => 'базовые советы по стилю и имиджу',
                'settings' => [
                    'tunnel' => [14, 'actions', 128, 0],
                    'activation' => [349, 'https://www.glamurnenko.ru']
                ]
            ],
            7 => [
                'id' => [7],
                'name' => 'как стать стилистом-имиджмейкером и начать получать за это деньги',
                'settings' => [
                    'tunnel'    => [7, 'actions', 64, 0],
                    'activation'    => [349, 'https://www.glamurnenko.ru']
                ]
            ],
            15 => [
                'id' => [48],
                'name' => 'как составлять вкусные, интересные и дорогие цветовые сочетания в своем гардеробе и как с их помощью влиять на людей',
                'settings' => [
                    'tunnel' => [48, 'actions', 415, 0],
                    'activation' => [349, 'https://www.glamurnenko.ru']
                ]
            ],
            20 => [
                'id' => [20],
                'name' => 'MakeUp Must Have: идеально подходящий вам макияж за 15 минут в день',
                'settings' => [
                    'tunnel' => [20, 'actions', 200, 0],
                    'activation' => [349, 'https://www.glamurnenko.ru']
                ]
            ],
            16 => [
                'id' => [16],
                'name' => 'всё о верхней одежде',
                'settings' => [
                    'tunnel' => [16, 'actions', 155, 0],
                    'activation' => [349, 'https://www.glamurnenko.ru']
                ]
            ],
            /*'2' => [
                'id' => [2],
                'name' => 'шоппинг сезона осень-зима (как разобрать гардероб и правильно сходить на шоппинг)',
                'settings' => [
                    'tunnel' => [2, 'actions', 8, 0],
                    'activation' => [349, 'https://www.glamurnenko.ru']
                ]
            ],*/
            19 => [
                'id' => [19],
                'name' => 'шоппинг сезона весна-лето (как разобрать гардероб и правильно сходить на шоппинг)',
                'settings' => [
                    'tunnel' => [19, 'actions', 183, 0],
                    'activation' => [349, 'https://www.glamurnenko.ru']
                ]
            ],
            17 => [
                'id' => [17],
                'name' => 'всё о головных уборах',
                'settings' => [
                    'tunnel' => [17, 'actions', 167, 0],
                    'activation' => [349, 'https://www.glamurnenko.ru']
                ]
            ]
        ],
        'im' => [
            10 => [
                'id' => [10,9],
                'name' => 'как имиджмейкеру находить клиентов через интернет',
                'settings' => [
                    'tunnel' => [10, 'actions', 99, 0],
                    'activation' => [349, 'https://www.glamurnenko.ru']
                ]
            ]
        ]
    ]
];