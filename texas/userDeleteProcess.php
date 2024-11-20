<?php

require "config.php";


if(isset($_GET["email"])){

    $user_email = $_GET["email"];

    $delete_from_address = "DELETE FROM `user_has_address` WHERE `user_email`= '".$user_email."'";
    mysqli_query($conn,$delete_from_address);

    $delete_from_profileimg = "DELETE FROM `profile_image` WHERE `user_email`= '".$user_email."'";
    mysqli_query($conn,$delete_from_profileimg);

    $delete_use_from_feedback = "DELETE FROM `feedback` WHERE `user_email`= '".$user_email."'";
    mysqli_query($conn,$delete_use_from_feedback);

    $delete_user_from_cart = "DELETE FROM `cart` WHERE `user_email`= '".$user_email."'";
    mysqli_query($conn,$delete_user_from_cart);

    // user_delete
    $delete_from_user = "DELETE FROM `user` WHERE `email` = '".$user_email."'";
    mysqli_query($conn,$delete_from_user);

    echo ("User has removed Successfully");

}else{
    echo ("something went wrong");
}

?>