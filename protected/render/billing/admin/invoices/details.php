<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Счет #<?= $data['invoice']['id'] ?> от <?= $data['invoice']['cr_date'] ?></title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">

        <style>
            .table .table {
                background-color: #f5f5f5 !important;
            }
        </style>

        <? APP::Render('core/widgets/css') ?>
    </head>
    <body data-ma-header="teal">
        <?
        APP::Render('admin/widgets/header', 'include', [
            'Счета' => 'admin/billing/invoices'
        ]);
        ?>
        <section id="main">
            <? APP::Render('admin/widgets/sidebar') ?>

            <section id="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2>Счет #<?= $data['invoice']['id'] ?> от <?= $data['invoice']['cr_date'] ?></h2>
                            <ul class="actions">
                                <li class="dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <? if (($data['invoice']['state'] != 'success') && ($data['invoice']['state'] != 'revoked')) { ?><li><a href="javascript:void(0)" onclick="PayInvoice()">Провести оплату</a></li><? } ?>
                                        <? if (($data['invoice']['state'] != 'success') && ($data['invoice']['state'] != 'revoked')) { ?><li><a href="<?= APP::Module('Routing')->root ?>billing/payments/make/<?= APP::Module('Crypt')->Encode($data['invoice']['id']) ?>" target="_blank">Оплата счета</a></li><? } ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td style="width: 25%;">Клиент</td>
                                        <td><a href="<?= APP::Module('Routing')->root ?>admin/users/profile/<?= $data['invoice']['user_id'] ?>" target="_blank"><?= $data['invoice']['email'] ?></a></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%;">Сумма</td>
                                        <td><?= $data['invoice']['amount'] ?> руб.</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%;">Состояние</td>
                                        <td>
                                            <?
                                            switch ($data['invoice']['state']) {
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
                                            if ($data['invoice']['author'] == 0) {
                                                ?>клиент самостоятельно создал счет<?
                                            } else {
                                                ?><a href="<?= APP::Module('Routing')->root ?>admin/users/profile/<?= $data['invoice']['author'] ?>" target="_blank"><?= $data['invoice']['author_name'] ?></a><?
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%;">Дата обновления</td>
                                        <td><?= $data['invoice']['up_date'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%;">Дата создания</td>
                                        <td><?= $data['invoice']['cr_date'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%;">Продукты</td>
                                        <td>
                                            <table class="table">
                                                <tbody>
                                                    <?
                                                    foreach ($data['products'] as $product) {
                                                        ?>
                                                        <tr>
                                                            <td style="width: 5%">
                                                                <?
                                                                if (array_search($product['product'], $data['products_access']) === false) {
                                                                    ?><i class="hm-icon zmdi zmdi-lock" style="color: #e3e3e3"></i><?
                                                                } else {
                                                                    ?><i class="hm-icon zmdi zmdi-lock-open"></i><?
                                                                }
                                                                ?>
                                                            </td>
                                                            <td style="width: 55%">
                                                                <?
                                                                switch ($product['type']) {
                                                                    case 'primary': echo 'Первичный'; break;
                                                                    case 'secondary': echo 'Вторичный'; break;
                                                                    default: echo 'Статус продукта неизвестен'; break;
                                                                }
                                                                ?>
                                                                <hr style="margin: 5px 0;">
                                                                <?= $product['name'] ?>
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
                                            if (count($data['tags'])) {
                                                ?>
                                                <table class="table">
                                                    <tbody>
                                                        <?
                                                        foreach ($data['tags'] as $tag) {
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
                                                                    $action_data = json_decode($tag['action_data'], true);

                                                                    switch ($tag['action']) {
                                                                        case 'create_invoice': 
                                                                            ?>
                                                                            <a href="javascript:void(0)" onclick="$('#invoice_histoty_item_<?= $tag['id'] ?>').toggle()">подробности</a>
                                                                            <pre id="invoice_histoty_item_<?= $tag['id'] ?>" style="display: none"><? print_r($action_data) ?></pre>
                                                                            <? 
                                                                            break;
                                                                        case 'success_open_access': 
                                                                            switch ($action_data[0]) {
                                                                                case 'g': echo 'группа #' . $action_data[1]; break;
                                                                                case 'p': echo 'страница #' . $action_data[1]; break;
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
                                            if (count($data['payments'])) {
                                                ?>
                                                <table class="table">
                                                    <tbody>
                                                        <?
                                                        foreach ($data['payments'] as $payment) {
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
                                            if (count($data['details'])) {
                                                ?>
                                                <table class="table">
                                                    <tbody>
                                                        <?
                                                        foreach ($data['details'] as $details) {
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
                                    <tr>
                                        <td style="width: 25%;">Комментарии</td>
                                        <td>
                                            <?
                                            $comment_object_type = APP::Module('DB')->Select(APP::Module('Comments')->settings['module_comments_db_connection'], ['fetchColumn', 0], ['id'], 'comments_objects', [['name', '=', "Invoice", PDO::PARAM_STR]]);

                                            APP::Render('comments/widgets/default/list', 'include', [
                                                'type' => $comment_object_type,
                                                'id' => $data['invoice']['id'],
                                                'likes' => true,
                                                'class' => [
                                                    'holder' => 'palette-Grey-100 bg p-l-10'
                                                ]
                                            ]);

                                            APP::Render('comments/widgets/default/form', 'include', [
                                                'type' => $comment_object_type,
                                                'id' => $data['invoice']['id'],
                                                'login' => [],
                                                'class' => [
                                                    'holder' => false,
                                                    'list' => 'palette-Grey-100 bg p-l-10'
                                                ]
                                            ]);
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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

        <? APP::Render('core/widgets/js') ?>
        
        <script>
            function PayInvoice() {
                swal({
                    title: 'Отправлять уведомления об открытии доступа к продуктам?',
                    text: 'Некоторые продукты подразумевают открытие доступа в мемберке после оплаты. В уведомлении содежится информация по оплаченным продуктам и данные для доступа.',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Да',
                    cancelButtonText: 'Нет',
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function(notification) {
                    swal({
                        title: 'Вы действительно хотите провести оплату счета?',
                        text: 'Будут удалены все метки, остановлены необходимые туннели, открыты доступы, добавлены вторичные продукты и удалено напоминание об оплате.',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Оплатить',
                        cancelButtonText: 'Отмена',
                        closeOnConfirm: false,
                        closeOnCancel: true
                    }, function(isConfirm){
                        if (isConfirm) {
                            $.post('<?= APP::Module('Routing')->root ?>admin/billing/invoices/api/pay.json', {
                                invoice_id: <?= $data['invoice']['id'] ?>,
                                notification: notification
                            }, function() {
                                swal({
                                    title: 'Готово',
                                    text: 'Оплата счета была успешно проведена',
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonText: 'OK',
                                    closeOnConfirm: false
                                });
                            });
                        }
                    });
                });
            }
        </script>
    </body>
</html>