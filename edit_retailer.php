<!doctype html>
<html lang="en">
<head>
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script>
        $(document).ready(function () {
            $("#edit").validate();
        })
    </script>
</head>
<body>
<?php
include 'adminheader.php';
?>
<?php
$s="select * from user_info WHERE user_id='".$_REQUEST["user_id"]."'";
include "connection.php";
$result=mysqli_query($conn,$s);

$row=mysqli_fetch_array($result);

?>

<div class="container">
    <form id="edit" method="post" action="edit_retailer_action.php">

        <div class="form-group">
            User ID
            <input readonly type="text" value="<?php echo $_REQUEST["user_id"]?>" class="form-control" name="user_id" id="user_id" data-rule-required="true" data-msg-required="please enter the Product id">
        </div>

        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="f_name" value="<?php echo $row[1];?>"  placeholder= "First Name" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="l_name" value="<?php echo $row[2];?>"  placeholder= "Last Name" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $row[3];?>"  placeholder= "Email" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Company Name</label>
            <input type="text" name="company_name" value="<?php echo $row[5];?>" placeholder= "Company Name" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Company Address</label>
            <input type="text" name="company_address" value="<?php echo $row[6];?>" placeholder= "Company Address" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Trading Name</label>
            <input type="text" name="trading_name" value="<?php echo $row[7];?>" placeholder= "Trading Name" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>ABN</label>
            <input type="text" name="ABN" value="<?php echo $row[8];?> " placeholder= "ABN" class="form-control" required/>
        </div>


        <div class="form-group">
            <input type="submit" value="submit" class=" btn btn-success">
        </div>
    </form>
</div>
</body>
</html>
