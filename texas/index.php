<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | TEXAS </title>



    <link rel="stylesheet" href="css/style.css">
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- bootstrap css link -->

    <!-- font-awesom link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <!-- font-awesom link -->

    <link rel="icon" href="res/title.png">
</head>

<body>
    <?php
    $activePage = "Home";
    ?>
    <div>
        <?php include "header.php" ?>
    </div>

    <hr class="mt-4 border border-1 border-dark" />

    <center>
        <h2 class="topic mt-4 fw-bolder">TEXAS GARMENT</h2>
    </center>

    <section class="container">
        <div class="col-12  d-lg-block mb-3">
            <div class="row overflow-hidden" id="basicSearchResult">

                <div id="carouselExampleIndicators" class=" col-12 carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators over">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="res/main2.jpg" class="d-block poster-img-1" />
                            <div class="carousel-caption d-md-block poster-caption">
                                <h5 class="poster-title ">Welcome to TEXAS</h5>
                                <p class="poster-txt ">Discover New era of new world Fashion!!!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="res/home1.jpg" class="d-block poster-img-1" />
                        </div>
                        <div class="carousel-item ">
                            <img src="res/home3.jpg" class="d-block poster-img-1" />
                            <div class="carousel-caption d-none d-md-block poster-caption-1">
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
        </div>

    </section>

    <section class=" py-3">
        <div class="container py-3">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card border-0 Zoom-n-rotate">
                        <img src="res/sm2.jpg" alt="">
                        <a href="clothe.php"><button class="btnc">Shop For More</button></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-0 Zoom-n-rotate">
                        <img src="res/sm1.jpg" alt="">
                        <a href="clothe.php"><button class="btnc">Shop For More</button></a>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="card border-0 Zoom-n-rotate">
                        <img src="res/kid.jpg" alt="">
                        <a href="clothe.php"><button class="btnc">Shop For More</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- banner -->
    <div class="banner2">
        <div class="content2">
            <h1>get up To 50% Off</h1>
            <p>When Purchasing Items That Related to FULL WEAR</p>
            <div id="bannerbtn2"><button>SHOP NOW</button></div>
        </div>
    </div>
    <!-- banner -->

    <section id="featured" class="my-3 mx-5 pb-3">
        <div class="container text-center mt-1 py-5">
            <h2 class="fw text-black fw-bolder">Our Featured</h2>
            <hr class="mx-auto" />
            <p class="fs-5 text-success fw-bold fs-5">here you can check out our new products with discount price on Texas</p>
        </div>
        <div class="row mx-auto container-fluid  ">
            <?php

            require "config.php";
            // product_read
            $q = "SELECT * FROM `product` ORDER BY `datetime_added`  DESC";
            $rs = mysqli_query($conn, $q);
            $rs_num = $rs->num_rows;


            for ($z = 0; $z < $rs_num; $z++) {

                $product_data = $rs->fetch_assoc();

            ?>

                <div class="product col-lg-3 col-md-4 col-12 ">

                    <img class="img-fluid mb-3 ms-2 " style="height: 250px;" src="<?php echo $product_data["code"] ?>" alt="">
                    <div class="star ms-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name ms-2 fw-bold"><?php echo $product_data["title"]; ?></h5>
                    <p class="p-details ms-2"><?php echo $product_data["description"]; ?></p>
                    <h4 class="p-price fw-bold ms-2">Rs. <?php echo $product_data["price"] ?> .00</h4>
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
        <a href="clothe.php" id="viewmorebtn">View More</a>
        </div>
        </div>
    </section>

    <?php include "footer.php" ?>

    <!-- bootstrap js-bundle link -->
    <script src="js/bootstrap.bundle.js"></script>
    <!-- bootstrap js-bundle link -->

    <script src="js/script.js"></script>
</body>

</html>