<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Texas</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    

    <link rel="icon" href="res/title.png">
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php include "header.php"; ?>

            <?php

            require "config.php";

            if (isset($_SESSION["u"])) {

                $email = $_SESSION["u"]["email"];

                // cart_read
                $q =  "SELECT * FROM `user` WHERE `email`='".$email."'";
                $urs = mysqli_query($conn, $q);

                $q2 = "SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'";
                $image_rs = mysqli_query($conn, $q2);

                $q3 = "SELECT * FROM `user_has_address` INNER JOIN `city` ON 
                user_has_address.city_id=city.id INNER JOIN `district` ON 
                city.district_id=district.id INNER JOIN `province` ON 
                district.province_id=province.id WHERE `user_email`='" . $email . "'";
                $address_rs = mysqli_query($conn, $q3);

                $data = $urs->fetch_assoc();
                $image_data = $image_rs->fetch_assoc();
                $address_data = $address_rs->fetch_assoc();


            ?>

                <div class="col-12 bg-primary mt-4">
                    <div class="row">

                        <div class="col-12 bg-body rounded mt-4 mb-4">
                            <div class="row g-2">

                                <div class="col-md-3 border-end">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                                        <?php

                                        if (empty($image_data["path"])) {

                                        ?>
                                            <img src="res/newuser.svg" class="rounded-circle mt-5" style="width: 150px;" id="viewImg" />
                                        <?php

                                        } else {

                                        ?>
                                            <img src="<?php echo $image_data["path"]; ?>" class="rounded mt-5" style="width: 150px;" id="viewImg" />
                                        <?php

                                        }

                                        ?>



                                        <span class="fw-bold"><?php echo $data["fname"] . " " . $data["lname"]; ?></span>
                                        <span class="fw-bold text-black-50"><?php echo $email; ?></span>

                                        <input type="file" class="d-none" id="profileimg" accept="image/*" />
                                        <label for="profileimg" class="btn btn-primary mt-5" onclick="changeImage();">Update Profile Image</label>

                                    </div>
                                </div>

                                <div class="col-md-5 border-end">
                                    <div class="p-3 py-5">

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="fw-bold">Profile Settings</h4>
                                        </div>

                                        <div class="row mt-4">

                                            <div class="col-6">
                                                <label class="form-label">First Name</label>
                                                <input type="text" class="form-control" value="<?php echo $data["fname"]; ?>" id="fname" />
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" class="form-control" value="<?php echo $data["lname"]; ?>" id="lname" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Mobile</label>
                                                <input type="text" class="form-control" value="<?php echo $data["mobile"]; ?>" id="mobile" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" readonly value="<?php echo $data["password"]; ?>" />
                                                    <span class="input-group-text bg-primary" id="basic-addon2">
                                                        <i class="bi bi-eye-slash-fill text-white"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" readonly value="<?php echo $data["email"]; ?>" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Registered Date</label>
                                                <input type="text" class="form-control" readonly value="<?php echo $data["joined_date"]; ?>" />
                                            </div>

                                            <?php

                                            if (!empty($address_data["line1"])) {

                                            ?>

                                                <div class="col-12">
                                                    <label class="form-label">Address Line 1</label>
                                                    <input type="text" class="form-control" value="<?php echo $address_data["line1"]; ?>" id="line1" />
                                                </div>

                                            <?php

                                            } else {
                                            ?>

                                                <div class="col-12">
                                                    <label class="form-label">Address Line 1</label>
                                                    <input type="text" class="form-control" id="line1" />
                                                </div>

                                            <?php
                                            }

                                            if (!empty($address_data["line2"])) {

                                            ?>
                                                <div class="col-12">
                                                    <label class="form-label">Address Line 2</label>
                                                    <input type="text" class="form-control" value="<?php echo $address_data["line2"]; ?>" id="line2" />
                                                </div>
                                            <?php

                                            } else {
                                            ?>
                                                <div class="col-12">
                                                    <label class="form-label">Address Line 2</label>
                                                    <input type="text" class="form-control" id="line2" />
                                                </div>
                                            <?php
                                            }
                                            $q4 = "SELECT * FROM `province`";
                                            $province_rs = mysqli_query($conn, $q4);

                                            $q5 = "SELECT * FROM `district`";
                                            $district_rs =  mysqli_query($conn, $q5);
                                            ?>

                                            <div class="col-6">
                                                <label class="form-label">Province</label>
                                                <select class="form-select" id="province">
                                                    <option value="0">Select Province</option>
                                                    <?php
                                                    $province_num = $province_rs->num_rows;
                                                    for ($x = 0; $x < $province_num; $x++) {
                                                        $province_data = $province_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $province_data["id"]; ?>" <?php
                                                                                                              if (!empty($address_data["province_id"])) {

                                                                                                                if ($province_data["id"] == $address_data["province_id"]) {
                                                                                                            ?>
                                                                                                              selected
                                                                                                            <?php
                                                                                                                    }
                                                                                                                }

                                                                                                            ?> 
                                                                                                            > 
                                                                                                            <?php echo $province_data["name"]; ?>
                                                                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">District</label>
                                                <select class="form-select" id="district">
                                                    <option value="0">Select District</option>
                                                    <?php
                                                    $district_num = $district_rs->num_rows;
                                                    for ($x = 0; $x < $district_num; $x++) {
                                                        $district_data = $district_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $district_data["id"]; ?>" <?php
                                                                                                            if (!empty($address_data["district_id"])) {
                                                                                                                if ($district_data["id"] == $address_data["district_id"]) {
                                                                                                            ?>
                                                                                                            selected
                                                                                                            <?php
                                                                                                                    }
                                                                                                                }
                                                                                                                        ?>
                                                                                                                        >
                                                                                                                        <?php echo $district_data["name"]; ?>
                                                                                                                    </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">City</label>
                                                <select class="form-select" id="city">
                                                    <option value="0">Select City</option>
                                                    <?php

                                                    $q6 = "SELECT * FROM `city`";
                                                    $city_rs = mysqli_query($conn, $q6);
                                                    $city_num = $city_rs->num_rows;
                                                    
                                                    for ($x = 0; $x < $city_num; $x++) {
                                                        $city_data = $city_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $city_data["id"]; ?>" <?php
                                                                                                        if (!empty($address_data["city_id"])) {
                                                                                                            if ($city_data["id"] == $address_data["city_id"]) {
                                                                                                        ?>
                                                                                                        selected
                                                                                                        <?php
                                                                                                                }
                                                                                                            }
                                                                                                                    ?>
                                                                                                                    >
                                                                                                                    <?php echo $city_data["name"]; ?>
                                                                                                                </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <?php


                                                if (!empty($data["gender"])) {

                                                ?>
                                                <div class="col-12">
                                                    <label class="form-label">Gender</label>
                                                    <input type="text" class="form-control" value="<?php echo $data["gender"] ?>" readonly />
                                                </div>
                                            <?php

                                                } else {
                                            ?>
                                                <div class="col-12">
                                                    <label class="form-label">Gender</label>
                                                    <input type="text" class="form-control" readonly />
                                                </div>
                                            <?php
                                                }
                                            ?>

                                            <div class="col-12 d-grid mt-3">
                                                <button class="btn btn-primary" onclick="updateProfile();">Update My Profile</button>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                

                            </div>
                        </div>

                    </div>
                </div>

            <?php

            } else {
                echo "<script>  
                   alert('Please Log In First !!')
                   window.location('index.php')
                </script>";
                ?>
                
                <a href="login.php"><p class="fs-2 text-danger mt-3">Please Log In First !!</p></a>

                <?php
                // header("Location:index.php");

            }

            ?>



            <?php include "footer.php"; ?>

        </div>
    </div>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/script.js"></script>
</body>

</html>