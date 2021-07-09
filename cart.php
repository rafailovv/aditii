<?php
session_start();
include_once('functions.php');

if ($_GET['delete_id'] && isset($_SESSION['cart_list'])) {
    foreach ($_SESSION['cart_list'] as $key => $value) {
        if ($value['id'] == $_GET['delete_id']) {
            unset($_SESSION['cart_list'][$key]);
        }
    }
}

if ($_GET['id']) {
    $current_added_product = get_product_by_id($db, $_GET['id']);

    if (!empty($current_added_product)) {
        if (!isset($_SESSION['cart_list'])) {
            $_SESSION['cart_list'][] = $current_added_product;
        }

        $product_already_in_cart = false;

        if (isset($_SESSION['cart_list'])) {
            foreach ($_SESSION['cart_list'] as $item) {
                if ($current_added_product['id'] == $item['id']) {
                    $product_already_in_cart = true;
                }
            }
        }

        if (!$product_already_in_cart) {
            $_SESSION['cart_list'][] = $current_added_product;
        }
    } else {
        header("Location: /error.html");
        exit;
    }
}

if (isset($_SESSION['cart_list'])) {
    $_SESSION['total_price'] = 0;

    foreach ($_SESSION['cart_list'] as $item) {
        $_SESSION['total_price'] += $item['price'];
    }
}

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
    <link rel="stylesheet" href="css/cart.css">
    <title>Cart | Aditii</title>
</head>

<body>
    <?php include_once('header.php'); ?>

    <?php if (isset($_SESSION['cart_list']) && count($_SESSION['cart_list']) != 0) : ?>

        <div class="cart">
            <div class="cart-head">
                <p class="cart-head-title">Name</p>
                <p class="cart-head-price">Price</p>
                <p class="cart-head-image">Image</p>
                <p class="cart-head-delete">Delete</p>
            </div>
            <hr width="95%">

            <?php foreach ($_SESSION['cart_list'] as  $item) : ?>

                <div class="cart-item">
                    <p class="cart-item-title"><?= $item['title'] ?></p>
                    <p class="cart-item-price"><?= $item['price'] ?>$</p>
                    <img src="data: image/*;base64, <?= base64_encode($item['image']) ?>" alt="photo: Product" class="cart-item-image">
                    <a href="/cart.php?delete_id=<?= $item['id'] ?>" class="cart-item-delete">
                        <img src="img/cross.ico" alt="icon: delete" width="75">
                    </a>
                </div>

            <?php endforeach; ?>

            <hr width="95%">
            <div class="cart-total">
                <p class="cart-total-price">Total: <?= $_SESSION['total_price'] ?>$</p>
            </div>
            <a href="#" class="cart-button">ORDER</a>
        </div>

    <?php else : ?>

        <div class="cart">
            <h1>Ваша корзина пуста</h3>
        </div>

    <? endif; ?>

    <?php include_once('footer.php'); ?>
</body>

</html>