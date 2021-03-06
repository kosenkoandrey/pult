<?
$nav = [];

foreach ($data['path'] as $key => $value) {
    $nav[$key ? $value : 'Письма'] = 'admin/mail/letters/' . APP::Module('Crypt')->Encode($key);
}
?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Редактирование письма</title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        
        <link href="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/lib/codemirror.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/addon/display/fullscreen.css" rel="stylesheet">
        
        <? APP::Render('core/widgets/css') ?>
    </head>
    <body data-ma-header="teal">
        <? APP::Render('admin/widgets/header', 'include', $nav) ?>
        
        <section id="main">
            <? APP::Render('admin/widgets/sidebar') ?>

            <section id="content">
                <div class="container">
                    <div class="card">
                        <form id="edit-letter" class="form-horizontal" role="form">
                            <input type="hidden" name="id" value="<?= APP::Module('Routing')->get['letter_id_hash'] ?>">
                            
                            <div class="card-header">
                                <h2>Редактирование письма</h2>
                            </div>

                            <div class="card-body card-padding">
                                <div class="form-group">
                                    <label for="sender" class="col-sm-2 control-label">Отправитель</label>
                                    <div class="col-sm-5">
                                        <div class="fg-line">
                                            <select id="sender" name="sender" class="selectpicker">
                                                <? foreach ($data['senders'] as $value) { ?><option value="<?= $value['id'] ?>"><?= $value['name'] ?> &lt;<?= $value['email'] ?>&gt;</option><? } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subject" class="col-sm-2 control-label">Тема</label>
                                    <div class="col-sm-10">
                                        <div class="fg-line">
                                            <input type="text" class="form-control" name="subject" id="subject">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="html" class="col-sm-2 control-label">HTML-версия</label>
                                    <div class="col-sm-10">
                                        <div class="fg-line">
                                            <textarea name="html" id="html" class="form-control" placeholder="Write HTML version of the letter"><?= $data['letter']['html'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="plaintext" class="col-sm-2 control-label">Текстовая версия</label>
                                    <div class="col-sm-10">
                                        <div class="fg-line">
                                            <textarea name="plaintext" id="plaintext" class="form-control" placeholder="Write plaintext version of the letter"><?= $data['letter']['plaintext'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="transport" class="col-sm-2 control-label">Транспорт</label>
                                    <div class="col-sm-2">
                                        <div class="fg-line">
                                            <select id="transport" name="transport" class="selectpicker">
                                                <? foreach ($data['transport'] as $value) { ?><option value="<?= $value['id'] ?>"><?= $value['module'] ?> / <?= $value['method'] ?></option><? } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="priority" class="col-sm-2 control-label">Приоритет</label>
                                    <div class="col-sm-2">
                                        <select id="priority" name="priority" class="selectpicker">
                                            <option value="1">минимальный</option>
                                            <option value="50">средний</option>
                                            <option value="100">высокий</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-5">
                                        <button type="submit" class="btn palette-Teal bg waves-effect btn-lg">Сохранить изменения</button>
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
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/autosize/dist/autosize.min.js"></script>
        
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/lib/codemirror.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/addon/edit/matchbrackets.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/addon/display/fullscreen.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/mode/xml/xml.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/mode/javascript/javascript.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/mode/css/css.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/mode/clike/clike.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/mode/php/php.js"></script>

        <? APP::Render('core/widgets/js') ?>
        
        <script>
            $(document).ready(function() {
                $('#sender').val('<?= $data['letter']['sender'] ?>');
                $('#subject').val('<?= $data['letter']['subject'] ?>');
                $('#transport').val('<?= $data['letter']['transport'] ?>');
                $('#priority').val('<?= $data['letter']['priority'] ?>');

                autosize($('#html'));
                autosize($('#plaintext'));
                
                var html_version = CodeMirror.fromTextArea(document.getElementById('html'), {
                    lineNumbers: true,
                    mode: "application/x-httpd-php",
                    extraKeys: {
                        "F11": function(cm) {
                            cm.setOption("fullScreen", !cm.getOption("fullScreen"));
                        },
                        "Esc": function(cm) {
                            if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
                        }
                    }
                });
                var text_version = CodeMirror.fromTextArea(document.getElementById('plaintext'), {
                    lineNumbers: true,
                    mode: "application/x-httpd-php",
                    extraKeys: {
                        "F11": function(cm) {
                            cm.setOption("fullScreen", !cm.getOption("fullScreen"));
                        },
                        "Esc": function(cm) {
                            if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
                        }
                    }
                });
                
                $('#edit-letter').submit(function(event) {
                    event.preventDefault();

                    var sender = $(this).find('#sender');
                    var subject = $(this).find('#subject');
                    var html = $(this).find('#html');
                    var plaintext = $(this).find('#plaintext');
                    var transport = $(this).find('#transport');
                    var priority = $(this).find('#priority');
 
                    sender.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    html.closest('.form-group').removeClass('has-error has-feedback');
                    plaintext.closest('.form-group').removeClass('has-error has-feedback');
                    subject.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    transport.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    priority.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();

                    if (sender.val() === '') { sender.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-5').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (subject.val() === '') { subject.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-10').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (html.val() === '') { 
                        html.closest('.form-group').addClass('has-error has-feedback'); 
                        swal({
                            title: 'Ошибка',
                            text: 'HTML-версия письма пуста',
                            type: 'error',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        }); 
                        return false; 
                    }
                    if (plaintext.val() === '') { 
                        plaintext.closest('.form-group').addClass('has-error has-feedback'); 
                        swal({
                            title: 'Ошибка',
                            text: 'Plaintext-версия письма пуста',
                            type: 'error',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        }); 
                        return false; 
                    }
                    if (transport.val() === '') { transport.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-2').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (priority.val() === '') { priority.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-2').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }

                    $(this).find('[type="submit"]').html('Сохранение...').attr('disabled', true);

                    $.ajax({
                        type: 'post',
                        url: '<?= APP::Module('Routing')->root ?>admin/mail/api/letters/update/code.json',
                        data: $(this).serialize(),
                        success: function(result) {
                            switch(result.status) {
                                case 'success':
                                    swal({
                                        title: 'Готово',
                                        text: 'Письмо "' + subject.val() + '" успешно обновлено',
                                        type: 'success',
                                        showCancelButton: false,
                                        confirmButtonText: 'OK',
                                        closeOnConfirm: false
                                    }, function(){
                                        window.location.href = '<?= APP::Module('Routing')->root ?>admin/mail/letters/<?= APP::Module('Crypt')->Encode($data['group_sub_id']) ?>';
                                    });
                                    break;
                                case 'error': 
                                    $.each(result.errors, function(i, error) {
                                        switch(error) {}
                                    });
                                    break;
                            }

                            $('#edit-letter').find('[type="submit"]').html('Сохранить изменения').attr('disabled', false);
                        }
                    });
                  });
            });
        </script>
    </body>
</html>