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
<link rel="stylesheet" href="http://www.glamurnenko.ru/garderob100/training/form/style_form.css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,400italic,600italic,700italic" rel="stylesheet" type="text/css">
<title>Гардероб на 100%</title>
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
<script language="JavaScript">

function mes() 
{
	alert("Чтобы получить видеоуроки, заполните форму. Уроки будут приходить к вам на почту по одному уроку в день.");  
}

function SR_trim(f)
{
  return f.toString().replace(/^[ ]+/, '').replace(/[ ]+$/, '');
}

function SR_submit(f)
{
  f["field_email"].value = SR_trim(f["field_email"].value);
  f["field_name_first"].value = SR_trim(f["field_name_first"].value);
  if ((SR_focus = f["field_email"]) && f["field_email"].value.replace(/^[ ]+/, '').replace(/[ ]+$/, '').length < 1 || (SR_focus = f["field_name_first"]) && f["field_name_first"].value.replace(/^[ ]+/, '').replace(/[ ]+$/, '').length < 1) { alert("Укажите ваш e-mail"); SR_focus.focus(); return false; }
  if (!f["field_email"].value.match(/^[\+A-Za-z0-9][\+A-Za-z0-9\._-]*[\+A-Za-z0-9_]*@([A-Za-z0-9]+([A-Za-z0-9-]*[A-Za-z0-9]+)*\.)+[A-Za-z]+$/)) { alert("Некорректный синтаксис email-адреса!"); f["field_email"].focus(); return false; } 

//кол-во дней для проведения акции
//var day = 8;

//$.post("http://www.glamurnenko.ru/courses/5secrets/data/stat.php", {'email': f["field_email"].value, 'name': f["field_name_first"].value, 'day': day},
//function(data) {
//}); 
return true;
}
function oncen(){ 
	document.getElementById('field_email').placeholder='';
}
</script></head>
<body>
  <div class="wrap">
    <div class="optin animated fadeInDown">
      <h1 ql-id="headline" ql-name="Headline" ql-editable="text">Предварительный список…</h1>
      <div class="inner-wrap">
        <p ql-id="call_to_action" ql-name="Call To Action" ql-editable="text" style="font-size: 0.9em; text-align:center">Введите email в форму ниже и нажмите кнопку "Получить скидку!"</p>
<form style="margin: 0; padding: 0;" name="SR_form" target="_parent" action="http://smartresponder.ru/subscribe.html" method="post" onSubmit="return SR_submit(this)"><INPUT type="hidden" name="version" value="1"><INPUT type="hidden" name="tid" value="0"><INPUT type="hidden" name="uid" value="3360"><INPUT type="hidden" name="charset" value="windows-1251"><INPUT type="hidden" name="lang" value="ru"> <INPUT type="hidden" name="did[]" value="578085">
							<input id="source" name="field_v_STRING0_NORMAL" type="hidden" />
                            <input id="medium" name="field_v_STRING1_NORMAL" type="hidden" />
                            <input id="campaign" name="field_v_STRING2_NORMAL" type="hidden" />
                            <input id="contentid" name="field_v_STRING3_NORMAL" type="hidden" />
                            <input id="add1" name="field_v_STRING4_NORMAL" type="hidden" />
      <input name="field_name_first" type="hidden" value="Дорогой друг"/> 
          <div ql-id="optin_email" class="group">
            <input type="text" placeholder="email@mail.ru" name="field_email" id="field_email" onFocus="oncen();"><p class="optin-error"></p>
          </div>
          <button ql-id="call_to_action_button" ql-name="Call To Action Button" ql-editable="button" type="submit" class="btn">Получить скидку!<br></button>
        </form>
        <p class="small" style=" text-align:center;"><i class="ss-icon"><img src="http://www.glamurnenko.ru/garderob100/wp-content/themes/garderob100-theme/squeezes/video-squeeze-01/look.png" style="padding-right: 4px;"> </i> <span ql-id="footer" ql-editable="text">  Мы гарантируем 100% конфиденциальность введенных данных. <a href="http://www.glamurnenko.ru/pers.html" target="_blank">Политика приватности</a></span></p>
      </div>
    </div>
  </div>
</body>
</html>
