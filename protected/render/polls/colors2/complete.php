<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $data ?></title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
        
        <? APP::Render('core/widgets/css') ?>
        <? APP::Render('core/widgets/template/css_glamurnenko') ?>
        
        <style>
            .card {
                border-radius: 0 !important;
            }
            #footer {
                color: #FFFFFF;
            }
            #footer a {
                color: #FFFFFF;
                text-decoration: underline;
            }
        </style>
    </head>
    <body data-ma-header="teal">
        <section id="main" class="center">
            <section id="content">
                <div class="container">
                    <? APP::Render('core/widgets/template/header', 'include', [
                        $data => 'polls/colors2/' . APP::Module('Routing')->get['token'],
                        'user_menu' => false
                    ]) ?>
                    <div class="card" style="margin-bottom:0;">
                        <div class="card-header"><h2><?= $data ?></h2></div>
                        <div class="card-body card-padding">
                            <b>Спасибо большое, что прошли опрос до конца!</b>
                            <br>
                            В ближайшее время я прочитаю ваш ответ и постараюсь помочь вам в будущих материалах. 
                            <br>
                            Следите за письмами. И небольшой бонус...
                            <br>
                            Видео с фотосессии для клиентки. 
                        </div>
                        <iframe width="100%" height="480" src="//www.youtube.com/embed/MptfOwAKXOc" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="card">
                        <div class="card-body card-padding">
                            <table border="0" cellpadding="0" cellspacing="0" id="author_block" style="border-collapse: collapse;"><tbody><tr><td width="120" height="120" valign="middle" style="border-collapse: collapse; font-family: Georgia,\'Times New Roman\',serif; font-size: 14px; font-weight: normal; line-height: 20px;padding:0px 0 0 0px"><img class="thumbnail" src="//www.glamurnenko.ru/images/letter/atF6mpEGhXI.jpg" alt="включите загрузку изображений" width="120" height="120"  style="margin: 0px; padding: 0px; border: 0px none; height: 120px; width:120px; line-height: 100%; outline: medium none; text-decoration: none; display: block;" border="0"></td><td style="border-collapse: collapse; font-family: Georgia,\'Times New Roman\',serif; font-size: 14px; font-weight: normal; line-height: 20px;" width="10"></td><td width="199" align="left" valign="middle" style="border-collapse: collapse; font-family: Georgia,\'Times New Roman\',serif; font-size: 14px; font-weight: normal; line-height: 22px;"><em id="author_signature">Будьте красивы, успешны и ни на кого не похожи!<br /> Екатерина Малярова<br /> имиджмейкер</em></td><td style="border-collapse: collapse; font-family: Georgia,\'Times New Roman\',serif; font-size: 14px; font-weight: normal; line-height: 22px;" width="1"></td><td style="border-collapse: collapse; font-family: Georgia,\'Times New Roman\',serif; font-size: 15px; font-weight: normal; line-height: 20px;" align="left" valign="middle" width="169"><img src="//www.glamurnenko.ru/images/letter/podpis.png" alt="включите загрузку изображений"  style="margin: 0px; padding: 0px 0px 0 0; border: 0px none; height: 115px; width:169px; line-height: 100%; outline: medium none; text-decoration: none; display: block;" border="0"></td><td style="border-collapse: collapse; font-family: Georgia,\'Times New Roman\',serif; font-size: 14px; font-weight: normal; line-height: 22px;" width="1"></td></tr></tbody></table>
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
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/backstretch/jquery.backstretch.min.js"></script>

        <? APP::Render('core/widgets/js') ?>
        
        <script>
            $.backstretch([
                "<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/backstretch/bg/5.jpg",
                "<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/backstretch/bg/4.jpg"
                ], {
                    fade: 1000,
                    duration: 3000
            });
        </script>
    </body>
</html>
