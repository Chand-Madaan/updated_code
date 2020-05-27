<?php

session_start();
if(!isset($_SESSION["user_id"])){
    header("location:index1.php");
}

if (isset($_GET["submit"])) {

    # code..
    $p_st = "completed";
    $cm_user_id = $_GET["custom"];

    if ($p_st == "completed") {


        include_once("connection.php");
        $sql = "SELECT product_id,qty,amount FROM cart WHERE user_id = '$cm_user_id'";
        $query = mysqli_query($conn,$sql);
        if (mysqli_num_rows($query) > 0) {
            # code...
            while ($row=mysqli_fetch_array($query)) {
                $product_id[] = $row["product_id"];
                $qty[] = $row["qty"];
            }

            for ($i=0; $i < count($product_id); $i++) {
                $sql = "INSERT INTO orders (user_id,product_id,qty,p_status) VALUES ('$cm_user_id','".$product_id[$i]."','".$qty[$i]."','$p_st')";
                mysqli_query($conn,$sql);
            }

            $sql = "DELETE FROM cart WHERE user_id = '$cm_user_id'";
            if (mysqli_query($conn,$sql)) {
                ?>
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <title>ADB Wholesalers</title>
                    <link rel="stylesheet" href="css/bootstrap.min.css"/>
                    <script src="js/jquery2.js"></script>
                    <script src="js/bootstrap.min.js"></script>
                    <script src="main.js"></script>
                    <style>
                        table tr td {padding:10px;}
                    </style>
                </head>
                <body>
                <div class="navbar navbar-inverse navbar-fixed-top">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a href="#" class="navbar-brand">ADB Wholesalers</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li><a href="index1.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                            <li><a href="profile.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
                        </ul>
                    </div>
                </div>
                <p><br/></p>
                <p><br/></p>
                <p><br/></p>
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading"></div>
                                <div class="panel-body">
                                    <h1>Thankyou </h1>
                                    <hr/>
                                    <p>Hello <?php echo "<b>".$_SESSION["name"]."</b>"; ?>,Your order process is
                                        successfully completed </b><br/>
                                        you can continue your Shopping <br/></p>
                                    <a href="index1.php" class="btn btn-success btn-lg">Continue Shopping</a>
                                </div>
                                <div class="panel-footer"></div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
                </body>
                </html>

                <?php
            }
        }else{
            header("location:index1.php");
        }

    }
}



?>

















































