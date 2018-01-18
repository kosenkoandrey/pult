<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Подписка на туннель</title>

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
                        'user_menu' => false
                    ]) ?>
                    <div class="card" style="margin-bottom: 1px;">
                        <div class="card-header">
                            <h2>
                                <?
                                switch ($data['status']) {
                                    case 'success': ?>Вы успешно подписаны<? break;
                                    case 'resume': ?>Подписка на туннель была успешно возобновлена<? break;
                                    case 'exist': ?>Уже проходили туннель<? break;
                                    case 'queue_success': ?>Подписка поставлена в очередь<? break;
                                    case 'queue_exist': ?>Туннель уже есть в очереди на подписку<? break;
                                    case 'block': ?>Вы находитесь в черном списке<? break;
                                    case 'activation': ?>Отправлено письмо активации<? break;
                                    case 'error':
                                        switch ($data['code']) {
                                            case 101: ?>Неверный E-Mail<? break;
                                            case 201: ?>Не найден активный целевой туннель<? break;
                                            case 202: ?>Не найден блок целевого туннеля<? break;
                                            case 203: ?>Превышен максимальный таймаут подписки на целевой туннель<? break;
                                            case 301: ?>Не найдено письмо активации<? break;
                                            case 302: ?>Не передан параметр URL для редиректа после активации<? break;
                                            case 401: ?>Не найден активный целевой туннель индоктринации<? break;
                                            case 402: ?>Не найден блок целевого туннеля индоктринации<? break;
                                            case 403: ?>Превышен максимальный таймаут подписки на туннель индоктринации<? break;
                                            case 501: ?>Превышен максимальный таймаут подписки на целевой туннель из очереди<? break;
                                            case 001: ?>Активный юзер получает статический туннель, целевой туннель на паузе<? break; // ?
                                        }
                                        break;
                                }
                                ?>
                            </h2>
                        </div>
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

        <? APP::Render('core/widgets/js') ?>
    </body>
</html>