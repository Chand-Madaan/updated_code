
<?php include 'connection.php'; ?>
<?php


$id = $_GET['category_id'];

$sql = "delete from  categories WHERE category_id =".$id;

if ($conn->query($sql) === TRUE) {
    header('location:category.php?err=' .urlencode('Category deleted Succesfully!!'));
    exit();
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


?>
