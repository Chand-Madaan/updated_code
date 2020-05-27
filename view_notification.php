<?php
session_start();
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
            <li><a href="view_notification.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
        </ul>
    </div>
</div>
<p><br/></p>
<p><br/></p>
<p><br/></p>

<div class="container">
     <h1>Thankyou </h1>
        <hr/>
        <h3>Congratulations Your request has been accepted</h3>
        <h3>Your Temporary password is 12345</h3>
    <p><br></p>
    <a href="index.php" class="btn btn-primary"type="submit" name="login">Sign In </a>

</div>


</body>
</html>