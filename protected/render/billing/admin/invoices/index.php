<?
$filters = htmlspecialchars(isset(APP::Module('Routing')->get['filters']) ? APP::Module('Crypt')->Decode(APP::Module('Routing')->get['filters']) : '{"logic":"intersect","rules":[{"method":"amount","settings":{"logic":">","value":"0"}}]}');
?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Управление счетами</title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/tableexport.js/dist/css/tableexport.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/modules/billing/invoices/rules.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet"> 

        <style>
            .invoices-column-id {
                width: 100px;
            }
            
            .invoices-column-user {
                width: 300px;
            }
            
            .invoices-column-author {
                width: 200px;
            }
            
            .invoices-column-amount {
                width: 100px;
            }

            .invoices-column-cr-date {
                width: 180px;
            }
            
            .invoices-column-pay-date {
                width: 180px;
            }
            
            .invoices-column-user-row,
            .invoices-column-products-row,
            .invoices-column-state-row {
                white-space: normal !important;
            }
            
            
            #invoices-table-header .actionBar .actions > button {
                display: none;
            }
            
            #invoices-table > tbody > tr:hover {
                cursor: pointer;
            }
            
            #invoice-details {
                position: fixed;
                top: 0;
                width: 550px;
                background: #fff;
                height: 100%;
                box-shadow: 0px 0 30px rgba(0, 0, 0, 0.3);
                left: -550px;
                opacity: 0;
                -webkit-transition: all;
                -o-transition: all;
                transition: all;
                -webkit-transition-duration: 250ms;
                transition-duration: 250ms;
            }

            #invoice-details.toggled {
                left: 0;
                opacity: 1;
                z-index: 101;
            }

            @media (min-width: 1280px) {
                #invoice-details .m-btn {
                    position: absolute;
                    right: auto;
                    left: 230px;
                }
            }

            @media (max-width: 1279px) {
                #invoice-details {
                    left: auto;
                    right: -550px;
                }

                #invoice-details.toggled {
                    left: auto;
                    right: 0;
                }
            }

            #invoice-details .pmb-block {
                margin-bottom: 20px;
            }

            @media (min-width: 1200px) {
                #invoice-details .pmb-block {
                    padding: 25px 30px 0;
                }
            }

            @media (max-width: 1199px) {
                #invoice-details .pmb-block {
                    padding: 25px 30px 0;
                }
            }

            #invoice-details .pmb-block:last-child {
                margin-bottom: 50px;
            }

            #invoice-details .pmb-block .pmbb-header {
                margin-bottom: 25px;
                position: relative;
            }

            #invoice-details .pmb-block .pmbb-header h2 {
                margin: 0;
                font-weight: 100;
                font-size: 20px;
            }
            
            
            .invoice-details-panel {
                display: none;
            }
            .invoice-details-panel > a.back {
                font-size: 15px;
                display: block;
                padding: 15px 30px;
                border-top: 1px solid #e3e3e3;
                border-bottom: 1px solid #e3e3e3;
                color: #000000;
            }
            
            .invoice-details-panel > a.back:hover {
                background: #efefef;
            }
            
            
            #invoice-details-nav > a {
                font-size: 15px;
                display: block;
                padding: 15px 30px;
                border-top: 1px solid #e3e3e3;
                color: #000000;
            }
            
            #invoice-details-nav > a:hover {
                background: #efefef;
            }
            
            
            #invoice-details-main .main-list {
                display: block;
                padding: 15px 30px;
                border-bottom: 1px solid #e3e3e3;
                color: #000000;
            }
            
            #invoice-details-main .main-list-item {
                font-size: 15px;
            }
            
            #invoice-details-main .main-list-value {
                font-size: 13px;
            }
            
            
            #invoice-details-products .products-list {
                display: block;
                padding: 15px 30px;
                border-bottom: 1px solid #e3e3e3;
                color: #000000;
            }
            
            #invoice-details-products .products-list-name {
                font-size: 15px;
                margin-bottom: 5px;
            }
            
            #invoice-details-products .products-list-name > .primary {
                background: #f44336;
            }
            
            #invoice-details-products .products-list-name > .secondary {
                background: #ff9800;
            }
            
            #invoice-details-products .products-list-amount,
            #invoice-details-products .products-list-date {
                font-size: 13px;
            }
            
            #invoice-details-products .products-list-amount {
                float: right;
            }
            
            
            #invoice-details-payments .payments-list {
                display: block;
                padding: 15px 30px;
                border-bottom: 1px solid #e3e3e3;
                color: #000000;
            }
            
            #invoice-details-payments .payments-list-method {
                font-size: 15px;
                margin-bottom: 5px;
            }

            #invoice-details-payments .payments-list-date {
                font-size: 13px;
            }
            
            
            #invoice-details-contacts .contacts-list {
                display: block;
                padding: 15px 30px;
                border-bottom: 1px solid #e3e3e3;
                color: #000000;
            }
            
            #invoice-details-contacts .contacts-list-item {
                font-size: 15px;
                margin-bottom: 5px;
            }

            #invoice-details-contacts .contacts-list-value {
                font-size: 13px;
            }
            
            
            #invoice-details-labels .labels-list {
                display: block;
                padding: 15px 30px;
                border-bottom: 1px solid #e3e3e3;
                color: #000000;
            }
            
            #invoice-details-labels .labels-list > i {
                float: right;
                cursor: pointer;
                font-size: 26px;
                margin: 5px 0;
            }
            
            #invoice-details-labels .labels-list-date {
                position: relative;
                display: inline-block;
                width: 200px;
                margin-right: 10px;
            }

            #invoice-details-labels .labels-list-label {
                display: inline-block;
                width: 200px;
            }
            
            #invoice-details-labels .labels-list-label .btn-group.bootstrap-select {
                margin-top: 2px;
            }
            
            #invoice-details-labels .controls {
                font-size: 15px;
                display: block;
                padding: 15px 30px;
                border-bottom: 1px solid #e3e3e3;
                color: #000000;
            }
            
            #invoice-details-labels .controls:hover {
                background: #efefef;
            }
            
            
            #invoice-details-comments .comments-list {
                display: block;
                padding: 15px 30px;
                border-bottom: 1px solid #e3e3e3;
                color: #000000;
            }
            
            #invoice-details-comments .comments-list-user {
                font-size: 15px;
                margin-bottom: 5px;
            }

            #invoice-details-comments .comments-list-message {
                font-size: 13px;
                white-space: pre-wrap;
            }
            
            #invoice-details-comments .comments-list-date {
                font-size: 12px;
                float: right;
            }
            
            #invoice-details-comments-message {
                padding: 30px;
            }
            
            #invoice-details-comments .controls {
                font-size: 15px;
                display: block;
                padding: 15px 30px;
                border-bottom: 1px solid #e3e3e3;
                color: #000000;
            }
            
            #invoice-details-comments .controls:hover {
                background: #efefef;
            }
            
            
            #invoice-details-actions > .actions-list > a {
                font-size: 15px;
                display: block;
                padding: 15px 30px;
                border-bottom: 1px solid #e3e3e3;
                color: #000000;
            }
            
            #invoice-details-actions > .actions-list > a:hover {
                background: #efefef;
            }
            
            
            .btn-toolbar {
                margin-left: 10px !important;
            }
            
            .bootgrid-footer .infoBar .total-amount {
                border: 1px solid #EEE;
                display: inline-block;
                float: right;
                padding: 7px 30px;
                font-size: 12px;
                margin-top: 5px;
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
                            <h2>Управление счетами</h2>
                            <ul class="actions">
                                <li class="dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="<?= APP::Module('Routing')->root ?>admin/billing/invoices/add">Создать счет</a></li>
                                        <li><a href="<?= APP::Module('Routing')->root ?>admin/billing/invoices/import">Импортировать счета</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body card-padding">
                            <input type="hidden" name="search" value="<?= $filters ?>" id="search">
                            <div class="btn-group">
                                <button type="button" id="render-table" class="btn btn-default"><i class="zmdi zmdi-check"></i> Сделать выборку</button>

                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
                                        Выполнить действие <span class="caret"></span>
                                    </button>
                                    <ul id="search_results_actions" class="dropdown-menu" role="menu">
                                        <li><a data-action="remove" href="javascript:void(0)">Удалить</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="btn-group" style="float: right">
                                <a href="?filters=<?= APP::Module('Crypt')->Encode('{"logic":"intersect","rules":[{"method":"label","settings":{"logic":"=","value":"write"}}]}') ?>&highlight=label-write" class="btn btn-default <? if (isset(APP::Module('Routing')->get['highlight'])) { if (APP::Module('Routing')->get['highlight'] == 'label-write') { ?> disabled<? } } ?>"><span class="badge m-r-5" style="background: #4CAF50"><?= APP::Module('DB')->Select(APP::Module('Billing')->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_COLUMN], ['COUNT(DISTINCT invoice)'], 'billing_invoices_labels', [['label_id', '=', 'write', PDO::PARAM_STR], ['st_date', 'BETWEEN', '"' . date('Y-m-d 00:00:00', 0) . '" AND "' . date('Y-m-d 23:59:59') . '"']]) ?></span>Написать</a>
                                <a href="?filters=<?= APP::Module('Crypt')->Encode('{"logic":"intersect","rules":[{"method":"label","settings":{"logic":"=","value":"call"}}]}') ?>&highlight=label-call" class="btn btn-default <? if (isset(APP::Module('Routing')->get['highlight'])) { if (APP::Module('Routing')->get['highlight'] == 'label-call') { ?> disabled<? } } ?>"><span class="badge m-r-5" style="background: #4CAF50"><?= APP::Module('DB')->Select(APP::Module('Billing')->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_COLUMN], ['COUNT(DISTINCT invoice)'], 'billing_invoices_labels', [['label_id', '=', 'call', PDO::PARAM_STR], ['st_date', 'BETWEEN', '"' . date('Y-m-d 00:00:00', 0) . '" AND "' . date('Y-m-d 23:59:59') . '"']]) ?></span>Позвонить</a>
                                <a href="?filters=<?= APP::Module('Crypt')->Encode('{"logic":"intersect","rules":[{"method":"label","settings":{"logic":"=","value":"color-call"}}]}') ?>&highlight=label-color-call" class="btn btn-default <? if (isset(APP::Module('Routing')->get['highlight'])) { if (APP::Module('Routing')->get['highlight'] == 'label-color-call') { ?> disabled<? } } ?>"><span class="badge m-r-5" style="background: #4CAF50"><?= APP::Module('DB')->Select(APP::Module('Billing')->settings['module_billing_db_connection'], ['fetch', PDO::FETCH_COLUMN], ['COUNT(DISTINCT invoice)'], 'billing_invoices_labels', [['label_id', '=', 'color-call', PDO::PARAM_STR], ['st_date', 'BETWEEN', '"' . date('Y-m-d 00:00:00', 0) . '" AND "' . date('Y-m-d 23:59:59') . '"']]) ?></span>Позвонить цветотипу</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-vmiddle" id="invoices-table">
                                <thead>
                                    <tr>
                                        <th data-column-id="id" data-type="numeric" data-order="desc" data-header-css-class="invoices-column-id">ID</th>
                                        <th data-column-id="user_id" data-formatter="user" data-header-css-class="invoices-column-user" data-css-class="invoices-column-user-row">Пользователь</th>
                                        <th data-column-id="products" data-formatter="products" data-css-class="invoices-column-products-row">Продукты</th>
                                        <th data-column-id="amount" data-formatter="amount" data-header-css-class="invoices-column-amount">Сумма</th>
                                        <th data-column-id="state" data-formatter="state" data-css-class="invoices-column-state-row">Состояние</th>
                                        <th data-column-id="author" data-formatter="author" data-header-css-class="invoices-column-author">Автор</th>
                                        <th data-column-id="cr_date" data-header-css-class="invoices-column-cr-date">Дата создания</th>
                                        <th data-column-id="pay_date" data-formatter="pay_date" data-header-css-class="invoices-column-pay-date">Дата оплаты</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <? APP::Render('admin/widgets/footer') ?>
        </section>
        
        <aside id="invoice-details" class="sidebar">
            <div class="pmb-block">
                <div class="pmbb-header">
                    <h2><i class="zmdi zmdi-shopping-cart m-r-5"></i> Счет #<span id="invoice-details-id"></span> <i id="invoice-details-page" class="zmdi zmdi-open-in-new m-l-5" style="float: right; cursor: pointer" title="Открыть счет в новом окне"></i></h2>
                </div>
            </div>
            <div id="invoice-details-loader">
                <div class="text-center">
                    <div class="preloader pl-xxl">
                        <svg class="pl-circular" viewBox="25 25 50 50">
                            <circle class="plc-path" cx="50" cy="50" r="20">
                        </svg>
                    </div>
                </div>
            </div>
            <div class="invoice-details-panel" id="invoice-details-nav"></div>
            <div class="invoice-details-panel" id="invoice-details-main"></div>
            <div class="invoice-details-panel" id="invoice-details-products"></div>
            <div class="invoice-details-panel" id="invoice-details-history"></div>
            <div class="invoice-details-panel" id="invoice-details-payments"></div>
            <div class="invoice-details-panel" id="invoice-details-contacts"></div>
            <div class="invoice-details-panel" id="invoice-details-comments"></div>
            <div class="invoice-details-panel" id="invoice-details-labels"></div>
            <div class="invoice-details-panel" id="invoice-details-actions"></div>
        </aside>

        <? APP::Render('core/widgets/page_loader') ?>
        <? APP::Render('core/widgets/ie_warning') ?>

        <!-- Javascript Libraries -->
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/json/dist/jquery.json.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bootgrid/jquery.bootgrid.updated.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/autosize/dist/autosize.min.js"></script>
        
        <script src="<?= APP::Module('Routing')->root ?>public/modules/billing/invoices/rules.js"></script>
        
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/xlsx-js/xlsx.core.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/file-saverjs/FileSaver.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/tableexport.js/dist/js/tableexport.min.js"></script>

        <? APP::Render('core/widgets/js') ?>

        <script>
            $('#search').BillingInvoicesRules({
                'debug': true
            });

            $(document).on('click', '#search_results_actions a', function () {
                var action = $(this).data('action');

                swal({
                    title: 'Вы уверены?',
                    text: 'Это действие будет невозможно отменить',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Да',
                    cancelButtonText: 'Нет',
                    closeOnConfirm: false,
                    closeOnCancel: true
                }, function(isConfirm){
                    if (isConfirm) {
                        $.post('<?= APP::Module('Routing')->root ?>admin/billing/invoices/api/action.json', {
                            action: action,
                            rules: $('#search').val()
                        }, function() {
                            invoices_table.bootgrid('reload', true);

                            swal({
                                title: 'Готово',
                                text: 'Действие было успешно выполнено',
                                type: 'success',
                                showCancelButton: false,
                                confirmButtonText: 'OK',
                                closeOnConfirm: false
                            });
                        });
                    }
                });
            });

            $(document).on('click', '#render-table', function () {
                $('#invoices-table').bootgrid('reload');
            });

            var invoices_table = $("#invoices-table").bootgrid({
                requestHandler: function(request) {
                    var model = {
                        search: $('#search').val(),
                        current: request.current,
                        rows: request.rowCount
                    };

                    for (var key in request.sort) {
                        model.sort_by = key;
                        model.sort_direction = request.sort[key];
                    }

                    return JSON.stringify(model);
                },
                responseHandler: function(response) {
                    $('#invoices-table-footer .infoBar .total-amount').remove();
                    $('#invoices-table-footer .infoBar').append('<div class="total-amount m-r-5">Сумма счетов: ' + new Intl.NumberFormat().format(response.total_amount) + ' руб.</div>');
                    return response;
                },
                ajaxSettings: {
                    method: 'POST',
                    cache: false,
                    contentType: 'application/json'
                },
                ajax: true,
                url: '<?= APP::Module('Routing')->root ?>admin/billing/invoices/api/search.json',
                css: {
                    icon: 'zmdi icon',
                    iconColumns: 'zmdi-view-module',
                    iconDown: 'zmdi-chevron-down pull-left',
                    iconRefresh: 'zmdi-refresh',
                    iconUp: 'zmdi-chevron-up pull-left'
                },
                templates: {
                    search: ""
                },
                labels: {
                    all: 'все',
                    infos: 'Показаны с {{ctx.start}} по {{ctx.end}} из {{ctx.total}} счетов',
                    loading: 'Загрузка счетов...',
                    noResults: 'Счета не найдены',
                    refresh: 'Обновить список счетов',
                    search: 'Быстрый поиск по счетам'
                },
                rowCount: [10, 20, 50, 100, 200, 1000, 5000, 10000, -1],
                formatters: {
                    user: function(column, row) {
                        var user_string = ['<a href="<?= APP::Module('Routing')->root ?>admin/users/profile/' + row.user_id + '" target="_blank" class="user">' + row.user_email + '</a>'];
                        var user_items = [];
                        
                        $.each(row.details, function() {
                            var user_item = null;

                            switch(this.item) {
                                case 'lastname': user_item = 'Фамилия'; break;
                                case 'firstname': user_item = 'Имя'; break;
                                case 'tel': user_item = 'Телефон'; break;
                                case 'email': user_item = 'E-Mail'; break;
                                case 'comment': user_item = 'Комментарий'; break;
                                default: user_item = this.item; break;
                            }
                            
                            user_items.push(user_item + ': ' + this.value);
                        });
                        
                        if (user_items.length) {
                            user_string.push('<hr style="margin: 5px 0">');
                            user_string.push(user_items.join('<br>'));
                        }
                        
                        return user_string.join('');
                    },
                    author: function(column, row) {
                        return parseInt(row.author) ? '<a href="<?= APP::Module('Routing')->root ?>admin/users/profile/' + row.author + '" target="_blank" class="author">' + row.author_name + '</a>' : 'клиент';
                    },
                    amount: function(column, row) {
                        return new Intl.NumberFormat().format(row.amount) + ' руб.';
                    },
                    products: function(column, row) {
                        var products_string = [];

                        $.each(row.products, function() {
                            var product_type = null;

                            switch(this.type) {
                                case 'primary': product_type = 'Первичный'; break;
                                case 'secondary': product_type = 'Вторичный'; break;
                            }
                            
                            products_string.push('[' + product_type + '] ' + this.name + ' (' + new Intl.NumberFormat().format(this.amount) + ' руб.)');
                        });
                        
                        return products_string.join('<hr style="margin: 5px 0">');
                    },
                    state: function(column, row) {
                        var invoice_state = [];
                        
                        switch (row.state) {
                            case 'new': invoice_state.push('Новый'); break;
                            case 'processed': invoice_state.push('В работе'); break;
                            case 'success': invoice_state.push('Оплачен'); break;
                            case 'revoked': invoice_state.push('Аннулирован'); break;
                        }
                        
                        if (row.comments.length) {
                            $.each(row.comments, function() {
                                invoice_state.push('<hr style="margin: 5px 0">' + this.author_name + ' · ' + this.up_date + '<br>' + this.message);
                            });
                            
                        }
                        
                        return invoice_state.join('');
                    },
                    pay_date: function(column, row) {
                        return row.pay_date ? row.pay_date : '-';
                    }
                }
            }).on('loaded.rs.jquery.bootgrid', function() {
                export_table.update();
                
                invoices_table.find('tr').on('click', function(e) {
                    if ((e.target.className === 'user') || (e.target.className === 'author')) {
                        window.open(e.target.href, '_blank');
                        return false;
                    }

                    OpenInvoiceSidebar($('> td', this).first().html());
                });
            });
            
            var export_table = $("#invoices-table").tableExport({
                fileName: 'export_invoices',
                formats: ['xlsx', 'csv', 'txt']
            });

            export_table.xlsx.buttonContent = 'Excel';
            export_table.csv.buttonContent = 'CSV';
            export_table.txt.buttonContent = 'TEXT';
            
            var invoice_details = false;
            
            function OpenInvoiceSidebar(invoice_id) {
                $('#invoice-details-id').html(invoice_id);
                
                $.ajax({
                    type: 'post',
                    url: '<?= APP::Module('Routing')->root ?>billing/admin/invoices/api/details.json',
                    data: {
                        invoice: invoice_id
                    },
                    success: function(invoice) {
                        invoice_details = invoice;
                        InvoiceDetailsNav();
                        $('#invoice-details-loader').slideUp(300);
                    }
                });
                
                $('#main').append('<div onClick="CloseInvoiceSidebar()" class="sidebar-backdrop animated fadeIn">');
                $('#invoice-details').addClass('toggled');
                $('body').addClass('o-hidden');
            }
            
            function CloseInvoiceSidebar() {
                invoice_details_id = false;

                $('.sidebar').removeClass('toggled');
                $('.sidebar-backdrop').remove();
                $('body').removeClass('o-hidden');
                
                $('.invoice-details-panel').hide();
                $('#invoice-details-loader').show();
            }
            
            $(document).on('click', '#invoice-details-page', function() {
                window.open('<?= APP::Module('Routing')->root ?>admin/billing/invoices/details/' + $('#invoice-details-id').html(), '_blank');
            });
            
            function InvoiceDetailsNav() {
                $('.invoice-details-panel').slideUp(300);
                
                $('#invoice-details-nav').html([
                    '<a href="javascript:void(0)" onclick="InvoiceDetailsMain()">Основная информация</a>',
                    '<a href="javascript:void(0)" onclick="InvoiceDetailsProducts()">Продукты</a>',
                    //'<a href="javascript:void(0)" onclick="InvoiceDetailsHistory()">История</a>',
                    invoice_details.payments.length ? '<a href="javascript:void(0)" onclick="InvoiceDetailsPayments()">Платежи</a>' : '',
                    invoice_details.details.length ? '<a href="javascript:void(0)" onclick="InvoiceDetailsContacts()">Контактные данные</a>' : '',
                    '<a href="javascript:void(0)" onclick="InvoiceDetailsComments()">Комментарии</a>',
                    '<a href="javascript:void(0)" onclick="InvoiceDetailsLabels()">Метки</a>',
                    '<a href="javascript:void(0)" onclick="InvoiceDetailsActions()">Действия</a>'
                ].join('')).slideDown(300);
            }

            function InvoiceDetailsMain() {
                $('.invoice-details-panel').slideUp(150);
                
                var invoice_state = null;
                
                switch(invoice_details.invoice.state) {
                    case 'new': invoice_state = 'ожидает оплаты'; break;
                    case 'processed': invoice_state = 'в работе'; break;
                    case 'success': invoice_state = 'оплачен'; break;
                    case 'revoked': invoice_state = 'аннулирован'; break;
                }
                
                $('#invoice-details-main').html([
                    '<a href="javascript:void(0)" onclick="InvoiceDetailsNav()" class="back"><i class="zmdi zmdi-long-arrow-left m-r-5"></i>Назад</a>',
                    '<div class="main-list">',
                        '<div class="main-list-item">',
                            'Клиент',
                        '</div>',
                        '<div class="main-list-value">',
                            '<a href="<?= APP::Module('Routing')->root ?>admin/users/profile/' + invoice_details.invoice.user_id + '" target="_blank">' + invoice_details.invoice.email + '</a>',
                        '</div>',
                    '</div>',
                    '<div class="main-list">',
                        '<div class="main-list-item">',
                            'Сумма',
                        '</div>',
                        '<div class="main-list-value">',
                            new Intl.NumberFormat().format(invoice_details.invoice.amount) + ' руб.',
                        '</div>',
                    '</div>',
                    '<div class="main-list">',
                        '<div class="main-list-item">',
                            'Состояние',
                        '</div>',
                        '<div class="main-list-value">',
                            invoice_state,
                        '</div>',
                    '</div>',
                    '<div class="main-list">',
                        '<div class="main-list-item">',
                            'Автор',
                        '</div>',
                        '<div class="main-list-value">',
                            invoice_details.invoice.author != 0 ? '<a href="<?= APP::Module('Routing')->root ?>admin/users/profile/' + invoice_details.invoice.author + '" target="_blank">' + invoice_details.invoice.author_name + '</a>' : 'клиент самостоятельно создал счет',
                        '</div>',
                    '</div>',
                    '<div class="main-list">',
                        '<div class="main-list-item">',
                            'Дата обновления',
                        '</div>',
                        '<div class="main-list-value">',
                            invoice_details.invoice.up_date,
                        '</div>',
                    '</div>',
                    '<div class="main-list">',
                        '<div class="main-list-item">',
                            'Дата создания',
                        '</div>',
                        '<div class="main-list-value">',
                            invoice_details.invoice.cr_date,
                        '</div>',
                    '</div>'
                ].join('')).slideDown(300);
            }
            
            function search_product_access(value){
                for (var i = 0; i < invoice_details.products_access.length; i++) {
                    if (invoice_details.products_access[i] === value) {
                        return i;
                    }
                }
                
                return false;
            }
            
            function InvoiceDetailsProducts() {
                $('.invoice-details-panel').slideUp(150);
 
                $('#invoice-details-products').html('<a href="javascript:void(0)" onclick="InvoiceDetailsNav()" class="back"><i class="zmdi zmdi-long-arrow-left m-r-5"></i>Назад</a>');
                
                $.each(invoice_details.products, function() {
                    var product_access = search_product_access(this.product);
                    var product_type = null;
                
                    switch(this.type) {
                        case 'primary': product_type = 'Первичный'; break;
                        case 'secondary': product_type = 'Вторичный'; break;
                    }
                    
                    $('#invoice-details-products').append([
                        '<div class="products-list">',
                            '<div class="products-list-name">',
                                product_access !== false ? '<i class="hm-icon zmdi zmdi-lock-open m-r-5"></i>': '<i class="hm-icon zmdi zmdi-lock m-r-5" style="color: #e3e3e3"></i>',
                                '<span class="badge m-r-5 ' + this.type + '">' + product_type + '</span>' + this.name,
                            '</div>',
                            '<div class="products-list-amount">',
                                new Intl.NumberFormat().format(this.amount) + ' руб.',
                            '</div>',
                            '<div class="products-list-date">',
                                this.cr_date,
                            '</div>',
                        '</div>'
                    ].join(''));
                });
                
                $('#invoice-details-products').slideDown(300);
            }
            
            function InvoiceDetailsHistory() {
                $('.invoice-details-panel').slideUp(150);
                
                $('#invoice-details-history').html([
                    '<a href="javascript:void(0)" onclick="InvoiceDetailsNav()" class="back"><i class="zmdi zmdi-long-arrow-left m-r-5"></i>Назад</a>',
                    'История'
                ].join('')).slideDown(300);
            }
            
            function InvoiceDetailsPayments() {
                $('.invoice-details-panel').slideUp(150);
 
                $('#invoice-details-payments').html('<a href="javascript:void(0)" onclick="InvoiceDetailsNav()" class="back"><i class="zmdi zmdi-long-arrow-left m-r-5"></i>Назад</a>');
                
                $.each(invoice_details.payments, function() {
                    var payment_method = null;
                
                    switch(this.method) {
                        case 'admin': payment_method = 'Вручную администратором'; break;
                        default: payment_method = this.method; break;
                    }
                    
                    $('#invoice-details-payments').append([
                        '<div class="payments-list">',
                            '<div class="payments-list-method">',
                                payment_method,
                            '</div>',
                            '<div class="payments-list-date">',
                                this.cr_date,
                            '</div>',
                        '</div>'
                    ].join(''));
                });
                
                $('#invoice-details-payments').slideDown(300);
            }
            
            function InvoiceDetailsContacts() {
                $('.invoice-details-panel').slideUp(150);
 
                $('#invoice-details-contacts').html('<a href="javascript:void(0)" onclick="InvoiceDetailsNav()" class="back"><i class="zmdi zmdi-long-arrow-left m-r-5"></i>Назад</a>');
                
                $.each(invoice_details.details, function() {
                    var details_item = null;
                
                    switch(this.item) {
                        case 'lastname': details_item = 'Фамилия'; break;
                        case 'firstname': details_item = 'Имя'; break;
                        case 'tel': details_item = 'Телефон'; break;
                        case 'email': details_item = 'E-Mail'; break;
                        case 'comment': details_item = 'Комментарий'; break;
                        default: details_item = this.item; break;
                    }
                    
                    $('#invoice-details-contacts').append([
                        '<div class="contacts-list">',
                            '<div class="contacts-list-item">',
                                details_item,
                            '</div>',
                            '<div class="contacts-list-value">',
                                this.value ? this.value : 'нет данных',
                            '</div>',
                        '</div>'
                    ].join(''));
                });
                
                $('#invoice-details-contacts').slideDown(300);
            }
            
            function InvoiceDetailsComments() {
                $('.invoice-details-panel').slideUp(150);
 
                $('#invoice-details-comments').html('<a href="javascript:void(0)" onclick="InvoiceDetailsNav()" class="back"><i class="zmdi zmdi-long-arrow-left m-r-5"></i>Назад</a>');
                
                $.each(invoice_details.comments, function() {
                    $('#invoice-details-comments').append([
                        '<div class="comments-list">',
                            '<div class="comments-list-date">',
                                this.up_date,
                            '</div>',
                            '<div class="comments-list-user">',
                                this.username ? this.username : this.email,
                            '</div>',
                            '<div class="comments-list-message">',
                                this.message,
                            '</div>',
                        '</div>'
                    ].join(''));
                });
                
                $('#invoice-details-comments').append([
                    '<textarea id="invoice-details-comments-message" class="form-control" placeholder="Введите ваш комментарий..."></textarea>',
                    '<a href="javascript:void(0)" onclick="AddInvoiceComment()" class="controls"><i class="zmdi zmdi-plus-circle m-r-10"></i>Добавить комментарий</a>'
                ]);
                
                autosize($('#invoice-details-comments-message'));
                
                $('#invoice-details-comments').slideDown(300);
            }
            
            function InvoiceDetailsLabels() {
                $('.invoice-details-panel').slideUp(150);
 
                $('#invoice-details-labels').html([
                    '<a href="javascript:void(0)" onclick="InvoiceDetailsNav()" class="back"><i class="zmdi zmdi-long-arrow-left m-r-5"></i>Назад</a>',
                    '<div class="labels-list-holder"></div>'
                ]);
                
                $.each(invoice_details.labels, function() {
                    $('#invoice-details-labels > .labels-list-holder').append([
                        '<div class="labels-list" data-id="' + this.id + '">',
                            '<i onclick="RemoveInvoiceLabel(' + this.id + ')" class="zmdi zmdi-close m-l-5" title="Удалить метку"></i>',
                            '<div class="labels-list-date">',
                                '<input class="form-control" type="text" value="' + this.st_date + '" placeholder="Дата">',
                            '</div>',
                            '<div class="labels-list-label">',
                                '<select class="selectpicker">',
                                    '<option value="write">написать</option>',
                                    '<option value="call">позвонить</option>',
                                    '<option value="color-call">позвонить цветотипу</option>',
                                '</select>',
                            '</div>',
                        '</div>'
                    ].join(''));
                    
                    $('#invoice-details-labels .labels-list[data-id="' + this.id + '"] .labels-list-date input').datetimepicker({
                        format: 'YYYY-MM-DD HH:mm:ss',
                        defaultDate: 0
                    });
                    
                    $('#invoice-details-labels .labels-list[data-id="' + this.id + '"] .labels-list-label select').val(this.label_id).selectpicker();
                });
                
                $('#invoice-details-labels').append([
                    '<a href="javascript:void(0)" onclick="AddInvoiceLabel()" class="controls"><i class="zmdi zmdi-plus-circle m-r-10"></i>Добавить метку</a>',
                    '<a href="javascript:void(0)" onclick="UpdateInvoiceLabels()" class="controls"><i class="zmdi zmdi-save m-r-10"></i>Сохранить изменения</a>'
                ]);
                
                $('#invoice-details-labels').slideDown(300);
            }
            
            function InvoiceDetailsActions() {
                $('.invoice-details-panel').slideUp(150);

                if (<?= (int) (APP::Module('Users')->user['role'] === 'manager') ?>) {
                    $('#invoice-details-actions').html([
                        '<a href="javascript:void(0)" onclick="InvoiceDetailsNav()" class="back"><i class="zmdi zmdi-long-arrow-left m-r-5"></i>Назад</a>',
                        '<div class="actions-list">',
                            invoice_details.invoice.state != 'success' ? '<a href="javascript:void(0)" onclick="PayInvoice()">Провести оплату</a>' : '',
                            invoice_details.invoice.state != 'success' ? '<a href="<?= APP::Module('Routing')->root ?>billing/payments/make/' + invoice_details.invoice.id_hash + '" target="_blank">Перейти на страницу оплаты</a>' : '',
                            ((invoice_details.invoice.state != 'revoked') && (invoice_details.invoice.state != 'success')) ? '<a href="javascript:void(0)" onclick="RevokeInvoice()">Аннулировать</a>' : '',
                            invoice_details.invoice.state != 'success' ? '<a href="javascript:void(0)" onclick="RemoveInvoice()">Удалить</a>' : '',,
                        '</div>'
                    ].join(''));
                } else {
                    $('#invoice-details-actions').html([
                        '<a href="javascript:void(0)" onclick="InvoiceDetailsNav()" class="back"><i class="zmdi zmdi-long-arrow-left m-r-5"></i>Назад</a>',
                        '<div class="actions-list">',
                            invoice_details.invoice.state != 'success' ? '<a href="javascript:void(0)" onclick="PayInvoice()">Провести оплату</a>' : '',
                            invoice_details.invoice.state != 'success' ? '<a href="<?= APP::Module('Routing')->root ?>billing/payments/make/' + invoice_details.invoice.id_hash + '" target="_blank">Перейти на страницу оплаты</a>' : '',
                            invoice_details.invoice.state != 'revoked' ? '<a href="javascript:void(0)" onclick="RevokeInvoice()">Аннулировать</a>' : '',
                            '<a href="javascript:void(0)" onclick="RemoveInvoice()">Удалить</a>',
                        '</div>'
                    ].join(''));
                }

                $('#invoice-details-actions').slideDown(300);
            }
            
            
            function RemoveInvoice() {
                swal({
                    title: 'Вы действительно хотите удалить счет?',
                    text: 'Это действие будет невозможно отменить',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Удалить',
                    cancelButtonText: 'Отмена',
                    closeOnConfirm: false,
                    closeOnCancel: true
                }, function(isConfirm){
                    if (isConfirm) {
                        $.post('<?= APP::Module('Routing')->root ?>admin/billing/invoices/api/remove.json', {
                            id: invoice_details.invoice.id
                        }, function() {
                            CloseInvoiceSidebar();
                            invoices_table.bootgrid('reload', true);

                            swal({
                                title: 'Готово',
                                text: 'Счет был успешно удален',
                                type: 'success',
                                showCancelButton: false,
                                confirmButtonText: 'OK',
                                closeOnConfirm: false
                            });
                        });
                    }
                });
            }
            
            function RevokeInvoice() {
                swal({
                    title: 'Вы действительно хотите аннулировать счет?',
                    text: 'Обратите внимание, что доступы к продуктам, которые возможно были открыты в рамках этого счета, автоматически закрыты не будут.',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Аннулировать',
                    cancelButtonText: 'Отмена',
                    closeOnConfirm: false,
                    closeOnCancel: true
                }, function(isConfirm){
                    if (isConfirm) {
                        $.post('<?= APP::Module('Routing')->root ?>admin/billing/invoices/api/revoke.json', {
                            id: invoice_details.invoice.id
                        }, function() {
                            CloseInvoiceSidebar();
                            invoices_table.bootgrid('reload', true);

                            swal({
                                title: 'Готово',
                                text: 'Счет был успешно аннулирован',
                                type: 'success',
                                showCancelButton: false,
                                confirmButtonText: 'OK',
                                closeOnConfirm: false
                            });
                        });
                    }
                });
            }
            
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
                                invoice_id: invoice_details.invoice.id,
                                notification: notification
                            }, function() {
                                CloseInvoiceSidebar();
                                invoices_table.bootgrid('reload', true);

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
            
            function AddInvoiceLabel() {
                var label_id = Math.random();
            
                $('#invoice-details-labels > .labels-list-holder').append([
                    '<div class="labels-list" data-id="' + label_id + '">',
                        '<i onclick="RemoveInvoiceLabel(' + label_id + ')" class="zmdi zmdi-close m-l-5" title="Удалить метку"></i>',
                        '<div class="labels-list-date">',
                            '<input class="form-control" type="text" value="<?= date('Y-m-d H:i:s') ?>" placeholder="Дата">',
                        '</div>',
                        '<div class="labels-list-label">',
                            '<select class="selectpicker">',
                                '<option value="write" selected>написать</option>',
                                '<option value="call">позвонить</option>',
                                '<option value="color-call">позвонить цветотипу</option>',
                            '</select>',
                        '</div>',
                    '</div>'
                ].join(''));
                
                $('#invoice-details-labels .labels-list[data-id="' + label_id + '"] .labels-list-date input').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss',
                    defaultDate: 0
                });

                $('#invoice-details-labels .labels-list[data-id="' + label_id + '"] .labels-list-label select').selectpicker();
            }
            
            function RemoveInvoiceLabel(label_id) {
                $('#invoice-details-labels .labels-list[data-id="' + label_id + '"]').remove();
            }
            
            function UpdateInvoiceLabels() {
                var invoice_labels = [];
                
                $('#invoice-details-labels').slideUp(100);
                $('#invoice-details-loader').slideDown(100);
                
                $.each($('.labels-list-holder > .labels-list'), function() {
                    invoice_labels.push({
                        date: $('.labels-list-date > input', this).val(),
                        id: $('.labels-list-label > select', this).val()
                    });
                });
                
                $.post('<?= APP::Module('Routing')->root ?>admin/billing/invoices/labels/api/update.json', {
                    invoice: invoice_details.invoice.id,
                    labels: invoice_labels
                }, function() {
                    $('#invoice-details-labels').slideDown(300);
                    $('#invoice-details-loader').slideUp(300);
                    
                    invoices_table.bootgrid('reload', true);
                    
                    swal({
                        title: 'Готово',
                        text: 'Метки счета были успешно обновлены',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        closeOnConfirm: false
                    });
                });
            }
            
            function AddInvoiceComment() {
                var comment_message = $('#invoice-details-comments-message').val();
                
                if (!comment_message) {
                    swal({
                        title: 'Ошибка',
                        text: 'Текст комментария не введен',
                        type: 'error',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        closeOnConfirm: false
                    });
                    
                    return false;
                }
                
                $('#invoice-details-comments').slideUp(100);
                $('#invoice-details-loader').slideDown(100);
                
                $('#invoice-details-comments .comments-list').last().after([
                    '<div class="comments-list">',
                        '<div class="comments-list-date">',
                            'только что',
                        '</div>',
                        '<div class="comments-list-user">',
                            'Я',
                        '</div>',
                        '<div class="comments-list-message">',
                            comment_message,
                        '</div>',
                    '</div>'
                ].join(''));
                
                $.post('<?= APP::Module('Routing')->root ?>admin/billing/invoices/comments/api/add.json', {
                    invoice: invoice_details.invoice.id,
                    message: comment_message
                }, function() {
                    //CloseInvoiceSidebar();
                    //invoices_table.bootgrid('reload', true);
                    
                    $('#invoice-details-comments-message').val('');
                    $('#invoice-details-comments').slideDown(100);
                    $('#invoice-details-loader').slideUp(100);
                    
                    
                    swal({
                        title: 'Готово',
                        text: 'Комментарий к счету был успешно добавлен',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        closeOnConfirm: false
                    });
                });
            }
        </script>
    </body>
</html>
