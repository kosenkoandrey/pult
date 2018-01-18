<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Настройки почтовой системы</title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        
        <? APP::Render('core/widgets/css') ?>
    </head>
    <body data-ma-header="teal">
        <? 
        APP::Render('admin/widgets/header', 'include', [
            'Почта' => 'admin/mail/settings'
        ]);
        ?>
        <section id="main">
            <? APP::Render('admin/widgets/sidebar') ?>

            <section id="content">
                <div class="container">
                    <div class="card">
                        <form id="update-settings" class="form-horizontal" role="form">
                            <div class="card-header">
                                <h2>Настройки</h2>
                            </div>

                            <div class="card-body card-padding">
                                <ul class="tab-nav m-b-15" role="tablist" data-tab-color="teal">
                                    <li class="active"><a href="#settings-main" role="tab" data-toggle="tab">Основное</a></li>
                                    <li role="presentation"><a href="#settings-transport" role="tab" data-toggle="tab">Транспорт</a></li>
                                    <li role="presentation"><a href="#settings-copies" role="tab" data-toggle="tab">Копии писем</a></li>
                                    <li role="presentation"><a href="#settings-fbl" role="tab" data-toggle="tab">FBL-отчеты</a></li>
                                    <li role="presentation"><a href="#settings-utm" role="tab" data-toggle="tab">UTM-метки</a></li>
                                    <li role="presentation"><a href="#settings-token" role="tab" data-toggle="tab">Токены</a></li>
                                    <li role="presentation"><a href="#settings-duplicates" role="tab" data-toggle="tab">Дубликаты</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active animated fadeIn in" id="settings-main">
                                        <div class="form-group">
                                            <label for="module_mail_db_connection" class="col-sm-2 control-label">DB connection</label>
                                            <div class="col-sm-2">
                                                <div class="fg-line">
                                                    <select id="module_mail_db_connection" name="module_mail_db_connection" class="selectpicker">
                                                        <? foreach (array_keys(APP::Module('DB')->conf['connections']) as $connection) { ?><option value="<?= $connection ?>"><?= $connection ?></option><? } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="module_mail_tmp_dir" class="col-sm-2 control-label">Temp dir</label>
                                            <div class="col-sm-2">
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="module_mail_tmp_dir" id="module_mail_tmp_dir">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane animated fadeIn" id="settings-transport">
                                        <div class="form-group">
                                            <label for="module_mail_x_mailer" class="col-sm-2 control-label">X-Mailer</label>
                                            <div class="col-sm-2">
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="module_mail_x_mailer" id="module_mail_x_mailer">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="module_mail_charset" class="col-sm-2 control-label">Charset</label>
                                            <div class="col-sm-2">
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="module_mail_charset" id="module_mail_charset">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane animated fadeIn" id="settings-copies">
                                        <div class="form-group">
                                            <label for="module_mail_save_sent_email" class="col-sm-2 control-label">Сохранять копии</label>
                                            <div class="col-sm-1">
                                                <div class="toggle-switch m-t-10">
                                                    <input id="module_mail_save_sent_email" name="module_mail_save_sent_email" type="checkbox" hidden="hidden">
                                                    <label for="module_mail_save_sent_email" class="ts-helper"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="module_mail_sent_email_lifetime" class="col-sm-2 control-label">Автоматически удалять через</label>
                                            <div class="col-sm-2">
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="module_mail_sent_email_lifetime" id="module_mail_sent_email_lifetime">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane animated fadeIn" id="settings-fbl">
                                        <div class="form-group">
                                            <label for="module_mail_fbl_server" class="col-sm-2 control-label">Server</label>
                                            <div class="col-sm-3">
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="module_mail_fbl_server" id="module_mail_fbl_server">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="module_mail_fbl_login" class="col-sm-2 control-label">Login</label>
                                            <div class="col-sm-3">
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="module_mail_fbl_login" id="module_mail_fbl_login">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="module_mail_fbl_password" class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-3">
                                                <div class="fg-line">
                                                    <input type="password" class="form-control" name="module_mail_fbl_password" id="module_mail_fbl_password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="module_mail_fbl_prefix" class="col-sm-2 control-label">Prefix</label>
                                            <div class="col-sm-3">
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="module_mail_fbl_prefix" id="module_mail_fbl_prefix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane animated fadeIn" id="settings-utm">
                                        <div class="form-group">
                                            <label for="module_mail_utm_labels" class="col-sm-2 control-label">Добавлять к ссылкам</label>
                                            <div class="col-sm-1">
                                                <div class="toggle-switch m-t-10">
                                                    <input id="module_mail_utm_labels" name="module_mail_utm_labels" type="checkbox" hidden="hidden">
                                                    <label for="module_mail_utm_labels" class="ts-helper"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="module_mail_utm_labels_source" class="col-sm-2 control-label">UTM-source</label>
                                            <div class="col-sm-3">
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="module_mail_utm_labels_source" id="module_mail_utm_labels_source">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="module_mail_utm_labels_medium" class="col-sm-2 control-label">UTM-medium</label>
                                            <div class="col-sm-3">
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="module_mail_utm_labels_medium" id="module_mail_utm_labels_medium">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane animated fadeIn" id="settings-token">
                                        <div class="form-group">
                                            <label for="module_mail_token_mode" class="col-sm-2 control-label">Добавлять к ссылкам</label>
                                            <div class="col-sm-1">
                                                <div class="toggle-switch m-t-10">
                                                    <input id="module_mail_token_mode" name="module_mail_token_mode" type="checkbox" hidden="hidden">
                                                    <label for="module_mail_token_mode" class="ts-helper"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="module_mail_token_var" class="col-sm-2 control-label">Переменная</label>
                                            <div class="col-sm-3">
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="module_mail_token_var" id="module_mail_token_var">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane animated fadeIn" id="settings-duplicates">
                                        <div class="form-group">
                                            <label for="module_mail_exclude_duplicate_users" class="col-sm-2 control-label">Исключить пользователей</label>
                                            <div class="col-sm-4">
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="module_mail_exclude_duplicate_users" id="module_mail_exclude_duplicate_users">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="module_mail_exclude_duplicate_letters" class="col-sm-2 control-label">Исключить письма</label>
                                            <div class="col-sm-4">
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="module_mail_exclude_duplicate_letters" id="module_mail_exclude_duplicate_letters">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-5">
                                        <button type="submit" class="btn palette-Teal bg waves-effect btn-lg">Сохранить изменения</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        
        <? APP::Render('core/widgets/js') ?>
        
        <script>
            $(document).ready(function() {
                $('#module_mail_db_connection').val('<?= APP::Module('Mail')->settings['module_mail_db_connection'] ?>');
                $('#module_mail_tmp_dir').val('<?= APP::Module('Mail')->settings['module_mail_tmp_dir'] ?>');
                $('#module_mail_x_mailer').val('<?= APP::Module('Mail')->settings['module_mail_x_mailer'] ?>');
                $('#module_mail_charset').val('<?= APP::Module('Mail')->settings['module_mail_charset'] ?>');
                $('#module_mail_save_sent_email').prop('checked', <?= (int) APP::Module('Mail')->settings['module_mail_save_sent_email'] ?>);
                $('#module_mail_sent_email_lifetime').val('<?= APP::Module('Mail')->settings['module_mail_sent_email_lifetime'] ?>');
                $('#module_mail_fbl_server').val('<?= APP::Module('Mail')->settings['module_mail_fbl_server'] ?>');
                $('#module_mail_fbl_login').val('<?= APP::Module('Mail')->settings['module_mail_fbl_login'] ?>');
                $('#module_mail_fbl_password').val('<?= APP::Module('Mail')->settings['module_mail_fbl_password'] ?>');
                $('#module_mail_fbl_prefix').val('<?= APP::Module('Mail')->settings['module_mail_fbl_prefix'] ?>');
                $('#module_mail_utm_labels').prop('checked', <?= (int) APP::Module('Mail')->settings['module_mail_utm_labels'] ?>);
                $('#module_mail_utm_labels_source').val('<?= APP::Module('Mail')->settings['module_mail_utm_labels_source'] ?>');
                $('#module_mail_utm_labels_medium').val('<?= APP::Module('Mail')->settings['module_mail_utm_labels_medium'] ?>');
                $('#module_mail_token_mode').prop('checked', <?= (int) APP::Module('Mail')->settings['module_mail_token_mode'] ?>);
                $('#module_mail_token_var').val('<?= APP::Module('Mail')->settings['module_mail_token_var'] ?>');
                
                $('#module_mail_exclude_duplicate_users').val('<?= APP::Module('Mail')->settings['module_mail_exclude_duplicate_users'] ?>');
                $('#module_mail_exclude_duplicate_letters').val('<?= APP::Module('Mail')->settings['module_mail_exclude_duplicate_letters'] ?>');

                $('#update-settings').submit(function(event) {
                    event.preventDefault();

                    var module_mail_db_connection = $(this).find('#module_mail_db_connection');
                    var module_mail_tmp_dir = $(this).find('#module_mail_tmp_dir');
                    var module_mail_x_mailer = $(this).find('#module_mail_x_mailer');
                    var module_mail_charset = $(this).find('#module_mail_charset');
                    var module_mail_sent_email_lifetime = $(this).find('#module_mail_sent_email_lifetime');
                    var module_mail_fbl_server = $(this).find('#module_mail_fbl_server');
                    var module_mail_fbl_login = $(this).find('#module_mail_fbl_login');
                    var module_mail_fbl_password = $(this).find('#module_mail_fbl_password');
                    var module_mail_utm_labels_source = $(this).find('#module_mail_utm_labels_source');
                    var module_mail_utm_labels_medium = $(this).find('#module_mail_utm_labels_medium');
                    var module_mail_token_var = $(this).find('#module_mail_token_var');
                    var module_mail_exclude_duplicate_users = $(this).find('#module_mail_exclude_duplicate_users');
                    var module_mail_exclude_duplicate_letters = $(this).find('#module_mail_exclude_duplicate_letters');

                    module_mail_db_connection.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    module_mail_tmp_dir.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    module_mail_x_mailer.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    module_mail_charset.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    module_mail_sent_email_lifetime.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    module_mail_fbl_server.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    module_mail_fbl_login.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    module_mail_fbl_password.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    module_mail_utm_labels_source.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    module_mail_utm_labels_medium.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    module_mail_token_var.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    module_mail_exclude_duplicate_users.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    module_mail_exclude_duplicate_letters.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();

                    if (module_mail_db_connection.val() === '') { module_mail_db_connection.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-2').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (module_mail_tmp_dir.val() === '') { module_mail_tmp_dir.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-2').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (module_mail_x_mailer.val() === '') { module_mail_x_mailer.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-2').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (module_mail_charset.val() === '') { module_mail_charset.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-2').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (module_mail_sent_email_lifetime.val() === '') { module_mail_sent_email_lifetime.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-2').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; } 
                    if (module_mail_fbl_server.val() === '') { module_mail_fbl_server.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (module_mail_fbl_login.val() === '') { module_mail_fbl_login.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (module_mail_fbl_password.val() === '') { module_mail_fbl_password.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (module_mail_utm_labels_source.val() === '') { module_mail_utm_labels_source.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (module_mail_utm_labels_medium.val() === '') { module_mail_utm_labels_medium.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (module_mail_token_var.val() === '') { module_mail_token_var.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }

                    $(this).find('[type="submit"]').html('Подождите...').attr('disabled', true);

                    $.ajax({
                        type: 'post',
                        url: '<?= APP::Module('Routing')->root ?>admin/mail/api/settings/update.json',
                        data: $(this).serialize(),
                        success: function(result) {
                            switch(result.status) {
                                case 'success':
                                    swal({
                                        title: 'Готово',
                                        text: 'Настройки почтовой системы были успешно обновлены',
                                        type: 'success',
                                        showCancelButton: false,
                                        confirmButtonText: 'OK',
                                        closeOnConfirm: true
                                    });
                                    break;
                                case 'error': 
                                    $.each(result.errors, function(i, error) {});
                                    break;
                            }

                            $('#update-settings').find('[type="submit"]').html('Сохранить изменения').attr('disabled', false);
                        }
                    });
                });
            });
        </script>
    </body>
</html>