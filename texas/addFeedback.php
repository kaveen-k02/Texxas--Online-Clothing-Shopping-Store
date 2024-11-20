<?php

require "config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["u"])) {
    if ((isset($_POST["addFeedback"]) && $_POST["addFeedback"] == "true")) {

        $uemail = $_SESSION["u"]["email"];
        $pid = $_GET["id"];

        $feedback = $_POST["feedback"];
        $type = $_POST["type"];

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        // feedback_create 
        $insert = "INSERT INTO feedback (`type`,`feedback`,`date`,`product_id`,`user_email`) VALUES ('" . $type . "','" . $feedback . "','" . $date . "','" . $pid . "','" . $uemail . "')";
        mysqli_query($conn, $insert);
       
        echo '<script language="javascript" type="text/javascript">
                alert("New Feedback Added");
                
              </script>';
    }

?>


    <!DOCTYPE html>
    <html>

    <head>
        <style>

        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Feedback | TEXAS </title>



        <link rel="stylesheet" href="css/style.css">

        <!-- bootstrap css link -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <!-- bootstrap css link -->

        <!-- font awesom link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
        <!-- font awesom link  -->

        <link rel="icon" href="res/title.png">
    </head>

    <body>
        <?php include "header.php" ?>

        <div class="row border-bottom border-dark mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Add Feedback</li>
                </ol>
            </nav>
        </div>
        <div class="fcontainer mx-4">
            <div class="column form-container">
                <h2>Payment Gateway Sample</h2>
                <form>
                    <div class="form-input">
                        <label for="acc-number">Account Number:</label>
                        <input type="text" id="acc-number" name="acc-number">
                    </div>
                    <div class="form-input">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name">
                    </div>
                    <div class="form-input">
                        <label for="bank">Bank:</label>
                        <input type="text" id="bank" name="bank" class="form-control w-50">
                    </div>
                    <div class="form-input">
                        <label for="price">Price:</label>
                        <input type="text" id="price" name="price">
                    </div>
                    <div class="form-input">
                        <label for="cvc">CVC:</label>
                        <input type="text" id="cvc" name="cvc">
                    </div>
                    <button class="submit-button" type="submit">Confirm Order</button>
                </form>
            </div>
            <div class="column feedback-container">
                <h2 class="text-warning fw-bold">Add Your Feedback</h2>
                <form method="POST" action="">
                    <textarea class="feedback-input p-3 fs-3" name="feedback" placeholder="Enter your feedback here"></textarea>
                    <div class="">
                        <h2 class=" text-warning ">Select Type Of Feedback</h2>
                        <select class="fs-3 p-2" name="type" id="">
                            <option class="text-success" value="1">Positive</option>
                            <option class="text-warning" value="2">Neutral</option>
                            <option class="text-danger" value="3">Negative</option>
                        </select>
                    </div>
                    <center>
                        <button class="submit-button1 btn btn-success fs-4 my-0  text-white fw-bold" type="submit" value="true" name="addFeedback">Add Feedback</button>
                    </center>

                </form>

                <center>
                    <a href="<?php echo "myFeedbacks.php?id=" . $pid; ?>"><button class="btn btn-warning fs-4 text-dark fw-bold">View my Feedbacks</button> </a>
                </center>

            </div>
        </div>
        <?php include "footer.php" ?>

        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/script.js"></script>
    </body>

    </html>


<?php

} else {
    echo ("Please Log In First");
}

?>