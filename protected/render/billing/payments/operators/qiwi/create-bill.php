<?
$time = time();

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Date: ' . gmdate('D, d M Y H:i:s', $time) . ' GMT');
header('Expires: ' . gmdate('D, d M Y H:i:s', $time) . ' GMT');

echo json_encode($data);