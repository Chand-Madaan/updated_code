<?php
$category_id = $_REQUEST["category_id"];
$category_name = $_REQUEST["category_name"];
include "connection.php";
include 'adminheader.php';

$update = "update categories set category_name='$category_name' WHERE category_id='" . $_REQUEST["category_id"] . "'";

mysqli_query($conn, $update);
echo"
<div class='alert alert-warning'>
				<a href='category.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Category Edit successfully</b>
			</div>
";
//header("location:category.php");


