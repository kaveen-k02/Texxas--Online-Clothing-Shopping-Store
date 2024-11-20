<?php

session_start();

require "config.php";

$mail = $_POST["e"];
$pass = $_POST["p"];

$q = "SELECT * FROM `user` WHERE `email`= '".$mail."' AND `password` = '".$pass."' ";
$rs = mysqli_query($conn,$q);

$n = $rs->num_rows;

if($n == 1){
    echo("success");

    $d = $rs->fetch_assoc();
    $_SESSION["u"] = $d;

}else{
    echo("Invalid Email or Password");
}
?>