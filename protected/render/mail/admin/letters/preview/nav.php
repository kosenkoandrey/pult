<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
	<style>
            body {
                margin: 0;
                padding: 0;
                background: rgb(0, 151, 138);
            }
            #subject {
                color: #ffffff;
                font-weight: bold;
                margin: 14px;
            }
            #links {
                float: right;
                font-weight: bold;
            }
            #links a {
                padding: 19px 10px;
                color: #ffffff;
                text-decoration: none;
            }
            #links a:hover {
                background-color: #00a99b;
            }
            .status {
                float: right;
                color: #FFFFFF;
                margin-right: 35px;
            }
        </style>
    </head>
    <body>  
        <div id="links">
            <a target="_blank" href="<?= APP::Module('Routing')->root ?>admin/mail/letters/<?= APP::Module('Crypt')->Encode($data['group_id']) ?>">Открыть папку</a>
            <a target="_blank" href="<?= APP::Module('Routing')->root ?>admin/mail/letters/0/edit/<?= is_numeric(APP::Module('Routing')->get['letter_id_hash']) ? APP::Module('Crypt')->Encode(APP::Module('Routing')->get['letter_id_hash']) : APP::Module('Routing')->get['letter_id_hash'] ?>">Открыть редактор</a>  
            <a id="toggle_editor" href="#">Показать быстрый редактор</a> 
        </div>
        
        <div class="status" id="view_status">Загрузка письма...</div>
        <div class="status" id="code_status">Загрузка редактора...</div>
        
        <div id="subject">
            <?= $data['subject'] ?>
        </div>
        
        <script>
            $(document).ready(function() {
                $(document).on('click', '#toggle_editor',function() {
                    var code = $('#code', window.parent.document);
                    var view_mode = $('#view-mode', window.parent.document);
                    
                    var n_dw = $(parent.window).width();
                    
                    if (code.is(":visible")) {
                        $(this).html('Показать быстрый редактор');

                        $('#view', window.parent.document).css({
                            width: n_dw + 'px'
                        });
                        
                        $('#code').css({
                            width: n_dw / 2 + 'px'
                        });
                        
                        code.hide();
                        view_mode.show(300);
                    } else {
                        $(this).html('Скрыть быстрый редактор');

                        $('#view', window.parent.document).css({
                            width: n_dw / 2 + 'px'
                        });
                        
                        $('#code').css({
                            width: n_dw / 2 + 'px'
                        });

                        code.show();
                        view_mode.hide(300);
                    }
                }); 
            });
	</script>
    </body>
</html>