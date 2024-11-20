<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | Texas</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    <link rel="icon" href="res/title.png">

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php include "header.php";
             require "config.php"; 

             if (isset($_SESSION["u"])) {

                $user = $_SESSION["u"]["email"];

                $total = 0;
                $subtal = 0;
                $shipping = 0;
             ?>

                <div class="col-12 pt-2" style="background-color: #E3E5E4;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-12 border border-1 border-primary rounded mb-3">
                    <div class="row">

                        <div class="col-12">
                            <label class="form-label fs-1 fw-bold">Cart <i class="bi bi-cart4 fs-1 text-success"></i></label>
                        </div>

                        <div class="col-12 col-lg-6">
                            <hr />
                        </div>

   

                        <?php
                        
                        // cart_read
                        $q = "SELECT * FROM `cart` WHERE `user_email`='" . $user . "'";
                        $cart_rs = mysqli_query($conn, $q);
                        $cart_num = $cart_rs->num_rows;

                         if ($cart_num == 0) {

                        ?>
                            <!-- Empty View -->
                             <div class="col-12">
                                <div class="row">
                                 <div class="col-12 emptyCart"></div>
                                    <div class="col-12 text-center mb-2">
                                        <label class="form-label fs-1 fw-bold">
                                            You have no items in your Cart yet.
                                        </label>
                                    </div>
                                    <div class="offset-lg-4 col-12 col-lg-4 mb-4 d-grid">
                                        <a href="clothe.php" class="btn btn-outline-info fs-3 fw-bold">
                                            Start Shopping
                                        </a>
                                    </div>
                                </div>
                             </div>
                            <!-- Empty View -->
                        <?php

                        } else {
                        ?>

                            <!-- products -->

                            <div class="col-12 col-lg-9">
                                <div class="row">

                                    <?php
                                    for ($x = 0; $x < $cart_num; $x++) {
                                        $cart_data = $cart_rs->fetch_assoc();
                                        
                                        $q = "SELECT * FROM `product` WHERE `id`='" . $cart_data["product_id"] . "'";
                                        $product_rs = mysqli_query($conn, $q);
                                        $product_data = $product_rs->fetch_assoc();

                                        $total = $total + ($product_data["price"] * $cart_data["qty"]);

                                        

                                     ?>

                                        <div class="card mb-3 mx-0 col-12">
                                            <div class="row g-0">
                                        
                                                <hr>

                                                <div class="col-md-4">

                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" 
                                                    data-bs-content="<?php echo $product_data["description"]; ?>" title="Product Description">
                                                        <img src="<?php echo $product_data["code"]; ?>" class="img-fluid rounded-start" style="max-width: 200px; height: 200px;">
                                                    </span>

                                                </div>
                                                <div class="col-md-5">
                                                    <div class="card-body">

                                                        <h3 class="card-title"><?php echo $product_data["title"]; ?></h3>

                                                        <br>
                                                        <span class="fw-bold text-black-50 fs-5">Price :</span>&nbsp;
                                                        <span class="fw-bold text-black fs-5">Rs. <?php echo $product_data["price"]; ?> .00</span>
                                                        <br>
                                                        <span class="fw-bold text-black-50 fs-5">Quantity :</span>&nbsp;
                                                        <input type="number" class="mt-3 border border-2 border-secondary fs-4 fw-bold px-3 cardqtytext" value="<?php echo $cart_data['qty'] ?>" min="1">
                                                        <br><br>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card-body d-grid">
                                                        <a href="<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>" class="btn btn-outline-success mb-2">Buy Now</a>
                                                        <a class="btn btn-outline-danger mb-2" onclick="deleteFromCart(<?php echo $cart_data['id']; ?>);">Remove</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                     <?php
                                    }
                                    ?>

                                </div>
                            </div>

                            <!-- products -->
                        <?php
                        }
                        ?>
                         

                        <!-- summary -->
                        <div class="col-12 col-lg-3">
                            <div class="row">

                                <div class="col-12">
                                    <label class="form-label fs-3 fw-bold">Summary</label>
                                </div>

                                <div class="col-12">
                                    <hr />
                                </div>

                                <div class="col-6 mb-3">
                                    <span class="fs-6 fw-bold">items (<?php echo $cart_num; ?>)</span>
                                </div>

                                <div class="col-6 text-end mb-3">
                                    <span class="fs-6 fw-bold">Rs. <?php echo $total; ?> .00</span>
                                </div>

                                <div class="col-6">
                                    <span class="fs-6 fw-bold">Shipping</span>
                                </div>

                                <div class="col-6 text-end">
                                    <span class="fs-6 fw-bold">Rs. <?php echo $shipping; ?> .00</span>
                                </div>

                                <div class="col-12 mt-3">
                                    <hr />
                                </div>

                                <div class="col-6 mt-2">
                                    <span class="fs-4 fw-bold">Total</span>
                                </div>

                                <div class="col-6 mt-2 text-end">
                                    <span class="fs-4 fw-bold">Rs. <?php echo $total + $shipping; ?> .00</span>
                                </div>

                                <div class="col-12 mt-3 mb-3 d-grid">
                                    <button class="btn btn-primary fs-5 fw-bold">CHECKOUT</button>
                                </div>

                            </div>
                        </div>
                        <!-- summary -->
                        <?php
                        // }

                        ?>







                    </div>
                </div>

            <?php

            } else {
                echo ("Please login or signup first");
            }

            ?>

            <?php include "footer.php"; ?>

        </div>
    </div>

    
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/script.js"></script>

    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
</body>

</html>