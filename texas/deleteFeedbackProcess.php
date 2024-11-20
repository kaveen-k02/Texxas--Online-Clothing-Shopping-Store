<?php

require "config.php";

if(isset($_GET["id"])){

    $pid = $_GET["id"];

    // feedback_delete
    $q1 = "DELETE FROM `feedback` WHERE `product_id`='".$pid."'";
    mysqli_query($conn,$q1);
    
    

    echo ("Your FeedBack has been removed");

}else{
    echo ("something went wrong");
}

?>