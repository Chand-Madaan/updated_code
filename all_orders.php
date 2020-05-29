<?php include 'connection.php'; ?>
<?php include 'adminheader.php'; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All orders</h1>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">

            <?php
            $orders_list = "SELECT  o.admin_status,o.user_id,o.order_id,o.user_id,o.product_id,o.qty,o.p_status,p.product_name,p.product_price,p.product_image,u.first_name,u.last_name,u.company_name,u.company_address FROM orders o,products p,user_info u WHERE  o.product_id=p.product_id and o.user_id=u.user_id ";
            $result = $conn->query($orders_list);
            $i= 1;
            if (mysqli_num_rows($result) > 0) {
                while ($row=mysqli_fetch_array($result)) {
                    ?>
                    <div class="row">
                        <div class="col-md-2">
                            <?php echo $i++; ?>
                            <img style="float:right;" src="product_images/<?php echo $row['product_image']; ?>" class="img-responsive img-thumbnail" height = 60 width = 80 >
                        </div>
                        <div class="col-md-4">
                            <table>
                                <tr><td>Product Name</td><td><b><?php echo $row["product_name"]; ?></b> </td></tr>
                                <tr><td>Product Price</td><td><b><?php echo " $ ".$row["product_price"]; ?></b></td></tr>
                                <tr><td>Quantity</td><td><b><?php echo $row["qty"]; ?></b></td></tr>
                                <tr><td>Total amount</td><td><b> $ <?php echo $row["qty"] * $row["product_price"] ?></b></td></tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table>
                                <tr><td>Retailer Name: </td> <td><?php echo $row["first_name"]; ?><?php echo $row["last_name"]; ?> </td></tr>
                                <tr><td>Company Name: </td><td><b><?php echo $row["company_name"]; ?></b></td></tr>
                                <tr><td> Company Address: </td><td><b><?php echo $row["company_address"]; ?> </b></td></tr>
                            </table>

                        </div>
                        <div class="col-md-2">
                            <table>
                                <tr>
                                    <td>
                                        <?php if($row['admin_status'] == '' ) { ?>
                                        <?php echo "Pending"; ?>
                                    </td>
                                    <?php } ?>
                                    <td>
                                        <?php if($row['admin_status'] == '0' ) { ?>
                                        <?php echo "Delieverd"; ?>
                                    </td>
                                <?php } ?>
                                    <td>
                                        <?php if($row['admin_status'] == '1' ) { ?>
                                        <?php echo "Cancelled"; ?>
                                    </td>
                                <?php } ?>
                                    <td>
                                       <button><a href="reorder_success.php"   style="margin-right: 8px;"> Reorder</button>
                                    </td>
                            </table>
                        </div>
                    </div>

                    <?php

                }
            }
            ?>

        </div>
        <div class="panel-footer"></div>
    </div>

