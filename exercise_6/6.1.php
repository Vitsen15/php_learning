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

//set up DB and fill the variables above to connect
//$connection = DBConnection($dbhost, $dbuser, $dbpass, $dataBase);

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
                              FROM classes WHERE classes.id IN
                                                 (SELECT count(players.id_class)
                                                    FROM players WHERE id_class=4)";

$theMostRepeatedClsaaQuery = "SELECT classes.name
                              FROM classes
                              WHERE classes.id
                                  IN (
                                    SELECT players.id_class
                                    FROM players
                                    GROUP BY players.id_class
                                    HAVING count(*) = (
                                      SELECT count(*)
                                      FROM players
                                      GROUP BY players.id_class
                                      ORDER BY count(*) DESC
                                      LIMIT 1)
                                  )";

//uncomment this function to get query result example
//$userByAge = DBQuery($connection, $userByAgeQuery);



function DBQuery($connection, $query)
{
    return $result = mysqli_query($connection, $query);
}

?>
</body>
</html>