<?php
session_start();
//if(isset($_SESSION["user_id"])){
//header("location:profile.php");
//}
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
            <li><a href="retailerhome.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
        </ul>
    </div>
</div>
<p><br/></p>
<p><br/></p>
<p><br/></p>
<div class="container">

    <h2 style="text-align: center;font-weight: bold">WELCOME TO ADB WHOLESALERS</h2>
    <h3 style="text-align: center">Hello <?php echo $_SESSION["name"] ?></h3>
    <h4 style="text-align: center;font-weight: bold">Thank You For Registration, Your Request has been sent to Wholesaler</h4>
    <h5 style="text-align: center;font-weight: bold">Please wait for confirmation</h5>


</div>
<br><br><br><br>

<style>
    footer {
        width:100%;
        background-color : black;
        position: fixed;
        bottom: 0;
        font-size: 17px;
        font-style: normal;
        font-variant: normal;
        height : 70px;
        color: #ece3e3;
        text-align: center;
        box-shadow: 0px 1px 50px #5E5E5E;
    }
</style>
</head>
<footer><b>ADB Wholesaler</b>&nbsp;&nbsp;,<i class="glyphicon glyphicon-home"></i> srikanthcheedara@gmail.com .&nbsp;For any equiry<i class="glyphicon glyphicon-phone"></i> Srikanth cheedara</footer>

</body>
</html>

















































