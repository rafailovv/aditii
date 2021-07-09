<?php
include_once('config.php');

$db = new mysqli(DB_ADDRESS, DB_USER, DB_PASSWORD, DB_NAME);

if ($db->connect_errno) {
    echo "Не удалось подключиться к базе данных";
    exit;
}

$db->query("SET NAMES UTF-8");
