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
//=============== 1 ====================
$randomStringQueries = [];

$randomStringQueries[] = "INSERT INTO classes (id, name, abilities)
                            VALUES (5, NULL, 'sdlahjklhfaldkfjh')";

$randomStringQueries[] = "INSERT INTO classes (id, name, abilities)
                            VALUES (5, 'Warrior', 'sdlahjklhfaldkfjh')";

$randomStringQueries[] = "INSERT INTO players (id, nickname, lvl, id_class)
                            VALUES (6, 'plumbus', 20, 2)";

$randomStringQueries[] = "INSERT INTO classes (id, name, abilities)
                            VALUES (6, 'Thief', NULL )";

$randomStringQueries[] = "INSERT INTO players (id, nickname, lvl, id_class)
                            VALUES (5, NULL, 90, 6)";

$randomStringQueries[] = "INSERT INTO players (id, nickname, lvl, id_class)
                            VALUES (5, 'Eridir', 90, 6)";

$randomStringQueries[] = "INSERT INTO users (id, name, surname, age, login, pass_hash)
                            VALUES (5, 'Igor', 'Pizdabol', 24, 'I_am_fag', NULL )";

$randomStringQueries[] = "INSERT INTO users (id, name, surname, age, login, pass_hash)
                            VALUES (5, 'Igor', 'Pizdabol', 24, 'I_am_fag', 'sldkjflks')";

$randomStringQueries[] = "INSERT INTO users (id, name, surname, age, login, pass_hash)
                            VALUES (5, 'Igor', 'Pizdabol', 24, NULL , 'sldkjflks')";

$randomStringQueries[] = "INSERT INTO users (id, name, surname, age, login, pass_hash)
                            VALUES (5, 'Igor', NULL , 24, 'I_am_fag', 'sldkjflks')";

$randomStringQueries[] = "INSERT INTO users (id, name, surname, age, login, pass_hash)
                            VALUES (5, NULL , Pizdabol , 24, 'I_am_fag', 'sldkjflks')";

//================== 2 ====================
$invalidQueries = [];

$invalidQueries[] = "INSERT INTO users (id, name, surname, age, login, pass_hash)
                      VALUES (5.3, 'Igor', 'Pizdabol' , 2495869058, 'I_am_fagfsdgfgfgdfgsdgsd', 'sldkjflks')";

$invalidQueries[] = "INSERT INTO players (id, nickname, lvl, id_class)
                      VALUES (4, 'alskdjfalskdfjalkflaksjfklasj', 90, 3)";

$invalidQueries[] = "INSERT INTO players (id, nickname, lvl, id_class)
                      VALUES (7, 'alskdj', 90.5, 3)";

//====================== 3 ===================
$increasePlayersLvlQuery = "UPDATE players SET players.lvl = players.lvl + 10";

$increasePlayersLvlByConditionQuery = "UPDATE players SET players.lvl = players.lvl + 5
                                        WHERE players.lvl < 25";

$changePlayersClassByConditionsQuery = "UPDATE players
                                        SET players.id_class = (CASE
                                                                WHEN players.id = 1
                                                                  THEN 2
                                                                WHEN players.id = 2
                                                                  THEN 1
                                                                ELSE players.id_class
                                                                  END)";

$refreshSlayersCharactersNicknamesQuery = "UPDATE players
                                              SET players.nickname = concat(players.nickname, '-Slayer')
                                                WHERE players.lvl > 100";
//============== 3 =================
$deleteChildrenPlayersQuery = "DELETE players
FROM players
WHERE players.id IN (SELECT users_players.id_player
                     FROM users_players
                     WHERE users_players.id_user IN (SELECT users.id
                                                     FROM users
                                                     WHERE users.age < 12))";

$deleteUnusedClassesQuery = "DELETE classes FROM classes
                             WHERE classes.id NOT IN (SELECT players.id_class
                                                      FROM players);";
?>
</body>
</html>