<?php 

$sendto   = "kosenko-andrey@yandex.ru"; // почта, на которую будет приходить письмо
$username = APP::Module('Routing')->get['firstname'];   // сохраняем в переменную данные полученные из поля c именем
$usertel = APP::Module('Routing')->get['tel']; // сохраняем в переменную данные полученные из поля c телефонным номером
$usermail = APP::Module('Routing')->get['email']; // сохраняем в переменную данные полученные из поля c адресом электронной почты
$usersend = "icon_notification@glamurnenko.ru";
// Формирование заголовка письма
$subject  = "Икона стия - оповестить о скидках";
$headers  = "From: " . strip_tags($usersend) . "\r\n";
$headers .= "Reply-To: ". strip_tags($usermail) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=utf-8 \r\n";

// Формирование тела письма
$msg  = "<html><body style='font-family:Arial,sans-serif;'>";
$msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Икона стиля - оповестить о скидках</h2>\r\n";
$msg .= "<p><strong>От кого:</strong> ".$username."</p>\r\n";
$msg .= "<p><strong>Почта:</strong> ".$usermail."</p>\r\n";
$msg .= "<p><strong>Телефон:</strong> ".$usertel."</p>\r\n";
$msg .= "</body></html>";

// отправка сообщения
if(@mail($sendto, $subject, $msg, $headers)) {
	?>
        <!DOCTYPE html>
        <html lang="ru">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="ql-template-name" content="Default Thank You">
        <meta name="ql-template-features" content="colors">
        <meta name="ql-template-colors" content="athos,porthos,aramis">
        <meta name="ql-template-published" content="true">
        <link rel="stylesheet" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/notification/success.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
        <title>Икона Стиля: +100 очков к вашему образу</title>
        <meta name="ql-page-id" content="5112">
        <meta name="ql-account-id" content="1493">
        <meta name="ql-template-id" content="default_thank_you">
        <meta name="ql-template-color" content="aramis">
        <meta name="ql-primary-mode" content="true">
        </head>
        <body class=" color-aramis color-aramis">
                <div class="panel">
                        <div class="header">
                                <h1 ql-id="headline" ql-editable="text">Икона Стиля: +100 очков к вашему образу</h1>
                        </div>
                        <div class="inner-wrap">
                                <p>Вы записаны в список ожидания на тренинг &laquo;Икона Стиля: +100 очков к вашему образу&raquo;.</p>
                                <div class="body" ql-id="thank_you_message" ql-editable="body">
                                <p>Мы сообщим вам о новом наборе на курс. Следите за письмами, чтобы не пропустить!

        <br/>
        <br/>Екатерина Малярова,
        <br/>имиджмейкер 
        <br/>
        <br/><strong>P.S.</strong> Важно! Чтобы гарантированно получать письма от нас, <br/> занесите мою почту в адресную книгу. Вот как это сделать: 
        <br/><a href="//glamurnenko.ru/blog/address-book/" target="_blank">Как не пропустить наши письма (адресная книга)</a></p>

                                </div>
                        </div>
                </div>
                <div class="footer">
                        <p ql-id="footer" ql-editable="text"><img src="//www.glamurnenko.ru/garderob100/wp-content/themes/garderob100-theme/squeezes/video-squeeze-01/look.png" style="padding-right: 4px;"> Мы гарантируем 100% конфиденциальность введенных данных. <a href="//www.glamurnenko.ru/pers.html" target="_blank">Политика приватности</a></p>
                </div>
        </body>
        </html>
        <?
} else {
	echo "Ошибка заполнения, проверьте введенные данные";
}

?>