<?php

session_start();

require "config.php";

if (isset($_SESSION["u"])) {

    $fname = $_POST["fn"];
    $lname = $_POST["ln"];
    $mobile = $_POST["m"];
    $line1 = $_POST["l1"];
    $line2 = $_POST["l2"];
    $province = $_POST["p"];
    $district = $_POST["d"];
    $city = $_POST["c"];

    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];

        $allowed_image_extentions = array ("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        $file_ex = $image["type"];

        if (!in_array($file_ex, $allowed_image_extentions)) {
            echo ("Please select a valid image.");
        } else {

            $new_file_extention;

            if ($file_ex == "image/jpg") {
                $new_file_extention = ".jpg";
            } else if ($file_ex == "image/jpeg") {
                $new_file_extention = ".jpeg";
            } else if ($file_ex == "image/png") {
                $new_file_extention = ".png";
            } else if ($file_ex == "image/svg+xml") {
                $new_file_extention = ".svg";
            }

            $file_name = "res/profileimg/" . $_SESSION["u"]["fname"] . "_" . uniqid() . $new_file_extention;

            move_uploaded_file($image["tmp_name"], $file_name);

            $q = "SELECT * FROM `profile_image` WHERE 
            `user_email`='" . $_SESSION["u"]["email"] . "'";
            $image_rs = mysqli_query($conn,$q);
            $image_num = $image_rs->num_rows;

            if ($image_num == 1) {

                $img_update = "UPDATE `profile_image` SET `path`='" . $file_name . "' WHERE 
                `user_email`='" . $_SESSION["u"]["email"] . "'";
                mysqli_query($conn,$img_update);
            } else {

                $img_insert = "INSERT INTO `profile_image` (`path`,`user_email`) VALUES 
                ('" . $file_name . "','" . $_SESSION["u"]["email"] . "')";
                mysqli_query($conn,$img_insert);
            }
        }
    }
    // user_update
    $user_update = "UPDATE `user` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`mobile`='" . $mobile . "' 
            WHERE `email`='" . $_SESSION["u"]["email"] . "'";
    mysqli_query($conn,$user_update);

    echo ("success");
} else {
    echo ("Please login first");
}
