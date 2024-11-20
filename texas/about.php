<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us | Texas</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="icon" href="res/title.png">
</head>

<body>
    <?php
    $activePage = "About";
    ?>
    <div>
        <?php include "header.php" ?>
    </div>

    <!-- About -->
    <div class="container" id="about">
        <h1>About Us</h1>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-6 py-1 py-md-0">
                <div class="card border-0">
                    <img src="res/about.jpeg" alt="">
                </div>
            </div>
            <div class="col-md-6 py-3 py-md-0">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed, alias culpa ratione maiores accusantium unde, et cupiditate totam, autem ea error sequi libero asperiores necessitatibus. Fuga omnis minus eveniet sed enim facere maxime reprehenderit suscipit in cupiditate perferendis consequuntur illo porro odio aperiam obcaecati eius aliquam, officiis nam qui debitis voluptatum voluptate exercitationem. Temporibus eveniet suscipit nihil sed, laborum sunt nemo quis amet, repellendus molestiae quod! Corporis impedit laudantium, voluptatum eius molestiae exercitationem doloribus ipsa tempora quia facere consequatur veritatis, et tenetur voluptatibus, animi similique unde cumque iure non necessitatibus reprehenderit ut officiis minus. Nesciunt quas earum fuga optio eligendi.</p>
            </div>
        </div>
    </div>
    <!-- About -->


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
                <p>World wide</p>
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