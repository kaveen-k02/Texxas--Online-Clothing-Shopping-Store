<?php

session_start();

require "config.php";

if(isset($_SESSION["u"])){
    $feedback = $_POST["fb"];

    // feedback_update
    $feedback_update = "UPDATE `feedback` SET `feedback` = '".$feedback."'";
    mysqli_query($conn,$feedback_update);

    echo ("successfully Updated Your Feedback");
}else{
    echo ("Please login first");
}

?>