<?
return [
    'routes' => [
        ['admin\/polls(\?.*)?',                     'Polls', 'Manage'],
        
        ['polls\/colors\/(?P<token>.+)',            'Polls', 'Colors'],         // Опрос по цвету
        ['polls\/colors2\/(?P<token>.+)',           'Polls', 'Colors2'],        // Опрос по цвету 2
        ['polls\/imagemaker\/04\/(?P<token>.+)',    'Polls', 'Imagemaker04'],   // Революция цвета
        ['polls\/imagemaker\/03\/(?P<token>.+)',    'Polls', 'Imagemaker03'],   // Вы интересовались темой о создании портфолио
        ['polls\/imagemaker\/02\/(?P<token>.+)',    'Polls', 'Imagemaker02'],   // Опрос для имиджмейкеров по раскрутке в интернете
        ['polls\/shoppingfw\/05\/(?P<token>.+)',    'Polls', 'ShoppingFW05'],   // Шоппинг осень-зима под контролем стилиста
        ['polls\/shoppingfw\/04\/(?P<token>.+)',    'Polls', 'ShoppingFW04'],   // Шоппинг осень-зима под контролем стилиста
        ['polls\/headwear\/(?P<token>.+)',          'Polls', 'Headwear'],       // Головные уборы
        ['polls\/outerwear\/(?P<token>.+)',         'Polls', 'Outerwear'],      // Верхняя одежда
        ['polls\/wardrobe\/(?P<token>.+)',          'Polls', 'Wardrobe'],       // Гардероб
        ['polls\/101office\/(?P<token>.+)',         'Polls', 'Poll101Office'],  // 101 офис
        ['polls\/ny\/(?P<token>.+)',                'Polls', 'NY'],             // Вы записывались в предварительные список на новогоднюю распродажу, но почему-то в ней не проучаствовали
    
        ['admin\/polls\/api\/list\.json(\?.*)?',    'Polls', 'APIPollsList'], 
        ['admin\/polls\/api\/data\.json(\?.*)?',    'Polls', 'APIPollsData'], 
    ]
];