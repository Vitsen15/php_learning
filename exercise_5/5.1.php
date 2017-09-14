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

$connection = DBConnection();

$tables = [];

$tables[] = "CREATE TABLE Products (
product_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
product_size VARCHAR(30) NOT NULL,
product_count INT UNSIGNED NOT NULL,
product_color VARCHAR(50),
product_price DECIMAL(5, 2) NOT NULL,
product_category VARCHAR(255) NOT NULL
)";

$tables[] = "CREATE TABLE Customers (
customer_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
customer_name VARCHAR(30) NOT NULL,
customer_surname VARCHAR(30) NOT NULL,
customer_phone_number VARCHAR(15)
)";

$tables[] = "CREATE TABLE Orders (
customer_id INT UNSIGNED PRIMARY KEY,
product_id INT UNSIGNED PRIMARY KEY,
product_count INT UNSIGNED NOT NULL
)";

fillDB($tables, $connection);

function DBConnection(){
    $dbhost = "localhost:3036";
    $dbuser = "root";
    $dbpass = "testpass123";
    $dataBase = "test_db";
    $mysqli = new mysqli ($dbhost, $dbuser, $dbpass, $dataBase);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    return $mysqli;
}

function addTable(string $table, $connection){
    if ($connection->query($table) === TRUE) {
        echo "Table MyGuests created successfully";
    } else {
        echo "Error creating table: " . $connection->error;
    }
}

function fillDB(array $tables, $connection){
    foreach ($tables as $key => $table){
        addTable($table, $connection);
    }

    $connection->close();
}
?>
</body>
</html>