<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>

    <link rel="stylesheet" href="css/style.css">
    <!-- bootsrap link -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- bootsrap link -->

    <link rel="icon" href="res/title.png">
</head>

<body class="mb-0 m-0">

    <?php
    function isActive($page)
    {
        if (basename($_SERVER['PHP_SELF']) == $page) {
            return 'active text-danger  border-bottom border-danger';
        }
        return '';
    }
    ?>

    <nav class="navbar navbar-expand-lg bg-body-tertiary p-0 m-0 ">
        <div class="container-fluid">
            <div class="imgdiv p-0 m-0">
                <img class="img p-0 " src="res\texas.png" alt="">
            </div>
            <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mx-5 mb-lg-0">
                    <li class="nav-item ms-4">
                        <a class="nav-link <?php echo isActive('index.php'); ?> fs-4 fw-bolder" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="nav-link <?php echo isActive('clothe.php'); ?> fs-4 fw-bolder" href="clothe.php">Women</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link <?php echo isActive('clothe.php'); ?> fs-4 fw-bolder" href="clothe.php">Men</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link <?php echo isActive('clothe.php'); ?> fs-4 fw-bolder" href="clothe.php">Kid</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link <?php echo isActive('about.php'); ?> fs-4 fw-bolder" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link <?php echo isActive('contactus.php'); ?> fs-4 fw-bolder" href="contactus.php">Contact Us</a>
                    </li>
                </ul>
                <?php
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                if (isset($_SESSION["u"])) {

                    $data = $_SESSION["u"];

                ?>

                    <span class="fw-bolder fs-5 span "><a href="userProfile.php"><?php echo $data["fname"]; ?></a></span>
                    <span class="col-1 ms-3 fs-5 text-danger span" onclick="logOut();">Log Out</span>

                <?php
                } else {

                ?>

                    <button class="ms-1 btn btn-dark fs-6 col-2 "><a href="signup.php" class="text-decoration-none text-white"> New Customer </a></button>
                    <button class="ms-3 btn btn-primary fs-6 col-1 "><a href="login.php" class="text-decoration-none text-white"> Log In </a></button>

                <?php

                }

                ?>
            </div>
        </div>
        <div class=" mx-5 d-flex m-0  ">
            <a href="userProfile.php"><i class="fa-solid fa-user fs-3 text-decoration-none text-dark"></i></a>
            <a href="cart.php"><i class="fa-solid fa-bag-shopping ms-3 fs-3 text-decoration-none text-dark"></i></a>
        </div>
    </nav>


    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/script.js"></script>
</body>

</html>