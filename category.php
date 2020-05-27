<?php include 'connection.php'; ?>
<?php
$sql="SELECT * FROM categories";
$result = $conn->query($sql);
$i= 1;

?>
<?php include 'adminheader.php'; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Categories</h1>
        </div>
    </div><!--/.row-->
    <div class="page-action-links text-right">
        <a href="add_category.php?operation=create">
            <button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add new </button>
        </a>
    </div>
    <br>
    <div class="panel panel-container">
        <table class="table table-hover table-bordered table-condensed">

            <thead>
            <tr>
                <th class="header">Sr.No</th>
                <th>Category ID</th>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $row) : ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo htmlspecialchars($row['category_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['category_name']); ?></td>
                    <td>
                        <a href="edit_category.php?category_id=<?php echo $row['category_id'] ?>&operation=edit" class="btn btn-danger" style="margin-right: 8px;"><span class="glyphicon glyphicon-pencil"></span>
                    </td>
                    <td>
                        <a href="delete_category.php?category_id=<?php echo $row['category_id'] ?>&operation=delete" class="btn btn-danger" onclick="return confirm('Are You Sure to delete')" style="margin-right: 8px;"><span class="glyphicon glyphicon-trash"></span>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
