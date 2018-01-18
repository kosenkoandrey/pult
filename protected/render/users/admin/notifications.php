<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Стандартные письма уведомлений</title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/modules/mail/letter-selector/style.css" rel="stylesheet">
        
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
                        <form id="update-notifications" class="form-horizontal" role="form">
                            <div class="card-header">
                                <h2>Стандартные письма уведомлений</h2>
                            </div>
                            <div class="card-body card-padding">
                                <div class="form-group">
                                    <label for="module_users_register_activation_letter" class="col-sm-2 control-label">Активация</label>
                                    <div class="col-sm-3">
                                        <div class="fg-line">
                                            <input type="hidden" class="form-control" name="module_users_register_activation_letter" id="module_users_register_activation_letter">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="module_users_register_letter" class="col-sm-2 control-label">Данные для входа</label>
                                    <div class="col-sm-3">
                                        <div class="fg-line">
                                            <input type="hidden" class="form-control" name="module_users_register_letter" id="module_users_register_letter">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="module_users_reset_password_letter" class="col-sm-2 control-label">Изменение пароля</label>
                                    <div class="col-sm-3">
                                        <div class="fg-line">
                                            <input type="hidden" class="form-control" name="module_users_reset_password_letter" id="module_users_reset_password_letter">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="module_users_change_password_letter" class="col-sm-2 control-label">Уведомление о изменении пароля</label>
                                    <div class="col-sm-3">
                                        <div class="fg-line">
                                            <input type="hidden" class="form-control" name="module_users_change_password_letter" id="module_users_change_password_letter">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="module_users_subscription_restore_letter" class="col-sm-2 control-label">Восстановление подписки</label>
                                    <div class="col-sm-3">
                                        <div class="fg-line">
                                            <input type="hidden" class="form-control" name="module_users_subscription_restore_letter" id="module_users_subscription_restore_letter">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-2">
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
        <script src="<?= APP::Module('Routing')->root ?>public/modules/mail/letter-selector/script.js"></script>
        
        <? APP::Render('core/widgets/js') ?>
        
        <script>
            $(document).ready(function() {
                $('#module_users_change_password_letter')
                .val('<?= APP::Module('Users')->settings['module_users_change_password_letter'] ?>')
                .MailingLetterSelector({
                    url: '<?= APP::Module('Routing')->root ?>'
                });
                
                $('#module_users_reset_password_letter')
                .val('<?= APP::Module('Users')->settings['module_users_reset_password_letter'] ?>')
                .MailingLetterSelector({
                    url: '<?= APP::Module('Routing')->root ?>'
                });
        
                $('#module_users_register_letter')
                .val('<?= APP::Module('Users')->settings['module_users_register_letter'] ?>')
                .MailingLetterSelector({
                    url: '<?= APP::Module('Routing')->root ?>'
                });
        
                $('#module_users_register_activation_letter')
                .val('<?= APP::Module('Users')->settings['module_users_register_activation_letter'] ?>')
                .MailingLetterSelector({
                    url: '<?= APP::Module('Routing')->root ?>'
                });
        
                $('#module_users_subscription_restore_letter')
                .val('<?= APP::Module('Users')->settings['module_users_subscription_restore_letter'] ?>')
                .MailingLetterSelector({
                    url: '<?= APP::Module('Routing')->root ?>'
                });

                $('#update-notifications').submit(function(event) {
                    event.preventDefault();

                    var module_users_change_password_letter = $(this).find('#module_users_change_password_letter');
                    var module_users_reset_password_letter = $(this).find('#module_users_reset_password_letter');
                    var module_users_register_letter = $(this).find('#module_users_register_letter');
                    var module_users_register_activation_letter = $(this).find('#module_users_register_activation_letter');
                    var module_users_subscription_restore_letter = $(this).find('#module_users_subscription_restore_letter');
                    
                    module_users_change_password_letter.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    module_users_reset_password_letter.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    module_users_register_letter.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    module_users_register_activation_letter.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    module_users_subscription_restore_letter.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    
                    if (module_users_change_password_letter.val() === '') { module_users_change_password_letter.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-2').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (module_users_reset_password_letter.val() === '') { module_users_reset_password_letter.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-2').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (module_users_register_letter.val() === '') { module_users_register_letter.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-2').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (module_users_register_activation_letter.val() === '') { module_users_register_activation_letter.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-2').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (module_users_subscription_restore_letter.val() === '') { module_users_subscription_restore_letter.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-2').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    
                    $(this).find('[type="submit"]').html('Подождите...').attr('disabled', true);

                    $.ajax({
                        type: 'post',
                        url: '<?= APP::Module('Routing')->root ?>admin/users/api/notifications/update.json',
                        data: $(this).serialize(),
                        success: function(result) {
                            switch(result.status) {
                                case 'success':
                                    swal({
                                        title: 'Готово',
                                        text: 'Настройки стандартных уведомлений были обновлены',
                                        type: 'success',
                                        showCancelButton: false,
                                        confirmButtonText: 'Ok',
                                        closeOnConfirm: true
                                    });
                                    break;
                                case 'error': 
                                    $.each(result.errors, function(i, error) {});
                                    break;
                            }

                            $('#update-notifications').find('[type="submit"]').html('Сохранить изменения').attr('disabled', false);
                        }
                    });
                  });
            });
        </script>
    </body>
</html>