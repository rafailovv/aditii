<?php
session_start();
include_once('functions.php');

// Getting right products
$current_products = get_products($db, 6);
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
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
	<link rel="icon" href="img/logo.png">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/styles.css">
	<title>Main | Aditii</title>
</head>

<body>
	<?php include_once('header.php'); ?>
	<div class="preview">
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide"><img src="img/image1.jpg" alt="photo: preview"></div>
				<div class="swiper-slide"><img src="img/image2.jpg" alt="photo: preview"></div>
				<div class="swiper-slide"><img src="img/image3.jpg" alt="photo: preview"></div>
				<div class="swiper-slide"><img src="img/image4.jpg" alt="photo: preview"></div>
			</div>	
		</div>
	</div>
	<h2 class="products-title">FEATURED PRODUCTS</h2>
	<div class="products">

		<?php foreach ($current_products as $item) : ?>

			<div class="products-item">
				<img src="data: image/*;base64, <?= base64_encode($item['image']) ?>" alt="photo: Product" class="products-item-image">
				<p class="products-item-title"><?= $item['title'] ?></p>
				<div class="products-item-cart">
					<p class="products-item-cart-price"><?= $item['price'] ?>$</p>
					<a href="product.php?id=<?= $item['id'] ?>" class="products-item-cart-button">BUY NOW</a>
				</div>
			</div>

		<?php endforeach; ?>

	</div>
	
	<?php include_once('footer.php'); ?>

	<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<script src="js/script.js"></script>

</body>

</html>