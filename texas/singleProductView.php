<?php

require "config.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $q = "SELECT product.id,product.price,product.qty,product.description,product.title,
    product.datetime_added,product.category_id,product.color_id,product.material,product.code 
    FROM `product` WHERE product.id='" . $pid . "'";
    $product_rs = mysqli_query($conn, $q);

    $product_num = $product_rs->num_rows;
    if ($product_num == 1) {

        $product_data = $product_rs->fetch_assoc();

?>

        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title><?php echo $product_data["title"]; ?> | Texas</title>

            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="css/bootstrap.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

            <link rel="icon" href="res/title.png">
        </head>

        <body>

            <div class="container-fluid">
                <div class="row ">
                    <?php include "header.php"; ?>

                    <div class="col-12 mt-0 bg-white singleProduct">
                        <div class="row">
                            <div class="col-12" style="padding: 10px;">
                                <div class="row">

                                    <div class="col-12 col-lg-2 order-2 order-lg-1">
                                        <ul>

                                            <?php


                                            if ($product_num != 0) {

                                            ?>
                                                <li class="d-flex flex-column justify-content-center align-items-center 
                                                       border border-1 border-secondary mb-1">
                                                    <img src="<?php echo $product_data['code']; ?>" class="img-thumbnail mt-1 mb-1" style="height: 200px;" id="productImg" onclick="loadMainImg();" />
                                                </li>
                                            <?php

                                            } else {
                                            ?>
                                                <li class="d-flex flex-column justify-content-center align-items-center 
                                                    border border-1 border-secondary mb-1">
                                                    <img src="../res/empty.svg" class="img-thumbnail mt-1 mb-1" />
                                                </li>
                                                <li class="d-flex flex-column justify-content-center align-items-center 
                                                    border border-1 border-secondary mb-1">
                                                    <img src="../res/empty.svg" class="img-thumbnail mt-1 mb-1" />
                                                </li>
                                                <li class="d-flex flex-column justify-content-center align-items-center 
                                                     border border-1 border-secondary mb-1">
                                                    <img src="../res/empty.svg" class="img-thumbnail mt-1 mb-1" />
                                                </li>
                                            <?php
                                            }

                                            ?>


                                        </ul>
                                    </div>

                                    <div class="col-lg-4 order-2 order-lg-1 d-none d-lg-block">
                                        <div class="row">
                                            <div class="col-12 align-items-center border border-1 
                                                   border-secondary">
                                                <div class="mainImg" id="mainImg">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6 order-3">
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="row border-bottom border-dark">
                                                    <nav aria-label="breadcrumb">
                                                        <ol class="breadcrumb">
                                                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                                            <li class="breadcrumb-item active" aria-current="page">Single Product View</li>
                                                        </ol>
                                                    </nav>
                                                </div>

                                                <div class="row border-bottom border-dark">
                                                    <div class="col-12 my-2">
                                                        <span class="fs-4 fw-bold text-success"><?php echo $product_data['title'] ?></span>
                                                    </div>
                                                </div>

                                                <div class="row border-bottom border-dark">
                                                    <div class="col-12 my-2">
                                                        <span class="badge">
                                                            <i class="bi bi-star-fill text-warning fs-5"></i>
                                                            <i class="bi bi-star-fill text-warning fs-5"></i>
                                                            <i class="bi bi-star-fill text-warning fs-5"></i>
                                                            <i class="bi bi-star-fill text-warning fs-5"></i>
                                                            <i class="bi bi-star-fill text-warning fs-5"></i>

                                                            &nbsp;&nbsp;&nbsp;

                                                            <label class="fs-5 text-dark fw-bold">4.5 Stars | 39 Reviews and Ratings</label>
                                                        </span>
                                                    </div>
                                                </div>





                                                <div class="row border-bottom border-dark">
                                                    <div class="col-12 my-2">

                                                        <span class="fs-5 text-primary"><b>Return Policy : </b>1 Months Return Policy</span><br />
                                                        <span class="fs-5 text-primary"><b>In Stock </span>
                                                    </div>
                                                </div>

                                                <div class="row border-bottom border-dark">
                                                    <div class="col-12 my-2">
                                                        <div class="row">

                                                            <div class="col-12 col-lg-6 border border-1 border-dark text-center">
                                                                <span class="fs-5 text-primary"><b>Sold : </b>1000 Items</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="my-2 offset-lg-2 col-12 col-lg-8 border border-2 border-danger rounded">
                                                                <div class="row">
                                                                    <div class="col-3 col-lg-2 border-end border-2 border-danger">
                                                                        <img src="res/pricetag.png" />
                                                                    </div>
                                                                    <div class="col-9 col-lg-10">
                                                                        <span class="fs-5 text-danger fw-bold">
                                                                            Stand a chance to get 5% discount by using VISA or MASTER
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-12 my-2">
                                                                <div class="row g-2">

                                                                    <div class="border border-1 border-secondary rounded overflow-hidden 
                                                        float-left mt-1 position-relative product-qty">
                                                                        <div class="col-12">
                                                                            <span>Quantity : </span>
                                                                            <input type="text" class="border-0 fs-5 fw-bold text-start" style="outline: none;" pattern="[0-9]" value="1" onkeyup='check_value(<?php echo $product_data["qty"]; ?>);' id="qty_input" />

                                                                            <div class="position-absolute qty-buttons">
                                                                                <div class="justify-content-center d-flex flex-column  align-items-center 
                                                                 border-secondary  qty-inc">
                                                                                    <i class="bi bi-caret-up-fill text-primary fs-4 mt-0 " onclick='qty_inc(<?php echo $product_data["qty"]; ?>);'></i>
                                                                                </div>
                                                                                <div class="justify-content-center d-flex flex-column align-items-center 
                                                                 border-secondary qty-dec">
                                                                                    <i class="bi bi-caret-down-fill text-primary fs-4" onclick='qty_dec();'></i>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12 mt-5">
                                                                            <div class="row">

                                                                                <div class="col-4 d-grid">
                                                                                    <a class="btn btn-success p-0" href="<?php echo "addFeedback.php?id=" . ($product_data["id"]); ?>">
                                                                                        <button class="btn btn-success" type="submit">Buy Now</button>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-4 d-grid">
                                                                                    <a href="" class=" btn btn-primary p-0" onclick="addToCart(<?php echo $product_data['id']; ?>);">
                                                                                        <button class="btn btn-primary p-0">Add to <i class="fa-solid fa-bag-shopping"></i> </button>
                                                                                    </a>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row d-block me-0 mt-4 mb-3 border-bottom border-1 border-dark border-end">
                                            <div class="col-12">
                                                <span class="fs-4 fw-bold">Product Details</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row d-block me-0 mt-4 mb-3 border-bottom border-end border-1 border-dark">
                                            <div class="col-12">
                                                <span class="fs-4 fw-bold">Feedbacks</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 col-lg-6 bg-white">
                                <div class="row">

                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="form-label fs-5 fw-bold">Product Name : </label>
                                            </div>
                                            <div class="col-5">
                                                <label class="form-label fs-5"><?php echo $product_data['title'] ?></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 ">
                                        <div class="row">
                                            <div class="col-4">
                                                <label class="form-label fs-5 fw-bold">Material : </label>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label fs-5 "><?php echo $product_data['material'] ?></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fs-4 fw-bold">Description : </label>
                                            </div>
                                            <div class="col-12">
                                                <textarea cols="60" rows="10" class="form-control" readonly><?php echo $product_data["description"] ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class=" col-12 col-lg-6 ">
                                <div class="row border border-1 border-dark rounded overflow-scroll me-0 align-content-center " style="height: 300px;">

                                    <?php

                                    $q3 = "SELECT * FROM `feedback` WHERE `product_id`='" . $pid . "'";
                                    $feedback_rs = mysqli_query($conn, $q3);

                                    $feedback_num = $feedback_rs->num_rows;

                                    for ($x = 0; $x < $feedback_num; $x++) {
                                        $feedback_data = $feedback_rs->fetch_assoc();
                                    ?>
                                        <div class="col-12 mt-1 mb-1 mx-1 ">
                                            <div class="row border border-1 border-dark rounded me-0">
                                                <?php
                                                $q4 = "SELECT * FROM `user` WHERE `email`='" . $feedback_data["user_email"] . "'";
                                                $user_rs = mysqli_query($conn, $q4);
                                                $user_data = $user_rs->fetch_assoc();

                                                ?>
                                                <div class="col-10 mt-1 mb-1 ms-0"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></div>
                                                <div class="col-2 mt-1 mb-1 me-0">
                                                    <?php
                                                    if ($feedback_data["type"] == 1) {
                                                    ?>
                                                        <span class="badge bg-success">Positive</span>
                                                </div>
                                            <?php
                                                    } else if ($feedback_data["type"] == 2) {
                                            ?>
                                                <span class="badge bg-warning">Neutral</span>
                                            </div>
                                        <?php
                                                    } else if ($feedback_data["type"] == 3) {
                                        ?>
                                            <span class="badge bg-danger">Negative</span>
                                        </div>
                                    <?php
                                                    }
                                    ?>

                                    <div class="col-12 ">
                                        <b>
                                            <?php echo $feedback_data["feedback"]; ?>
                                        </b>
                                    </div>
                                    <div class="offset-6 col-6 text-end">
                                        <label class="form-label fs-6 text-black-50"><?php echo $feedback_data["date"]; ?></label>
                                    </div>
                                </div>
                            </div>
                        <?php
                                    }

                        ?>


                        </div>
                    </div>

                </div>
            </div>

            <?php include "footer.php"; ?>
            </div>
            </div>

            <script src="bootstrap.bundle.js"></script>
            <script src="js/script.js"></script>
        </body>

        </html>


<?php

    } else {
        echo ("Sory for the inconvinient");
    }
} else {
    echo ("Something went wrong");
}

?>