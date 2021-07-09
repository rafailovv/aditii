<?php
session_start();
include_once('functions.php');

if (!$_GET['id']) {
    header("Location: /error.html");
    exit;
}

$current_product = get_product_by_id($db, $_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/product.css">

    <title>Продукт | Aditii</title>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="product">
        <img class="product-image" src="data: image/*;base64, <?= base64_encode($current_product['image']) ?>" alt="photo: Product">
        <div class="product-text">
            <p class="product-title"><?= $current_product['title'] ?></p>
            <p class="product-description"><?= $current_product['description'] ?></p>
            <p class="product-price"><?= $current_product['price'] ?>$</p>
            <a href="/cart.php?id=<?= $current_product['id'] ?>" class="product-button">IN CART</a>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>