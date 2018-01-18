<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Оплата произвольной суммы</title>

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
            .card-header {
                border-bottom: 1px dotted #ababab;
                margin-bottom: 50px;
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
                        <div class="card-header"><h2>Оплата произвольной суммы</h2></div>
                        <div class="card-body card-padding">
                            <form id="create-invoice" class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">E-Mail</label>
                                    <div class="col-sm-4">
                                        <div class="fg-line">
                                            <input type="email" class="form-control input-lg" id="email" value="<?= $data['email'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="amount" class="col-sm-2 control-label">Сумма</label>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <div class="fg-line">
                                                <input type="text" class="form-control input-lg" id="amount">
                                            </div>
                                            <span class="input-group-addon last">руб.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn palette-Deep-Orange bg waves-effect btn-lg m-t-25">Перейти к оплате</button>
                                    </div>
                                </div>
                            </form>
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

                $('#create-invoice').submit(function(event) {
                    event.preventDefault();

                    var email = $('#email').val();
                    var amount = parseInt($('#amount').val());

                    if (!IsEmail(email)) {
                        swal({
                            title: 'Ошибка',
                            text: 'E-Mail введен некорректно',
                            type: 'error',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: true
                        });

                        return false;
                    }

                    if (!amount) {
                        swal({
                            title: 'Ошибка',
                            text: 'Сумма введена некорректно',
                            type: 'error',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: true
                        });

                        return false;
                    }

                    $body.addClass('loading');

                    $.post('//pult.glamurnenko.ru/users/api/add.json', {
                        email: email,
                        role: 'user',
                        state: 'active',
                        notification: 0,
                        utm_source: '<?= isset($_GET['utm_source']) ? $_GET['utm_source'] : '' ?>',
                        utm_medium: '<?= isset($_GET['utm_medium']) ? $_GET['utm_medium'] : '' ?>',
                        utm_campaign: '<?= isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : '' ?>',
                        utm_term: '<?= isset($_GET['utm_term']) ? $_GET['utm_term'] : '' ?>',
                        utm_content: '<?= isset($_GET['utm_content']) ? $_GET['utm_content'] : '' ?>'
                    }, function(out) {
                        switch (out.status) {
                            case 'success':
                                $.post('//pult.glamurnenko.ru/users/api/about/add.json', {
                                    user: out.user_id,
                                    item: 'source',
                                    value: 'free-invoice'
                                }, function() {
                                    AddInvoice(out.user_email, out.user_id, amount);
                                });
                                break;
                            case 'exist':
                                AddInvoice(out.user_email, out.user_id, amount);
                                break;
                            case 'error':
                                swal({
                                    title: 'Ошибка',
                                    text: 'В процессе оформления заказа произошла ошибка. Повторите попытку или обратитесь в службу поддержки',
                                    type: 'error',
                                    showCancelButton: false,
                                    confirmButtonText: 'OK',
                                    closeOnConfirm: true
                                });
                                
                                $body.removeClass('loading');
                                break;
                        }
                    });
                });
            });
            
            function IsEmail(email) {
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                return regex.test(email);
            }
            
            function AddInvoice(user_email, user_id, amount) {
                $.post('//pult.glamurnenko.ru/billing/invoices/api/add.json', {
                    users: user_email,
                    products: [{
                        id: 53246,
                        amount: amount
                    }],
                    state: 'new',
                    comment: ''
                }, function(out) {
                    document.location.href = '//pult.glamurnenko.ru/billing/payments/make/' + out.invoices[user_id].id_hash;
                });
            }
        </script>
    </body>
</html>
