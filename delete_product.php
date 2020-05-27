
<?php include 'connection.php'; ?>
<?php


$id = $_GET['product_id'];
$sql="delete from  products WHERE product_id =".$id;

//$sql = "UPDATE products SET delete_status = '1' WHERE product_id =".$id;

if ($conn->query($sql) === TRUE) {
    header('location:manage_products.php?err=' .urlencode('product deleted Succesfully!!'));
    exit();
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


?>
