<?php

session_start();

require "config.php";

$mail = $_POST["ae"];
$pass = $_POST["ap"];

$q = "SELECT * FROM `admin` WHERE `email`= '".$mail."' AND `pass` = '".$pass."' ";
$rs = mysqli_query($conn,$q);

$n = $rs->num_rows;

if($n == 1){
    echo("success");

    $d = $rs->fetch_assoc();
    $_SESSION["admin"] = $d;

}else{
    echo("Invalid Email or Password");
}
?>