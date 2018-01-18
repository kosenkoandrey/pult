<style>
#nav-ctrl {
    margin: 15px 0;
} 

@media print {
    #nav-ctrl,
    #tips {
        display: none;
    }
}
</style>

<table width="100%" border="1" cellspacing="0" cellpadding="5" align="top" valign="MIDDLE" bordercolor="#000000">
<tr><td width="200" align=center valign=top>Извещение<br><br><br><br><br><br><br><br><br><br>Кассир</td>
<td width="400" valign="top" style="font-size: 9pt; font-family: Arial;">
<b>Получатель платежа:</b>&nbsp;ИП Косенко Андрей Владимирович, ИНН:781018734981, КПП:770401001, Москва, ЗАО ЮниКредит Банк, р/c:40802810000013218699, к/с:30101810300000000545, БИК:044525545
<br><br>
<b>Плательщик:</b> <?= APP::Module('Routing')->get['lastname'] ?> <?= APP::Module('Routing')->get['firstname'] ?> <?= APP::Module('Routing')->get['middlename'] ?><br>
Адрес: <?= APP::Module('Routing')->get['country'] ?>,
<?= APP::Module('Routing')->get['post-index'] ?>,
<?= APP::Module('Routing')->get['region'] ?>,
<?= APP::Module('Routing')->get['city'] ?>,
<?= APP::Module('Routing')->get['addr'] ?>
<br><br>
<table width=98% border="1" cellspacing=0 cellpadding=3 align=center style="font-size: 9pt; font-family: arial;" bordercolor="#000000">
<tr><td align=center>Назначение платежа</td>
<td align=center>Сумма</td></tr>
<tr>
<td>&nbsp;оплата товара по заказу <?= $data['id'] ?></td>
<td align=right><?= $data['amount'] ?>.00 руб.</td></tr></table><br>
<nobr>Подпись&nbsp;________________ "______" _____________ <?= date('Y') ?> г.</nobr>
</td></tr><tr>
<tr><td width="200" align=center valign=top>Извещение<br><br><br><br><br><br><br><br><br><br>Кассир</td>
<td width="400" valign="top" style="font-size: 9pt; font-family: Arial;">
<b>Получатель платежа:</b>&nbsp;ИП Косенко Андрей Владимирович, ИНН:781018734981, КПП:770401001, Москва, ЗАО ЮниКредит Банк, р/c:40802810000013218699, к/с:30101810300000000545, БИК:044525545
<br><br>
<b>Плательщик:</b> <?= APP::Module('Routing')->get['lastname'] ?> <?= APP::Module('Routing')->get['firstname'] ?> <?= APP::Module('Routing')->get['middlename'] ?><br>
Адрес: <?= APP::Module('Routing')->get['country'] ?>,
<?= APP::Module('Routing')->get['post-index'] ?>,
<?= APP::Module('Routing')->get['region'] ?>,
<?= APP::Module('Routing')->get['city'] ?>,
<?= APP::Module('Routing')->get['addr'] ?>
<br><br>
<table width=98% border="1" cellspacing=0 cellpadding=3 align=center style="font-size: 9pt; font-family: arial;" bordercolor="#000000">
<tr><td align=center>Назначение платежа</td>
<td align=center>Сумма</td></tr>
<tr>
<td>&nbsp;оплата товара по заказу <?= $data['id'] ?></td>
<td align=right><?= $data['amount'] ?>.00 руб.</td></tr></table><br>
<nobr>Подпись&nbsp;________________ "______" _____________ <?= date('Y') ?> г.</nobr>
</td></tr></td></tr></table>

<div id="nav-ctrl">
    <a href="#" onClick="javascript:window.print();">Распечатать</a>
</div>

<div id="tips" class="alert alert-warning">
    Если у Вас нет возможности распечатать квитанцию, просто перепишите реквизиты и заполните квитанцию от руки.
    Ни в коем случае не изменяйте и не сокращайте реквизиты и назначение платежа.
    <br><br>
    <ul>
        <li>Не изменяйте платежные реквизиты.</li>
        <li>Обязательно указывайте информацию о назначении платежа.</li>
        <li>Без точного указания назначения платежа Ваш платеж не будет зачислен и Вы не получите свой заказ.</li>
        <li>Требуйте от банковского служащего указывать назначение платежа без изменений и сокращений.</li>
    </ul>
</div>

<script>
var widget_id = '125500';
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; 
var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);
</script>