<html>
<head>
</head>
</html>
<?php include 'connection.php'; ?>
<?php

$sql="SELECT * FROM user_info  ";
$result = $conn->query($sql);
$i= 1;

?>
<?php include 'adminheader.php'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Retailers</h1>
    </div>
</div>
<?php
if(isset($_GET['err']))
{
    echo "<div class = ''><h3>".htmlspecialchars($_GET['err'])."</h3></div><br>";
}?>
<div class="page-action-links text-right">
    <a href="customer_registration.php?operation=create">
        <button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add New Retailer </button>
    </a>
</div>
<br>
<div class="panel panel-container">
    <table class="table table-hover table-bordered table-condensed">

        <thead>
        <tr>
            <th class="header">Sr.No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Company Name</th>
            <th>Company Address</th>
            <th>Trading Name</th>
            <th>ABN</th>
            <th>Edit</th>
            <th>Accept</th>
            <th>Reject</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $row) : ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['company_name']); ?></td>
                <td><?php echo htmlspecialchars($row['company_address']); ?></td>
                <td><?php echo htmlspecialchars($row['trading_name']); ?></td>
                <td><?php echo htmlspecialchars($row['ABN']); ?></td>
                <td>
                    <a href="edit_retailer.php?user_id=<?php echo $row['user_id'] ?>&operation=edit" class="btn btn-primary" onclick="myFunction()" style="margin-right: 8px;"><span class="glyphicon glyphicon-pencil"></span>
                </td>
                <td>
                    <a href="view_notification.php?user_id=<?php echo $row['user_id'] ?> class="btn btn-success" style="margin-right: 8px;"><span class="glyphicon glyphicon-ok" name="accept" id="accept"></span>
                </td>
                <td>
                    <a href="view_notification_reject.php?user_id=<?php echo $row['user_id'] ?> class="btn btn-danger" style="margin-right: 8px;"><span class="glyphicon glyphicon-remove" name="reject" id="reject"></span>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>

