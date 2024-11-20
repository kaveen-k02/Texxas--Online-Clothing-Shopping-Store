<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us | Texas</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="icon" href="res/title.png">
</head>

<body>
    <?php
    $activePage = "contact";
    ?>
    <div>
        <?php include "header.php" ?>
    </div>

    <div class="container" id="contact">
        <h1 class="text-center">CONTACT US</h1>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <i class="fas fa-phone">Phone</i>
                    <h6>+9400000000</h6>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <i class="fa-solid fa-envelope">Email</i>
                    <h6>TexasGarment@gmail.com</h6>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <i class="fa-solid fa-location-dot">Address</i>
                    <h6>Colombo, Gampaha, Sri Lanka</h6>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-4 py-3 py-md-0">
                <input type="text" class="form-control" placeholder="Name">
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <input type="text" class="form-control" placeholder="Email">
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <input class="form-control" placeholder="Phone No:">
            </div>
            <div class="form-group" style="margin-top: 30px;">
                <textarea class="form-control" id="" rows="5" placeholder="Massage"></textarea>
            </div>
            <div class="text-center" id="messagebtn">
                <button>Message</button>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include "footer.php" ?>
    <!-- footer -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>