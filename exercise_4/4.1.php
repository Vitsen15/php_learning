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
//======== 1 ==========
date_default_timezone_set("Europe/Kiev");//for servers where non set timezone in php.ini

timeShiftMinutes(5);

function timeShiftMinutes(int $shift)
{
    $timeStampShift = $shift * 60;

    echo "$shift минут(у) назад было: " . date("H:i", time() - $timeStampShift) . "<br>";
    echo "Сейчас: " . date("H:i", time()) . "<br>";
    echo "Через $shift минут(у) будет: " . date("H:i", time() + $timeStampShift) . "<br>";

}

echo "<br><br>";
//======== 2 ==========
$arr = [1 => 2, 2 => 3, 3 => 4, 5 => 4, 4 => 6, 6 => 7, 7 => 'test'];

handleArray($arr);

function handleArray(array $array)
{
    echo "Количество элементов в массиве: " . count($array) . "<br>";

    array_pop($array);
    arsort($array);

    foreach ($array as $key => &$value) {
        if ($value % 2 == 0) {
            $value *= 3;
        } else {
            $value *= 2;
        }

    }

    echo "Результат всех операция над массивом: " . implode(',', $array);

}

//======== 3 ==========
function connectServer()
{
    $link = mysql_connect('192.168.10.206', 'root', 'testpass123')
    or die('Не удалось соединиться: ' . mysql_error());
    echo 'Соединение успешно установлено';
    mysql_select_db('test-DB') or die('Не удалось выбрать базу данных');
}

?>
</body>
</html>