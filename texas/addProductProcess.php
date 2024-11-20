<?php
session_start();
require "config.php";

$email = $_SESSION["admin"]["email"];
$category = $_POST["ca"];
$mat = $_POST["mat"];
$title = $_POST["t"];
$clr = $_POST["col"];
$qty = $_POST["qty"];
$cost = $_POST["cost"];
$desc = $_POST["desc"];

if ($category == "0") {
    echo ("Please select a Category");
} else if ($mat == "0") {
    echo ("Please provide Material");
} else if (empty($title)) {
    echo ("Please add the Title");
} else if (strlen($title) >= 100) {
    echo ("Title should have less than 100 characters");
} else if ($clr == "0") {
    echo ("Please select a Colour");
} else if (empty($qty)) {
    echo ("Please add the Quantity");
} else if ($qty == "0" || $qty == "e" || $qty < 0) {
    echo ("Invalid value for field Quantity");
} else if (empty($cost)) {
    echo ("Please add the Cost");
} else if (!is_numeric($cost)) {
    echo ("Invalid value for field Cost Per Item");
} else if (empty($desc)) {
    echo ("Please add the Description");
} else {

    $allowed_image_extensions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

    if (isset($_FILES["image"])) {
        $image_file = $_FILES["image"];
        $file_extension = $image_file["type"];

        if (in_array($file_extension, $allowed_image_extensions)) {
            $new_img_extension;

            if ($file_extension == "image/jpg") {
                $new_img_extension = ".jpg";
            } else if ($file_extension == "image/jpeg") {
                $new_img_extension = ".jpeg";
            } else if ($file_extension == "image/png") {
                $new_img_extension = ".png";
            } else if ($file_extension == "image/svg+xml") {
                $new_img_extension = ".svg";
            }

            $file_name = "res/product/" . $title . "_" . uniqid() . $new_img_extension;

            if (move_uploaded_file($image_file["tmp_name"], $file_name)) {
                $d = new DateTime();
                $tz = new DateTimeZone("Asia/Colombo");
                $d->setTimezone($tz);
                $date = $d->format("Y-m-d H:i:s");

                // product_create
                $q = "INSERT INTO `product`(`price`, `qty`, `title`, `description`, `category_id`, `material`, `code`, `datetime_added`, `admin_email`) 
                      VALUES ('" . $cost . "','" . $qty . "','" . $title . "','" . $desc . "','" . $category . "','" . $mat . "','" . $file_name . "','" . $date . "','" . $email . "')";

                if (mysqli_query($conn, $q)) {
                    echo ("Product Added Successfully.");
                } else {
                    echo ("Error: " . mysqli_error($conn));
                }
            } else {
                echo ("Error uploading the image.");
            }
        } else {
            echo ("Not an allowed image type");
        }
    } else {
        echo ("No image selected.");
    }
}
?>
