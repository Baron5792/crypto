<?php
    include './config/database.php';

    $email = $_SESSION['error-data']['email'] ?? null;
    unset($_SESSION['error-data']);

?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="description" content="Pro-cryptoinvestment.com is an investment company that aggregates funds for investment in bitcoin trading.                                                                                                                                                                                                                                                                                                                                                                                                          ">
    <meta name="keywords" content="pro-cryptoinvestment, bitcoin trading, pro-crypto, pro crypto.com, investment, trading                                                                                                                                                                                                                                                                                                                                                                                                                              ">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base >
    <title>Login</title>
    <!-- Bootstrap CSS -->
    
    <link
      rel="icon"
      type="image/png"
      href="assets/images/favicon.jpg"
      sizes="16x16"
    />
    
    <!-- Font Icon Styles -->
    <link rel="stylesheet" href="assets/dist/css/icons.css">
    <!-- /font icon Styles -->
    <!-- Load Styles -->
    <link rel="stylesheet" href="assets/dist/css/bootstrap-formhelpers.min.css">
    <link rel="stylesheet" href="assets/dist/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/dist/css/chartist.min.css">
    <link rel="stylesheet" href="assets/dist/css/style.min.css">
    <!-- /load styles -->
    <!-- include summernote css/js -->
    <link href="assets/dist/summernote/summernote-bs4.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/dist/css/intlTelInput.css">

    <script src="assets/dist/js/jquery.min.js"></script>
