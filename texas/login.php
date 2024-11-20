<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In | Texas</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="icon" href="res/title.png">
</head>

<body class="loginbody">

    <div class="container-fluid vh-100 d-flex justify-content-center">
        <div class="row align-content-center">

            <!-- header -->

            <div class="col-12">
                <div class="row mt-0">
                    <a href="index.php"><div class="col-12  loginlogo"></div></a>
                    <div class="col-12 ">
                        <p class="text-center maintitle fw-bolder">Hi, Welcome to TEXAS Garment</p>
                    </div>
                </div>
            </div>

            <!-- header -->

            <!-- content -->

            <div class="col-12 p-3">
                <div class="row">

                    <div class="col-6 d-none d-lg-block loginbackground"></div>

                    <!-- loginbox -->

                    <div class="col-12 col-lg-6 " id="logInBox">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="admintitle">Sign In</p>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" value="" />
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  />
                                    <label class="form-check-label">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <a href="#" class="link-primary" onclick="forgotPassword();">Forgot Password?</a>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" onclick="clogin();">Log In</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-dark" onclick="changeView();">Admin Log In</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <a href="signup.php"><button class="btn btn-danger" >New to Texas? Join Now</button></a>
                            </div>
                        </div>
                    </div>

                    <!-- loginbox -->

                    <!-- adminlogin -->

                    <div class="col-12 col-lg-6 d-none" id="adminlogInBox">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="admintitle text-success">Admin Sign In</p>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="adminemail" value="" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="adminpass" value="" />
                            </div>
                            
                            
                            <div class="col-12 col-lg-6 d-grid mt-3 ">
                                <button class="btn btn-primary" onclick="adminlogin();">Log In</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid mt-3">
                                <button class="btn btn-danger" onclick="changeView();">Customer Log In</button>
                            </div>
                        </div>
                    </div>

                    <!-- adminlogin -->

                </div>
            </div>

            <!-- content -->



            <!-- footer -->
            <div class="col-12  d-none d-lg-block">
                <p class="text-center">&copy; 2022 Texas Garment || All Rights Reserved</p>
            </div>
            <!-- footer -->

        </div>


    </div>


    <script src="js/script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>

