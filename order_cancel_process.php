
<?php include 'connection.php'; ?>
<?php


$id = $_GET['order_id'];

$sql = "UPDATE orders SET admin_status = '1' WHERE order_id=".$id;

if ($conn->query($sql) === TRUE) {
    header('location:pending_orders.php?err=' .urlencode('order cancelled Succesfully!!'));
    exit();
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


?>
