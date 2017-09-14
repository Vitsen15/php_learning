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
product_color_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_size_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_category_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_count INT UNSIGNED NOT NULL,
product_price DECIMAL(5, 2) NOT NULL
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

$tables[] = "CREATE TABLE Product_Color (
color_id INT UNSIGNED PRIMARY KEY,
product_color_id INT UNSIGNED PRIMARY KEY
)";

$tables[] = "CREATE TABLE Colors (
color_id INT UNSIGNED PRIMARY KEY,
color VARCHAR(30) NOT NULL
)";

$tables[] = "CREATE TABLE Product_Size (
size_id INT UNSIGNED PRIMARY KEY,
product_size_id INT UNSIGNED PRIMARY KEY
)";

$tables[] = "CREATE TABLE Sizes (
size_id INT UNSIGNED PRIMARY KEY,
size VARCHAR(30) NOT NULL
)";

$tables[] = "CREATE TABLE Product_Category (
category_id INT UNSIGNED PRIMARY KEY,
product_category_id INT UNSIGNED PRIMARY KEY
)";

$tables[] = "CREATE TABLE Sizes (
category_id INT UNSIGNED PRIMARY KEY,
category VARCHAR(30) NOT NULL
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