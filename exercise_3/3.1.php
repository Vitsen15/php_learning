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

$andrey = 'andrey';
$surname = "Vitsentovich";
$countSurnameChars = 0;

//========= 1 ============
echo "Part 1:<br>";

function andrey()
{
    echo "Я тестовая функция, и меня вызвали через переменную!<br>";
}

function arbitraryFunc($callFunc)
{
    $callFunc();
}

arbitraryFunc($andrey);

//============== 2 ============
echo "Part 2:<br>";

$anonymousFunc = function () use ($andrey) {
    arbitraryFunc($andrey);
};

$anonymousFunc();

//============= 3 ================
echo "Part 3:<br>";

/**
 * @param array $separators - array of chars to witch separates whe word
 * @param string $char - current character in word
 * @return bool - matched separator character
 */
function checkSeparator(array $separators, string $char)
{
    $result = false;
    $currentChar = strtolower($char);

    for ($i = 0; $i < count($separators); $i++) {
        if ($currentChar === $separators[$i]) {
            $result = true;
        }
    }

    return $result;
}

/**
 * @param string $word
 * @return array
 */
function separateWordByVowels(string $word)
{
    global $countSurnameChars;
    $word = str_split($word);
    $separators = ['i'];
    $consonants = [];

    for ($i = $countSurnameChars; $i < count($word); $i++, $countSurnameChars++) {
        if (checkSeparator($separators, $word[$i])) {
            continue;
        } else {
            $consonants[] = $word[$i];
        }

    }

    return $consonants;

}

$surnameHandler = function () use (&$countSurnameChars, $surname){
    //echo var_dump(separateWordByVowels($surname));
    echo "Array of consonants: ". implode(',', separateWordByVowels($surname))
        . "<br> Count of characters: " . $countSurnameChars;
};

$surnameHandler();


?>
</body>
</html>