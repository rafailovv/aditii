<?php
session_start();
include_once('../functions.php');

if (!isset($_SESSION['is_login'])) {
    header('Location: /admin/login.php');
    exit;
}

$data = $_POST;

if (isset($data['add_product'])) {
    $image = addslashes(file_get_contents($_FILES['file']['tmp_name']));
    add_product($db, $data['title'], $data['description'], $data['price'], $data['category'], $data['count'], $image);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Добавить товар</title>
</head>

<body>
    <header class="header">
        <ul class="menu">
            <li class="menu-item">
                <a href="/" class="menu-item-link">На сайт</a>
            </li>
            <li class="menu-item">
                <a href="/admin/index.php" class="menu-item-link">Товары</a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-item-link">Добавить товар</a>
            </li>
        </ul>
    </header>
    <h1>Добавить товар</h1>
    <div class="wrap">
        <form action="#" method="post" enctype="multipart/form-data">
            <label for="title">Название товара</label><br>
            <input type="text" id="title" name="title" maxlength="50" required><br>
            <label for="description">Описание товара</label><br>
            <textarea id="description" name="description" maxlength="300" rows="10" cols="50" required></textarea><br>
            <label for="price">Цена товара</label><br>
            <input type="text" id="price" name="price" required><br>
            <label for="category">Категории товара</label><br>
            <input type="text" id="category" name="category" maxlength="100" required><br>
            <label for="count">Количество товара</label><br>
            <input type="text" id="count" name="count" required><br>
            <label for="file">Фото товара</label><br>
            <input type="file" id="file" name="file" accept="image/jpg, image/jpeg, image/png, image/webp" required><br>
            <button type="submit" name="add_product">Добавить товар</button>
        </form>
    </div>
</body>

</html>