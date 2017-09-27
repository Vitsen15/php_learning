<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
//include_once 'PleasureCater.php';
//
//$cater =  new PleasureCater(1000);
//
//echo $cater->showPeopleAmount();


$srcDir = __DIR__ . '/';

require_once $srcDir . '../Autoloader/MapAutoloader.php';

$autoloader = new MapAutoloader();
// Пашел нахуй, Сенсей.
// регистрируем наш автозагрузчик
spl_autoload_register(array($autoloader, 'autoload'));

$autoloader->registerClass('PleasureCater', $srcDir . 'PleasureCater.php');

$cater =  new PleasureCater(1000);

echo $cater->showPeopleAmount();

?>
</body>
</html>