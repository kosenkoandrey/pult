<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Предпросмотр писем</title>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
	<style>
        	body {
                    margin: 0;
                    padding: 0;
                    overflow: hidden;
            	}
		.frame {
                    border: 0;
                    padding: 0;
                    margin: 0;
		}
		#nav {
                    width: 100%;
                    height: 50px;
                    float: left;
		}
		#view {
                    float: left;
                    padding: 0;
                    margin: 0;
		}
		#code {
                    display: none;
                    float: right;
                    padding: 0;
                    margin: 0;
		}
                #view-mode {
                    position: absolute;
                    height: 40px;
                    left: 0;
                    background: rgb(0, 151, 138);
                }
                #view-mode a {
                    padding: 11px;
                    color: #ffffff;
                    text-decoration: none;
                    display: inline-block;
                }
                #view-mode a:hover {
                    background-color: #00a99b;
                }
        </style>
    </head>
    <body>
        <div id="view-mode">
            <a href="#" data-mode="mobile">Mobile</a>
            <a href="#" data-mode="tablet">Tablet</a>
            <a href="#" data-mode="default">Default</a>
        </div>
        
        <iframe src="<?= APP::Module('Routing')->root ?>admin/mail/letters/preview/nav/<?= APP::Module('Routing')->get['letter_id_hash'] ?>" id="nav" class="frame" frameborder="0"></iframe>
        <iframe src="<?= APP::Module('Routing')->root ?>admin/mail/letters/preview/view/<?= APP::Module('Routing')->get['letter_id_hash'] ?>" id="view" class="frame" frameborder="0"></iframe>
        <iframe src="<?= APP::Module('Routing')->root ?>admin/mail/letters/preview/code/<?= APP::Module('Routing')->get['letter_id_hash'] ?>" id="code" class="frame" frameborder="0"></iframe>

	<script>
            $(document).ready(function() {
                $('#view').on('load', function() {
                    $('#nav').contents().find('#view_status').empty();
                });
                
                $('#code').on('load', function() {
                    $('#nav').contents().find('#code_status').empty();
                });
                
                ResizeFrames();

                $(window).resize(function() {
                    ResizeFrames();
                });
            });
            
            $(document).on('click', '#view-mode a',function() {
                switch($(this).data('mode')) {
                    case 'mobile': 
                        $('#view').css({width: '340px'});
                        break;
                    case 'tablet': 
                        $('#view').css({width: '520px'});
                        break;
                    case 'default': 
                        $('#view').css({width: $(window).width() + 'px'});
                        break;
                }
            }); 
            
            function ResizeFrames() {
                var dh = $(document).height();
                var dw = $(document).width();

                if ($('#code').is(":visible")) {
                    $('#view').css({
                        width: dw / 2 + 'px',
                        height: dh - $('#nav').height() + 'px'
                    });

                    $('#code').css({
                        width: dw / 2 + 'px',
                        height: dh - $('#nav').height() + 'px'
                    });
                } else {
                    $('#view').css({
                        width: dw + 'px',
                        height: dh - $('#nav').height() + 'px'
                    });

                    $('#code').css({
                        width: dw / 2 + 'px',
                        height: dh - $('#nav').height() + 'px'
                    });
                }
                
                $('#view-mode').css({
                    top: (dh - 40)  + 'px'
                });
            }
	</script>
    </body>
</html>