</head>
    <body class="dt-header--fixed theme-dark dt-layout--full-width dt-sidebar--fixed o-auto">
        <!-- Root -->
        <div class="dt-root op-1">
            <div class="dt-root__inner">
                                        <!-- Login Container -->
        <div class="dt-login--container">

            <!-- Login Content -->
            <div class="dt-login__content-wrapper">

                <!-- Login Background Section -->
                <div class="dt-login__bg-section">

                    <div class="dt-login__bg-content">
                        <!-- Login Title -->
                        <h1 class="dt-login__title text-capitalize">Login</h1>
                        <!-- /login title -->

                        <p class="f-16 text-capitalize">Sign in and explore Pro-Crypto.</p>
                    </div>


                    <!-- Brand logo -->
                    <div class="dt-login__logo">
                        <a class="dt-brand__logo-link" href="index.php">
                            <img class="dt-brand__logo-img" src="uploads/logo1.png" alt="logo">
                        </a>
                    </div>
                    <!-- /brand logo -->

                </div>
                <!-- /login background section -->

                <!-- Login Content Section -->
                <div class="dt-login__content">
                    <ul style="float: right;background-color: #1199FA;padding: 5px;">
                        <li class="dt-nav__item dropdown">

                            <!-- Dropdown Link -->
                            <a href="#" class="dt-nav__link dropdown-toggle" id="currentLang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img style="width:20px;" class="flag-icon flag-icon-rounded flag-icon-lg mr-1m" src="uploads/gb-eng.png">
                            <span>EN</span> </a>
                            <!-- /dropdown link -->

                            <!-- Dropdown Option -->
                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(8px, 72px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <button class="dropdown-item sitelangChange" type="button" data-id="switchlang/English.php">
                                    <img class="flag-icon flag-icon-rounded flag-icon-lg mr-2" style="width: 20px;" src="uploads/gb-eng.png">
                                    <span>English</span> 
                                </button>
                                                                <button class="dropdown-item sitelangChange" type="button" data-id="switchlang/Russian.php">
                                    <img class="flag-icon flag-icon-rounded flag-icon-lg mr-2" style="width: 20px;" src="uploads/russia.png">
                                    <span>Russian</span> 
                                </button>
                                                                <button class="dropdown-item sitelangChange" type="button" data-id="switchlang/Portugu%c3%aas.php">
                                    <img class="flag-icon flag-icon-rounded flag-icon-lg mr-2" style="width: 20px;" src="uploads/portuguese.png">
                                    <span>Português</span> 
                                </button>
                                                                <button class="dropdown-item sitelangChange" type="button" data-id="switchlang/Espa%c3%b1ol.php">
                                    <img class="flag-icon flag-icon-rounded flag-icon-lg mr-2" style="width: 20px;" src="uploads/spain.png">
                                    <span>Español</span> 
                                </button>
                                                                <button class="dropdown-item sitelangChange" type="button" data-id="switchlang/German.php">
                                    <img class="flag-icon flag-icon-rounded flag-icon-lg mr-2" style="width: 20px;" src="uploads/germany.png">
                                    <span>German</span> 
                                </button>
                                                            </div>
                            <!-- /dropdown option -->

                        </li>
                    </ul>

                    <!-- Login Content Inner -->
                    <div class="dt-login__content-inner">
                                                                                                <h2 id="login-title" class="f-20">Enter your email and password below</h2>
                        <!-- Form -->
                        <form action="<?= ROOT_URL ?>signin_logic.php" id="" method="POST" accept-charset="utf-8">
                                               <input type="hidden" name="csrf_test_name" value="4b48c64ace4898095bb13c661a66beab" />
                        <div class="email-pass">
                            <!-- <div class="errorClass">
                                <label class="error" id="overallError"></label>
                            </div> -->
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="sr-only" for="email-1">Email Address</label>
                                <input type="email" class="form-control" name="email" id=""
                                    aria-describedby="email-1" placeholder="Email" value="<?= $email ?>">
                            </div>
                            <!-- /form group -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="sr-only" for="password-1">Password</label>
                                <input type="password" class="form-control" name="password" id=""
                                    placeholder="Password" value="">
                            </div>
                            <!-- /form group -->

                            <!-- for error messages -->
                            <?php  if (isset($_SESSION['error'])): ?>
                                <div class="" style="margin: 20px 0px; color:red; font-family:sans-serif;">
                                    <p>
                                        <?=
                                            $_SESSION['error'];
                                            unset($_SESSION['error']);
                                        ?>
                                    </p>
                                </div>
                            <?php endif ?>

                            <?php  if (isset($_SESSION['success'])): ?>
                                <div class="" style="margin: 20px 0px; color:green; font-family:sans-serif;">
                                    <p>
                                        <?=
                                            $_SESSION['success'];
                                            unset($_SESSION['success']);
                                        ?>
                                    </p>
                                </div>
                            <?php endif ?>

                            <!-- Form Group -->
                            <div class="mb-2">
                                <checkbox class="dt-checkbox dt-checkbox-icon dt-checkbox-only">
                                    <input type="checkbox" name="stay_logged_in" id="checkbox-1" value="agree" class="checkbox-check ng-pristine ng-valid ng-touched">
                                    <label class="font-weight-light dt-checkbox-content" for="checkbox-1">
                                        <span class="unchecked">
                                            <i name="box-o" size="xl" class="icon icon-box-o icon-xl icon-fw"></i>
                                        </span>
                                        <span class="checked ng-star-inserted">
                                            <i name="box-check-o" size="xl" class="text-primary icon icon-box-check-o icon-xl icon-fw"></i>
                                        </span>
                                    </label>
                                    Keep me logged in on this device                                </checkbox>
                            </div>
                            <!-- /form group -->
                            
                            <!-- /form group -->
                                                    </div>
                        <div class="hide" id="google-auth">
                            <!-- Form Group -->
                            <!-- <div class="form-group">
                                <div id="divOuter" class="">
                                    <div id="divInner">
                                        <input id="partitioned" class="" name="token" type="text" maxlength="6" />
                                        <label class="error google-auth-err"></label>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                            
                        <!-- Form Group -->
                        <div class="form-group">

                            <button type="submit" id="" class="btn btn-info text-uppercase" data-loading-text="Processing data" data-title="Login" name="signin">Login</button>

                            <button type="submit" id="" class="hide btn btn-info text-uppercase" name="signin">Login</button>

                            <span class="d-inline-block ml-4 text-uppercase">Or                                <a class="d-inline-block font-weight-500 ml-3 text-capitalize"
                                    href="signup.php">Create Account</a>
                            </span>

                        </div>
                        <!-- /form group -->
                </form>                        <!-- /form -->

                    </div>
                    <!-- /login content inner -->

                    <!-- Login Content Footer -->
                    <div class="dt-login__content-footer">
                        <a href="forgotPassword.php">Can't access your account?</a>
                    </div>
                    <!-- /login content footer -->

                </div>
                <!-- /login content section -->

            </div>
            <!-- /login content -->

        </div>
        <!-- /login container -->
        <script src="assets/dist/js/login.js"></script><script src="../code.tidio.co_443/fegiqrntzgpe1xphhlkfck0ypslsaabs.js" async></script>
<script src="assets/dist/summernote/summernote-bs4.js"></script>
<script src="assets/dist/js/lang.js"></script>
<script src="assets/dist/summernote/editor-summernote.js"></script>
<script src="assets/dist/js/moment/moment.js"></script>
<script src="assets/dist/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/contact.js"></script>
<script src="assets/dist/js/perfect-scrollbar.min.js"></script>
<script src="assets/dist/js/masonry.pkgd.min.js"></script>
<script src="assets/dist/js/sweetalert2.js"></script>
<script src="assets/dist/js/customizer.js"></script>
<script src="assets/dist/js/Chart.min.js"></script>
<script src="assets/dist/js/chartist.min.js"></script>
<script src="assets/dist/js/script.js"></script>
</body>

</html>