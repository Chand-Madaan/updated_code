<?php include 'connection.php'; ?>
<?php

$sql="SELECT * FROM products  ";
$result = $conn->query($sql);
$i= 1;

?>
<?php include 'adminheader.php'; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Products</h1>
        </div>
    </div>
<?php
if(isset($_GET['err']))
{
    echo "<div class = ''><h3>".htmlspecialchars($_GET['err'])."</h3></div><br>";
}?>
    <div class="page-action-links text-right">
        <a href="add_product.php?operation=create">
            <button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add new </button>
        </a>
    </div>
    <br>
    <div class="panel panel-container">
        <table class="table table-hover table-bordered table-condensed">

            <thead>
            <tr>
                <th class="header">Sr.No</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product price</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $row) : ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                    <td><img src='product_images/<?php echo htmlspecialchars($row['product_image']); ?> ' height = 60 width = 80 ></td>
                    <td> $ <?php echo htmlspecialchars($row['product_price']); ?></td>
                    <td>
                        <a href="edit_product.php?product_id=<?php echo $row['product_id'] ?>&operation=edit" class="btn btn-danger" style="margin-right: 8px;"><span class="glyphicon glyphicon-pencil"></span>
                    </td>
                    <td>
                        <a href="delete_product.php?product_id=<?php echo $row['product_id'] ?>&operation=delete" class="btn btn-danger" onclick="return confirm('Are You Sure to delete')" style="margin-right: 8px;"><span class="glyphicon glyphicon-trash"></span>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>

