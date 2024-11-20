<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="icon" href="res/title.png">
</head>

<body class="main-body mt-0">
    <div class="bgimg">
        <div class="container-fluid  justify-content-center mt-0 my-0 ">
            <div class="row align-content-center ">

                <div class="txt">
                    <!-- header -->
                    <div class="col-12 mt-0 mb-0 ">
                        <div class="row">
                            <a href="index.php">
                                <div class="col-12 logo"></div>
                            </a>
                            <div class="col-12 mt-0">
                                <p class="text-center title01 fw-bolder">Hi, Welcome To the TEXAS Garment</p>
                            </div>
                        </div>
                    </div>

                    <!-- header -->

                    <!-- content -->

                    <div class="col-12 p-4 d-flex align-items-center justify-content-center ">



                        <!-- signupbox -->


                        <div class="col-12 col-lg-6 hutta p-3 border border-2" id="signUpBox">
                            <div class="row g-1 ">

                                <div class="col-12 d-flex justify-content-center align-items-center">
                                    <p class="title02 text-white">Sign up for New Customer</p>
                                </div>

                                <form method="POST" action="signupProcess.php">

                                    <div class="col-6">
                                        <label class="form-label fw-bolder text-white ">First Name</label>
                                        <input type="text" class="form-control" placeholder="first name" id="fname" name="fname" required />
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label fw-bolder text-white">Last Name</label>
                                        <input type="text" class="form-control" placeholder="last name" id="lname" name="lname" required />
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-bolder text-white">Email</label>
                                        <input type="email" class="form-control" placeholder="example@gmail.com" id="email" name="email" required />
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-bolder text-white">Password</label>
                                        <input type="password" class="form-control" placeholder="ex:- **********" id="password" name="password" required />
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-bolder text-white">Confirm Password</label>
                                        <input type="password" class="form-control" placeholder="ex:- **********" id="password" name="password" required />
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label fw-bolder  text-white">Mobile</label>
                                        <input type="text" class="form-control" placeholder="ex:- 0700000000" id="mobile" name="mobile" required />
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label fw-bolder text-white">Gender</label>
                                        <select class="form-control" id="gender" name="gender">

                                            <option value="male">Male</option>
                                            <option value="female">Female</option>

                                        </select>
                                    </div>

                                    <div class="d-flex align-items-center  ">
                                        <input type="checkbox" id="rememberMeCheckbox">
                                        <p class="mt-3 ms-3 text-white">Accept Terms & Conditions</p>

                                    </div>
                                    <p class="text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores sapiente animi dicta tempora vel accusamus atque labore architecto voluptate, voluptas, dolorum ex modi deleniti corrupti quos ea nulla maxime amet!</p>

                                    <div class="col-12 col-lg-6 d-grid mt-2 ">
                                        <button class=" btn btn-primary"> Sign Up</button>
                                    </div>

                                    <div class="col-12 col-lg-6 d-grid mt-2  ">

                                        <button class="btn btn-secondary"> <a href="login.php" class="text-white text-decoration-none"> Already have an account? Sign In</a></button>

                                    </div>
                                </form>



                            </div>
                        </div>


                        <!-- signupbox -->



                    </div>


                    <!-- footer -->
                    <div class="col-12   d-lg-block">
                        <hr>
                        <p class="text-center fw-bold text-white">Copyright &copy; 2023 Texas Garment.All Rights Reserved</p>

                    </div>
                    <!-- footer -->
                </div>

            </div>

        </div>
    </div>




    <script src="js/bootstrap.js"></script>
</body>


</html>