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
$dbhost = "localhost:3306";
$dbuser = "root";
$dbpass = "";
$dataBase = "lab_6";

$connection = DBConnection($dbhost, $dbuser, $dbpass, $dataBase);

$queries = [];

$userByAgeQuery = "SELECT name, surname, age FROM users  WHERE age<23";

$averageLvlQuery = "SELECT AVG(lvl) AS avg_lvl FROM players";

$highestLvlCharacterClassQuery = "SELECT classes.name
                                    FROM classes
                                    WHERE classes.id IN (
                                      SELECT players.id_class
                                      FROM players
                                      WHERE lvl IN (
                                        SELECT *
                                        FROM (
                                               SELECT MAX(players.lvl)
                                               FROM players
                                             ) AS lvl
                                      )
                                    )";

$loginAndPassHashQuery = "SELECT 
                            users.login,
                            users.pass_hash
                          FROM users
                          WHERE users.login LIKE 'A%' OR users.login LIKE 'O%'
                              OR users.login LIKE 'U%' OR users.login LIKE '%r%'
                              OR users.login LIKE '%s%' OR users.login LIKE '%d%'
                              OR users.login LIKE '%e%' OR users.login LIKE '%z%'
                              OR users.login LIKE '%f%' OR users.login LIKE '%o%'";

$userInfoQuery = "SELECT users.name, users.surname, users.age, players.nickname, classes.name
                  FROM users
                    INNER JOIN users_players ON users_players.id_user = users.id
                      INNER JOIN players ON players.id = users_players.id_player
                        INNER JOIN classes ON players.id_class = classes.id";

$moreOftenUsedClassQuery = "SELECT classes.name
                              FROM classes INNER JOIN players ON classes.id = (SELECT players.id_class, count(players.id_class) as cnt
                                FROM players GROUP BY players.id_class desc limit 1)";

$userByAge = DBQuery($connection, $userByAgeQuery);
showUserByAge($userByAge);

$averageLvl = DBQuery($connection, $averageLvlQuery);
showAverageLvl($averageLvl);

$highestLvlCharacterClass = DBQuery($connection, $highestLvlCharacterClassQuery);
showMaxLvlPlayerClass($highestLvlCharacterClass);


function DBQuery($connection, $query)
{
    return $result = mysqli_query($connection, $query);
}

function showUserByAge($result)
{
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Name: " . $row["name"] . ", Surname: " . $row["surname"] . ", age: " . $row["age"] . "<br>";
        }
    } else {
        echo "0 results";
    }
}

function showAverageLvl($result)
{
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Average: " . $row["avg_lvl"] . "<br>";

        }
    } else {
        echo "0 results";
    }
}

function showMaxLvlPlayerClass($result)
{
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
//            echo "Average: " . $row["AVG(lvl)"] ."<br>";
            var_dump($row);

        }
    } else {
        echo "0 results";
    }
}

?>
</body>
</html>