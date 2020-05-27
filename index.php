<?php
session_start();
if(isset($_SESSION["user_id"])){
    header("location:profile.php");
}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>ADB Wholesaler</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script src="js/jquery2.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="main.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <div class="wait overlay">
        <div class="loader"></div>
    </div>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">ADB Wholesaler</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                <li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
            </ul>
        </div>
    </div>
    <p><br/></p>
    <p><br/></p>
    <p><br/></p>
    <div class="container">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                 <h1>ADB Wholesalers</h1>
                <h4> Welcome To ADB Wholesaler B2B ecommerce platform</h4>
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-heading">
                        <form onsubmit="return false" id="login">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required/>
                            <label for="email">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required/>
                            <p><br/></p>
                            <button class="btn btn-primary" type="submit" name="login">Sign In </button>
                            <p><br></p>
                            <button class="btn btn-default"type="submit" name="Sign Up"><a href="customer_registration.php"> Create New Account</button>
                        </form>
                    </div>
                    <div class="panel-footer" id="e_msg"></div>
                </div>















































