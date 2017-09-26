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
include 'exercise_11/PleasureCater.php';

$cater = (new class(1000) extends PleasureCater
{

    public function showPeopleAmount($text = '')
    {
        if ($text == '') {
            $result = parent::showPeopleAmount();
        } else {
            $result = $text . parent::showPeopleAmount();
        }

        return $result;
    }

    public function iterateMethods()
    {
        $methods = get_class_methods(get_class());
        echo get_class() . " Methods: <br>";
        foreach ($methods as $method) {
            if ($method != "iterateMethods") {
                echo $method . '<br>';
            }
        }
    }

    public function iterateFields()
    {
        echo get_class() . " Fields: <br>";
        $fields = get_class_vars(get_class());
        foreach ($fields as $field => $value) {
            echo $field . '<br>';
        }
    }
});

echo $cater->showPeopleAmount('Amount of peoples: ') . '<br><br>';


$cater->iterateFields();
echo '<br>';
$cater->iterateMethods();

unset($cater);

?>
</body>
</html>
