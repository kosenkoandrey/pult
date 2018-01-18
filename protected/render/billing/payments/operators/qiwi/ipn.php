<?
$time = time();

header('Access-Control-Allow-Origin: *');
header('Content-Type: text/xml');
header('Date: ' . gmdate('D, d M Y H:i:s', $time) . ' GMT');
header('Expires: ' . gmdate('D, d M Y H:i:s', $time) . ' GMT');

echo '<?xml version="1.0" encoding="' . APP::$conf['encoding'] . '"?>';
?>
?>
<result>
    <result_code><?= $data['code'] ?></result_code>
</result>