<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Feedbacks | Texas</title>
    <!-- bootsrap css & icons -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- bootsrap css & icons -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- font-awesom icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <!-- font-awesom icons -->


    <link rel="icon" href="res/title.png">

</head>

<body style="background-color: #C0C0C0;">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 bg-light text-center">
                <label class="form-label text-secondary fw-bold fs-1">My Feedbacks</label>
            </div>



            <div class="col-12 mt-3 mb-3 mx-5">
                <div class="row">
                    <div class="col-2 d-none d-lg-block bg-light py-2">
                        <span class="fs-4 fw-bold text-primary">Product Image</span>
                    </div>
                    <div class="col-4 col-lg-2 bg-warning py-2">
                        <span class="fs-4 fw-bold text-dark">Title</span>
                    </div>
                    <div class="col-4 col-lg-4 d-lg-block bg-light py-2">
                        <span class="fs-4 fw-bold text-primary">My Feedbacks</span>
                    </div>
                    <div class="col-1 d-none d-lg-block bg-warning py-2">
                        <span class="fs-4 fw-bold text-dark">Type</span>
                    </div>

                    <div class="col-2 col-lg-2 bg-white"></div>
                </div>
            </div>

            <?php
            session_start();
            require "config.php";

            $uemail = $_SESSION["u"]["email"];
            $pid = $_GET["id"];

            // feedback_read
            $q2 = "SELECT * FROM `feedback` WHERE `product_id`='" . $pid . "' AND `user_email` ='" . $uemail . "'";
            $feedback_rs = mysqli_query($conn, $q2);
            $feedback_num = $feedback_rs->num_rows;

            $q = "SELECT * FROM `product` WHERE `id` ='".$pid."'";
            $product_rs = mysqli_query($conn, $q);
            

            for ($x = 0; $x < $feedback_num; $x++) {
                $product_data = $product_rs->fetch_assoc();
                $feedback_data = $feedback_rs->fetch_assoc();

            ?>

                <div class="col-12 mt-3 mb-3 mx-5">
                    <div class="row">
                        
                        <?php



                        ?>
                        <div class="col-2 d-none d-lg-block bg-light py-2">
                            <img src="<?php echo $product_data["code"]; ?>" style="height: 40px;margin-left: 80px;" />
                        </div>
                        <div class="col-4 col-lg-2 bg-warning py-2">
                            <span class="fs-4 fw-bold text-dark"><?php echo $product_data["title"]; ?></span>
                        </div>
                        <div class="col-4 col-lg-4 d-lg-block bg-light py-2 ">

                            <input type="text" class="form-control fs-5 border border-2 h-100 border-primary" value="<?php echo $feedback_data["feedback"]; ?>" id="feedback" />
                        </div>
                        <div class="col-1 d-none d-lg-block bg-warning py-2">
                            <?php
                            if ($feedback_data["type"] == 1) {
                            ?>
                                <span class="badge bg-success fs-5">Positive</span>

                            <?php
                            } else if ($feedback_data["type"] == 2) {
                            ?>
                                <span class="badge bg-secondary fs-5">Neutral</span>

                            <?php
                            } else if ($feedback_data["type"] == 3) {
                            ?>
                                <span class="badge bg-danger fs-5">Negative</span>

                            <?php
                            }
                            ?>
                        </div>

                        <div class="col-2 col-lg-2 bg-white py-2 d-grid">
                            <button class="btn btn-success mb-2" onclick="updateFeedback();">Update</button>
                            <button  class="btn btn-danger " onclick="deleteFeedback('<?php echo $product_data['id']; ?>');">Delete</button>

                        </div>
                    </div>

                <?php

            }

                ?>



                </div>
        </div>

        <!-- bootstrap js -->
        <script src="js/bootstrap.bundle.js"></script>
        <!-- bootstrap js -->

        <script src="js/script.js"></script>
</body>

</html>