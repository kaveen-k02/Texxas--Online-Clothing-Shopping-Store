<?php

require "config.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$mobile = $_POST["mobile"];
$gender = $_POST["gender"];

$rs =  "SELECT * FROM user WHERE email = '$email' OR mobile = '$mobile'";
$validate = mysqli_query($conn, $rs);
$r = $validate->num_rows;

if ($r > 0) {
    echo '<script language="javascript" type="text/javascript">
    alert("User already exists");
    window.location = "login.php";
    </script>';
} else {

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    // customer_create
    $insert = "INSERT INTO user 
    (`fname`,`lname`,`email`,`password`,`mobile`,`joined_date`,`gender`)
    VALUES ('$fname','$lname','$email','$password','$mobile',
    '$date','$gender')";

    $result = mysqli_query($conn, $insert);

    if ($result) {

        echo '<script language="javascript" type="text/javascript">
alert("successfully Inserted");
window.location = "index.php";
</script>';
    } else {
        echo '<script language="javascript" type="text/javascript">
    alert("Error");
    window.location = "signup.php";
    </script>';
    }
}




mysqli_close($conn);
