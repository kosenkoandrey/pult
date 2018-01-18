<?
$filters = htmlspecialchars(isset(APP::Module('Routing')->get['filters']) ? APP::Module('Crypt')->Decode(APP::Module('Routing')->get['filters']) : '{"logic":"intersect","rules":[{"method":"email","settings":{"logic":"LIKE","value":"%"}}]}');
?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Управление пользователями</title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet"> 
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/tableexport.js/dist/css/tableexport.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/modules/users/rules.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/modules/tunnels/scheme/letter-selector/style.css" rel="stylesheet">

        <style>
            #users-table-header .actionBar .actions > button {
                display: none;
            }
            #users-table-header .actionBar .actions .dropdown-menu {
                width: 250px !important;
                z-index: 999999 !important;
            }
            .btn-toolbar {
                margin-left: 10px !important;
            }
            
            #user-modal .modal-content.loader {
                display: none;
            }
            
            .bootgrid-footer .infoBar .excel-export {
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
            'Пользователи' => 'admin/users'
        ]);
        ?>
        <section id="main">
            <? APP::Render('admin/widgets/sidebar') ?>

            <section id="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2>Управление пользователями</h2>
                            <ul class="actions">
                                <li class="dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="<?= APP::Module('Routing')->root ?>admin/users/add">Добавить пользователя</a></li>
                                        <li><a href="<?= APP::Module('Routing')->root ?>admin/users/import">Импортировать пользователей</a></li>
                                        <li><a href="<?= APP::Module('Routing')->root ?>admin/users/roles">Управление ролями</a></li>
                                        <li><a href="<?= APP::Module('Routing')->root ?>admin/users/oauth/clients">OAuth клиенты</a></li>
                                        <li><a href="<?= APP::Module('Routing')->root ?>admin/users/services">Сервисы</a></li>
                                        <li><a href="<?= APP::Module('Routing')->root ?>admin/users/auth">Аутентификация</a></li>
                                        <li><a href="<?= APP::Module('Routing')->root ?>admin/users/passwords">Пароли</a></li>
                                        <li><a href="<?= APP::Module('Routing')->root ?>admin/users/notifications">Уведомления</a></li>
                                        <li><a href="<?= APP::Module('Routing')->root ?>admin/users/timeouts">Таймауты</a></li>
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
                                        <li><a data-action="change_state" href="javascript:void(0)">Изменить состояние</a></li>
                                        <li><a data-action="add_tag" href="javascript:void(0)">Добавить метку</a></li>
                                        <li><a data-action="add_group" data-confirm="no" href="javascript:void(0)">Добавить в группу</a></li>
                                        <li><a data-action="add_groups_split_test" data-confirm="no" href="javascript:void(0)">Добавить в группы (A/B-тестирование)</a></li>
                                        <li><a data-action="delete_group" href="javascript:void(0)">Удалить из группы</a></li>
                                        <li class="divider"></li>
                                        <li><a data-action="send_mail" data-confirm="no" href="javascript:void(0)">Отправить письмо</a></li>
                                        <li class="divider"></li>
                                        <li><a data-action="tunnel_subscribe" href="javascript:void(0)">Подписать на туннель</a></li>
                                        <li><a data-action="tunnel_pause" href="javascript:void(0)">Поставить туннель на паузу</a></li>
                                        <li><a data-action="tunnel_complete" href="javascript:void(0)">Завершить туннель</a></li>
                                        <li><a data-action="tunnel_manually_complete" href="javascript:void(0)">Подписать и завершить туннель</a></li>
                                        <li class="divider"></li>
                                        <li><a data-action="utm" data-confirm="no" href="javascript:void(0)">UTM-анализ</a></li>
                                        <li><a data-action="utm_roi" data-confirm="no" href="javascript:void(0)">UTM-анализ ROI</a></li>
                                        <li><a data-action="open_letter_pct" data-confirm="no" href="javascript:void(0)">Анализ по % открытия</a></li>
                                        <li><a data-action="open_letter_time" data-confirm="no" href="javascript:void(0)">Анализ по времени открытия</a></li>
                                        <li><a data-action="rfm" href="javascript:void(0)">RFM анализ</a></li>
                                        <li><a data-action="cohort" data-confirm="no" href="javascript:void(0)">Когортный анализ</a></li>
                                        <li><a data-action="geo" data-confirm="no" href="javascript:void(0)">Geo анализ</a></li>
                                        <li><a data-action="sales" data-confirm="no" href="javascript:void(0)">Sales tool</a></li>
                                        <li><a data-action="source" data-confirm="no" href="javascript:void(0)">Анализ источников</a></li>
					<li><a data-action="utm_content" data-confirm="no" href="javascript:void(0)">Анализ UTM-content меток</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-vmiddle" id="users-table">
                                <thead>
                                    <tr>
                                        <th data-column-id="id" data-type="numeric" data-order="desc">ID</th>
                                        <th data-column-id="email" data-formatter="email">E-Mail</th>
                                        <?
                                        foreach (APP::Module('DB')->Select(
                                            APP::Module('Users')->settings['module_users_db_connection'], ['fetchAll', PDO::FETCH_COLUMN],
                                            ['DISTINCT item'], 'users_about'
                                        ) as $value) {
                                            ?>
                                            <th data-column-id="<?= $value ?>" data-visible="false">
                                                <?
                                                switch ($value) {
                                                    case 'firstname': echo 'Имя'; break;
                                                    case 'lastname': echo 'Фамилия'; break;
                                                    case 'country_name_ru': echo 'Страна'; break;
                                                    case 'region_name_ru': echo 'Регион'; break;
                                                    case 'city_name_ru': echo 'Город'; break;
                                                    case 'tel': echo 'Телефон'; break;
                                                    case 'source': echo 'Источник'; break;
                                                    case 'http_user_agent': echo 'Браузер'; break;
                                                    case 'http_referer': echo 'HTTP-реферер'; break;
                                                    case 'remote_addr': echo 'IP'; break;
                                                    case 'self_url': echo 'Self URL'; break;
                                                    case 'skype': echo 'Skype'; break;
                                                    case 'mobile_phone': echo 'Мобильный телефон'; break;
                                                    default: echo $value; break;
                                                }
                                                ?>
                                            </th>
                                            <?
                                        }
                                        ?>
                                        <th data-column-id="amount" data-visible="false">Выручка</th>
                                        <th data-column-id="social" data-formatter="social" data-visible="false">Social</th>
                                        <th data-column-id="role" data-formatter="role">Роль</th>
                                        <th data-column-id="state" data-formatter="state">Состояние</th>
                                        <th data-column-id="reg_date">Дата регистрации</th>
                                        <th data-column-id="last_visit">Последний визит</th>
                                        <th data-column-id="actions" data-formatter="actions" data-sortable="false">Действия</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            
            <div class="modal fade" id="user-modal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content form">
                        <div class="modal-header">
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <form id="user-action-form" method="post" class="form-horizontal"></form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" id="exec_action">Выполнить</button>
                            <button type="button" class="btn btn-link" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                    <div class="modal-content loader">
                        <div class="modal-header">
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <center>
                                <div class="preloader pl-xxl">
                                    <svg class="pl-circular" viewBox="25 25 50 50"><circle class="plc-path" cx="50" cy="50" r="20" /></svg>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>

            <? APP::Render('admin/widgets/footer') ?>
        </section>

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
        
        <script src="<?= APP::Module('Routing')->root ?>public/modules/tunnels/scheme/letter-selector/script.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/modules/tunnels/scheme/tunnel-selector/script.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/modules/users/rules.js"></script> 
        
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/xlsx-js/xlsx.core.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/file-saverjs/FileSaver.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/tableexport.js/dist/js/tableexport.min.js"></script>
        
        <script src="<?= APP::Module('Routing')->root ?>public/modules/users/rules.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/modules/groups/script.js"></script>
        <? APP::Render('core/widgets/js') ?>
        <script>
            $(document).ready(function() {
                $('#search').RefRulesEditor({
                    'debug': true,
                    'url' : '<?= APP::Module('Routing')->root ?>'
                });
                
                var user_modal = {
                    build: function(action, rules){
                        var modal = $('#user-modal');
                        var form = $('#user-action-form', modal);
                        
                        form.empty();
                        
                        form.append(
                            [
                                "<input type='hidden' value='" + action + "' name='action'>",
                                "<input type='hidden' value='" + rules + "' name='rules'>"
                            ].join('')
                        );
                
                        switch (action) {
                            case 'tunnel_subscribe' :
                                $('.modal-title', modal).html('Подписка на туннель');
                                $('#exec_action').html('Подписать');
                                
                                form.append(
                                    [
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-4 control-label">Туннель</label>',
                                            '<div class="col-sm-8">',
                                                '<div class="fg-line">',
                                                    '<input id="tunnel_id" type="text" value="" name="settings[tunnel][0]" class="form-control">',
                                                '</div>',
                                            '</div>',
                                        '</div>',
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-4 control-label">Тип объекта</label>',
                                            '<div class="col-sm-8">',
                                                '<div class="select">',
                                                    '<select name="settings[tunnel][1]"  class="form-control">',
                                                        '<option value="actions">действие</option>',
                                                        '<option value="conditions">условие</option>',
                                                        '<option value="timeouts">таймаут</option>',
                                                    '</select>',
                                                '</div>',
                                            '</div>',
                                        '</div>',
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-4 control-label">ID объекта</label>',
                                            '<div class="col-sm-8">',
                                                '<div class="fg-line">',
                                                    '<input type="text" value="" name="settings[tunnel][2]" class="form-control">',
                                                '</div>',
                                            '</div>',
                                        '</div>',
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-4 control-label">Таймаут</label>',
                                            '<div class="col-sm-8">',
                                                '<div class="fg-line">',
                                                    '<input type="text" value="0" name="settings[tunnel][3]" class="form-control" placeholder="cек." >',
                                                '</div>',
                                            '</div>',
                                        '</div>',
                                        /*
                                        '<h4 class="modal-title m-b-20">Индоктринация</h4>',
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-4 control-label">Туннель</label>',
                                            '<div class="col-sm-8">',
                                                '<div class="fg-line">',
                                                    '<input id="welcome_tunnel_id" type="text" value="" name="settings[welcome][0]" class="form-control">',
                                                '</div>',
                                            '</div>',
                                        '</div>',
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-4 control-label">Тип объекта</label>',
                                            '<div class="col-sm-8">',
                                                '<div class="select">',
                                                    '<select name="settings[welcome][1]"  class="form-control">',
                                                        '<option value="actions">действие</option>',
                                                        '<option value="conditions">условие</option>',
                                                        '<option value="timeouts">таймаут</option>',
                                                    '</select>',
                                                '</div>',
                                            '</div>',
                                        '</div>',
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-4 control-label">ID объекта</label>',
                                            '<div class="col-sm-8">',
                                                '<div class="fg-line">',
                                                    '<input type="text" value="" name="settings[welcome][2]" class="form-control">',
                                                '</div>',
                                            '</div>',
                                        '</div>',
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-4 control-label">Таймаут</label>',
                                            '<div class="col-sm-8">',
                                                '<div class="fg-line">',
                                                    '<input type="text" value="" name="settings[welcome][3]" class="form-control">',
                                                '</div>',
                                            '</div>',
                                        '</div>',
                                        */
                                        '<h4 class="modal-title m-b-20">Активация</h4>',
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-4 control-label">Письмо</label>',
                                            '<div class="col-sm-8">',
                                                '<div class="fg-line">',
                                                    '<input id="tunnel_activation_letter_id" type="hidden" value="" name="settings[activation][0]" class="form-control">',
                                                '</div>',
                                            '</div>',
                                        '</div>',
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-4 control-label">URL для переадресации</label>',
                                            '<div class="col-sm-8">',
                                                '<div class="fg-line">',
                                                    '<input type="text" value="" name="settings[activation][1]" class="form-control">',
                                                '</div>',
                                            '</div>',
                                        '</div>',
                                        '<h4 class="modal-title m-b-20">Разное</h4>',
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-4 control-label">Таймаут очереди</label>',
                                            '<div class="col-sm-8">',
                                                '<div class="fg-line">',
                                                    '<input type="text" value="" name="settings[queue_timeout]" class="form-control" placeholder="сек">',
                                                '</div>',
                                            '</div>',
                                        '</div>',
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-4 control-label">Источник</label>',
                                            '<div class="col-sm-8">',
                                                '<div class="fg-line">',
                                                    '<input type="text" value="" name="settings[source]" class="form-control">',
                                                '</div>',
                                            '</div>',
                                        '</div>'
                                        
                                    ].join('')
                                );
                        
                                $('#tunnel_id', modal).TunnelSelector({'url':'<?= APP::Module('Routing')->root ?>'});
                                $('#welcome_tunnel_id', modal).TunnelSelector({'url':'<?= APP::Module('Routing')->root ?>'});
                                $('#tunnel_activation_letter_id', modal).MailingLetterSelector({'url':'<?= APP::Module('Routing')->root ?>'});
                                
                                modal.modal('show');
                                break;
                            case 'remove' :
                                var data = form.serialize();
                                user_modal.send(data, false);
                                break;
                            case 'add_tag' :
                                $('.modal-title', modal).html('Добавление метки');
                                $('#exec_action').html('Добавить');
                                
                                form.append(
                                    [
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-3 control-label">Наименование</label>',
                                            '<div class="col-sm-9">',
                                                '<div class="fg-line">',
                                                    '<input type="text" value="" name="settings[item]" class="form-control">',
                                                '</div>',
                                            '</div>',
                                        '</div>',
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-3 control-label">Значение</label>',
                                            '<div class="col-sm-9">',
                                                '<div class="fg-line">',
                                                    '<input type="text" value="" name="settings[value]" class="form-control">',
                                                '</div>',
                                            '</div>',
                                        '</div>'
                                    ].join('')
                                );
                        
                                modal.modal('show');
                                break;
                            case 'change_state' :
                                $('.modal-title', modal).html('Изменение состояния');
                                $('#exec_action').html('Выполнить');
                                
                                form.append(
                                    [
                                        '<div class="form-group">',
                                            '<div class="col-sm-12">',
                                                '<div class="select">',
                                                    '<select name="settings[value]"  class="form-control">',
                                                        '<option value="active">активный</option>',
                                                        '<option value="inactive">неактивный</option>',
                                                        '<option value="blacklist">в черном списке</option>',
                                                        '<option value="dropped">невозможно доставить почту</option>',
                                                    '</select>',
                                                '</div>',
                                            '</div>',
                                        '</div>'
                                    ].join('')
                                );
                        
                                modal.modal('show');
                                break;
                            case 'send_mail' :
                                $('.modal-title', modal).html('Отправка письма');
                                $('#exec_action').html('Отправить');
                                
                                form.append(
                                    [
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-4 control-label">Письмо</label>',
                                            '<div class="col-sm-8">',
                                                '<div class="fg-line">',
                                                    '<input type="hidden" id="in_letter" value="" name="settings[letter]" class="form-control">',
                                                '</div>',
                                            '</div>',
                                        '</div>',
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-4 control-label">Сохранять копии</label>',
                                            '<div class="col-sm-8">',
                                                '<div class="toggle-switch m-t-10">',
                                                    '<input id="settings_save_copy" name="settings[save_copy]" type="checkbox" hidden="hidden">',
                                                    '<label for="settings_save_copy" class="ts-helper"></label>',
                                                '</div>',
                                            '</div>',
                                        '</div>',
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-4 control-label">Активировать Slack бота</label>',
                                            '<div class="col-sm-8">',
                                                '<div class="toggle-switch m-t-10">',
                                                    '<input id="settings_slack_bot" name="settings[slack_bot]" type="checkbox" hidden="hidden">',
                                                    '<label for="settings_slack_bot" class="ts-helper"></label>',
                                                '</div>',
                                            '</div>',
                                        '</div>'
                                    ].join('')
                                );
                        
                                $('#in_letter', modal).MailingLetterSelector({'url':'<?= APP::Module('Routing')->root ?>'});
                                modal.modal('show');
                                break;
                            case 'tunnel_pause' :
                                $('.modal-title', modal).html('Поставить туннель на паузу');
                                $('#exec_action').html('Выполнить');
                                
                                form.append(
                                    [
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-3 control-label">Туннель</label>',
                                            '<div class="col-sm-9">',
                                                '<div class="fg-line">',
                                                    '<input type="hidden" id="tunnel_id" value="" name="settings[tunnel_id]" class="form-control">',
                                                '</div>',
                                            '</div>',
                                        '</div>'
                                    ].join('')
                                );
                        
                                $('#tunnel_id', modal).TunnelSelector({'url':'<?= APP::Module('Routing')->root ?>'});
                                modal.modal('show');
                                break;
                            case 'tunnel_complete' :
                                $('.modal-title', modal).html('Завершить туннель');
                                $('#exec_action').html('Выполнить');
                                
                                form.append(
                                    [
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-3 control-label">Туннель</label>',
                                            '<div class="col-sm-9">',
                                                '<div class="fg-line">',
                                                    '<input type="hidden" id="tunnel_id" value="" name="settings[tunnel_id]" class="form-control">',
                                                '</div>',
                                            '</div>',
                                        '</div>'
                                    ].join('')
                                );
                        
                                $('#tunnel_id', modal).TunnelSelector({'url':'<?= APP::Module('Routing')->root ?>'});
                                modal.modal('show');
                                break;
                            case 'tunnel_manually_complete' :
                                $('.modal-title', modal).html('Подписать и завершить туннель');
                                $('#exec_action').html('Выполнить');
                                
                                form.append(
                                    [
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-3 control-label">Туннель</label>',
                                            '<div class="col-sm-9">',
                                                '<div class="fg-line">',
                                                    '<input type="hidden" id="tunnel_id" value="" name="settings[tunnel_id]" class="form-control">',
                                                '</div>',
                                            '</div>',
                                        '</div>'
                                    ].join('')
                                );
                        
                                $('#tunnel_id', modal).TunnelSelector({'url':'<?= APP::Module('Routing')->root ?>'});
                                modal.modal('show');
                                break;
                            case 'utm_roi' :
                                form.attr('target', '_blank');
                                form.attr('action', '<?= APP::Module('Routing')->root ?>admin/analytics/utm/roi');
                                var data = form.serialize();
                                user_modal.send(data, true);
                                break;
                            case 'cohort' :
                                form.attr('target', '_blank');
                                var data = form.serialize();
                                form.attr('action', '<?= APP::Module('Routing')->root ?>admin/analytics/cohorts');
                                form.append('<input type="hidden" name="group" value="month">');
                                form.append('<input type="hidden" name="indicators[]" value="total_subscribers_active">');
                                form.append('<input type="hidden" name="indicators[]" value="total_subscribers_unsubscribe">');
                                form.append('<input type="hidden" name="indicators[]" value="total_subscribers_dropped">');
                                form.append('<input type="hidden" name="indicators[]" value="total_clients">');
                                form.append('<input type="hidden" name="indicators[]" value="total_orders">');
                                form.append('<input type="hidden" name="indicators[]" value="total_revenue">');
                                form.append('<input type="hidden" name="indicators[]" value="ltv_client">');
                                form.append('<input type="hidden" name="indicators[]" value="cost">');
                                form.append('<input type="hidden" name="indicators[]" value="subscriber_cost">');
                                form.append('<input type="hidden" name="indicators[]" value="client_cost">');
                                form.append('<input type="hidden" name="indicators[]" value="roi">');
                                user_modal.send(data, true);
                                break;
                            case 'open_letter_pct' :
                                form.attr('target', '_blank');
                                form.attr('action', '<?= APP::Module('Routing')->root ?>admin/analytics/open/letter/pct');
                                var data = form.serialize();
                                user_modal.send(data, true);
                                break;
                            case 'open_letter_time' :
                                form.attr('target', '_blank');
                                form.attr('action', '<?= APP::Module('Routing')->root ?>admin/analytics/open/letter/time');
                                var data = form.serialize();
                                user_modal.send(data, true);
                                break;
                            case 'rfm' :
                                form.append(
                                    [
                                        '<div class="form-group">',
                                            '<div class="col-sm-12">',
                                                '<a class="rfm-button btn btn-lg btn-default btn-block" href="<?= APP::Module('Routing')->root ?>admin/analytics/rfm/billing">Покупки</a>',
                                            '</div>',
                                        '</div>',
                                        '<div class="form-group">',
                                            '<div class="col-sm-12">',
                                                '<a class="rfm-button btn btn-lg btn-default btn-block" href="<?= APP::Module('Routing')->root ?>admin/analytics/rfm/mail/open">Открытия писем</a>',
                                            '</div>',
                                        '</div>',
                                        '<div class="form-group">',
                                            '<div class="col-sm-12">',
                                                '<a class="rfm-button btn btn-lg btn-default btn-block" href="<?= APP::Module('Routing')->root ?>admin/analytics/rfm/mail/click">Клики в письмах</a>',
                                            '</div>',
                                        '</div>',
                                    ].join('')
                                );
                                $('#send_action').hide();
                                modal.modal('show');
                                break;
                            case 'geo' :
                                form.attr('target', '_blank');
                                form.attr('action', '<?= APP::Module('Routing')->root ?>admin/analytics/geo');
                                var data = form.serialize();
                                user_modal.send(data, true);
                                break;
                            case 'utm' :
                                form.attr('target', '_blank');
                                form.attr('action', '<?= APP::Module('Routing')->root ?>admin/analytics/utm');
                                var data = form.serialize();
                                user_modal.send(data, true);
                                break;
                            case 'add_group' :
                                $('.modal-title', modal).html('Добавить в группу');
                                $('#exec_action').html('Добавить');
                                
                                form.append(
                                    [
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-3 control-label">Группа</label>',
                                            '<div class="col-sm-9">',
                                                '<div class="fg-line">',
                                                    '<input type="hidden" id="group_id" value="" name="settings[group_id]" class="form-control">',
                                                '</div>',
                                            '</div>',
                                        '</div>'
                                    ].join('')
                                );
                        
                                $('#group_id', modal).GroupSelector({'url':'<?= APP::Module('Routing')->root ?>'});
                                modal.modal('show');
                                break;
                            case 'add_groups_split_test' :
                                $('.modal-title', modal).html('Добавить в группы (A/B-тестирование)');
                                $('#exec_action').html('Добавить');
                                
                                form.append(
                                    [
                                        '<div id="ab_groups">',
                                            '<div class="form-group">',
                                                '<label for="" class="col-sm-3 control-label">Группа</label>',
                                                '<div class="col-sm-7">',
                                                    '<div class="fg-line">',
                                                        '<input type="text" value="" name="settings[value][]" class="form-control">',
                                                    '</div>',
                                                '</div>',
                                                '<div class="col-sm-2">',
                                                    '<button type="button" class="remove_ab_group btn btn-default btn-sm">Удалить</button>',
                                                '</div>',
                                            '</div>',
                                        '</div>',
                                        '<div class="row">',
                                            '<div class="col-sm-offset-3 col-sm-9">',
                                                '<button id="add_ab_group" type="button" class="btn btn-default btn-sm">Добавить группу</button>',
                                            '</div>',
                                        '</div>'
                                    ].join('')
                                );

                                modal.modal('show');
                                break;
                            case 'delete_group' :
                                $('.modal-title', modal).html('Удалить из группы');
                                $('#exec_action').html('Удалить');
                                
                                form.append(
                                    [
                                        '<div class="form-group">',
                                            '<label for="" class="col-sm-3 control-label">Группа</label>',
                                            '<div class="col-sm-9">',
                                                '<div class="fg-line">',
                                                    '<input type="hidden" id="group_id" value="" name="settings[group_id]" class="form-control">',
                                                '</div>',
                                            '</div>',
                                        '</div>'
                                    ].join('')
                                );
                        
                                $('#group_id', modal).GroupSelector({'url':'<?= APP::Module('Routing')->root ?>'});
                                modal.modal('show');
                                break;
                            case 'sales' :
                                form.attr('target', '_blank');
                                form.attr('action', '<?= APP::Module('Routing')->root ?>admin/billing/sales');
                                var data = form.serialize();
                                user_modal.send(data, true);
                                break;
                            case 'source' :
                                form.attr('target', '_blank');
                                form.attr('action', '<?= APP::Module('Routing')->root ?>admin/users/source');
                                var data = form.serialize();
                                user_modal.send(data, true);
                                break;
			    case 'utm_content' :
                                form.attr('target', '_blank');
                                form.attr('action', '<?= APP::Module('Routing')->root ?>admin/analytics/utm/content');
                                var data = form.serialize();
                                user_modal.send(data, true);
                                break;
                        }
                        
                    },
                    send: function(data, submit){
                        var modal = $('#user-modal');
                        
                        $('#user-modal .modal-content.form').hide();
                        $('#user-modal .modal-content.loader').show();
                        
                        if (submit) {
                            $('#user-action-form', modal).submit();
                        } else {
                            $.post('<?= APP::Module('Routing')->root ?>admin/users/api/action.json', data)
                            .success(function(res) {
                                switch($('#user-action-form > input[name="action"]').val()) {
                                    case 'tunnel_subscribe':
                                        switch(res.status) {
                                            case 'error':
                                                var error_text = [];
                                                
                                                $.each(res.code, function(i, error) {
                                                    switch(error) {
                                                        case 101: error_text.push('E-Mail не соответствует'); break;
                                                        
                                                        case 201: error_text.push('Не найден выбранный активный туннель'); break;
                                                        case 202: error_text.push('Неверно указан ID блока туннеля'); break;
                                                        case 203: error_text.push('Превышен максимально допустимый таймаут подписки'); break;
                                                        
                                                        case 301: error_text.push('Не найдено письмо активации'); break;
                                                        case 302: error_text.push('Не передан URL для переадресации'); break;
                                                        
                                                        case 401: error_text.push('Не найден выбранный активный туннель индоктринации'); break;
                                                        case 402: error_text.push('Неверно указан ID блока туннеля индоктринации'); break;
                                                        case 403: error_text.push('Превышен максимально допустимый таймаут подписки туннеля индоктринации'); break;
                                                        
                                                        case 501: error_text.push('Превышен максимально допустимый таймаут очереди подписки'); break;
                                                        
                                                        default: error_text.push(res.status);
                                                    }
                                                });
                                                
                                                swal({
                                                    title: 'Ошибка',
                                                    text: error_text.join(', '),
                                                    type: 'error',
                                                    showCancelButton: false,
                                                    confirmButtonText: 'Ok',
                                                    closeOnConfirm: false
                                                });
                                                break;
                                            case 'success':
                                                swal({
                                                    title: 'Готово',
                                                    text: 'Действие было выполнено',
                                                    type: 'success',
                                                    showCancelButton: false,
                                                    confirmButtonText: 'Ok',
                                                    closeOnConfirm: false
                                                });
                                                break;
                                        }
                                        break;
                                    default:
                                        swal({
                                            title: 'Готово',
                                            text: 'Действие было выполнено',
                                            type: 'success',
                                            showCancelButton: false,
                                            confirmButtonText: 'Ok',
                                            closeOnConfirm: false
                                        });
                                }
                                
                                $('#user-modal .modal-content.form').show();
                                $('#user-modal .modal-content.loader').hide();
                        
                                modal.modal('hide');
                                
                                $('#users-table').bootgrid('reload', true);
                            }).error(function() {
                                swal({
                                    title: 'Ошибка',
                                    text: 'Во время выполнения действия возникла неизвестная ошибка',
                                    type: 'error',
                                    showCancelButton: false,
                                    confirmButtonText: 'OK',
                                    closeOnConfirm: false
                                });

                                $('#user-modal .modal-content.form').show();
                                $('#user-modal .modal-content.loader').hide();
                        
                                modal.modal('hide');
                            });
                            
                            return false;
                        }
                    }
                };
                
                $(document).on('click', '#render-table', function () {
                    $('#users-table').bootgrid('reload');
                });
                
                $(document).on('click', '#search_results_actions a', function () {
                    var action = $(this).data('action');
                    var confirm = $(this).data('confirm') === undefined ? 'yes' : $(this).data('confirm');
                    
                    if (confirm === 'yes') {
                        swal({
                            title: 'Вы уверены?',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Да',
                            cancelButtonText: 'Отменить',
                            closeOnConfirm: true,
                            closeOnCancel: true
                        }, function(isConfirm){
                            if (isConfirm) {
                                user_modal.build(action, $('#search').val());
                            }
                        });
                    } else {
                        user_modal.build(action, $('#search').val());
                    }
                });
                
                $(document).on('click', '#exec_action', function(){
                    var modal = $('#user-modal');
                    var form = $('#user-action-form', modal);
                    var data = form.serialize();

                    user_modal.send(data, false);
                    return false;
                });
                
                $('#user-modal').on('hide.bs.modal', function (event) {
                    $('#user-action-form', $(this)).html('');
                });

                var users_table = $("#users-table").bootgrid({
                    requestHandler: function (request) {
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
                        var export_fields = [];
                        
                        $.each($('.actionBar > .actions > .dropdown > .dropdown-menu > li > .checkbox > .dropdown-item > input'), function() {
                            var export_field_name = $(this).attr('name');
                            
                            if (($(this).prop('checked')) && (export_field_name !== 'actions')) {
                                export_fields.push(export_field_name);
                            }
                        });

                        $('#users-table-footer .infoBar .excel-export').remove();
                        $('#users-table-footer .infoBar').append('<div class="excel-export m-r-5"><a href="https://pult.glamurnenko.ru/admin/users/export/excel?search=' + encodeURIComponent($('#search').val()) + '&fields=' + encodeURIComponent(export_fields.join(':')) + '" target="_blank">Выгрузить всю выборку в Excel</a></div>');
                        return response;
                    },
                    ajax: true,
                    ajaxSettings: {
                        method: 'POST',
                        cache: false,
                        contentType: 'application/json'
                    },
                    url: '<?= APP::Module('Routing')->root ?>admin/users/api/search.json',
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
                        infos: 'Показаны с {{ctx.start}} по {{ctx.end}} из {{ctx.total}} пользователей',
                        loading: 'Загрузка пользователей...',
                        noResults: 'Пользователи не найдены',
                        refresh: 'Обновить список пользователей',
                        search: 'Быстрый поиск по пользователям'
                    },
                    rowCount: [10, 100, 500, 1000, -1],
                    formatters: {
                        role: function(column, row) {
                            switch (row.role) {
                                case 'new':
                                case 'user': 
                                    return 'подписчик'; break;
                                case 'admin': 
                                    return 'администратор'; break;
                                case 'tech-admin': 
                                    return 'технический администратор'; break;
                                default: 
                                    return row.role; break;
                            }
                        },
                        state: function(column, row) {
                            switch (row.state) {
                                case 'inactive': 
                                    return 'ожидает активации'; break;
                                case 'active': 
                                    return 'активный'; break;
                                case 'pause': 
                                    return 'временно отписан'; break;
                                case 'unsubscribe': 
                                    return 'отписан'; break;
                                case 'blacklist': 
                                    return 'в блэк-листе'; break;
                                case 'dropped': 
                                    return 'невозможно доставить почту'; break;
                                default: 
                                    return row.state; break;
                            }
                        },
                        email: function(column, row) {
                            return  '<a href="<?= APP::Module('Routing')->root ?>admin/users/profile/' + row.id + '" target="_blank">' + row.email + '</a>';
                        },
                        actions: function(column, row) {
                            return  '<a target="_blank" href="<?= APP::Module('Routing')->root ?>admin/users/edit/' + row.user_id_token + '" class="btn btn-sm btn-default btn-icon waves-effect waves-circle"><span class="zmdi zmdi-edit"></span></a> ' + 
                                    '<a href="javascript:void(0)" class="btn btn-sm btn-default btn-icon waves-effect waves-circle remove-user" data-user-id="' + row.id + '"><span class="zmdi zmdi-delete"></span></a>';
                        },
                        social: function(column, row) {
                            var html = '';
                            $.each(row.social, function(i, j){
                                switch(j.service){
                                    case 'vk' :
                                        html += '<a target="_blank" href="https://vk.com/id'+j.extra+'" class="btn btn-sm btn-default btn-icon waves-effect waves-circle">'+j.service+'</a>';
                                        break;
                                    case 'fb' :
                                        html += '<a target="_blank" href="http://facebook.com/'+j.extra+'" class="btn btn-sm btn-default btn-icon waves-effect waves-circle">'+j.service+'</a>';
                                        break;
                                }
                            });
                            return html;
                        }
                    }
                }).on('loaded.rs.jquery.bootgrid', function () {
                    export_table.update();
                    
                    users_table.find('.remove-user').on('click', function (e) {
                        var user_id = $(this).data('user-id');
                        swal({
                            title: 'Вы действительно хотите удалить пользователя?',
                            text: 'Это действие будет невозможно отменить',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Да',
                            cancelButtonText: 'Отмена',
                            closeOnConfirm: false,
                            closeOnCancel: true
                        }, function(isConfirm){
                            if (isConfirm) {
                                $.post('<?= APP::Module('Routing')->root ?>admin/users/api/remove.json', {
                                    id: user_id
                                }, function() { 
                                    users_table.bootgrid('reload', true);
                                    
                                    swal({
                                        title: 'Готово!',
                                        text: 'Пользователь был успешно удален',
                                        type: 'success',
                                        showCancelButton: false,
                                        confirmButtonText: 'Ok',
                                        closeOnConfirm: false
                                    });
                                });
                            }
                        });
                    });
                });

                var export_table = $("#users-table").tableExport({
                    fileName: 'export_users',
                    formats: ['xlsx', 'csv', 'txt']
                });
                
                export_table.xlsx.buttonContent = 'Excel';
                export_table.csv.buttonContent = 'CSV';
                export_table.txt.buttonContent = 'TEXT';
            });
            
            $(document).on('click', '#add_ab_group', function () {
                $('#ab_groups').append([
                    '<div class="form-group">',
                        '<label for="" class="col-sm-3 control-label">Группа</label>',
                        '<div class="col-sm-7">',
                            '<div class="fg-line">',
                                '<input type="text" value="" name="settings[value][]" class="form-control">',
                            '</div>',
                        '</div>',
                        '<div class="col-sm-2">',
                            '<button type="button" class="remove_ab_group btn btn-default btn-sm">Удалить</button>',
                        '</div>',
                    '</div>'
                    ].join('')
                );
            });

            $(document).on('click', '.remove_ab_group', function () {
                $(this).parent().parent().remove();
            });
        </script>
    </body>
  </html>
