<?
define('DEFAULT_DOMAIN', 'dev.mailiq.ru');

return [
    'location' => ['http', isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : DEFAULT_DOMAIN, '/'],
    'encoding' => 'UTF-8',
    'locale' => 'ru_RU',
    'timezone' => 'Etc/GMT-3',
    'error_reporting' => E_ALL,
    'max_execution_time' => '6000',
    'memory_limit' => '5G',
    'debug' => true,
    'install' => false,
    'logs' => '/home/pult_mailiq_ru/logs',
    'gelf' => [
        'server' => '185.17.120.253',
        'port' => 12201,
        'types' => ['php-errors']
    ]
];
