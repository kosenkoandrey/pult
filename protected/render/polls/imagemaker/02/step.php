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
                            $data['poll'] => 'polls/imagemaker/02/' . APP::Module('Routing')->get['token'],
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
                                        <div class="alert alert-warning" role="alert" style="margin-bottom:25px;">
                                            Вы интересовались видео-уроками по раскрутке имиджмейкера в интернете. Но так и не записались  на тренинг "1000 интернет-клиентов для имиджмейкера". Ответьте, пожалуйста, на следующие вопросы. Это поможет мне в будущем подготовить более качественные и полезные материалы, которые помогут именно вам.
                                        </div>
                                        <b>Почему вы не купили тренинг</b>
                                        <br><br>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[9]" value="16">
                                                <i class="input-helper"></i>
                                                цена высокая
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[9]" value="17">
                                                <i class="input-helper"></i>
                                                остались вопросы по тренингу, не получила на них ответов
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="answers[9]" value="18">
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
                                        Какую небольшую "победу" как стилист-имиджмейкер вы бы хотели одержать в ближайшем будущем?
                                        <br><br>
                                        <div class="alert alert-warning" role="alert" style="margin-bottom:50px;">
                                            Пожалуйста, не пишите, "много клиентов" - это неопределенная цель. 
                                            Пожалуйста, не пишите "100 клиентов" - это достаточно большая цель. 
                                            Напишите небольшой, но успешный по вашему мнению шаг или рубеж, к которому вы стремитесь.
                                        </div>
                                        <textarea class="form-control" name="answers[13]" placeholder="Напишите Ваш ответ"></textarea>
                                        <?
                                        break;
                                    case 3:
                                        ?>
                                        <input type="hidden" name="step" value="3">
                                        Какие ваши самые большие сомнения, переживания, негативные эмоции?
                                        <br><br>
                                        <div class="alert alert-warning" role="alert" style="margin-bottom:50px;">
                                            Поделитесь, пожалуйста. Это поможет мне лучше вас понять и помочь именно в преодолении их.
                                        </div>
                                        <textarea class="form-control" name="answers[14]" placeholder="Напишите Ваш ответ"></textarea>
                                        <?
                                        break;
                                    case 4:
                                        ?>
                                        <input type="hidden" name="step" value="4">
                                        <b>Уточните ваш возраст</b>
                                        <br><br>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[15]" value="19">
                                                <i class="input-helper"></i>
                                                < 20
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[15]" value="20">
                                                <i class="input-helper"></i>
                                                20-24
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[15]" value="21">
                                                <i class="input-helper"></i>
                                                25-29
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[15]" value="22">
                                                <i class="input-helper"></i>
                                                30-34
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[15]" value="23">
                                                <i class="input-helper"></i>
                                                35-39
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="answers[15]" value="24">
                                                <i class="input-helper"></i>
                                                40-44
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="answers[15]" value="25">
                                                <i class="input-helper"></i>
                                                45-49
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="answers[15]" value="26">
                                                <i class="input-helper"></i>
                                                50-54
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="answers[15]" value="27">
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
                        $(document).on('click', '[name="answers[9]"]', function() {
                            switch ($('.active[name="answers[9]"]').val()) {
                                case '16':
                                    $('#step1_extra').html('<div style=""><b>Какая цена вас устраивает?</b><br><input class="form-control" type="text" name="answers[10]" value=""></div>');
                                    break;
                                case '17':
                                    $('#step1_extra').html('<div style=""><b>Задайте ваши вопросы</b><br><input class="form-control" type="text" name="answers[11]" value=""></div>');
                                    break;
                                case '18':
                                    $('#step1_extra').html('<div style=""><b>Уточните причину</b><br><input class="form-control" type="text" name="answers[12]" value=""></div>');
                                    break;
                            }
                            
                            $('#step1_extra').show();
                        });
                        <?
                        break;
                    case 2:
                        ?>
                        autosize($('[name="answers[13]"]'));
                        <?
                        break;
                    case 3:
                        ?>
                        autosize($('[name="answers[14]"]'));
                        <?
                        break;
                }
                ?>
                
                $('#step1').submit(function() {
                    var a9 = $('.active[name="answers[9]"]');
                    
                    if (a9.length === 0) { 
                        swal({
                            title: 'Выберите почему вы не купили тренинг',
                            type: 'error',
                            showConfirmButton: true,
                            allowOutsideClick: true
                        });
                        return false; 
                    } else {
                        switch(a9.val()) {
                            case '2':
                                if ($('[name="answers[4]"]').val() === '') { 
                                    swal({
                                        title: 'Напишите какая цена вас устраивает',
                                        type: 'error',
                                        showConfirmButton: true,
                                        allowOutsideClick: true
                                    });
                                    return false; 
                                }
                                break;
                            case '3':
                                if ($('[name="answers[5]"]').val() === '') { 
                                    swal({
                                        title: 'Задайте ваши вопросы',
                                        type: 'error',
                                        showConfirmButton: true,
                                        allowOutsideClick: true
                                    });
                                    return false; 
                                }
                                break;
                            case '4':
                                if ($('[name="answers[6]"]').val() === '') { 
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
                    if ($('[name="answers[13]"]').val() === '') { 
                        swal({
                            title: 'Какую небольшую "победу" как стилист-имиджмейкер вы бы хотели одержать в ближайшем будущем?',
                            type: 'error',
                            showConfirmButton: true,
                            allowOutsideClick: true
                        });
                        return false; 
                    }

                    $(this).find('[type="submit"]').html('Подождите...').attr('disabled', true);
                });
                
                $('#step3').submit(function() {
                    if ($('[name="answers[14]"]').val() === '') { 
                        swal({
                            title: 'Какие ваши самые большие сомнения, переживания, негативные эмоции?',
                            type: 'error',
                            showConfirmButton: true,
                            allowOutsideClick: true
                        });
                        return false; 
                    }

                    $(this).find('[type="submit"]').html('Подождите...').attr('disabled', true);
                });
                
                $('#step4').submit(function() {
                    if ($('.active[name="answers[15]"]').length === 0) { 
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