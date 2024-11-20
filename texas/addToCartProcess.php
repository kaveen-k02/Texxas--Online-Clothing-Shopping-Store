<?php

session_start();
require "config.php";

if(isset($_SESSION["u"])){
if(isset($_GET["id"])){

    $pid = $_GET["id"];
    $umail = $_SESSION["u"]["email"];

    $q = "SELECT * FROM `cart` WHERE `product_id`='".$pid."' AND `user_email`='".$umail."'";
    $cart_rs = mysqli_query($conn,$q);
    $cart_num = $cart_rs->num_rows;

    $q2 = "SELECT * FROM `product` WHERE `id`='".$pid."'";
    $product_rs = mysqli_query($conn,$q2);
    $product_data = $product_rs->fetch_assoc();

    $product_qty = $product_data["qty"];

    if($cart_num == 1){
        $cart_data = $cart_rs->fetch_assoc();
        $current_qty = $cart_data["qty"];
        $new_qty = (int)$current_qty + 1;

        if($product_qty >= $new_qty){

            // cart_update
            $q3 = "UPDATE `cart` SET `qty`='".$new_qty."' WHERE `product_id`='".$pid."' AND `user_email`='".$umail."'";
            mysqli_query($conn,$q3);
            echo ("Update Finished");

        }else{
            echo ("Invalid Quantity");
        }
    }else{

        // cart_insert
        $q4 = "INSERT INTO `cart`(`product_id`,`user_email`,`qty`) VALUES ('".$pid."','".$umail."','1')";
        mysqli_query($conn,$q4);
        echo ("New Product added to the Cart");

    }

}else{
    echo ("Something Went Wrong");
}
}else{
    echo ("Please Log In or Sign Up");
}

?>