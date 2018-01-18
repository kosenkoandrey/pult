<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $data['poll'] ?></title>

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
                    <?  APP::Render('core/widgets/template/header', 'include', [
                            $data['poll'] => 'polls/imagemaker/03/' . APP::Module('Routing')->get['token'],
                            'user_menu' => false
                        ]) ?>
                    <div class="card" style="margin-bottom:0; border-bottom: 1px dotted #ababab;">
                        <div class="card-header"><h2><?= $data['poll'] ?></h2></div>
                        <div class="card-body card-padding">
                            <form method="post" id="step<?= $data['step'] ?>">
                                <?
                                switch ($data['step']) {
                                    case 1:
                                        ?>
                                        <input type="hidden" name="step" value="1">
                                        <b>Почему вы не купили тренинг</b>
                                        <br><br>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[34]" value="58">
                                                <i class="input-helper"></i>
                                                у меня уже есть портфолио
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[34]" value="59">
                                                <i class="input-helper"></i>
                                                новая ведущая, я еще её не знаю
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[34]" value="60">
                                                <i class="input-helper"></i>
                                                я уже слушала ваш семинар про портфолио и мне достаточно
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[34]" value="61">
                                                <i class="input-helper"></i>
                                                цена высокая
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="answers[34]" value="62">
                                                <i class="input-helper"></i>
                                                ваш вариант
                                            </label>
                                        </div>
                                        <div id="step1_extra" style="display: none; margin-top: 20px;"></div>
                                        <?
                                        break;
                                    case 2:
                                        ?>
                                        <input type="hidden" name="step" value="2">
                                        На какой бы тренинг для стилистов-имиджмейкеров вы бы записались? (Примерное название)
                                        <br><br>
                                        <textarea class="form-control" name="answers[37]" placeholder="Напишите Ваш ответ"></textarea>
                                        <?
                                        break;
                                    case 3:
                                        ?>
                                        <input type="hidden" name="step" value="3">
                                        Какой бы вы хотели результат по завершению этого тренинга?
                                        <br><br>
                                        <textarea class="form-control" name="answers[38]" placeholder="Напишите Ваш ответ"></textarea>
                                        <?
                                        break;
                                    case 4:
                                        ?>
                                        <input type="hidden" name="step" value="4">
                                        Сколько бы этот тренинг стоил?
                                        <br><br>
                                        <textarea class="form-control" name="answers[39]" placeholder="Напишите Ваш ответ"></textarea>
                                        <?
                                        break;
                                    case 5:
                                        ?>
                                        <input type="hidden" name="step" value="5">
                                        <b>Уточните ваш возраст</b>
                                        <br><br>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[40]" value="63">
                                                <i class="input-helper"></i>
                                                < 20
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[40]" value="64">
                                                <i class="input-helper"></i>
                                                20-24
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[40]" value="65">
                                                <i class="input-helper"></i>
                                                25-29
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[40]" value="66">
                                                <i class="input-helper"></i>
                                                30-34
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[40]" value="67">
                                                <i class="input-helper"></i>
                                                35-39
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[40]" value="68">
                                                <i class="input-helper"></i>
                                                40-44
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="answers[40]" value="69">
                                                <i class="input-helper"></i>
                                                45-49
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="answers[40]" value="70">
                                                <i class="input-helper"></i>
                                                50-54
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="answers[40]" value="71">
                                                <i class="input-helper"></i>
                                                >55
                                            </label>
                                        </div>
                                        <?
                                        break;
                                }
                                ?>
                                <button type="submit" class="btn palette-Deep-Orange bg waves-effect btn-lg m-t-25">Продолжить</button>
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
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/autosize/dist/autosize.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/backstretch/jquery.backstretch.min.js"></script>
        
        <? APP::Render('core/widgets/js') ?>
        
        <script>
            $(document).ready(function() {
                $(document).on('click', 'input[type="radio"]', function() {
                    $('input[type="radio"]').removeClass('active');
                    $(this).addClass('active');
                });
                
                <?
                switch ($data['step']) {
                    case 1:
                        ?>
                        $(document).on('click', '[name="answers[34]"]', function() {
                            switch ($('.active[name="answers[34]"]').val()) {
                                case '61':
                                    $('#step1_extra').html('<div style=""><b>Какая цена вас устраивает?</b><br><input class="form-control" type="text" name="answers[35]" value=""></div>');
                                    break;
                                case '62':
                                    $('#step1_extra').html('<div style=""><b>Уточните причину</b><br><input class="form-control" type="text" name="answers[36]" value=""></div>');
                                    break;
                            }
                            
                            $('#step1_extra').show();
                        });
                        <?
                        break;
                    case 2:
                        ?>
                        autosize($('[name="answers[37]"]'));
                        <?
                        break;
                    case 3:
                        ?>
                        autosize($('[name="answers[28]"]'));
                        <?
                        break;
                    case 4:
                        ?>
                        autosize($('[name="answers[39]"]'));
                        <?
                        break;
                }
                ?>
                
                $('#step1').submit(function() {
                    var a34 = $('.active[name="answers[34]"]');
                    
                    if (a34.length === 0) { 
                        swal({
                            title: 'Выберите почему вы не купили тренинг',
                            type: 'error',
                            showConfirmButton: true,
                            allowOutsideClick: true
                        });
                        return false; 
                    } else {
                        switch(a34.val()) {
                            case '61':
                                if ($('[name="answers[35]"]').val() === '') { 
                                    swal({
                                        title: 'Напишите какая цена вас устраивает',
                                        type: 'error',
                                        showConfirmButton: true,
                                        allowOutsideClick: true
                                    });
                                    return false; 
                                }
                                break;
                            case '62':
                                if ($('[name="answers[36]"]').val() === '') { 
                                    swal({
                                        title: 'Уточните причину',
                                        type: 'error',
                                        showConfirmButton: true,
                                        allowOutsideClick: true
                                    });
                                    return false; 
                                }
                                break;
                        }
                    }

                    $(this).find('[type="submit"]').html('Подождите...').attr('disabled', true);
                });
                
                $('#step2').submit(function() {
                    if ($('[name="answers[37]"]').val() === '') { 
                        swal({
                            title: 'На какой бы тренинг для стилистов-имиджмейкеров вы бы записались? (Примерное название)',
                            type: 'error',
                            showConfirmButton: true,
                            allowOutsideClick: true
                        });
                        return false; 
                    }

                    $(this).find('[type="submit"]').html('Подождите...').attr('disabled', true);
                });
                
                $('#step3').submit(function() {
                    if ($('[name="answers[38]"]').val() === '') { 
                        swal({
                            title: 'Какой бы вы хотели результат по завершению этого тренинга?',
                            type: 'error',
                            showConfirmButton: true,
                            allowOutsideClick: true
                        });
                        return false; 
                    }

                    $(this).find('[type="submit"]').html('Подождите...').attr('disabled', true);
                });
                
                $('#step4').submit(function() {
                    if ($('[name="answers[39]"]').val() === '') { 
                        swal({
                            title: 'Сколько бы этот тренинг стоил?',
                            type: 'error',
                            showConfirmButton: true,
                            allowOutsideClick: true
                        });
                        return false; 
                    }

                    $(this).find('[type="submit"]').html('Подождите...').attr('disabled', true);
                });
                
                $('#step5').submit(function() {
                    if ($('.active[name="answers[40]"]').length === 0) { 
                        swal({
                            title: 'Уточните ваш возраст',
                            type: 'error',
                            showConfirmButton: true,
                            allowOutsideClick: true
                        });
                        return false; 
                    }

                    $(this).find('[type="submit"]').html('Подождите...').attr('disabled', true);
                });
            });
            
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