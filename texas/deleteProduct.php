<?php

require "config.php";

if(isset($_GET["id"])){

    $pid = $_GET["id"];

    $q1 = "DELETE FROM `feedback` WHERE `product_id`='".$pid."'";
    mysqli_query($conn,$q1);
    
    // product_delete
    $q2 = "DELETE FROM `product` WHERE `id`='".$pid."'";
    mysqli_query($conn,$q2);

    echo ("Product has been Deleted");

}else{
    echo ("something went wrong");
}

?>