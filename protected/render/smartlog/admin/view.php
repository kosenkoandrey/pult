<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Просмотр SmartLog</title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/chosen/chosen.min.css" rel="stylesheet">
        
        <link href="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/lib/codemirror.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/addon/display/fullscreen.css" rel="stylesheet">
        
        <? APP::Render('core/widgets/css') ?>
    </head>
    <body data-ma-header="teal">
        <? 
        APP::Render('admin/widgets/header', 'include', [
            'SmartLog' => 'admin/smartlog'
        ]);
        ?>
        <section id="main">
            <? APP::Render('admin/widgets/sidebar') ?>

            <section id="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2>Просмотр события #<?= $data['smartlog']['id'] ?></h2>
                        </div>
                        <div class="card-body card-padding">
                            <?
                            $action_data = json_decode($data['smartlog']['action_data'], 1);
                            unset($data['smartlog']['action_data']);
                            
                            switch ($data['smartlog']['trigger_id']) {
                                case 'user_death':
                                    ?>
                                    <table class="table">
                                        <tr>
                                            <td width="20%">Событие</td>
                                            <td>Смерть пользователя #<?= $data['smartlog']['object_id'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Дата</td>
                                            <td><?= $data['smartlog']['cr_date'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Причина</td>
                                            <td>
                                                <?
                                                switch ($action_data['source']) {
                                                    case 'Mail/FBLReports': echo 'жалоба на спам (FBL)'; break;
                                                    case 'SendThis/UnsubscribeMailEvent': 
                                                    case 'Users/APIUnsubscribe':
                                                        echo 'отписка от писем'; 
                                                        break;
                                                    case 'SendThis/SpamreportMailEvent': 
                                                    case 'Mail/Spamreport': 
                                                        echo 'жалоба на спам (по ссылке из письма)'; 
                                                        break;
                                                    case 'SendThis/HardBounceMailEvent': echo 'hard bounce'; break;
                                                    case 'SendThis/SoftBounceMailEvent': echo 'превышен лимит soft bounce'; break;
                                                    
                                                    default: echo $action_data['source']; break;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Состояние пользователя до смерти</td>
                                            <td><?= $action_data['states']['from'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Состояние пользователя после смерти</td>
                                            <td><?= $action_data['states']['to'] ?></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <?
                                    if ($data['smartlog']['rollback'] === 'no') {
                                        ?><button id="rollback_user_death" data-id="<?= $data['smartlog']['id'] ?>" class="btn palette-Teal bg waves-effect btn-lg"><i class="zmdi zmdi-time-restore m-r-5"></i>Воскресить пользователя</button><?
                                    } else {
                                        ?>
                                        <div class="btn-group btn-group-lg" role="group">
                                            <button class="btn palette-Teal bg waves-effect disabled"><i class="zmdi zmdi-check m-r-5"></i>Выполнено воскрешение пользователя</button>
                                            <a target="_blank" href="<?= APP::Module('Routing')->root ?>admin/users/profile/<?= $data['smartlog']['object_id'] ?>" class="btn btn-default waves-effect"><i class="zmdi zmdi-open-in-new m-r-5"></i>Открыть ЛК пользователя</a>
                                        </div>
                                        <?
                                    }
                                    ?>
                                    <?
                                    break;

                                case 'mail_add_letter':
                                    ?>
                                    <table class="table">
                                        <tr>
                                            <td width="20%">Событие</td>
                                            <td>Создание письма #<?= $data['smartlog']['object_id'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Дата</td>
                                            <td><?= $data['smartlog']['cr_date'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Пользователь</td>
                                            <td><?= $data['smartlog']['user_id'] ?></td>
                                        </tr>
                                    </table>
                        </div>
                        <div class="card-header">
                            <h2>Оригинальная версия письма</h2>
                        </div>
                        <div class="card-body card-padding">
                                    <table class="table">
                                        <tr>
                                            <td width="20%">ID</td>
                                            <td><?= $action_data['id'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Отправитель</td>
                                            <td><?= $action_data['sender'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Тема</td>
                                            <td><?= $action_data['subject'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">HTML-версия</td>
                                            <td><textarea name="html" id="html" class="form-control" placeholder="Write HTML version of the letter"><?= $action_data['html'] ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Plaintext-версия</td>
                                            <td><textarea name="plaintext" id="plaintext" class="form-control" placeholder="Write plaintext version of the letter"><?= $action_data['plaintext'] ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Транспорт</td>
                                            <td><?= $action_data['transport'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Приоритет</td>
                                            <td><?= $action_data['priority'] ?></td>
                                        </tr>
                                    </table>
                                    <?
                                    break;

                                case 'mail_update_letter':
                                    ?>
                                    <table class="table">
                                        <tr>
                                            <td width="20%">Событие</td>
                                            <td>Обновление письма #<?= $data['smartlog']['object_id'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Дата</td>
                                            <td><?= $data['smartlog']['cr_date'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Пользователь</td>
                                            <td><?= $data['smartlog']['user_id'] ?></td>
                                        </tr>
                                    </table>
                        </div>
                        <div class="card-header">
                            <h2>Оригинальная версия письма</h2>
                        </div>
                        <div class="card-body card-padding">
                                    <table class="table">
                                        <tr>
                                            <td width="20%">Отправитель</td>
                                            <td><?= $action_data['versions']['old']['sender'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Тема</td>
                                            <td><?= $action_data['versions']['old']['subject'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">HTML-версия</td>
                                            <td><textarea name="html" id="old_html" class="form-control" placeholder="Write HTML version of the letter"><?= $action_data['versions']['old']['html'] ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Plaintext-версия</td>
                                            <td><textarea name="plaintext" id="old_plaintext" class="form-control" placeholder="Write plaintext version of the letter"><?= $action_data['versions']['old']['plaintext'] ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Транспорт</td>
                                            <td><?= $action_data['versions']['old']['transport'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Приоритет</td>
                                            <td><?= $action_data['versions']['old']['priority'] ?></td>
                                        </tr>
                                    </table>
                        </div>
                        <div class="card-header">
                            <h2>Обновленная версия письма</h2>
                        </div>
                        <div class="card-body card-padding">
                                    <table class="table">
                                        <tr>
                                            <td width="20%">Отправитель</td>
                                            <td><?= $action_data['versions']['new']['sender'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Тема</td>
                                            <td><?= $action_data['versions']['new']['subject'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">HTML-версия</td>
                                            <td><textarea name="html" id="new_html" class="form-control" placeholder="Write HTML version of the letter"><?= $action_data['versions']['new']['html'] ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Plaintext-версия</td>
                                            <td><textarea name="plaintext" id="new_plaintext" class="form-control" placeholder="Write plaintext version of the letter"><?= $action_data['versions']['new']['plaintext'] ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Транспорт</td>
                                            <td><?= $action_data['versions']['new']['transport'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Приоритет</td>
                                            <td><?= $action_data['versions']['new']['priority'] ?></td>
                                        </tr>
                                    </table>
                                    <?
                                    break;

                                case 'mail_remove_letter':
                                    ?>
                                    <table class="table">
                                        <tr>
                                            <td width="20%">Событие</td>
                                            <td>Удаление письма #<?= $data['smartlog']['object_id'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Результат выполенения</td>
                                            <td><?= (int) $action_data['result'] ? 'Успешно' : 'Ошибка' ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Дата</td>
                                            <td><?= $data['smartlog']['cr_date'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Пользователь</td>
                                            <td><?= $data['smartlog']['user_id'] ?></td>
                                        </tr>
                                    </table>
                        </div>
                        <div class="card-header">
                            <h2>Оригинальная версия письма</h2>
                        </div>
                        <div class="card-body card-padding">
                                    <table class="table">
                                        <tr>
                                            <td width="20%">ID</td>
                                            <td><?= $action_data['id'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Отправитель</td>
                                            <td><?= $action_data['original']['sender'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Тема</td>
                                            <td><?= $action_data['original']['subject'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">HTML-версия</td>
                                            <td><textarea name="html" id="html" class="form-control" placeholder="Write HTML version of the letter"><?= $action_data['original']['html'] ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Plaintext-версия</td>
                                            <td><textarea name="plaintext" id="plaintext" class="form-control" placeholder="Write plaintext version of the letter"><?= $action_data['original']['plaintext'] ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Транспорт</td>
                                            <td><?= $action_data['original']['transport'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Приоритет</td>
                                            <td><?= $action_data['original']['priority'] ?></td>
                                        </tr>
                                    </table>
                                    <?
                                    break;
                                
                                case 'remove_invoice_before':
                                    ?>
                                    <table class="table">
                                        <tr>
                                            <td width="25%">Событие</td>
                                            <td>Удаление счета #<?= $data['smartlog']['object_id'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="25%">Дата</td>
                                            <td><?= $data['smartlog']['cr_date'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="25%">Пользователь</td>
                                            <td><?= $data['smartlog']['user_id'] ?></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <?
                                    if ($data['smartlog']['rollback'] === 'no') {
                                        ?><button id="rollback_remove_invoice_before" data-id="<?= $data['smartlog']['id'] ?>" class="btn palette-Teal bg waves-effect btn-lg"><i class="zmdi zmdi-time-restore m-r-5"></i>Откатить событие</button><?
                                    } else {
                                        ?>
                                        <div class="btn-group btn-group-lg" role="group">
                                            <button class="btn palette-Teal bg waves-effect disabled"><i class="zmdi zmdi-check m-r-5"></i>Выполнен откат события</button>
                                            <a target="_blank" href="<?= APP::Module('Routing')->root ?>admin/billing/invoices/details/<?= $data['smartlog']['object_id'] ?>" class="btn btn-default waves-effect"><i class="zmdi zmdi-open-in-new m-r-5"></i>Открыть счет</a>
                                        </div>
                                        <?
                                    }
                                    ?>
                        </div>
                        <div class="card-header">
                            <h2>Счет #<?= $action_data['invoice']['id'] ?> от <?= $action_data['invoice']['cr_date'] ?></h2>
                        </div>
                        <div class="card-body card-padding">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td style="width: 25%;">Клиент</td>
                                                <td><a href="<?= APP::Module('Routing')->root ?>admin/users/profile/<?= $action_data['invoice']['user_id'] ?>" target="_blank"><?= $action_data['invoice']['user_id'] ?></a></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">Сумма</td>
                                                <td><?= $action_data['invoice']['amount'] ?> руб.</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">Состояние</td>
                                                <td>
                                                    <?
                                                    switch ($action_data['invoice']['state']) {
                                                        case 'new': echo 'новый'; break;
                                                        case 'processed': echo 'в работе'; break;
                                                        case 'success': echo 'оплачен'; break;
                                                        case 'revoked': echo 'аннулирован'; break;
                                                        default: echo 'неизвестно'; break;
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">Автор</td>
                                                <td>
                                                    <?
                                                    if ($action_data['invoice']['author'] == 0) {
                                                        ?>клиент самостоятельно создал счет<?
                                                    } else {
                                                        ?><a href="<?= APP::Module('Routing')->root ?>admin/users/profile/<?= $action_data['invoice']['author'] ?>" target="_blank"><?= $action_data['invoice']['author'] ?></a><?
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">Дата обновления</td>
                                                <td><?= $action_data['invoice']['up_date'] ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">Дата создания</td>
                                                <td><?= $action_data['invoice']['cr_date'] ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">Продукты</td>
                                                <td>
                                                    <table class="table">
                                                        <tbody>
                                                            <?
                                                            foreach ($action_data['products'] as $product) {
                                                                ?>
                                                                <tr>
                                                                    <td style="width: 60%">
                                                                        <?
                                                                        switch ($product['type']) {
                                                                            case 'primary': echo 'Первичный'; break;
                                                                            case 'secondary': echo 'Вторичный'; break;
                                                                            default: echo 'Статус продукта неизвестен'; break;
                                                                        }
                                                                        ?>
                                                                        <hr style="margin: 5px 0;">
                                                                        <!--<a href="<?= APP::Module('Routing')->root ?>admin/billing/products/edit/<?= APP::Module('Crypt')->Encode($product['id']) ?>"><?= $product['id'] ?></a>-->
                                                                        <?= $product['id'] ?>
                                                                    </td>
                                                                    <td style="width: 40%">
                                                                        <?= $product['amount'] ?> руб.
                                                                        <hr style="margin: 5px 0;">
                                                                        <?= $product['cr_date'] ?>
                                                                    </td>
                                                                </tr>
                                                                <?
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">История</td>
                                                <td>
                                                    <?
                                                    if (count($action_data['tags'])) {
                                                        ?>
                                                        <table class="table">
                                                            <tbody>
                                                                <?
                                                                foreach ($action_data['tags'] as $tag) {
                                                                    ?>
                                                                    <tr>
                                                                        <td style="width: 30%">
                                                                            <?
                                                                            switch ($tag['action']) {
                                                                                case 'create_invoice': echo 'создание счета'; break;
                                                                                case 'success_open_access': echo 'успешное открытие доступа'; break;
                                                                                case 'add_secondary_product': echo 'добавление вторичного продукта'; break;
                                                                                default: $tag['action']; break;
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="width: 30%">
                                                                            <?
                                                                            $tag_action_data = json_decode($tag['action_data'], true);

                                                                            switch ($tag['action']) {
                                                                                case 'create_invoice': 
                                                                                    ?>
                                                                                    <a href="javascript:void(0)" onclick="$('#invoice_histoty_item_<?= $tag['id'] ?>').toggle()">подробности</a>
                                                                                    <pre id="invoice_histoty_item_<?= $tag['id'] ?>" style="display: none"><? print_r($tag_action_data) ?></pre>
                                                                                    <? 
                                                                                    break;
                                                                                case 'success_open_access': 
                                                                                    switch ($tag_action_data[0]) {
                                                                                        case 'g': echo 'группа #' . $tag_action_data[1]; break;
                                                                                        case 'p': echo 'страница #' . $tag_action_data[1]; break;
                                                                                    }
                                                                                    break;
                                                                                case 'add_secondary_product': 
                                                                                    echo 'продукт #' . $action_data['product']; 
                                                                                    break;
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="width: 40%"><?= $tag['cr_date'] ?></td>
                                                                    </tr>
                                                                    <?
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                        <?
                                                    } else {
                                                        ?>Нет данных<?
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">Платежи</td>
                                                <td>
                                                    <?
                                                    if (count($action_data['payments'])) {
                                                        ?>
                                                        <table class="table">
                                                            <tbody>
                                                                <?
                                                                foreach ($action_data['payments'] as $payment) {
                                                                    ?>
                                                                    <tr>
                                                                        <td style="width: 30%">
                                                                            <?
                                                                            switch ($payment['method']) {
                                                                                case 'admin': echo 'вручную администратором'; break;
                                                                                default: echo $payment['method']; break;
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td style="width: 30%">
                                                                            <a href="javascript:void(0)" onclick="$('#invoice_payment_details_<?= $payment['id'] ?>').toggle()">подробности</a>
                                                                            <div id="invoice_payment_details_<?= $payment['id'] ?>" style="display: none">
                                                                                <table class="table">
                                                                                    <?
                                                                                    foreach ($payment['details'] as $payment_details) {
                                                                                        ?><tr><td><?= $payment_details['item'] ?></td><td><?= $payment_details['value'] ?></td></tr><?
                                                                                    }
                                                                                    ?>
                                                                                </table>
                                                                            </div>
                                                                        </td>
                                                                        <td style="width: 40%"><?= $payment['cr_date'] ?></td>
                                                                    </tr>
                                                                    <?
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                        <?
                                                    } else {
                                                        ?>Нет данных<?
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">Контактные данные</td>
                                                <td>
                                                    <?
                                                    if (count($action_data['details'])) {
                                                        ?>
                                                        <table class="table">
                                                            <tbody>
                                                                <?
                                                                foreach ($action_data['details'] as $details) {
                                                                    ?>
                                                                    <tr>
                                                                        <td style="width: 35%">
                                                                            <?
                                                                            switch ($details['item']) {
                                                                                case 'lastname': echo 'фамилия'; break;
                                                                                case 'firstname': echo 'имя'; break;
                                                                                case 'tel': echo 'телефон'; break;
                                                                                case 'email': echo 'e-mail'; break;
                                                                                case 'comment': echo 'комментарий'; break;
                                                                                default: echo $details['item']; break;
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td><?= $details['value'] ?></td>
                                                                    </tr>
                                                                    <?
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                        <?
                                                    } else {
                                                        ?>Нет данных<?
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?
                                    break;

                                default:
                                    ?><pre><? print_r($data) ?></pre><?
                                    ?><pre><? print_r($action_data) ?></pre><?
                                    break;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>

            <? APP::Render('admin/widgets/footer') ?>
        </section>

        <? APP::Render('core/widgets/page_loader') ?>
        <? APP::Render('core/widgets/ie_warning') ?>

        <!-- Javascript Libraries -->
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/chosen/chosen.jquery.min.js"></script>
        
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/summernote/dist/summernote.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/autosize/dist/autosize.min.js"></script>
        
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/lib/codemirror.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/addon/edit/matchbrackets.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/addon/display/fullscreen.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/mode/xml/xml.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/mode/javascript/javascript.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/mode/css/css.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/mode/clike/clike.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/mode/php/php.js"></script>
        
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
        
        <? APP::Render('core/widgets/js') ?>
        
        <script>
            $(document).ready(function() {
                <?
                switch ($data['smartlog']['trigger_id']) {
                    case 'mail_add_letter':
                    case 'mail_remove_letter':
                        ?>
                        $(document).ready(function() {
                            autosize($('#html'));
                            autosize($('#plaintext'));

                            var html_version = CodeMirror.fromTextArea(document.getElementById('html'), {
                                lineNumbers: true,
                                mode: "application/x-httpd-php",
                                extraKeys: {
                                    "F11": function(cm) {
                                        cm.setOption("fullScreen", !cm.getOption("fullScreen"));
                                    },
                                    "Esc": function(cm) {
                                        if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
                                    }
                                }
                            });
                            var text_version = CodeMirror.fromTextArea(document.getElementById('plaintext'), {
                                lineNumbers: true,
                                mode: "application/x-httpd-php",
                                extraKeys: {
                                    "F11": function(cm) {
                                        cm.setOption("fullScreen", !cm.getOption("fullScreen"));
                                    },
                                    "Esc": function(cm) {
                                        if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
                                    }
                                }
                            });
                        });
                        <?
                        break;
                    case 'mail_update_letter':
                        ?>
                        $(document).ready(function() {
                            autosize($('#old_html'));
                            autosize($('#old_plaintext'));

                            autosize($('#new_html'));
                            autosize($('#new_plaintext'));

                            var old_html_version = CodeMirror.fromTextArea(document.getElementById('old_html'), {
                                lineNumbers: true,
                                mode: "application/x-httpd-php",
                                extraKeys: {
                                    "F11": function(cm) {
                                        cm.setOption("fullScreen", !cm.getOption("fullScreen"));
                                    },
                                    "Esc": function(cm) {
                                        if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
                                    }
                                }
                            });
                            var old_text_version = CodeMirror.fromTextArea(document.getElementById('old_plaintext'), {
                                lineNumbers: true,
                                mode: "application/x-httpd-php",
                                extraKeys: {
                                    "F11": function(cm) {
                                        cm.setOption("fullScreen", !cm.getOption("fullScreen"));
                                    },
                                    "Esc": function(cm) {
                                        if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
                                    }
                                }
                            });

                            var new_html_version = CodeMirror.fromTextArea(document.getElementById('new_html'), {
                                lineNumbers: true,
                                mode: "application/x-httpd-php",
                                extraKeys: {
                                    "F11": function(cm) {
                                        cm.setOption("fullScreen", !cm.getOption("fullScreen"));
                                    },
                                    "Esc": function(cm) {
                                        if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
                                    }
                                }
                            });
                            var new_text_version = CodeMirror.fromTextArea(document.getElementById('new_plaintext'), {
                                lineNumbers: true,
                                mode: "application/x-httpd-php",
                                extraKeys: {
                                    "F11": function(cm) {
                                        cm.setOption("fullScreen", !cm.getOption("fullScreen"));
                                    },
                                    "Esc": function(cm) {
                                        if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
                                    }
                                }
                            });
                            
                            $(document).on('click', '#rollback_remove_invoice_before', function () {
                                var smartlog_id = $(this).data('id');
                                
                                console.log(smartlog_id);
                            });
                        });
                        <?
                        break;
                    
                    case 'remove_invoice_before':
                        ?>
                        $(document).ready(function() {
                            $(document).on('click', '#rollback_remove_invoice_before', function () {
                                var smartlog_id = $(this).data('id');
                                
                                $(this).html('Подождите...').attr('disabled', true);
                                
                                $.ajax({
                                    type: 'post',
                                    url: '<?= APP::Module('Routing')->root ?>admin/smartlog/api/rollback.json',
                                    data: {
                                        id: smartlog_id
                                    },
                                    success: function() {
                                        swal({
                                            title: 'Готово',
                                            text: 'Откат события #' + smartlog_id + ' выполнен',
                                            type: 'success',
                                            showCancelButton: false,
                                            confirmButtonText: 'OK',
                                            closeOnConfirm: false
                                        }, function(){
                                            location.reload();
                                        });
                                    }
                                });
                            });
                        });
                        <?
                        break;
                    
                    case 'user_death':
                        ?>
                        $(document).ready(function() {
                            $(document).on('click', '#rollback_user_death', function () {
                                var smartlog_id = $(this).data('id');
                                
                                $(this).html('Подождите...').attr('disabled', true);
                                
                                $.ajax({
                                    type: 'post',
                                    url: '<?= APP::Module('Routing')->root ?>admin/smartlog/api/rollback.json',
                                    data: {
                                        id: smartlog_id
                                    },
                                    success: function() {
                                        swal({
                                            title: 'Готово',
                                            text: 'Воскрешение пользователя по задаче #' + smartlog_id + ' успешно выполнено',
                                            type: 'success',
                                            showCancelButton: false,
                                            confirmButtonText: 'OK',
                                            closeOnConfirm: false
                                        }, function(){
                                            location.reload();
                                        });
                                    }
                                });
                            });
                        });
                        <?
                        break;
                }
                ?>
            });
        </script>
    </body>
  </html>