<?
/**
 * Возвращает сумму прописью
 */
function num2str($num) {
    $nul='ноль';
    $ten=array(
        array('','один','два','три','четыре','пять','шесть','семь', 'восемь','девять'),
        array('','одна','две','три','четыре','пять','шесть','семь', 'восемь','девять'),
    );
    $a20=array('десять','одиннадцать','двенадцать','тринадцать','четырнадцать' ,'пятнадцать','шестнадцать','семнадцать','восемнадцать','девятнадцать');
    $tens=array(2=>'двадцать','тридцать','сорок','пятьдесят','шестьдесят','семьдесят' ,'восемьдесят','девяносто');
    $hundred=array('','сто','двести','триста','четыреста','пятьсот','шестьсот', 'семьсот','восемьсот','девятьсот');
    $unit=array( // Units
        array('копейка' ,'копейки' ,'копеек',	 1),
        array('рубль'   ,'рубля'   ,'рублей'    ,0),
        array('тысяча'  ,'тысячи'  ,'тысяч'     ,1),
        array('миллион' ,'миллиона','миллионов' ,0),
        array('миллиард','милиарда','миллиардов',0),
    );
    //
    list($rub,$kop) = explode('.',sprintf("%015.2f", floatval($num)));
    $out = array();
    if (intval($rub)>0) {
        foreach(str_split($rub,3) as $uk=>$v) { // by 3 symbols
            if (!intval($v)) continue;
            $uk = sizeof($unit)-$uk-1; // unit key
            $gender = $unit[$uk][3];
            list($i1,$i2,$i3) = array_map('intval',str_split($v,1));
            // mega-logic
            $out[] = $hundred[$i1]; # 1xx-9xx
            if ($i2>1) $out[]= $tens[$i2].' '.$ten[$gender][$i3]; # 20-99
            else $out[]= $i2>0 ? $a20[$i3] : $ten[$gender][$i3]; # 10-19 | 1-9
            // units without rub & kop
            if ($uk>1) $out[]= morph($v,$unit[$uk][0],$unit[$uk][1],$unit[$uk][2]);
        } //foreach
    }
    else $out[] = $nul;
    $out[] = morph(intval($rub), $unit[1][0],$unit[1][1],$unit[1][2]); // rub
    $out[] = $kop.' '.morph($kop,$unit[0][0],$unit[0][1],$unit[0][2]); // kop
    return trim(preg_replace('/ {2,}/', ' ', join(' ',$out)));
}
/**
 * Склоняем словоформу
 */
function morph($n, $f1, $f2, $f5) {
    $n = abs(intval($n)) % 100;
    if ($n>10 && $n<20) return $f5;
    $n = $n % 10;
    if ($n>1 && $n<5) return $f2;
    if ($n==1) return $f1;
    return $f5;
}
?>
<style>
#nav-ctrl {
    margin: 50px 0;
    border-top: 1px solid #e3e3e3;
    padding-top: 50px;
} 

@media print {
    #nav-ctrl {
        display: none;
    }
}
</style>
    
<h1>Счет № <?= $data['id'] ?> от <?= date('d.m.Y') ?></h1>
<table width="100%" border="0" style="font-family: Arial; font-size: 10pt; border-style: solid; border-width: 1px; border-color: Black;">
<tr><td width="20%" align="left">Продавец</td><td><strong>ИП Косенко Андрей Владимирович <br>
347800, Каменск-Шахтинский, Горького 130
</strong></td></tr>
<tr><td align=left>ИНН</td><td><strong>781018734981</strong></td></tr>
<tr><td align=left>КПП</td><td><strong>770401001</strong></td></tr>
<tr><td align=left>Банк</td><td><strong>Закрытое акционерное общество "ЮниКредит Банк",
Российская Федерация, 119034, г.Москва, Пречистенская наб, д.9
</strong></td></tr>
<tr><td align=left>Р/с</td><td><strong>№ 40802810000013218699</strong></td></tr>
<tr><td align=left> </td><td><strong>Корр.счет № 30101810300000000545, БИК 044525545</strong></td></tr>
<tr><td align=left>Телефон</td><td><strong>+7(926)2482349</strong></td></tr>
</table>
<br><br>

<table width="100%" border="0" style="font-family: Arial; font-size: 15pt; font-weight: bold;">
<tr><td align="center">СЧЕТ № <?= $data['id'] ?> от <?= date('d.m.Y') ?></td></tr></table>
<br><br>

<table width="100%" border="0" style="font-family: Arial; font-size: 10pt;">
<tr><td width="20%" align="left">Плательщик</td><td><strong><?= APP::Module('Routing')->get['company'] ?></strong></td></tr>
<tr><td align=left>Реквизиты</td><td><div style="white-space: pre-wrap; font-weight: bold"><?= APP::Module('Routing')->get['bank-details'] ?></div></td></tr>
<tr><td align=left>Юр.адрес</td><td><div style="white-space: pre-wrap; font-weight: bold"><?= APP::Module('Routing')->get['addr1'] ?></div></td></tr>
<tr><td align=left>Фактический адрес</td><td><div style="white-space: pre-wrap; font-weight: bold"><?= APP::Module('Routing')->get['addr2'] ?></div></td></tr>
<tr><td align=left>Телефон</td><td><strong><?= APP::Module('Routing')->get['tel'] ?></strong></td></tr>
<tr><td align=left>Факс</td><td><strong><?= APP::Module('Routing')->get['fax'] ?></strong></td></tr>
</table>
<br>

<table width="100%" bgcolor=black border=0 cellpadding=5 cellspacing=1 style="font-family: Arial; font-size: 10pt; border-collapse: inherit !important; border-spacing: 1px !important; background-color: rgb(0, 0, 0) !important;">
<tr align="center" bgcolor="#FFFFFF">
<td width="55%"><strong>Наименование</strong></td>
<td width="15%"><strong>Кол-во</strong></td>
<td width="15%"><strong>Цена</strong></td>
<td width="15%"><strong>Сумма (Руб.)</strong></td>
</tr>


<tr bgcolor="White" style="text-align:right;vertical-align:bottom">
<td style="text-align:left">Информационные услуги</td>
<td><strong>1</strong></td>
<td><strong><?= $data['amount'] ?></strong></td>
<td><strong><?= $data['amount'] ?></strong></td>
</tr>


</table>
<br>

<table width="100%" border="0" style="font-family: Arial; font-size: 10pt; font-style: italic;">
<tr><td>Итого:</td><td align=right><?= $data['amount'] ?>.00</td></tr>
<tr><td></td><td align=right>без НДС</td></tr>
<tr><td colspan="2"> </td></tr>
<tr><td valign="top">Всего к оплате</td>
<td><?= num2str((int) $data['amount']) ?>,<br>
без НДС<br><br>
Счет действителен к оплате только по безналичному расчету.<br>Счет подлежит оплате в течение 5 банковских дней.</td></tr>
</table>
<br><br>

<table width="100%" border="0" style="font-family: Arial; font-size: 10pt;">
<tr valign="bottom"><td width="50%"><br><br><br><br><br>Выписал (предприниматель)</td><td>_____________________________ Косенко А.В.</td></tr>
<tr valign="bottom"><td width="50%"><br><br><br><br>Руководитель (предприниматель) </td><td>_____________________________ Косенко А.В.</td></tr>
</table>

<div id="nav-ctrl">
    <a href="#" onClick="javascript:window.print();" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Распечатать</a>
</div>

<script>
var widget_id = '125500';
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; 
var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);
</script>