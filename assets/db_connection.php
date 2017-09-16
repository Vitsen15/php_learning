<?php
function DBConnection($dbhost, $dbuser, $dbpass, $dataBase)
{

    $mysqli = new mysqli ($dbhost, $dbuser, $dbpass, $dataBase);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    return $mysqli;
}

?>