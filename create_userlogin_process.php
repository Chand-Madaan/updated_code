<?php
session_start();
include "connection.php";

    $email = $_POST['email'];
    $password = $_POST['password'];
echo'kk';
    if(empty($password)){

        $sql = "INSERT password INTO `user_info` SELECT email
		WHERE email = '$email'&& user_id='".$_REQUEST["user_id"]."' ";
        $run_query = mysqli_query($conn,$sql);
        //$_SESSION["user_id"] = mysqli_insert_id($conn);
        //$_SESSION["name"] = $f_name;
        //$ip_add = getenv("REMOTE_ADDR");
        // $sql = "UPDATE cart SET user_id = '$_SESSION[user_id]' WHERE ip_add='$ip_add' AND user_id = -1";
        //if(mysqli_query($conn,$sql)){
        echo "register_success";
        exit();
    }
    echo 'ii';







?>






















































