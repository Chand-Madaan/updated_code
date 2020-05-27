<?php
session_start();
include "connection.php";
if (isset($_POST["f_name"])) {

    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $email = $_POST['email'];
    $company_name = $_POST['company_name'];
    $company_address = $_POST['company_address'];
    $trading_name = $_POST['trading_name'];
    $ABN=$_POST['ABN'];
    $name = "/^[a-zA-Z ]+$/";
    $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
    $number = "/^[0-9]+$/";

    if(empty($f_name) || empty($l_name) || empty($email) ||
        empty($company_name) || empty($company_address) || empty($trading_name)|| empty($ABN)){

        echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
        exit();
    } else {
        if(!preg_match($name,$f_name)){
            echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $f_name is not valid..!</b>
			</div>
		";
            exit();
        }
        if(!preg_match($name,$l_name)){
            echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $l_name is not valid..!</b>
			</div>
		";
            exit();
        }
        if(!preg_match($emailValidation,$email)){
            echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $email is not valid..!</b>
			</div>
		";
            exit();
        }

        }
        //existing email address in our database
        $sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1" ;
        $check_query = mysqli_query($conn,$sql);
        $count_email = mysqli_num_rows($check_query);
        if($count_email > 0){
            echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Email Address is already available Try Another email address</b>
			</div>
		";
            exit();
        } else {
            $sql = "INSERT INTO `user_info` 
		(`user_id`, `first_name`, `last_name`, `email`, 
		 `company_name`, `company_address`, `trading_name`, `ABN`) 
		VALUES (NULL, '$f_name', '$l_name', '$email', 
		 '$company_name', '$company_address', '$trading_name', '$ABN')";
            $run_query = mysqli_query($conn,$sql);
            $_SESSION["user_id"] = mysqli_insert_id($conn);
            $_SESSION["name"] = $f_name;
            $ip_add = getenv("REMOTE_ADDR");
           // $sql = "UPDATE cart SET user_id = '$_SESSION[user_id]' WHERE ip_add='$ip_add' AND user_id = -1";
            //if(mysqli_query($conn,$sql)){
                echo "register_success";
                exit();
            }



}



?>






















































