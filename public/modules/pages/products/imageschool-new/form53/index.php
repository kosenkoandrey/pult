<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta name="ql-template-name" content="Backgroundr Centered">
<meta name="ql-template-published" content="true">
<meta name="ql-template-features" content="optin, colors">
<meta name="ql-template-colors" content="blurd">
<link rel="stylesheet" href="<?= Shell::$app->conf['protocol'] ?>://<?= Shell::$app->conf['codename'] . Shell::$app->conf['domain'] . Shell::$app->conf['path'] ?>public/WebApp/resources/views/<?= $CVersion->id ?>/langs/<?= $CLocal->id ?>/types/extensions/EBilling/products/pages/imageschool-new/sale/form53/style_form.css">
<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,400italic,600italic,700italic" rel="stylesheet" type="text/css">
<title>Набор в новый поток</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script> 
      jQuery(document).ready(function(){
        new KOLResponse();
        new KOLValidation();
    });
    </script>
<script type="text/javascript">
DOMReady=function(A){var C=false;ready=function(){if(!C){A();C=true}};try{document.addEventListener("DOMContentLoaded",ready,false)}catch(B){timer=setInterval(function(){if(/loaded|complete/.test(document.readyState)){clearInterval(timer);ready()}},10)}window.onload=function(){ready()}};
new DOMReady(function(){var search=(/^\?/.test(window.location.search))?window.location.search.substr(1):window.location.search;var options=search.split('&');for(var i=0;i<options.length;i++){var pair=options[i].split('=');if(pair.length==2){
//var elements=document.getElementById(pair[0]);if(elements&&elements.length>0){for(var j=0;j<elements.length;j++){if(typeof elements[j]=='object'){elements[j].value=decodeURIComponent(pair[1]+'')}}}}}
var elements=document.getElementById(pair[0]);if(elements){if(typeof elements=='object'){elements.value=decodeURIComponent(pair[1]+'')}}}}
//document.getElementById('metka').value = pair[1];
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<?php
include '/home/admin/domains/glamurnenko.ru/public_html/pult-lib/pult.php';
$pult = new Pult();
	$token = json_decode($pult->call('crypt', 'decrypt', isset($_GET['t']) ? $_GET['t'] : ''), 1);
	$user_processes_id = $token["user_processes_id"];
//{"letter_id":27,"user_id":"406698","user_email":"b-masha@e1.ru","user_processes_id":3203172,"process_id":16}
	$user_date_tel = $pult->call(
	 'ref',
	 'get_user_data',
	 Array(
		 'fields' => Array(
			 'value'			 
		 ),
		 'conditions' => Array(
			 'user_id' => $token['user_id'],
			 'item' => 'tel'
		 )
	 )
	);
	
	$tel = end($user_date_tel);
	
	$user_date_name = $pult->call(
	 'ref',
	 'get_user_data',
	 Array(
		 'fields' => Array(
			 'value'			 
		 ),
		 'conditions' => Array(
			 'user_id' => $token['user_id'],
			 'item' => 'firstname'
		 )
	 )
	);
	
	$firstname = end($user_date_name);
	?>
<body>
  <div class="wrap">
    <div class="optin animated fadeInDown">
      <h1 ql-id="headline" ql-name="Headline" ql-editable="text">Оповестить о следующем наборе</h1>
      <div class="inner-wrap">
        <p ql-id="call_to_action" ql-name="Call To Action" ql-editable="text" style="font-size: 0.9em; text-align:center">Заполните форму и нажмите кнопку <br> &laquo;ОПОВЕСТИТЕ МЕНЯ&raquo;</p>
<form style="margin: 0; padding: 0;" name="SR_form" target="_parent" action="https://www.glamurnenko.ru/products/imageschool/form/application-53.php" method="post" onSubmit="return SR_submit(this)">
<input id="process_id" name="process_id" type="hidden" value="<?= $token['user_processes_id'] ?>"/>
<input id="label_id" name="label_id" type="hidden" value="preentry"/>
<input id="user_id" name="user_id" type="hidden" value="<?= $token['user_id'] ?>"/>
          <div ql-id="optin_email" class="group">
            <input type="text" value="<?=$token['user_email']?>" name="email" placeholder="E-mail..." id="field_email"><p class="optin-error"></p>
			<input type="text" name="name" id="firstname" placeholder="Ваше имя..." value="<?=$firstname['value']?>">
			<input type="text" name="telephone" id="tel" placeholder="Ваш телефон..." value="<?=$tel['value']?>">
                            <input id="return" name="return" type="hidden" value="https://www.glamurnenko.ru/products/imageschool/form/wait-list-notification.php"/>
          </div>
          <button ql-id="call_to_action_button" ql-name="Call To Action Button" ql-editable="button" type="submit" class="btn">ОПОВЕСТИТЕ МЕНЯ<br></button>
        </form>
        <p class="small" style=" text-align:center;"><i class="ss-icon"><img src="//www.glamurnenko.ru/garderob100/wp-content/themes/garderob100-theme/squeezes/video-squeeze-01/look.png" style="padding-right: 4px;"> </i> <span ql-id="footer" ql-editable="text">  Нажимая на кнопку, я даю согласие на обработку персональных данных, получение рекламной информации и соглашаюсь с условиями и <a href="//www.glamurnenko.ru/pers.html" target="_blank">политикой приватности</a>.</span></p>
      </div>
    </div>
  </div>
</body>
</html>
