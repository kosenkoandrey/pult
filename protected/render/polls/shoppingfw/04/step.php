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
                            $data['poll'] => 'polls/shoppingfw/04/' . APP::Module('Routing')->get['token'],
                            'user_menu' => false
                        ]) ?>
                    <div class="card" style="margin-bottom:0; border-bottom: 1px dotted #ababab;">
                        <div class="card-header"><h2><?= $data['poll'] ?></h2></div>
                        <div class="card-body card-padding">
                            <div class="alert alert-warning" role="alert" style="margin-bottom:25px;">
                                Вы записывались на имидж-практику "Шоппинг осень-зима под контролем стилиста". Но так её и не купили. Ответьте, пожалуйста, на следующие вопросы. Это поможет мне сделать будущие материалы более интересными для вас.
                            </div>
                            <form method="post" id="step<?= $data['step'] ?>">
                                <?
                                switch ($data['step']) {
                                    case 1:
                                        ?>
                                        <input type="hidden" name="step" value="1">
                                        <b>Почему вы не купили имидж-практику</b>
                                        <br><br>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[25]" value="43">
                                                <i class="input-helper"></i>
                                                Просто пропустила. Очень хочу записаться.
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[25]" value="44">
                                                <i class="input-helper"></i>
                                                Цена высокая
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[25]" value="45">
                                                <i class="input-helper"></i>
                                                Остались вопросы по тренингу, не получила на них ответов
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="answers[25]" value="46">
                                                <i class="input-helper"></i>
                                                Ваш вариант
                                            </label>
                                        </div>
                                        <div id="step1_extra" style="display: none; margin-top: 20px;"></div>
                                        <?
                                        break;
                                    case 2:
                                        ?>
                                        <input type="hidden" name="step" value="2">
                                        <b>Вам понравилась викторина в письмах?</b>
                                        <br><br>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[29]" value="47">
                                                <i class="input-helper"></i>
                                                Я участвовала и очень понравилась.
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[29]" value="48">
                                                <i class="input-helper"></i>
                                                Я участвовала, но викторина не понравилась.
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[29]" value="49">
                                                <i class="input-helper"></i>
                                                Не участвовала, но было интересно наблюдать.
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="answers[29]" value="50">
                                                <i class="input-helper"></i>
                                                Не участвовала и было не интересно.
                                            </label>
                                        </div>
                                        <div id="step2_extra" style="display: none; margin-top: 20px;"></div>
                                        <?
                                        break;
                                    case 3:
                                        ?>
                                        <input type="hidden" name="step" value="3">
                                        <b>Какая тема из нижеперечисленных вам наиболее интересна?</b>
                                        <br><br>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[32]" value="51">
                                                <i class="input-helper"></i>
                                                базовый гардероб. 20 вещей и 200 комплектов с ними
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[32]" value="52">
                                                <i class="input-helper"></i>
                                                стильные комплекты в офис
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[32]" value="53">
                                                <i class="input-helper"></i>
                                                тренинг с основами имиджа и стиля (цветотип, пропорции фигуры, стили и т.п.)
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[32]" value="54">
                                                <i class="input-helper"></i>
                                                как выглядеть стройнее на 2 размера с помощью правильно подобранной одежды
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[32]" value="55">
                                                <i class="input-helper"></i>
                                                как самому стать имиджмейкером и начать получать за это деньги
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[32]" value="56">
                                                <i class="input-helper"></i>
                                                как имиджмейкеру зарабатывать больше
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="answers[32]" value="57">
                                                <i class="input-helper"></i>
                                                просто полезные статьи по стилю и имиджу
                                            </label>
                                        </div>
                                        <?
                                        break;
                                    case 4:
                                        ?>
                                        <input type="hidden" name="step" value="4">
                                        Если вы хотите пройти наши тренинги, но у вас не получилось это сделать по ряду причин (пропустили, высокая цена, не нашли ответа на ваш вопрос и т.д.), оставьте свой номер телефона и мы вас проконсультируем.
                                        <br><br>
                                        <textarea class="form-control" name="answers[33]" placeholder="Напишите Ваш телефон"></textarea>
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
                        $(document).on('click', '[name="answers[25]"]', function() {
                            switch ($('.active[name="answers[25]"]').val()) {
                                case '44':
                                    $('#step1_extra').html('<div style=""><b>Какая цена вас устраивает?</b><br><input class="form-control" type="text" name="answers[26]" value=""></div>');
                                    $('#step1_extra').show();
                                    break;
                                case '45':
                                    $('#step1_extra').html('<div style=""><b>Задайте ваши вопросы</b><br><input class="form-control" type="text" name="answers[27]" value=""></div>');
                                    $('#step1_extra').show();
                                    break;
                                case '46':
                                    $('#step1_extra').html('<div style=""><b>Уточните причину</b><br><input class="form-control" type="text" name="answers[28]" value=""></div>');
                                    $('#step1_extra').show();
                                    break;
                            }
                        });
                        <?
                        break;
                    case 2:
                        ?>
                        $(document).on('click', '[name="answers[29]"]', function() {
                            switch ($('.active[name="answers[29]"]').val()) {
                                case '47':
                                case '49':
                                    $('#step2_extra').html('<div style=""><b>Расскажите, пожалуйста, что именно понравилось и как можно сделать викторину лучше?</b><br><input class="form-control" type="text" name="answers[30]" value=""></div>');
                                    $('#step2_extra').show();
                                    break;
                                case '48':
                                case '50':
                                    $('#step2_extra').html('<div style=""><b>Расскажите, пожалуйста, что именно не понравилось и как можно сделать викторину лучше?</b><br><input class="form-control" type="text" name="answers[31]" value=""></div>');
                                    $('#step2_extra').show();
                                    break;
                            }
                        });
                        <?
                        break;
                    case 4:
                        ?>
                        autosize($('[name="answers[33]"]'));
                        <?
                        break;
                }
                ?>
                
                $('#step1').submit(function() {
                    var a25 = $('.active[name="answers[25]"]');
                    
                    if (a25.length === 0) { 
                        swal({
                            title: 'Выберите почему вы не купили имидж-практику',
                            type: 'error',
                            showConfirmButton: true,
                            allowOutsideClick: true
                        });
                        return false; 
                    } else {
                        switch(a25.val()) {
                            case '44':
                                if ($('[name="answers[26]"]').val() === '') { 
                                    swal({
                                        title: 'Напишите какая цена вас устраивает',
                                        type: 'error',
                                        showConfirmButton: true,
                                        allowOutsideClick: true
                                    });
                                    return false; 
                                }
                                break;
                            case '45':
                                if ($('[name="answers[27]"]').val() === '') { 
                                    swal({
                                        title: 'Задайте ваши вопросы',
                                        type: 'error',
                                        showConfirmButton: true,
                                        allowOutsideClick: true
                                    });
                                    return false; 
                                }
                                break;
                            case '46':
                                if ($('[name="answers[28]"]').val() === '') { 
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
                    var a29 = $('.active[name="answers[29]"]');
                    
                    if (a29.length === 0) { 
                        swal({
                            title: 'Вам понравилась викторина в письмах?',
                            type: 'error',
                            showConfirmButton: true,
                            allowOutsideClick: true
                        });
                        return false; 
                    } else {
                        switch(a29.val()) {
                            case '47':
                            case '49':
                                if ($('[name="answers[30]"]').val() === '') { 
                                    swal({
                                        title: 'Расскажите, пожалуйста, что именно понравилось и как можно сделать викторину лучше?',
                                        type: 'error',
                                        showConfirmButton: true,
                                        allowOutsideClick: true
                                    });
                                    return false; 
                                }
                                break;
                            case '48':
                            case '50':
                                if ($('[name="answers[31]"]').val() === '') { 
                                    swal({
                                        title: 'Расскажите, пожалуйста, что именно не понравилось и как можно сделать викторину лучше?',
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
                
                $('#step3').submit(function() {
                    if ($('.active[name="answers[32]"]').length === 0) { 
                        swal({
                            title: 'Какая тема из нижеперечисленных вам наиболее интересна?',
                            type: 'error',
                            showConfirmButton: true,
                            allowOutsideClick: true
                        });
                        return false; 
                    }

                    $(this).find('[type="submit"]').html('Подождите...').attr('disabled', true);
                });
                
                $('#step4').submit(function() {
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