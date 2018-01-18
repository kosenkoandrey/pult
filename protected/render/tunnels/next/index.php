<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Выберите интересующую вас тему</title>

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
            #main_card {
                margin-bottom:0; 
                border-bottom: 1px dotted #ababab;
            }
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
            
            .modal-loader {
                display:    none;
                position:   fixed;
                z-index:    1000;
                top:        0;
                left:       0;
                height:     100%;
                width:      100%;
                background: rgba( 255, 255, 255, .8 ) 
                            url('https://i.stack.imgur.com/FhHRx.gif') 
                            50% 50% 
                            no-repeat;
            }
            body.loading {
                overflow: hidden;   
            }
            body.loading .modal-loader {
                display: block;
            }
        </style>
    </head>
    <body data-ma-header="teal">
        <section id="main" class="center">
            <section id="content">
                <div class="container">
                    <? 
                    APP::Render(
                        'core/widgets/template/header', 
                        'include', 
                        [
                            'user_menu' => false
                        ]
                    );
                    ?>
                    <div class="card" id="main_card">
                        <div class="card-header"><h2>Выберите интересующую вас тему</h2></div>
                        <div class="card-body card-padding">
                            <? APP::Render('tunnels/next/' . $data['page'], 'include', $data) ?>
                        </div>
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
        
        <div class="modal-loader"></div>

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
        <script src="<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/backstretch/jquery.backstretch.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/autosize/dist/autosize.min.js"></script>

        <? APP::Render('core/widgets/js') ?>
        
        <script>
            $(document).ready(function() {
                $body = $('body');
                
                $.backstretch([
                    "<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/backstretch/bg/5.jpg",
                    "<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/backstretch/bg/4.jpg"
                    ], {
                        fade: 1000,
                        duration: 3000
                });

                <?
                if (($data['page'] == 'subscribe') || ($data['page'] == 'free')) {
                    ?>
                    autosize($('[name="free-text"]'));
                    
                    $(document).on('click', 'input[name="tunnel"]', function() {
                        var tunnel = parseInt($(this).val());

                        if (tunnel) {
                            $('#free-text').hide();

                            var subscribe_data = tunnels[tunnel].settings;

                            subscribe_data.email = '<?= $data['user_email'] ?>';
                            subscribe_data.source = 'next';
                            subscribe_data.auto_save_about = true;

                            $body.addClass('loading');

                            $.ajax({
                                type: 'post',
                                url: '<?= APP::Module('Routing')->root ?>tunnels/api/subscribe.json',
                                data: subscribe_data,
                                success: function(result) {
                                    console.log(result);

                                    switch(tunnel) {
                                        case 20:
                                            $('#main_card .card-header h2').html('Спасибо за ваш выбор. В самое ближайшее время мы подготовим материалы и вышлем вам.');
                                            $('#main_card .card-body').html('Обратите внимание: письмо будет от моего имени (Екатерина Малярова), но подробности по макияжу будет рассказывать вам мой личный визажист, тренер по макияжу для крупных косметических компаний, Наталья Бардина.<br><br>Я очень её рекомендую и считаю, что она супер-профессионал.<br><br>Первое письмо пришлю уже завтра!');
                                            break;
                                        default:
                                            $('#main_card .card-header h2').html('Спасибо за ваш выбор!');
                                            $('#main_card .card-body').html('Мы с помощниками подготовим материалы и отправим вам первое письмо в пределах 24 часов. Пожалуйста, следите за письмами!');
                                            break;
                                    }

                                    $body.removeClass('loading');
                                }
                            });
                        } else {
                            $('#free-text').show();
                        }
                    });

                    $('#free-text').submit(function(event) {
                        event.preventDefault();

                        var info_text = $('textarea[name="free-text"]').val();

                        if (!info_text) {
                            swal({
                                title: 'Ошибка',
                                text: 'Напишите какая тема по имиджу и стилю для вас наиболее интересная',
                                type: 'error',
                                showCancelButton: false,
                                confirmButtonText: 'OK',
                                closeOnConfirm: true
                            });

                            return false;
                        }

                        $body.addClass('loading');

                        $.ajax({
                            type: 'post',
                            url: '<?= APP::Module('Routing')->root ?>tunnels/api/next.json',
                            data: {
                                user_id: <?= $data['user_id'] ?>,
                                info: info_text
                            },
                            success: function(result) {
                                $('#main_card .card-header h2').html('Спасибо! Я получила ваше сообщение!');
                                $('#main_card .card-body').html('В ближайшее время я прочитаю его и постараюсь сделать будущие материалы максимально полезными для вас!');

                                $body.removeClass('loading');
                            }
                        });
                    });
                    <?
                }
                ?>
            });
        </script>
    </body>
</html>
