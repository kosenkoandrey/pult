<?
return [
    'routes' => [
        ['admin\/crypt',                                        'Crypt', 'Settings'],           // Crypt settings
        ['admin\/crypt\/api\/settings\/update\.json(\?.*)?',    'Crypt', 'APIUpdateSettings'],  // [API] Update crypt settings
        
        ['crypt\/api\/encode\.json(\?.*)?',                     'Crypt', 'APIEncode'],          // [API] Encode string
        ['crypt\/api\/decode\.json(\?.*)?',                     'Crypt', 'APIDecode']           // [API] Decode string
    ]
];