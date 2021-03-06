<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Пользователи - Добавление пользователя</title>

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
            'Пользователи' => 'admin/users'
        ]);
        ?>
        <section id="main">
            <? APP::Render('admin/widgets/sidebar') ?>

            <section id="content">
                <div class="container">
                    <div class="card">
                        <form id="add-user" class="form-horizontal" role="form">
                            <div class="card-header">
                                <h2>Добавление пользователя</h2>
                            </div>
                            <div class="card-body card-padding">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">E-mail</label>
                                    <div class="col-sm-3">
                                        <div class="fg-line">
                                            <input type="email" class="form-control" name="email" id="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">Пароль</label>
                                    <div class="col-sm-3">
                                        <div class="fg-line">
                                            <input type="password" class="form-control" name="password" id="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="re-password" class="col-sm-2 control-label">Повтор пароля</label>
                                    <div class="col-sm-3">
                                        <div class="fg-line">
                                            <input type="password" class="form-control" name="re-password" id="re-password">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="role" class="col-sm-2 control-label">Роль</label>
                                    <div class="col-sm-3">
                                        <select id="role" name="role" class="selectpicker">
                                            <? foreach ($data['roles'] as $role) { ?><option value="<?= $role ?>"><?
                                            switch ($role) {
                                                case 'default': echo 'гость'; break;
                                                case 'new': echo 'неактивированный подписчик'; break;
                                                case 'user': echo 'активированный подписчик'; break;
                                                case 'admin': echo 'администратор'; break;
                                                case 'tech-admin': echo 'тех. администратор'; break;
                                                default: echo $role; break;
                                            } 
                                            ?></option><? } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="state" class="col-sm-2 control-label">Состояние</label>
                                    <div class="col-sm-3">
                                        <select id="state" name="state" class="selectpicker">
                                            <option value="inactive">неактивный</option>
                                            <option value="active">активный</option>
                                            <option value="pause">временно отписан</option>
                                            <option value="unsubscribe">отписан</option>
                                            <option value="blacklist">в черном списке</option>
                                            <option value="dropped">невозможно доставить почту</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="notification" class="col-sm-2 control-label">Уведомление</label>
                                    <div class="col-sm-3">
                                        <select id="notification" name="notification" class="selectpicker">
                                            <option value="0">без уведомления</option>
                                            <option value="<?= APP::Module('Users')->settings['module_users_register_activation_letter'] ?>">с ссылкой активации</option>
                                            <option value="<?= APP::Module('Users')->settings['module_users_register_letter'] ?>">без ссылки активации</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-5">
                                        <button type="submit" class="btn palette-Teal bg waves-effect btn-lg">Добавить</button>
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
                $('#add-user').submit(function(event) {
                    event.preventDefault();

                    var email = $(this).find('#email');
                    var password = $(this).find('#password');
                    var re_password = $(this).find('#re-password');
                    var role = $(this).find('#role');
                    var state = $(this).find('#state');
                    var notification = $(this).find('#notification');

                    email.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    password.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    re_password.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    role.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    state.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    notification.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();

                    if (email.val() === '') { email.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (password.val() !== re_password.val()) { re_password.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Passwords do not match</small>'); return false; }
                    if (role.val() === '') { role.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (state.val() === '') { state.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (notification.val() === '') { notification.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }

                    $(this).find('[type="submit"]').html('Добавление...').attr('disabled', true);

                    $.ajax({
                        type: 'post',
                        url: '<?= APP::Module('Routing')->root ?>users/api/add.json',
                        data: $(this).serialize(),
                        success: function(result) {
                            switch(result.status) {
                                case 'success':
                                    swal({
                                        title: 'Готово!',
                                        text: 'Пользователь "' + email.val() + '" был добавлен',
                                        type: 'success',
                                        showCancelButton: false,
                                        confirmButtonText: 'Ok',
                                        closeOnConfirm: false
                                    }, function(){
                                        window.location.href = '<?= APP::Module('Routing')->root ?>admin/users';
                                    });
                                    break;
                                case 'error': 
                                    $.each(result.errors, function(i, error) {
                                        switch(error) {
                                            case 2: email.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-3').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Уже зарегистрирован</small>'); break;
                                        }
                                    });
                                    break;
                            }

                            $('#add-user').find('[type="submit"]').html('Добавить').attr('disabled', false);
                        }
                    });
                  });
            });
        </script>
    </body>
  </html>