<?php include 'connection.php'; ?>

<?php
if(isset($_POST['add'])){
    $category_name = $_POST["category_name"];
    $product_name = $_POST["product_name"];
    $target_dir = "product_images/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $product_keywords = $_POST["product_keywords"];
    $product_price = $_POST["product_price"];
    $delete_status = 0;
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG") {
        header("Location:add_product.php?err=" .urldecode('Problem in picture'));
    }
    else {
        $fileName = $_FILES["img"]["name"];
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_dir.$fileName))
        {
            $profileImage = $fileName;




            $sql = "INSERT INTO products (category_name,product_name,product_image,product_keywords,product_price,delete_status) VALUES "."('".$category_name."','".$product_name."','".$profileImage."','".$product_keywords."','".$product_price."','".$delete_status."')";
           if(mysqli_query($conn, $sql)==TRUE)
           {
               header('location:manage_products.php?err=' .urldecode('New Product added sucessfully'));
           }

            else
            {
                header('location:add_product.php');
            }


        }

    }

    $conn->close();
}
?>