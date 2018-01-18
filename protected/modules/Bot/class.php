<?
class Bot {

    public $settings;
    
    function __construct($conf) {
        foreach ($conf['routes'] as $route) APP::Module('Routing')->Add($route[0], $route[1], $route[2]);
    }
    
    public function Init() {
        $this->settings = APP::Module('Registry')->Get([
            'module_bot_db_connection'
        ]);
    }
    
    public function MailingInfoSlack() {
        foreach (APP::Module('DB')->Select(
            $this->settings['module_bot_db_connection'], ['fetchAll', PDO::FETCH_ASSOC],
            ['*'], 'bot',
            [
                ['task', '=', 'mailing_info_slack', PDO::PARAM_STR],
            ]
        ) as $task) {
            $settings = json_decode($task['settings'], true);
            
            $mail_log = [
                'letter' => APP::Module('DB')->Select(
                    APP::Module('Mail')->settings['module_mail_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                    ['subject'], 'mail_letters',
                    [
                        ['id', '=', $settings['letter'], PDO::PARAM_INT],
                    ]
                ),
                'total' => APP::Module('DB')->Select(
                    APP::Module('Mail')->settings['module_mail_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                    ['COUNT(id)'], 'mail_log',
                    [
                        ['letter', '=', $settings['letter'], PDO::PARAM_INT],
                    ]
                ),
                'wait' => APP::Module('DB')->Select(
                    APP::Module('Mail')->settings['module_mail_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                    ['COUNT(id)'], 'mail_log',
                    [
                        ['letter', '=', $settings['letter'], PDO::PARAM_INT],
                        ['state', '=', 'wait', PDO::PARAM_STR],
                    ]
                ),
                'error' => APP::Module('DB')->Select(
                    APP::Module('Mail')->settings['module_mail_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                    ['COUNT(id)'], 'mail_log',
                    [
                        ['letter', '=', $settings['letter'], PDO::PARAM_INT],
                        ['state', '=', 'error', PDO::PARAM_STR],
                    ]
                ),
                'success' => APP::Module('DB')->Select(
                    APP::Module('Mail')->settings['module_mail_db_connection'], ['fetch', PDO::FETCH_COLUMN],
                    ['COUNT(id)'], 'mail_log',
                    [
                        ['letter', '=', $settings['letter'], PDO::PARAM_INT],
                        ['state', '=', 'success', PDO::PARAM_STR],
                    ]
                )
            ];
            
            if ($mail_log['wait'] == 0) {
                $message = [
                    'text' => "Рассылка (" . $mail_log['letter'] . ") закончена - отправлено " . $mail_log['success'] . " из " . $mail_log['total'],
                    'fallback' => "Рассылка (" . $mail_log['letter'] . ") закончена - отправлено " . $mail_log['success'] . " из " . $mail_log['total']
                ];
                
                APP::Module('DB')->Delete($this->settings['module_bot_db_connection'], 'bot', [['id', '=', $task['id'], PDO::PARAM_INT]]);
            } else {
                $message = [
                    'text' => "Выполняется рассылка (" . $mail_log['letter'] . ") - отправлено " . $mail_log['success'] . " из " . $mail_log['total'],
                    'fallback' => "Выполняется рассылка (" . $mail_log['letter'] . ") - отправлено " . $mail_log['success'] . " из " . $mail_log['total'],
                    'attachments' => [
                        [
                            'text' => ""
                            . "Всего писем: " . $mail_log['total'] . "\n\n"
                            . "Ожидают отправки: " . $mail_log['wait'] . "\n\n"
                            . "Успешно отправлено: " . $mail_log['success'] . "\n\n"
                            . "Возникла ошибка: " . $mail_log['error'] . ""
                        ]
                    ]
                ];
            }

            $this->SendMessage($message, 'techsupport');
        }
    }

    public function SendMessage($message, $channel) {
        $message['text'] = '[' . DEFAULT_DOMAIN . '] ' . $message['text'];
        
        ob_start();
        
        APP::Module('Utils')->Curl([
            'url' => 'https://hooks.slack.com/services/' . $this->conf['channels'][$channel],
            'post' => json_encode($message)
        ]);
        
        ob_clean();
    }
    
}
