<?
if ($data['invoices']) {
    ?>
    <div role="tabpanel" class="tab-pane" id="tab-invoices">
        <ul class="tab-nav" data-tab-color="teal">
            <?
            foreach ($data['invoices'] as $key => $invoices) {
                ?>
                <li class="waves-effect">
                    <a href="#tab-invoices-<?= $key ?>" aria-controls="tab-mail" role="tab" data-toggle="tab">
                        <?
                        switch ($key) {
                            case 'new': echo 'Новые'; break;
                            case 'processed': echo 'В работе'; break;
                            case 'success': echo 'Оплаченные'; break;
                            case 'revoked': echo 'Аннулированные'; break;
                        }
                        ?>
                        (<?= count($invoices) ?>)
                    </a>
                </li>
                <?
            }
            ?>
        </ul>

        <?
        $reminder_payment = APP::Module('DB')->Select(
            APP::Module('TaskManager')->settings['module_taskmanager_db_connection'],
            ['fetch', PDO::FETCH_ASSOC],
            [
                'id', 
                'exec_date'
            ],
            'task_manager',
            [
                ['token', '=', 'user_' . $data['user']['id'] . '_reminder_payment', PDO::PARAM_STR],
                ['state', '=', 'wait', PDO::PARAM_STR]
            ]
        );

        if ($reminder_payment) {
            ?>
            <div id="remove_reminder_payment_alert" class="alert alert-warning" role="alert" style="margin: 15px">
                Запланирована отправка напоминания об оплате (<?= $reminder_payment['exec_date'] ?>)
                <a id="remove_reminder_payment_task" data-id="<?= $reminder_payment['id'] ?>" href="javascript:void(0)" class="alert-link" style="float: right">Отменить</a>
            </div>
            <?
        }
        ?>

        <div class="tab-content" style="padding: 0;">
            <?
            foreach ($data['invoices'] as $key => $invoices) {
                ?>
                <div role="tabpanel" class="tab-pane" id="tab-invoices-<?= $key ?>">
                    <?
                    foreach ($invoices as $invoice) {
                        ?>
                        <div class="pmb-block">
                            <div class="pmbb-header">
                                <h2><i class="zmdi zmdi-shopping-cart m-r-5"></i> Счет #<?= $invoice['invoice']['id'] ?> <a href="<?= APP::Module('Routing')->root ?>admin/billing/invoices/details/<?= APP::Module('Crypt')->Encode($invoice['invoice']['id']) ?>" target="_blank" class="btn btn-default waves-effect" style="float: right">Детали счета</a></h2>
                            </div>
                        </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="width: 25%;">Клиент</td>
                                    <td><a href="<?= APP::Module('Routing')->root ?>admin/users/profile/<?= $invoice['invoice']['user_id'] ?>" target="_blank"><?= $invoice['invoice']['email'] ?></a></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">Сумма</td>
                                    <td><?= $invoice['invoice']['amount'] ?> руб.</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">Состояние</td>
                                    <td>
                                        <?
                                        switch ($invoice['invoice']['state']) {
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
                                        if ($invoice['invoice']['author'] == 0) {
                                            ?>клиент самостоятельно создал счет<?
                                        } else {
                                            ?><a href="<?= APP::Module('Routing')->root ?>admin/users/profile/<?= $invoice['invoice']['author'] ?>" target="_blank"><?= $invoice['invoice']['author_name'] ?></a><?
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">Дата обновления</td>
                                    <td><?= $invoice['invoice']['up_date'] ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">Дата создания</td>
                                    <td><?= $invoice['invoice']['cr_date'] ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">Продукты</td>
                                    <td>
                                        <table class="table">
                                            <tbody>
                                                <?
                                                foreach ($invoice['products'] as $product) {
                                                    ?>
                                                    <tr>
                                                        <td style="width: 5%">
                                                            <?
                                                            if (array_search($product['product'], $invoice['products_access']) === false) {
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
                                        if (count($invoice['tags'])) {
                                            ?>
                                            <table class="table">
                                                <tbody>
                                                    <?
                                                    foreach ($invoice['tags'] as $tag) {
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
                                        if (count($invoice['payments'])) {
                                            ?>
                                            <table class="table">
                                                <tbody>
                                                    <?
                                                    foreach ($invoice['payments'] as $payment) {
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
                                        if (count($invoice['details'])) {
                                            ?>
                                            <table class="table">
                                                <tbody>
                                                    <?
                                                    foreach ($invoice['details'] as $details) {
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
                                            'id' => $invoice['invoice']['id'],
                                            'likes' => true,
                                            'class' => [
                                                'holder' => 'palette-Grey-100 bg p-l-10'
                                            ]
                                        ]);
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <?
                    }
                    ?>
                </div>
                <?
            }
            ?>
        </div>
    </div>
    <?
}