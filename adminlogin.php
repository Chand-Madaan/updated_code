<!DOCTYPE>
<html>
<head>
    <title> LOGIN</title>
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
<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">

            <div class="login-panel panel panel-default">
                <div class="panel-heading">Admin Log in</div>
                <div class="panel-body">
    <form action="adminloginprocess.php" method="post">
        <div class="form-group">
            <input class="form-control" placeholder="username" name="admin_user" type="text">
        </div>
        <div class="form-group">
            <input class="form-control" placeholder="password" name="admin_password" type="password">
        </div>
        <button class="btn btn-primary" type="submit" name="login">Sign In </button>
    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
