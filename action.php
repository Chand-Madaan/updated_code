<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "connection.php";
if(isset($_POST["category"])){
    $category_query = "SELECT * FROM categories";
    $run_query = mysqli_query($conn,$category_query) or die(mysqli_error($conn));
    echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Categories</h4></a></li>
	";
    if(mysqli_num_rows($run_query) > 0){
        while($row = mysqli_fetch_array($run_query)){
            $cid = $row["category_id"];
            $cat_name = $row["category_name"];
            echo "
					<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
        }
        echo "</div>";
    }
}

if(isset($_POST["page"])){
    $sql = "SELECT * FROM products";
    $run_query = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($run_query);
    $pageno = ceil($count/9);
    for($i=1;$i<=$pageno;$i++){
        echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
    }
}
if(isset($_POST["getProduct"])){
    $limit = 9;
    if(isset($_POST["setPage"])){
        $pageno = $_POST["pageNumber"];
        $start = ($pageno * $limit) - $limit;
    }else{
        $start = 0;
    }
    $u = 0;
    $product_query = "SELECT * FROM products where delete_status = 0 LIMIT $start,$limit";
    $run_query = mysqli_query($conn,$product_query);
    if(mysqli_num_rows($run_query) > 0){
        while($row = mysqli_fetch_array($run_query)){
            $pro_id    = $row['product_id'];
            $pro_cat   = $row['category_name'];
            $pro_title = $row['product_name'];
            $pro_price = $row['product_price'];
            $pro_image = $row['product_image'];
            echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
								</div>
								<div class='panel-heading'>$ $pro_price.00
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
								</div>
							</div>
						</div>	
			";
        }
    }
}
if(isset($_POST["get_seleted_Category"]) ||  isset($_POST["search"])){
    if(isset($_POST["get_seleted_Category"])){
        $id = $_POST["cat_id"];
        $sql = "SELECT * FROM products WHERE category_name = '$id' and delete_status = '0' " ;
    }else {
        $keyword = $_POST["keyword"];
        $sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'";
    }

    $run_query = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($run_query)){
        $pro_id    = $row['product_id'];
        $pro_cat   = $row['category_name'];
        $pro_title = $row['product_name'];
        $pro_image = $row['product_image'];
        $pro_price = $row['product_price'];
        echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
								</div>
								<div class='panel-heading'>$ $pro_price.00
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
								</div>
							</div>
						</div>	
			";
    }
}



