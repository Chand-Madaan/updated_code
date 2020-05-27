<!DOCTYPE>
<html>
<head>
    <title> RETAILER LOGIN</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<?php
if(isset($_GET['err']))
{
    echo "<font color='red'><h4 align='center'>".htmlspecialchars($_GET['err'])."<h4></font>";
}
?>
<body>
<?php
include 'connection.php';
include 'adminheader.php';
?>
<?php
$s="select * from user_info WHERE user_id='".$_REQUEST["user_id"]."'";
include "connection.php";
$result=mysqli_query($conn,$s);
$row=mysqli_fetch_array($result);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">

            <div class="login-panel panel panel-default">
                <div class="panel-heading">Creation of Retailer Log in</div>
                <div class="panel-body">
                    <form action="create_userlogin_process.php" method="post">
                        <div class="form-group">
                            <input readonly type="email" value="<?php echo $row[3]?>" class="form-control" placeholder="email" name="email" type="text" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="password" name="password" type="password" required>
                        </div>
                        <button class="btn btn-primary" type="submit" name="login">Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
