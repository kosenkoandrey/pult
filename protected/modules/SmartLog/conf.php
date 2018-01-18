<?
return Array(
    'routes' => [
        ['admin\/smartlog(\?.*)?',                          'SmartLog', 'Manage'],
        ['admin\/smartlog\/view\/(?P<smartlog_id_hash>.*)', 'SmartLog', 'View'],
        
        ['admin\/smartlog\/api\/search\.json(\?.*)?',       'SmartLog', 'APISearch'],
        ['admin\/smartlog\/api\/action\.json(\?.*)?',       'SmartLog', 'APISearchAction'],
        ['admin\/smartlog\/api\/remove\.json(\?.*)?',       'SmartLog', 'APIRemove'],
        ['admin\/smartlog\/api\/rollback\.json(\?.*)?',     'SmartLog', 'APIRollback'],
    ]
);