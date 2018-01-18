<?
return [
    'routes' => [
        ['admin\/sxgeo\/test',                                'SxGeo', 'Test'],
        ['admin\/sxgeo\/settings(\?.*)?',                     'SxGeo', 'Settings'],
        ['admin\/sxgeo\/api\/settings\/update\.json(\?.*)?',  'SxGeo', 'APIUpdateSettings'],
    ]
];