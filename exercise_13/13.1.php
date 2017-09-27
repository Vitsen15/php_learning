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
include 'BallPen.php';

$myPen = new BallPen();

$input = 'aslkjdhldfkjghflkdjghfsjdkhgjskldfhgjklfds';

echo $myPen->getRod() . '<br>';
$myPen->write($input);
echo $myPen->getRod() . '<br>';
$myPen->setRod(10);
echo $myPen->getRod();
?>
</body>
</html>