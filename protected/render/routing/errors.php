<?
// Error code
switch ($data) {
    case 'route_not_found': 
        header('HTTP/1.0 404 Not Found');
        $info = ['Ошибка 404 - Страница не найдена']; 
        break;
    default: $info = ['Неизвестная ошибка']; break;
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Ошибка</title>
    <meta charset="UTF-8">
    <meta name="robots" content="none">
</head>	
<body>
    <h1><?= $info[0] ?></h1>
    <?= isset($info[1]) ? $info[1] : '' ?>
</body>
</html>
<?
exit;