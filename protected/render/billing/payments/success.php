<!DOCTYPE html>
    <!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
    <!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
    <!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <title>Оплата заказа <?= $data['invoice']['id'] ?></title>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Оплата заказа <?= $data['invoice']['id'] ?>">
        <meta name="robots" content="none">

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,300,500" rel="stylesheet" type="text/css">
	<link href="<?= APP::Module('Routing')->root ?>public/nifty/ui/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= APP::Module('Routing')->root ?>public/nifty/ui/css/nifty.min.css" rel="stylesheet">
	<link href="<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/animate-css/animate.min.css" rel="stylesheet">
	<link href="<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/switchery/switchery.min.css" rel="stylesheet">
	<link href="<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">

        <!--Page Load Progress Bar [ OPTIONAL ]-->
	<link href="<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/pace/pace.min.css" rel="stylesheet">
	<script src="<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/pace/pace.min.js"></script>

        <!-- OPTIONAL -->
        <style>
            .form-control {
                font-size: 14px !important;
                height: 34px !important;
            }
            textarea.form-control {
                height: auto !important;
            }

            #invoice-info, 
            #payment-wizard {
                font-size: 14px;
            }
            .wz-classic li > a {
                padding: 15px 0;
                text-transform: uppercase;
                font-weight: bold;
            }
            .wz-classic li>a .icon-wrap {
                margin-right: 5px;
            }
            .panel-body {
                padding: 25px 30px;
            }
            
            .method {
                text-align: center;
                height: 145px;
                padding: 5px;
                background: #FAFAFA;
                cursor: pointer;
                border: 1px solid #F0F0F0;
            }
            .method.v2 {
                padding: 10px 5px;
            }
            .method:hover {
                background: #EFEFEF;
            }
            .operator {
                display: none;
            }
            
            
            
            
            .strike {
                display: block;
                text-align: center;
                overflow: hidden;
                white-space: nowrap; 
            }

            .strike > span {
                position: relative;
                display: inline-block;
                text-transform: uppercase;
            }

            .strike > span:before,
            .strike > span:after {
                content: "";
                position: absolute;
                top: 50%;
                width: 9999px;
                height: 1px;
                background: rgba(0,0,0,0.1);
            }

            .strike > span:before {
                right: 100%;
                margin-right: 10px;
            }

            .strike > span:after {
                left: 100%;
                margin-left: 10px;
            }
        </style>
    </head>
    <body>
        <!-- Google Tag Manager -->
        <!--<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KZKJM6"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KZKJM6');</script>-->
        <!-- End Google Tag Manager -->

        <div class="container" id="page-content">
            <? APP::Render('billing/payments/include/nifty_header') ?>
        </div>

        <div id="payment-wizard">
            <ul class="wz-nav-off wz-icon-inline">
                <li class="col-xs-4 bg-gray-light">
                    <a data-toggle="tab" href="#payment-wizard-details">
                        <span class="icon-wrap icon-wrap-xs bg-light"><i class="fa fa-info"></i></span> Данные заказа
                    </a>
                </li>
                <li class="col-xs-4 bg-gray-light">
                    <a data-toggle="tab" href="#payment-wizard-method">
                        <span class="icon-wrap icon-wrap-xs bg-light"><i class="fa fa-money"></i></span> Выбор способа оплаты
                    </a>
                </li>
                <li class="col-xs-4 bg-gray-light active">
                    <a data-toggle="tab" href="#payment-wizard-finish">
                        <span class="icon-wrap icon-wrap-xs bg-light"><i class="fa fa-check"></i></span> Получение доступа
                    </a>
                </li>
            </ul>

            <div class="progress progress-sm progress-striped active mar-btm">
                <div class="progress-bar progress-bar-primary"></div>
            </div>

            <div id="invoice-info" class="panel-body">
                <div class="row mar-btm">
                    <div class="col-lg-2 text-right">
                        Номер заказа
                    </div>
                    <div class="col-lg-10">
                        <?= $data['invoice']['id'] ?>
                    </div>
                </div>
                <?
                if (count((array) $data['products'])) {
                    ?>
                    <div class="row mar-btm">
                        <div class="col-lg-2 text-right">
                            Продукты
                        </div>
                        <div class="col-lg-10">
                            <?
                            foreach (array_reverse($data['products']) as $product) {
                                ?>
                                <div class="row mar-btm">
                                    <div class="col-md-10">
                                        <?= $product['name'] ?>
                                        <hr class="mar-no">
                                    </div>
                                    <div class="col-md-2 bg-gray-light">
                                        <?= $product['amount'] ?> руб.
                                    </div>
                                </div>
                                <?
                            }
                            ?>
                        </div>
                    </div>
                    <?
                }
                ?>
                <div class="row">
                    <div class="col-lg-offset-2 col-lg-10">
                        <div class="row">
                            <div class="col-md-10 text-right text-bold">
                                Итого к оплате
                            </div>
                            <div class="col-md-2 text-bold bg-success">
                                <?= $data['invoice']['amount'] ?> руб.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mar-no">

            <div class="panel-body">
                <div class="tab-content">
                    <div id="payment-wizard-details" class="tab-pane"></div>
                    <div id="payment-wizard-method" class="tab-pane fade"></div>
                    <div id="payment-wizard-finish" class="tab-pane mar-btm active">
                        <div class="eq-box-md text-center box-vmiddle-wrap">
                            <div class="box-vmiddle pad-all">
                                <h3 class="text-thin">ОПЛАТА ВЫПОЛНЕНА</h3>
                                <span class="icon-wrap icon-wrap-lg icon-circle bg-success">
                                    <i class="fa fa-check fa-5x"></i>
                                </span>
                                <p>Мы получили оплату за ваш заказ. Вам был открыт доступ к продуктам.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mar-no">

        <div class="panel-body">
            <? APP::Render('billing/payments/include/nifty_footer') ?>
        </div>

        <script src="<?= APP::Module('Routing')->root ?>public/nifty/ui/js/jquery-2.1.1.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/nifty/ui/js/bootstrap.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/nifty/ui/js/nifty.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/switchery/switchery.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/backstretch/jquery.backstretch.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>

        <!-- OPTIONAL -->
        <script>
        $.backstretch([
            "<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/backstretch/bg/4.jpg",
            "<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/backstretch/bg/5.jpg"
            ], {
                fade: 1000,
                duration: 5000
        });

        $('#payment-wizard').bootstrapWizard({
            tabClass		: 'wz-classic',
            onTabClick: function(tab, navigation, index) {
                return false;
            },
            onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                var wdt = 100/$total;
                var lft = wdt*index;

                $('#payment-wizard').find('.progress-bar').css({width:$percent+'%'});
            }
	});

        var widget_id = '125500';
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id;
        var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);
        </script>

        <? //require_once '/home/admin/domains/glamurnenko.ru/public_html/pages/kods_full.php'; ?>
    </body>
</html>