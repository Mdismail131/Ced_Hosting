<?php
session_start();
if (!isset($_SESSION['cartdata'])) {
    $_SESSION['cartdata'] = [];
}
$id = $_POST['id'];
$cat_name = $_POST['cat_name'];
$name = $_POST['prod_name'];
$price = $_POST['mon_price'];
$sku = $_POST['sku'];

$product = array(
    'id' => $id,
    'cat_name' => $cat_name,
    'name' => $name,
    'price' => $price,
    'sku' => $sku
);
if (array_push($_SESSION['cartdata'], $product)) {
    echo "Product Added Successfully";
} else { 
    echo "Product Added Failed";
}

?>