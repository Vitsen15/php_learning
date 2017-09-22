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
include_once 'PleasureBoat.php';

$pleasureBoat = new PleasureBoat(100, 500, 5, 200);

$pleasureBoat->liftAnchor();
$pleasureBoat->startEngine();
$pleasureBoat::showPleasureBoatName();
$pleasureBoat->stopEngine();
$pleasureBoat->dropAnchor();
$pleasureBoat->peoplesAmount = 0;
$pleasureBoat::showEngineType();
?>
</body>
</html>