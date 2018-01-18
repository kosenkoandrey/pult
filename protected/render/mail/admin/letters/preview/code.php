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

        <link href="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/lib/codemirror.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/addon/display/fullscreen.css" rel="stylesheet">
        
        <? APP::Render('core/widgets/css') ?>
    </head>
    <body data-ma-header="teal">
        <textarea name="html" id="html" class="form-control" placeholder="Write HTML version of the letter"><?= $data ?></textarea>

        <? APP::Render('core/widgets/page_loader') ?>
        <? APP::Render('core/widgets/ie_warning') ?>

        <!-- Javascript Libraries -->
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/Waves/dist/waves.min.js"></script> 
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
                autosize($('#html'));
                
                var html_version = CodeMirror.fromTextArea(document.getElementById('html'), {
                    lineNumbers: true,
                    lineWrapping: true,
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
                
                html_version.setSize('100%', '100%');
                
                html_version.on('change',function(cm){
                    $('#nav', window.parent.document).contents().find('#code_status').html('Сохранение кода...');
                
                    $.ajax({
                        type: 'post',
                        url: '<?= APP::Module('Routing')->root ?>admin/mail/letters/preview/update/<?= APP::Module('Routing')->get['letter_id_hash'] ?>',
                        data: {
                            html: cm.getValue()
                        },
                        success: function() {
                            $('#nav', window.parent.document).contents().find('#code_status').empty();
                            $('#nav', window.parent.document).contents().find('#view_status').html('Обновление письма...');
                            parent.document.getElementById('view').contentWindow.location.reload(true);
                        }
                    });
                });
            });
        </script>
    </body>
</html>