if(isset($_POST["addToCart"])){


    $p_id = $_POST["proId"];


    if(isset($_SESSION["user_id"])){

        $user_id = $_SESSION["user_id"];

        $sql = "SELECT * FROM cart WHERE product_id = $p_id AND user_id = '$user_id'";
        $run_query = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($run_query);
        if($count > 0){
            echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping..!</b>
				</div>
			";//not in video
        } else {
            $sql = "INSERT INTO `cart`
			(`product_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ($p_id,'$ip_add','$user_id','1')";
            if(mysqli_query($conn,$sql)){
                echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added..!</b>
					</div>
				";
            }
        }
    }else{
        $sql = "SELECT cart_id FROM cart WHERE ip_add = '$ip_add' AND product_id = '$p_id' AND user_id = -1";
        $query = mysqli_query($conn,$sql);
        if (mysqli_num_rows($query) > 0) {
            echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is already added into the cart Continue Shopping..!</b>
					</div>";
            exit();
        }
        $sql = "INSERT INTO `cart`
			(`product_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','-1','1')";
        if (mysqli_query($conn,$sql)) {
            echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Your product is Added Successfully..!</b>
					</div>
				";
            exit();
        }

    }




}

//Count User cart item
if (isset($_POST["count_item"])) {
    //When user is logged in then we will count number of item in cart by using user session id
    if (isset($_SESSION["user_id"])) {
        $sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[user_id]";
    }else{
        //When user is not logged in then we will count number of item in cart by using users unique ip address
        $sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
    }

    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    echo $row["count_item"];
    exit();
}
//Count User cart item

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

    if (isset($_SESSION["user_id"])) {
        //When user is logged in this query will execute
        $sql = "SELECT a.product_id,a.product_name,a.product_image,a.product_price,b.cart_id,b.qty FROM products a,cart b WHERE a.product_id=b.product_id AND b.user_id='$_SESSION[user_id]'";
    }else{
        //When user is not logged in this query will execute
        $sql = "SELECT a.product_id,a.product_name,a.product_image,a.product_price,b.cart_id,b.qty FROM products a,cart b WHERE a.product_id=b.product_id AND b.ip_add='$ip_add' AND b.user_id < 0";
    }
    $query = mysqli_query($conn,$sql);
    if (isset($_POST["getCartItem"])) {
        //display cart item in dropdown menu
        if (mysqli_num_rows($query) > 0) {
            $n=0;
            while ($row=mysqli_fetch_array($query)) {
                $n++;
                $product_id = $row["product_id"];
                $product_name = $row["product_name"];
                $product_image = $row["product_image"];
                $product_price = $row["product_price"];
                $cart_item_id = $row["cart_id"];
                $qty = $row["qty"];
                echo '
					<div class="row">
						<div class="col-md-3">'.$n.'</div>
						<div class="col-md-3"><img class="img-responsive" src="product_images/'.$product_image.'" /></div>
						<div class="col-md-3">'.$product_name.'</div>
						<div class="col-md-3">$'.$product_price.'</div>
					</div>';

            }
            ?>
            <a style="float:right;" href="cart.php" class="btn btn-success">Place order&nbsp;&nbsp;</a>
            <?php
            exit();
        }
    }
    if (isset($_POST["checkOutDetails"])) {
        if (mysqli_num_rows($query) > 0) {
            //display user cart item with "Ready to checkout" button if user is not login
            echo "<form method='post' action='login_form.php'>";
            $n=0;
            while ($row=mysqli_fetch_array($query)) {
                $n++;
                $product_id = $row["product_id"];
                $product_name = $row["product_name"];
                $product_image = $row["product_image"];
                $product_price = $row["product_price"];
                $cart_item_id = $row["cart_id"];
                $qty = $row["qty"];

                echo
                    '<div class="row">
								<div class="col-md-2">
									<div class="btn-group">
										<a href="#" remove_id="'.$product_id.'" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#" update_id="'.$product_id.'" class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</div>
								</div>
								<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
								<input type="hidden" name="" value="'.$cart_item_id.'"/>
								<div class="col-md-2"><img class="img-responsive" src="product_images/'.$product_image.'"></div>
								<div class="col-md-2">'.$product_name.'</div>
								<div class="col-md-2"><input type="text" class="form-control qty" value="'.$qty.'" ></div>
								<div class="col-md-2"><input type="text" class="form-control price" value="'.$product_price.'" readonly="readonly"></div>
								<div class="col-md-2"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly"></div>
							</div>';
            }


            if(isset($_SESSION["user_id"])){
                echo '
						</form>
						<form action="payment_success.php" method="get">
							<input type="hidden" name="upload" value="1">';

                $x=0;
                $sql = "SELECT a.product_id,a.product_name,a.product_image,a.product_price,b.cart_id,b.qty FROM products a,cart b WHERE a.product_id=b.product_id AND b.user_id='$_SESSION[user_id]'";
                $query = mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($query)){
                    $x++;
                    echo
                        '<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_name"].'">
								  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
								     <input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
								     <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
                }

                echo
                    '
									<input type="hidden" name="custom" value="'.$_SESSION["user_id"].'"/>
									<input type="hidden" name="amount'.$x.'" value="'.$row["product_price"].'">
									 <input type="submit" style="float:right;" name="submit" class="btn btn-info btn-lg" value="order now" >
									</form>';
            }
            if (!isset($_SESSION["user_id"])) {
                echo '<input type="submit" style="float:right;" name="login_user_with_product" class="btn btn-info btn-lg" value="order now" >
							</form>';
            }
        }
    }


}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
    $remove_id = $_POST["rid"];
    if (isset($_SESSION["user_id"])) {
        $sql = "DELETE FROM cart WHERE product_id = '$remove_id' AND user_id = '$_SESSION[user_id]'";
    }else{
        $sql = "DELETE FROM cart WHERE product_id = '$remove_id' AND ip_add = '$ip_add'";
    }
    if(mysqli_query($conn,$sql)){
        echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
        exit();
    }
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
    $update_id = $_POST["update_id"];
    $qty = $_POST["qty"];
    if (isset($_SESSION["uid"])) {
        $sql = "UPDATE cart SET qty='$qty' WHERE product_id = '$update_id' AND user_id = '$_SESSION[user_id]'";
    }else{
        $sql = "UPDATE cart SET qty='$qty' WHERE product_id = '$update_id' AND ip_add = '$ip_add'";
    }
    if(mysqli_query($conn,$sql)){
        echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
        exit();
    }
}




?>






