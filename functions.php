<?php
include_once("config/db.php");

function get_all_products($db)
{
    $sql = "SELECT * FROM `products`";
    $result = $db->query($sql);
    $data_from_db = [];

    while ($row = $result->fetch_assoc()) {
        $data_from_db[] = $row;
    }
    return $data_from_db;
}

function get_products($db, $count)
{
    if ($count <= 0) {
        exit("Ошибка");
    }
    $result = $db->query("SELECT * FROM `products` WHERE `id` <= $count");
    $data_from_db = [];

    while ($row = $result->fetch_assoc()) {
        $data_from_db[] = $row;
    }
    return $data_from_db;
}

function get_category($db, $needed_category)
{
    $sql = "SELECT * FROM `products`";
    $result = $db->query($sql);
    $data_from_db = [];

    while ($row = $result->fetch_assoc()) {
        $data_from_db[] = $row;
        $needed_data = [];

        foreach ($data_from_db as $item) {
            $pieces = explode(";", $item['category']);
            foreach ($pieces as $category) {
                if (trim($category) == $needed_category) {
                    $needed_data[] = $item;
                }
            }
        }
    }
    return $needed_data;
}

function get_product_by_id($db, $id)
{
    $sql = "SELECT * FROM `products` WHERE `id` = '$id'";
    $result = $db->query($sql);
    $product = mysqli_fetch_assoc($result);

    if (!$product) {   
        header("Location: /error.html");
        exit;
    }
    return $product;
}

function add_product($db, $title, $descriprion, $price, $category, $count, $image)
{
    $sql = "INSERT INTO `products` (`id`, `title`, `description`, `price`, `category`, `count`, `image`) VALUES (NULL, '$title', '$descriprion', '$price', '$category', '$count', '".$image."');";
    $result = $db->query($sql);
    if ($result) {
        header("Location: /admin/index.php");
        exit;
    }
    else {
        header("Location: /error.html");
        exit;
    }
}

function delete_product($db, $id)
{
    $sql = "DELETE FROM `products` WHERE `id` = '$id'";
    $result = $db->query($sql);
    if ($result) {
        header("Location: /admin/index.php");
        exit;
    }
    else {
        header("Location: /error.html");
        exit;
    }
}
