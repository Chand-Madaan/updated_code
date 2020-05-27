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
$s="select * from products WHERE product_id='".$_REQUEST["product_id"]."'";
include "connection.php";
$result=mysqli_query($conn,$s);

$row=mysqli_fetch_array($result);

?>

<div class="container">
    <form id="edit" method="post" action="edit_product_action.php">

        <div class="form-group">
            Product ID
            <input readonly type="text" value="<?php echo $_REQUEST["product_id"]?>" class="form-control" name="product_id" id="product_id" data-rule-required="true" data-msg-required="please enter the Product id">
        </div>

        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="product_name" value="<?php echo $row[2];?>"  placeholder= "Product Name" class="form-control" required/>
        </div>

        <div class="form-group">
            <label>Product Keywords</label>
            <input type="text" name="product_keywords" value="<?php echo $row[4];?>" placeholder= "Product keywords" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Product Price</label>
            <input type="text" name="product_price" value="<?php echo $row[5];?> " placeholder= "Product PRice" class="form-control" required/>
        </div>


        <div class="form-group">
            <input type="submit" value="submit" class=" btn btn-success">
        </div>
    </form>
</div>
</body>
</html>
