<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Возобновление подписки</title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
        
        <? APP::Render('core/widgets/css') ?>
        <? APP::Render('core/widgets/template/css_glamurnenko') ?>
    </head>
    <body data-ma-header="teal">
        <section id="main" class="center">
            <section id="content">
                <div class="container">
                    <? APP::Render('core/widgets/template/header', 'include', [
                        'Возобновление подписки' => 'users/restore/' . APP::Module('Routing')->get['user_email_hash']
                    ]) ?>
                    <div class="card" style="margin-bottom: 1px;">
                    <? if($data) { ?>
                        <div class="card-header"><h2>Вы успешно возобновили подписку на рассылки</h2></div>
                    <? }else{ ?>
                        <div class="card-header"><h2>Неверная ссылка на восстановление подписки</h2></div>
                    <? } ?>
                    </div>
                </div>
            </section>
            <? APP::Render('core/widgets/template/footer') ?>
        </section>

        <? APP::Render('core/widgets/page_loader') ?>
        <? APP::Render('core/widgets/ie_warning') ?>

        <!-- Javascript Libraries -->
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/input-mask/input-mask.min.js"></script>

        <? APP::Render('core/widgets/js') ?>
    </body>
</html>
