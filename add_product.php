<?php include 'connection.php'; ?>
<?php

$sql="SELECT * FROM categories";
$result = $conn->query($sql);
?>
<?php include 'adminheader.php'; ?>
<?php
if(isset($_GET['err']))
{
    echo "<font color='red'><h4 align='center'>".htmlspecialchars($_GET['err'])."<h4></font>";
}
?>
    <br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="add_product_process.php" method="post" enctype="multipart/form-data">
                <div class="panel panel-info">

                    <div class="panel-heading">Add Product</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <select id="" name="category_name" class="form-control">
                                <option value="0">Select Category</option>
                                <?php
                                while($row = $result->fetch_assoc()) {
                                    ?>
                                    <option value='<?php echo $row['category_id']; ?>'><?php echo $row['category_name']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="product_name" placeholder= "Product Name" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label>Product image</label>
                            <input type="file" name="img" id="fileToUpload" class="img-responsive">
                        </div>
                        <div class="form-group">
                            <label>Product Keywords</label>
                            <input type="text" name="product_keywords" placeholder= "Product keywords" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="text" name="product_price" placeholder= "Product PRice" class="form-control" required/>
                        </div>


                    </div>
                    <div class ="panel-footer" >
                        <div class="form-group">
                            <a href="manage_products.php" class="btn btn-danger btn-sm">Cancel</a>
                            <input type="submit" name="add" value="Add" class="btn btn-success btn-sm"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

