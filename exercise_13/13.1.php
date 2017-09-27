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

function compareObjects(&$o1, &$o2)
{
    if ($o1 === $o2) {
        return 'objects is equal';
    } else {
        return 'objects not equal';
    }
}
//========= 3 =============
$myPen = new BallPen();

$input = 'aslkjdhldfkjghflkdjghfsjdkhgjskldfhgjklfds';

echo $myPen->getRod() . '<br>';
$myPen->write($input);
echo $myPen->getRod() . '<br>';
$myPen->setRod(10);
echo $myPen->getRod() . '<br>';

//============ 4 ================
$notMyPen = clone $myPen;
//============= 5 ================
echo compareObjects($myPen, $notMyPen) . '<br>';

echo $notMyPen->getRod() . '<br>';
//=========== 6 ==================
$anotherPen = new BallPen();
//============ 7 ===========
echo compareObjects($myPen, $anotherPen)  . '<br>';
//========== 8 =============
$linkToPen = &$anotherPen;
$linkToPen->setRod(20);
//========== 9 ============
echo $linkToPen->getRod();
?>
</body>
</html>