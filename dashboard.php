<?php include 'adminheader.php'; ?>
<?php include 'connection.php'; ?>
<?php
$result = $conn->query("SELECT count(order_id) AS total FROM Orders");
$row = $result->fetch_assoc();
$total = $row['total'];

$result1 = $conn->query("SELECT count(order_id) AS new FROM Orders where admin_status = '' ");
$row1 = $result1->fetch_assoc();
$new = $row1['new'];

$result2 = $conn->query("SELECT count(order_id) AS delieverd FROM Orders where admin_status = '0' ");
$row2 = $result2->fetch_assoc();
$delieverd = $row2['delieverd'];

$result3 = $conn->query("SELECT count(order_id) AS cancel FROM Orders where admin_status = '1' ");
$row3 = $result3->fetch_assoc();
$cancel = $row3['cancel'];
?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div><!--/.row-->

    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
                        <div class="large"><?php echo $total; ?></div>
                        <div class="text-muted">Total Orders</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-ban color-blue"></em>
                        <div class="large"><?php echo $new; ?></div>
                        <div class="text-muted">Pending Orders</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-check color-blue"></em>
                        <div class="large"><?php echo $delieverd; ?></div>
                        <div class="text-muted">Delievered Orders</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-times color-blue"></em>
                        <div class="large"><?php echo $cancel; ?></div>
                        <div class="text-muted">Cancelled Orders</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>

