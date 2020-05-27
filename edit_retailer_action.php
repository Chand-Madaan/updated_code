<?php
$user_id = $_REQUEST["user_id"];
$f_name = $_POST["f_name"];
$l_name = $_POST["l_name"];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$company_name = $_POST['company_name'];
$company_address = $_POST['company_address'];
$trading_name = $_POST['trading_name'];
$ABN=$_POST['ABN'];
include "connection.php";
include "adminheader.php";
$update = "update user_info SET  first_name='$f_name',last_name='$l_name',email='$email',company_name='$company_name',company_address='$company_address', trading_name='$trading_name', ABN='$ABN' WHERE user_id='" . $_REQUEST["user_id"] . "'";
echo $update;
mysqli_query($conn, $update);
header("location:manage_retailer.php");