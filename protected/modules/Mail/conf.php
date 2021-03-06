<?
return [
    'routes' => [
        ['admin\/mail\/letters\/email-builder\/select(\?.*)?',                                      'Mail', 'EmailBuilderSelect'],  // E-Mail builder select
        
        ['mail\/spamreport\/(?P<mail_log_hash>.*)',                                                 'Mail', 'Spamreport'],          // Spamreport
        ['mail\/letters\/view\/(?P<letter_id_hash>.*)(\?.*)?',                                      'Mail', 'ViewLetter'],          // View letter
        
        //['admin\/mail\/letters\/preview\/(?P<letter_id_hash>[a-zA-Z0-9-_]+)(\?.*)?',                'Mail', 'PreviewLetter'],       // Preview letter
        
        ['admin\/mail\/letters\/preview\/(?P<letter_id_hash>[a-zA-Z0-9-_]+)(\?.*)?',                'Mail', 'PreviewLetterIndex'],  // Preview letter
        ['admin\/mail\/letters\/preview\/nav\/(?P<letter_id_hash>[a-zA-Z0-9-_]+)(\?.*)?',           'Mail', 'PreviewLetterNav'],    // Preview letter nav
        ['admin\/mail\/letters\/preview\/view\/(?P<letter_id_hash>[a-zA-Z0-9-_]+)(\?.*)?',          'Mail', 'PreviewLetterView'],   // Preview letter view
        ['admin\/mail\/letters\/preview\/code\/(?P<letter_id_hash>[a-zA-Z0-9-_]+)(\?.*)?',          'Mail', 'PreviewLetterCode'],   // Preview letter code
        ['admin\/mail\/letters\/preview\/update\/(?P<letter_id_hash>[a-zA-Z0-9-_]+)(\?.*)?',        'Mail', 'APIPreviewLetterUpdate'], // Preview letter update
        
        ['admin\/mail\/letters\/(?P<group_sub_id_hash>.*)\/groups\/add',                            'Mail', 'AddLettersGroup'],     // Add letters group
        ['admin\/mail\/letters\/(?P<group_sub_id_hash>.*)\/groups\/(?P<group_id_hash>.*)\/edit',    'Mail', 'EditLettersGroup'],    // Edit letters group
        ['admin\/mail\/letters\/(?P<group_sub_id_hash>.*)\/add\/(?P<editor>code|builder)(\?.*)?',   'Mail', 'AddLetter'],           // Add letter
        ['admin\/mail\/letters\/(?P<group_sub_id_hash>.*)\/edit\/(?P<letter_id_hash>.*)',           'Mail', 'EditLetter'],          // Edit letter
        ['admin\/mail\/letters\/(?P<group_sub_id_hash>.*)',                                         'Mail', 'ManageLetters'],       // Manage letters

        ['admin\/mail\/senders\/(?P<group_sub_id_hash>.*)\/groups\/add',                            'Mail', 'AddSendersGroup'],     // Add senders group
        ['admin\/mail\/senders\/(?P<group_sub_id_hash>.*)\/groups\/(?P<group_id_hash>.*)\/edit',    'Mail', 'EditSendersGroup'],    // Edit senders group
        ['admin\/mail\/senders\/(?P<group_sub_id_hash>.*)\/add(\?.*)?',                             'Mail', 'AddSender'],           // Add sender
        ['admin\/mail\/senders\/(?P<group_sub_id_hash>.*)\/edit\/(?P<sender_id_hash>.*)',           'Mail', 'EditSender'],          // Edit sender
        ['admin\/mail\/senders\/(?P<group_sub_id_hash>.*)',                                         'Mail', 'ManageSenders'],       // Manage senders
        
        ['admin\/mail\/settings(\?.*)?',                                                            'Mail', 'Settings'],            // Mail settings
        
        ['admin\/mail\/transport(\?.*)?',                                                           'Mail', 'ManageTransports'],    // Manage transport
        ['admin\/mail\/transport\/add',                                                             'Mail', 'AddTransport'],        // Add transport
        ['admin\/mail\/transport\/edit\/(?P<transport_id_hash>.*)',                                 'Mail', 'EditTransport'],       // Edit transport
        
        ['admin\/mail\/shortcodes\/preview\/(?P<shortcode_id_hash>.*)',                             'Mail', 'PreviewShortcode'],    // Preview shortcode
        ['admin\/mail\/shortcodes(\?.*)?',                                                          'Mail', 'ManageShortcodes'],    // Manage short codes
        ['admin\/mail\/shortcodes\/add',                                                            'Mail', 'AddShortcode'],        // Add short code
        ['admin\/mail\/shortcodes\/edit\/(?P<shortcode_id_hash>.*)',                                'Mail', 'EditShortcode'],       // Edit short code
        
        ['admin\/mail\/log(\?.*)?',                                                                 'Mail', 'ManageLog'],           // Manage log
        ['admin\/mail\/queue(\?.*)?',                                                               'Mail', 'ManageQueue'],         // Manage queue
        ['admin\/mail\/fbl(\?.*)?',                                                                 'Mail', 'ManageFBLReports'],    // Manage FBL reports
        ['admin\/mail\/domains(\?.*)?',                                                             'Mail', 'ManageDomains'],       // Manage domains
        ['admin\/mail\/duplicates(\?.*)?',                                                          'Mail', 'DuplicatesSentMessages'], // Статистика по дубликатам отправленных писем
        
        ['admin\/mail\/spam_lists(\?.*)?',                                                          'Mail', 'ManageIPSpamLists'],   // Manage IP spam lists
        ['admin\/mail\/spam_lists\/ip\/add(\?.*)?',                                                 'Mail', 'AddIPSpamLists'],      // Add IP to monitoring spam lists
        ['admin\/mail\/spam_lists\/ip\/status\/(?P<ip_id_hash>.*)',                                 'Mail', 'IPStatusSpamLists'],   // IP status in spam lists
        ['admin\/mail\/(?P<version>html|plaintext)\/(?P<letter_id_hash>.*)',                        'Mail', 'ViewCopies'],          // View copies

        // API
        
        ['admin\/mail\/api\/letters\/add\/(?P<editor>code|builder)\.json(\?.*)?',                   'Mail', 'APIAddLetter'],            // [API] Add letter
        ['admin\/mail\/api\/letters\/remove\.json(\?.*)?',                                          'Mail', 'APIRemoveLetter'],         // [API] Remove letter
        ['admin\/mail\/api\/letters\/update\/(?P<editor>code|builder)\.json(\?.*)?',                'Mail', 'APIUpdateLetter'],         // [API] Update letter
        ['admin\/mail\/api\/letters\/groups\/add\.json(\?.*)?',         'Mail', 'APIAddLettersGroup'],      // [API] Add letters group
        ['admin\/mail\/api\/letters\/groups\/remove\.json(\?.*)?',      'Mail', 'APIRemoveLettersGroup'],   // [API] Remove letters group
        ['admin\/mail\/api\/letters\/groups\/update\.json(\?.*)?',      'Mail', 'APIUpdateLettersGroup'],   // [API] Update letters group
        ['admin\/mail\/api\/letters\/manage\.json(\?.*)?',              'Mail', 'APIManageLetters'],        // [API] Manage letters
        ['admin\/mail\/api\/letters\/get\.json(\?.*)?',                 'Mail', 'APIGetLetters'],           // [API] Get letter
        
        ['admin\/mail\/api\/senders\/add\.json(\?.*)?',                 'Mail', 'APIAddSender'],            // [API] Add sender
        ['admin\/mail\/api\/senders\/remove\.json(\?.*)?',              'Mail', 'APIRemoveSender'],         // [API] Remove sender
        ['admin\/mail\/api\/senders\/update\.json(\?.*)?',              'Mail', 'APIUpdateSender'],         // [API] Update sender
        ['admin\/mail\/api\/senders\/groups\/add\.json(\?.*)?',         'Mail', 'APIAddSendersGroup'],      // [API] Add senders group
        ['admin\/mail\/api\/senders\/groups\/remove\.json(\?.*)?',      'Mail', 'APIRemoveSendersGroup'],   // [API] Remove senders group
        ['admin\/mail\/api\/senders\/groups\/update\.json(\?.*)?',      'Mail', 'APIUpdateSendersGroup'],   // [API] Update senders group
        ['admin\/mail\/api\/senders\/get\.json(\?.*)?',                 'Mail', 'APIGetSenders'],           // [API] Get sender
        
        ['admin\/mail\/api\/settings\/update\.json(\?.*)?',             'Mail', 'APIUpdateSettings'],       // [API] Update mail settings
        
        ['admin\/mail\/api\/transport\/list\.json(\?.*)?',              'Mail', 'APIListTransports'],       // [API] List transport
        ['admin\/mail\/api\/transport\/add\.json(\?.*)?',               'Mail', 'APIAddTransport'],         // [API] Add transport
        ['admin\/mail\/api\/transport\/update\.json(\?.*)?',            'Mail', 'APIUpdateTransport'],      // [API] Update transport
        ['admin\/mail\/api\/transport\/remove\.json(\?.*)?',            'Mail', 'APIRemoveTransport'],      // [API] Remove transport
        
        ['admin\/mail\/api\/shortcodes\/list\.json(\?.*)?',             'Mail', 'APIListShortcodes'],       // [API] List shortcodes
        ['admin\/mail\/api\/shortcodes\/add\.json(\?.*)?',              'Mail', 'APIAddShortcode'],         // [API] Add shortcode
        ['admin\/mail\/api\/shortcodes\/update\.json(\?.*)?',           'Mail', 'APIUpdateShortcode'],      // [API] Update shortcode
        ['admin\/mail\/api\/shortcodes\/remove\.json(\?.*)?',           'Mail', 'APIRemoveShortcode'],      // [API] Remove shortcode
        
        ['admin\/mail\/api\/log\/list\.json(\?.*)?',                    'Mail', 'APIListLog'],              // [API] List log
        ['admin\/mail\/api\/log\/remove\.json(\?.*)?',                  'Mail', 'APIRemoveLogEntry'],       // [API] Remove log entry
        ['admin\/mail\/api\/log\/dashboard\.json(\?.*)?',               'Mail', 'APILogDashboard'],         // [API] Log dashboard
        
        ['admin\/mail\/api\/queue\/list\.json(\?.*)?',                  'Mail', 'APIListQueue'],            // [API] List queue
        ['admin\/mail\/api\/queue\/remove\.json(\?.*)?',                'Mail', 'APIRemoveQueueEntry'],     // [API] Remove queue entry
        
        ['admin\/mail\/api\/events\/list\.json(\?.*)?',                 'Mail', 'APIListEvents'],           // [API] List events
        ['admin\/mail\/api\/domains\/list\.json(\?.*)?',                'Mail', 'APIListDomains'],          // [API] List domains
        
        ['admin\/mail\/api\/spam_lists\/ip\/add\.json(\?.*)?',          'Mail', 'APIAddIPSpamLists'],       // [API] Add IP spam lists
        ['admin\/mail\/api\/spam_lists\/ip\/remove\.json(\?.*)?',       'Mail', 'APIRemoveIPSpamLists'],    // [API] Remove IP spam lists
        ['admin\/mail\/api\/spam_lists\/ip\/get\.json(\?.*)?',          'Mail', 'APIGetIPSpamLists'],       // [API] Get IP spam lists
        ['admin\/mail\/api\/spam_lists\/ip\/status\.json(\?.*)?',       'Mail', 'APIStatusIPSpamLists'],    // [API] Status IP spam lists
        
        ['admin\/mail\/api\/fbl\/dashboard\.json(\?.*)?',               'Mail', 'APIFBLReportsDashboard'],  // [API] FBL reports dashboard
        ['admin\/mail\/api\/stat\/dashboard\.json(\?.*)?',              'Mail', 'APIStatDashboard'],        // [API] Stat dashboard
        
        // Для совместимости со старым Пультом
        ['mailing\/spamreport\/(?P<hash>[a-zA-Z0-9-_]+)\/(?P<other>.*)',            'Mail', 'СompatibilitySpamreport'],
        ['mailing\/unsubscribe\/global\/(?P<hash>[a-zA-Z0-9-_]+)\/(?P<other>.*)',   'Mail', 'СompatibilityUnsubscribe'],
        
    ]
];