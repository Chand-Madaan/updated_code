<!DOCTYPE>
<html>
<head>
    <script>
        $(document).ready(function(){
            $("#retailer").validate();
        })
    </script>
</head>
<body>
<?php
include "adminheader.php";
?>
<div class="container">

    <h1 style="text-align: center;font-weight: bold">RETAILER'S FORM</h1>
    <form id="retailer" action="insert_retailer.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            Enter First Name
            <input type="text" id="firstname" name="firstname" class="form-control" data-rule-required="true" data-msg-required="Enter first name" >
        </div>
        <div class="form-group">
            Enter Last Name
            <input type="text" id="lastname" name="lastname" class="form-control" data-rule-required="true" data-msg-required="Enter last name" >
        </div>
        <div class="form-group">
            Enter Company Name
            <input type="text" id="company_name" name="company_name" class="form-control" data-rule-required="true" data-msg-required="Enter company name" >
        </div>
        <div class="form-group">
            Enter Designation
            <input type="text" id="designation" name="designation" class="form-control" data-rule-required="true" data-msg-required="Enter designation" >
        </div>
        <div class="form-group">
            Enter Email Address
            <input type="text" id="email" name="email" class="form-control" data-rule-required="true" data-msg-required="Enter email" >
        </div>
        <div class="form-group">
            Enter Password
            <input type="password" id="password" name="password" class="form-control" data-rule-required="true" data-msg-required="Enter password" >
        </div>
        <div class="form-group">
            Confirm Password
            <input type="password" id="cpassword" name="cpassword" class="form-control" data-rule-required="true" data-msg-required="Enter password" >
        </div>
        <div class="form-group">
            Enter Mobile
            <input type="text" id="mobile" name="mobile" class="form-control" data-rule-required="true" data-msg-required="Enter mobile" data-number-required="true" >
        </div>
        <div class="form-group">
           Company Address
            <input type="text" class="form-control" id="company_address" name="company_address" data-rule-required="true" data-msg-required="Enter company address">
        </div>
        <div class="form-group">
            Country
            <input type="text" id="country" name="country" class="form-control" data-rule-required="true" data-msg-required="Enter country" >
        </div>
        <div class="form-group">
            State
            <input type="text" id="state" name="state" class="form-control" data-rule-required="true" data-msg-required="Enter state" >
        </div>
        <div class="form-group">
            City
            <input type="text" id="city" name="city" class="form-control" data-rule-required="true" data-msg-required="Enter city" >
        </div>
        <div class="form-group">
            Postcode
            <input type="text" id="postcode" name="postcode" class="form-control" data-rule-required="true" data-msg-required="Enter postcode" >
        </div>
        <div class="form-group">
            <input type="submit" value="SUBMIT" class="btn btn-success">
        </div>
        <div class="form-group">
            <?php
            if(isset($_REQUEST['er']))
            {
                $val=$_REQUEST['er'];
                if($val==1)
                {
                    echo "<span class='alert alert-danger'>Email already Exist</span>";
                }
                elseif ($val==2)
                {
                    echo "<span class='alert alert-danger'>Password and Confirm Passworsd does not Match</span>";
                }
                else
                {
                    echo "<span class='alert alert-success'>Retailer Added Successfully</span>";
                }
            }
            ?>
        </div>
    </form>

</div>

</html>