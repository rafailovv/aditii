<?php
session_start();
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
	<link rel="stylesheet" href="css/contacts.css">
	<title>Contacts | Aditii</title>
</head>

<body>
	<?php include_once('header.php'); ?>

	<h1>CONTACT US</h1>

	<?php if (!isset($_POST) || empty($_POST)) : ?>


		<div class="wrap">
			<form action="#" method="post">
				<label for="email">Почта</label><br>
				<input type="email" id="email" name="email" maxlength="30" required><br>
				<label for="subject">Тема сообщения</label><br>
				<input type="text" id="subject" name="subject" maxlength="50" required><br>
				<label for="message">Текст сообщения</label><br>
				<textarea id="message" name="message" cols="80" rows="12" maxlength="150" required></textarea><br>
				<button type="submit" name="send">Отправить</button>
			</form>
		</div>

	<?php else :
		
		include_once('mail.php');

	?>

	<?php endif; ?>

	<?php include_once('footer.php'); ?>
</body>

</html>