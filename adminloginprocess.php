<?php

include 'connection.php';

$admin_user = $_POST['admin_user'];
$admin_password = $_POST['admin_password'];



$sql = "SELECT *  FROM admins";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    if(($admin_user == $row["admin_user"]) && ($row["admin_password"] == ($admin_password)))
    {
        $_SESSION['admin'] = $admin_user;
        header('Location:adminheader.php');
    }
    else
    {

        header('location:adminlogin.php?err='.urlencode('Username Or Password Incorrect'));
    }
}
