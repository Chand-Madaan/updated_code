<?php
include "connection.php";
?>
<?php
include 'adminheader.php';
?>
<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
<form action="add_category_process.php" method="post">
    <div class="login-panel panel panel-default">
    <div class="panel-heading"><h2>ADD CATEGORY</h2></div>
    <div class="panel-body">
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="category_name" placeholder="Enter the category" class="form-control" required/>
        </div>
    </div>
<div class="panel-footer">
    <div class="form-group">
        <a href="category.php" class="btn btn-danger btn-sm">CANCEL</a>
        <input type="submit" name="add" value="add" class="btn btn-success btn-sm"/>
    </div>
</div>
</div>
</div>
</form>
</div>