<?php

require "config.php";

$title = $_POST["title"];
$price = $_POST["price"];
$pid = $_POST["pid"];
$qty = $_POST["qty"];
$doubleValue = floatval($price);

// product_update
$product_update = "UPDATE product SET title='" . $title . "', price='".$doubleValue."' , qty='".$qty."' WHERE id='".$pid."'";
mysqli_query($conn, $product_update);


echo ("successfully Updated");
