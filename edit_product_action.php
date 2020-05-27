<?php
$product_id = $_REQUEST["product_id"];
//$category_name=$_REQUEST['category_name'];
$product_name = $_REQUEST["product_name"];
//$img=$_REQUEST['img'];
$product_keywords = $_POST["product_keywords"];
$product_price = $_POST["product_price"];
include "connection.php";
include "adminheader.php";
$update = "update products SET  product_name='$product_name', product_keywords='$product_keywords', product_price='$product_price' WHERE product_id='" . $_REQUEST["product_id"] . "'";
    echo $update;
    mysqli_query($conn, $update);
    header("location:manage_products.php");
