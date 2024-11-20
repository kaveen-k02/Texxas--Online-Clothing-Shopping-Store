<?php

require "config.php";

if(isset($_GET["id"])){

    $cid = $_GET["id"];

    $q = "SELECT * FROM `cart` WHERE `id`='".$cid."'";
    $cart_rs = mysqli_query($conn,$q);
    $cart_data = $cart_rs->fetch_assoc();

    $umail = $cart_data["user_email"];
    $pid = $cart_data["product_id"];

    // cart_delete
    $q2 = "DELETE FROM `cart` WHERE `id`='".$cid."'";
    mysqli_query($conn,$q2);

    echo ("Product has been removed");

}else{
    echo ("something went wrong");
}

?>