<?
$return = $data['return'] ? $data['return'] : APP::Module('Routing')->root . 'users/profile';
?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Подтверждение пароля</title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        
        <? APP::Render('core/widgets/css') ?>
    </head>
    <body>
        <div class="login" data-lbg="teal">
            <div class="l-block toggled" id="l-lockscreen">
                <div class="lb-header palette-Teal bg">
                    <img src="<?= APP::$conf['location'][0] ?>://www.gravatar.com/avatar/<?= md5($data['email']) ?>?s=40&d=<?= urlencode(APP::Module('Routing')->root . APP::Module('Users')->settings['module_users_profile_picture']) ?>&t=<?= time() ?>" class="avatar-img">
                    Эта операция требует повторного ввода пароля
                </div>

                <div class="lb-body">
                    <form id="double-login">
                        <div class="form-group fg-float">
                            <div class="fg-line">
                                <input type="password" id="password" name="password" class="input-sm form-control fg-input">
                                <label class="fg-label">Пароль</label>
                            </div>
                        </div>

                        <button class="btn palette-Teal bg">Далее</button>
                    </form>
                </div>
            </div>
        </div>
        
        <? APP::Render('core/widgets/page_loader') ?>
        <? APP::Render('core/widgets/ie_warning') ?>

        <!-- Javascript Libraries -->
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        
        <? APP::Render('core/widgets/js') ?>
        
        <script>
            $(document).ready(function() {
                $('#double-login').submit(function(event) {
                    event.preventDefault();

                    var password = $(this).find('#password');
                    password.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    if (password.val() === '') { password.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Не введен</small>'); return false; }

                    $(this).find('[type="submit"]').attr('disabled', true);

                    $.ajax({
                        type: 'post',
                        url: '<?= APP::Module('Routing')->root ?>users/api/double-login.json',
                        data: $(this).serialize(),
                        success: function(result) {
                            switch (result.status) {
                                case 'error': 
                                    password.val('');
                                    swal('Ошибка', 'Неверный пароль', 'error');
                                    break;
                                case 'success': 
                                    window.location.href = '<?= $return ?>'; 
                                    break;
                            }

                            $('#double-login').find('[type="submit"]').attr('disabled', false);
                        }
                    });
                });
            });
        </script>
    </body>
</html>