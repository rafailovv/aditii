<?php
session_start();
include_once('../functions.php');

if (!isset($_SESSION['is_login'])) {
    header('Location: /admin/login.php');
    exit;
}

if (isset($_POST['delete_product'])) {
    delete_product($db, $_POST['id']);
}

$current_products = get_all_products($db);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Админка</title>
</head>

<body>
    <header class="header">
        <ul class="menu">
            <li class="menu-item"><a href="/" class="menu-item-link">На сайт</a></li>
            <li class="menu-item"><a href="/admin/index.php" class="menu-item-link">Товары</a></li>
            <li class="menu-item"><a href="add_product.php" class="menu-item-link">Добавить товар</a></li>
        </ul>
    </header>
    <h1>Товары</h1>
    <div class="products">

        <div class="product">
            <p class="product-title">Название товара</p>
            <p class="product-price">Цена товара</p>
            <p class="product-description">Описание товара</p>
            <p class="product-category">Категории товара</p>
            <p class="product-count">Количество товара</p>
            <p class="product-image">Картинка товара</p>
            <p class="product-delete">Удаление</p>
        </div>

        <?php foreach ($current_products as $item) : ?>

            <div class="product">
                <p class="product-title"><?= $item['title'] ?></p>
                <p class="product-price">$<?= $item['price'] ?></p>
                <p class="product-description"><?= $item['description'] ?></p>
                <p class="product-category"><?= $item['category'] ?></p>
                <p class="product-count"><?= $item['count'] ?></p>
                <img src="data: image/*;base64, <?= base64_encode($item['image']) ?>" alt="photo: Product" class="product-image" width="100" height="100">
                <form action="#" method="post">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <button type="submit" name="delete_product" class="button">Удалить</button>
                </form>

            </div>

        <?php endforeach; ?>

    </div>
</body>

</html>