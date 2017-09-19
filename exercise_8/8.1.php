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
//============= 2 ================
$selectPersonagesByAbilitiesQuery = "SELECT personages.name
                                        FROM personages
                                        WHERE personages.id_class IN (SELECT classes.id
                                                                      FROM classes
                                                                      WHERE classes.id IN (SELECT classes_abilities.id_class
                                                                                           FROM classes_abilities
                                                                                           WHERE classes_abilities.id_ability IN (SELECT abilities.id
                                                                                                                                  FROM abilities
                                                                                                                                  WHERE abilities.id = 1)))";
$selectPlayersNameByClassAbilityEffectQuery = "SELECT players.name
                                            FROM players
                                            WHERE players.id IN (SELECT personages.id_player
                                                                 FROM personages
                                                                 WHERE personages.id_class IN (SELECT classes_abilities.id_class
                                                                                               FROM classes_abilities
                                                                                               WHERE classes_abilities.id_ability IN
                                                                                                     (SELECT abilities_effects.id_ability
                                                                                                      FROM abilities_effects
                                                                                                      WHERE abilities_effects.id_effect IN
                                                                                                            (SELECT effects.id
                                                                                                             FROM effects
                                                                                                             WHERE effects.name = 'damage'))))";

$charactersRatingByLvlQuery = "SELECT
                                  personages.name AS personage_name,
                                  personages.level,
                                  classes.name AS class_name,
                                  players.name AS player_name
                                FROM personages
                                  INNER JOIN classes ON personages.id_class = classes.id
                                  INNER JOIN players ON players.id = personages.id_player
                                  ORDER BY personages.level DESC";

$unblockedCharactersWithMissingEffectQuery = "SELECT
                                                  players.name,
                                                  players.personal_description
                                                FROM players
                                                WHERE players.id IN (SELECT personages.id_player
                                                                     FROM personages
                                                                     WHERE personages.banned = 0 AND personages.id_class IN (SELECT classes_abilities.id_class
                                                                                                                             FROM classes_abilities
                                                                                                                             WHERE classes_abilities.id_ability IN
                                                                                                                                   (SELECT abilities_effects.id_ability
                                                                                                                                    FROM abilities_effects
                                                                                                                                    WHERE abilities_effects.id_effect IN
                                                                                                                                          (SELECT effects.id
                                                                                                                                           FROM effects
                                                                                                                                           WHERE
                                                                                                                                             effects.name = 'missing'))))";

$characterFullInfoQuery = "SELECT
                              personages.name AS personage_name,
                              personages.level,
                              personages.experience,
                              players.name    AS player_name,
                              players.login,
                              players.password_hash,
                              players.personal_description,
                              classes.name    AS class_name
                            FROM personages
                              INNER JOIN players ON personages.id_player = players.id
                              INNER JOIN classes ON classes.id = personages.id_class
                            WHERE personages.name = 'Enigma'";
//============= 3 ===================
$resetBannedCharacterQuery = "UPDATE personages
                                SET personages.experience = 0, personages.level = 1, personages.banned = 0
                                WHERE personages.banned = 1";
//============== 4 ====================
$resetMaxLevelBannedCharacterQuery = "UPDATE personages,
                                          (SELECT
                                             max(personages.level) AS max
                                          FROM personages) AS max_level
                                      SET personages.banned = 1, personages.level = 1, personages.experience = 0, personages.banned = 0
                                      WHERE personages.level = max_level.max";

$changePersonageClassByAbilityQuery = "UPDATE personages, (SELECT classes.id
                                                            FROM classes
                                                            WHERE classes.id IN (SELECT classes_abilities.id_class
                                                                                 FROM classes_abilities
                                                                                 WHERE classes_abilities.id_ability IN (SELECT abilities.id
                                                                                                                        FROM abilities
                                                                                                                        WHERE abilities.name =
                                                                                                                              'BLACK HOLE'))) AS remove_class
                                        SET personages.banned = 1, personages.banned = 0,
                                          personages.id_class = if(personages.id_class = remove_class.id, 2, personages.id_class),
                                          personages.banned   = 0";
?>
</body>
</html>