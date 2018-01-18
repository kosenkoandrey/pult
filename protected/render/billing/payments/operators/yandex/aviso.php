<?
$time = time();
$performedDatetime = new DateTime;

header('Access-Control-Allow-Origin: *');
header('Content-Type: text/xml');
header('Date: ' . gmdate('D, d M Y H:i:s', $time) . ' GMT');
header('Expires: ' . gmdate('D, d M Y H:i:s', $time) . ' GMT');

echo '<?xml version="1.0" encoding="' . APP::$conf['encoding'] . '"?>';

switch ($data['code']) {
    case '0':   echo '<paymentAvisoResponse performedDatetime="' . $performedDatetime->format(DateTime::ATOM) . '" code="0" invoiceId="' . $data['invoiceId'] . '" shopId="19572"/>'; break;
    case '1':   echo '<paymentAvisoResponse performedDatetime="' . $performedDatetime->format(DateTime::ATOM) . '" code="1" invoiceId="' . $data['invoiceId'] . '" shopId="19572" message="Ошибка авторизации" techMessage="Несовпадение значения параметра md5 с результатом расчета хэш-функции"/>'; break;
    case '200': echo '<paymentAvisoResponse performedDatetime="' . $performedDatetime->format(DateTime::ATOM) . '" code="200" invoiceId="' . $data['invoiceId'] . '" shopId="19572" message="Ошибка разбора запроса" techMessage="ИС Контрагента не в состоянии разобрать запрос"/>'; break;
}