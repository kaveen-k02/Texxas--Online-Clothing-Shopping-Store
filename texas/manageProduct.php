<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Users | Admins | Texas</title>
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
                <label class="form-label text-primary fw-bold fs-1">Manage All Products</label>
            </div>

            <div class="col-12 mt-3">
                <div class="row">
                    <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-9">
                                <input type="text" class="form-control" />
                            </div>
                            <div class="col-3 d-grid">
                                <button class="btn btn-warning">Search Product</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3 mb-3">
                <div class="row">
                    <div class="col-2 col-lg-1 bg-primary py-2 text-end">
                        <span class="fs-4 fw-bold text-white">#</span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-light py-2">
                        <span class="fs-4 fw-bold">Product Image</span>
                    </div>
                    <div class="col-4 col-lg-2 bg-primary py-2">
                        <span class="fs-4 fw-bold text-white">Title</span>
                    </div>
                    <div class="col-4 col-lg-2 d-lg-block bg-light py-2">
                        <span class="fs-4 fw-bold">Price</span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-primary py-2">
                        <span class="fs-4 fw-bold text-white">Quantity</span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-light py-2">
                        <span class="fs-4 fw-bold">Registered Date</span>
                    </div>
                    <div class="col-2 col-lg-1 bg-white"></div>
                </div>
            </div>

            <?php
            require "config.php";

            $q = "SELECT * FROM `product`";
            // $product_data = mysqli_query($conn, $q);
            $pageno;

            if (isset($_GET["page"])) {
                $pageno = $_GET["page"];
            } else {
                $pageno = 1;
            }

            $product_rs = mysqli_query($conn, $q);
            $product_num = $product_rs->num_rows;

            $results_per_page = 20;
            $number_of_pages = ceil($product_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;

            $q2 = $q . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "";
            $selected_rs =  mysqli_query($conn, $q2);

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();


            ?>

                <div class="col-12 mt-3 mb-3">
                    <div class="row">
                        <div class="col-2 col-lg-1 bg-primary py-2 text-end">
                            <input  id="<?php echo "product_id" . $selected_data["id"]; ?>" class="d-none" type="number" value="<?php echo $selected_data["id"]; ?>">
                            <label class="fs-4 fw-bold text-white"><?php echo $selected_data["id"];?></label>
                        </div>

                        <div class="col-2 d-none d-lg-block bg-light py-2">
                            <img src="<?php echo $selected_data["code"]; ?>" style="height: 40px;margin-left: 80px;" />
                        </div>
                        <div class="col-4 col-lg-2 bg-primary py-2">
                            <input type="text" class="form-control fs-5 border border-2 h-100 border-primary" value="<?php echo $selected_data["title"]; ?>" id="<?php echo "title" . $selected_data["id"]; ?>" />

                        </div>
                        <div class="col-4 col-lg-2 d-lg-block bg-light py-2">
                            <input type="text" class="form-control fs-5  h-100 border-dark" value=" <?php echo $selected_data["price"]; ?> " id="<?php echo "price" . $selected_data["id"]; ?>" />
                        </div>
                        <div class="col-2 d-none d-lg-block bg-primary py-2">
                            <input type="number" class="fs-4 fw-bold text-black" value="<?php echo $selected_data["qty"]; ?>" id="<?php echo "qty" .$selected_data["id"]; ?>" />
                        </div>
                        <div class="col-2 d-none d-lg-block bg-light py-2">
                            <span class="fs-4 fw-bold"><?php echo $selected_data["datetime_added"]; ?></span>
                        </div>
                        <div class="col-2 col-lg-1 bg-white py-2 d-grid">
                            <button class="btn btn-success mb-2" onclick="updateProduct(<?php echo $selected_data['id']; ?>);">Update</button>
                            <button id="<?php echo $selected_data['id']; ?>" class="btn btn-danger" onclick="deleteproduct('<?php echo $selected_data['id']; ?>');">Delete</button>
                        </div>
                    </div>
                </div>

            <?php

            }

            ?>

            <!--  -->
            <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-lg justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php

                        for ($x = 1; $x <= $number_of_pages; $x++) {
                            if ($x == $pageno) {
                        ?>
                                <li class="page-item active">
                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                </li>
                            <?php
                            } else {
                            ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                </li>
                        <?php
                            }
                        }

                        ?>

                        <li class="page-item">
                            <a class="page-link" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!--  -->

        </div>
    </div>

    <!-- bootstrap js -->
    <script src="js/bootstrap.bundle.js"></script>
    <!-- bootstrap js -->

    <script src="js/script.js"></script>
</body>

</html>