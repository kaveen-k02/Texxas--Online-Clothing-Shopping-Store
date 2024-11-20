<!DOCTYPE html>
<html lang="en">

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
    <div>
        <?php
        $activePage = "products";
        ?>
        <?php include "header.php" ?>

        <nav class="fs-5 mt-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item mt-0"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active mt-0 " aria-current="page">Our Products <i class="fa-solid fa-shirt"></i></li>
            </ol>
        </nav>

        <!-- banner -->
        <div class="banner3">
            <!-- <img src="resources/img/ban.jpg" alt=""> -->
            <div class="content3">
                <h1>Get up To 50% Off</h1>
                <p>When Purchasing Items That Related to FULL WEAR</p>
                <div id="bannerbtn3"><button>SHOP NOW</button></div>
            </div>
        </div>
        <!-- banner -->

        <?php

        require "config.php";

        $q = "SELECT * FROM `category`";
        $rs = mysqli_query($conn, $q);
        $c_num = $rs->num_rows;

        for ($y = 0; $y < $c_num; $y++) {

            $c_data = $rs->fetch_assoc();

        ?>

            <!-- product cards -->
            <section id="featured" class="my-3 mx-5 bg-light border-0 pb-3">
                <div class="container text-center mt-1 py-5">
                    <h3><?php echo $c_data["name"]; ?></h3>
                    <hr class="mx-auto" />
                </div>
                <div class="row mx-auto container-fluid">

                    <?php
                    $q2 = "SELECT * FROM `product` WHERE `category_id`='" . $c_data["id"] . "'
                            ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0";
                    $rs2 = mysqli_query($conn, $q2);
                    $product_num = $rs2->num_rows;

                    for ($z = 0; $z < $product_num; $z++) {
                        $product_data = $rs2->fetch_assoc();

                    ?>

                        <div class="product   col-lg-3 col-md-4 col-12">

                            <img class="img-fluid mb-3 ms-2 " style="height: 250px;" src="<?php echo $product_data["code"] ?>" alt="">
                            <div class="star ms-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h5 class="p-name ms-2"><?php echo $product_data["title"]; ?></h5>
                            <p class="p-details ms-2"><?php echo $product_data["description"]; ?></p>
                            <h4 class="p-price ms-2">Rs. <?php echo $product_data["price"] ?> .00</h4>
                            <a href='<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>'>
                                <button class="buy-btn">Buy Now</button>
                            </a>
                            <button class="buy-btn" onclick="addToCart(<?php echo $product_data['id']; ?>);">
                                <i class="fa-solid fa-bag-shopping m-0 text-warning"></i>
                            </button>

                        </div>
                    <?php
                    }

                    ?>

                </div>
            </section>
    </div>




    <!-- product cards -->
<?php

        }

?>


<!-- product -->
<div class="container" style="margin-top: 100px;">
    <hr />
    <h3 style="font-weight: bold;">PRODUCT.</h3>
    <p>"Style made simple. Elevate your look with curated fashion essentials from 'ChicThreads'. Effortless elegance for every occasion."</p>
    <hr />
</div>
<!-- product -->

<!-- offer -->
<div class="container" id="offer">
    <div class="row">
        <div class="col-md-4 py-3 py-md-0">
            <i class="fa-solid fa-cart-shopping"></i>
            <h5>Free Shipping</h5>
            <p>On order Over $100</p>
        </div>
        <div class="col-md-4 py-3 py-md-0">
            <i class="fa-solid fa-truck"></i>
            <h5>Fast Delivery</h5>
            <p>orld wide</p>
        </div>
        <div class="col-md-4 py-3 py-md-0">
            <i class="fa-solid fa-thumbs-up"></i>
            <h5>Big Choice</h5>
            <p>of product</p>
        </div>
    </div>
</div>
<!-- offer -->

<!-- footer -->
<?php include "footer.php" ?>
<!-- footer -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>