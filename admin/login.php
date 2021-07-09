<?php
session_start();
include_once('../config/config.php');

$data = $_POST;

if (isset($data['login'])) {
    if ($data['username'] == ADMIN_PANEL_USERNAME && $data['password'] == ADMIN_PANEL_PASSWORD) {
        $_SESSION['is_login'] = true;
        header('Location: /admin/index.php');
        exit;
    } else {
        echo "Вход не удался";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Вход</title>
</head>

<body>
    <h1>Вход</h1>
    <form action="#" method="post">
        <label for="username">Имя пользователя</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Пароль</label><br>
        <input type="password" id="password" name="password" required><br>
        <button type="submit" name="login">Войти</button>
    </form>
</body>

</html>