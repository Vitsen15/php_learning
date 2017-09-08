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

$admin = 'Андрей';

$products[] = array('product_name' => 'Ноутбук Asus',
    'product_category' => 'Ноутбуки',
    'product_count' => '0',
    'product_description' => 'Довольно мощный ноутбук',
    'product_price' => '450',
    'product_discount' => '400',
    'admin' => $admin);

$products[] = array('product_name' => 'Ноутбук hp',
    'product_category' => 'Ноутбуки',
    'product_count' => '3',
    'product_description' => 'Греющееся гавно',
    'product_price' => '200',
    'product_discount' => '150',
    'admin' => $admin);

$products[] = array('product_name' => 'Аудио система Samsung',
    'product_category' => 'Аудио',
    'product_count' => '6',
    'product_description' => 'Дешевая и неплохая аудиостстема',
    'product_price' => '50',
    'product_discount' => '0',
    'admin' => $admin);

$products[] = array('product_name' => 'Наушники Sennheiser',
    'product_category' => 'Наушники',
    'product_count' => '2',
    'product_description' => 'Производят чстейший звук',
    'product_price' => '150',
    'product_discount' => '100',
    'admin' => $admin);

$products[] = array('product_name' => 'Холодильник Донбасс',
    'product_category' => 'Холодильники',
    'product_count' => '1',
    'product_description' => 'Почти не морозит, зато за неделю полно льда в морозилке',
    'product_price' => '60',
    'product_discount' => '0',
    'admin' => $admin);

foreach ($products as $product):
    if (!$product['product_count']) {
        continue;
    }
    echo "<ul style='border: 1px solid black'>".
          " <li>Наименование: {$product['product_name']}</li>
            <li>Категория: <a href='#'>{$product['product_category']}</a></li>
            <li>Описание: {$product['product_description']}</li>
            <li>На складе: {$product['product_count']}</li>
        ";
    if ($product['product_discount']) {
        echo "<li>Цена без учета скидки: {$product['product_price']}</li>
              <li>Цена с учетом скидки: {$product['product_discount']}</li>";
    } else {
        echo "<li>Цена: {$product['product_price']}</li>";
    }
    echo "<li>Добавлено: {$product['admin']}</li>".
         " </ul>";
endforeach;

?>
</body>
</html>