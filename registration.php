<?php
if (isset($_GET["register"])) {

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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" id="signup_msg">
                <!--Alert from signup form-->
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Retailer SignUp Form</div>
                    <div class="panel-body">

                        <form action="retailerhome.php" id="signup_form" onsubmit="return false">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="f_name">First Name</label>
                                    <input type="text" id="f_name" name="f_name" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="f_name">Last Name</label>
                                    <input type="text" id="l_name" name="l_name"class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email"class="form-control">
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="company_name">Company Name</label>
                            <input type="text" id="company_name" name="company_name"class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="company_address">Company Address</label>
                            <input type="text" id="company_address" name="company_address"class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="trading_name">Trading Name</label>
                            <input type="text" id="trading_name" name="trading_name"class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="ABN">ABN</label>
                            <input type="text" id="ABN" name="ABN"class="form-control">
                        </div>
                    </div>
                    <p><br/></p>
                    <div class="row">
                        <div class="col-md-12">
                            <input style="width:100%;" value="Sign Up" type="submit" name="signup_button"class="btn btn-success btn-lg">
                        </div>
                    </div>

                </div>
                </form>
                <div class="panel-footer"></div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    </div>
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

    </div>
    </body>
    </html>
    <?php
}



?>






















