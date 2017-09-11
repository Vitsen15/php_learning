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

$admin_id = 12;

$products[] = ['product_name' => 'Ноутбук Asus',
    'product_category' => '3',
    'product_count' => '0',
    'product_description' => 'Довольно мощный ноутбук',
    'product_price' => '450',
    'product_discount' => '400',
    'admin' => $admin_id];

$products[] = ['product_name' => 'Ноутбук hp',
    'product_category' => '3',
    'product_count' => '3',
    'product_description' => 'Греющееся гавно',
    'product_price' => '200',
    'product_discount' => '150',
    'admin' => $admin_id];

$products[] = ['product_name' => 'Аудио система Samsung',
    'product_category' => '5',
    'product_count' => '6',
    'product_description' => 'Дешевая и неплохая аудиостстема',
    'product_price' => '50',
    'product_discount' => '0',
    'admin' => $admin_id];

$products[] = ['product_name' => 'Наушники Sennheiser',
    'product_category' => '6',
    'product_count' => '2',
    'product_description' => 'Производят чстейший звук',
    'product_price' => '150',
    'product_discount' => '100',
    'admin' => $admin_id];

$products[] = ['product_name' => 'Холодильник Донбасс',
    'product_category' => '7',
    'product_count' => '1',
    'product_description' => 'Почти не морозит, зато за неделю полно льда в морозилке',
    'product_price' => '60',
    'product_discount' => '0',
    'admin' => $admin_id];

function displayProduct(string $name = "", int $category = 0,
                        int $count = 0, string $description = "",
                        float $price = 0.0, float $discount = 0.0, int $admin)
{
    $error = "";

    if ($count == 0) {
        $error = "Count of product is invalid: $name ";
    }

    if (!$name) {
        $error .= "Product doesn't have a name ";
    }

    if ($category > 50) {
        $error .= "Invalid product category: $name ";
    }

    if ($price <= 0) {
        $error .= "Invalid price: $name";
    }

    if ($description === "") {
        $description = "product doesn't have a description";
    }
    if ($error) {
        return $error;
    } else {
        $product_list = "<ul style='border: 1px solid black'>
                <li>Наименование: $name</li>
                <li>Категория: <a href='#'>$category</a></li>
        <li>Описание: $description</li>
        <li>На складе: $count</li>";
        if ($discount) {
            $product_list .= "<li>Цена без учета скидки: $price</li>
                              <li>Цена с учетом скидки: $discount</li>";
        } else {
            $product_list .= "<li>Цена: $price</li>";
        }

        $product_list .= "<li>Добавлено: $admin</li></ul>";
    }

    return $product_list;
}

?>

<?php foreach ($products as $product): ?>
    <?= displayProduct($product['product_name'], $product['product_category'],
        $product['product_count'], $product['product_description'], $product['product_price'],
        $product['product_discount'], $product['admin']) ?>
<?php endforeach; ?>

</body>
</html>