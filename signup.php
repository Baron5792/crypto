<?php
    include './config/database.php';

    // fetching a random referral code for a new user
    function generate_random_string($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    $code = generate_random_string(10);


    $firstanme = $_SESSION['error-data']['firstname'] ?? null;
    $lastname = $_SESSION['error-data']['lastname'] ?? null;
    $email = $_SESSION['error-data']['email'] ?? null;
    $password = $_SESSION['error-data']['password'] ?? null;
    $referral_code  = $_SESSION['error-data']['referral_code'] ?? null;
    unset($_SESSION['error-data']);

    if (isset($_GET['ref'])) {
        $ref = $_GET['ref'];
    }

    else {

    }
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from trade.pro-cryptoinvestment.com/signup by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Mar 2024 08:12:34 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="description" content="Pro-cryptoinvestment.com is an investment company that aggregates funds for investment in bitcoin trading.                                                                                                                                                                                                                                                                                                                                                                                                          ">
    <meta name="keywords" content="pro-cryptoinvestment, bitcoin trading, pro-crypto, pro crypto.com, investment, trading                                                                                                                                                                                                                                                                                                                                                                                                                              ">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base >
    <title>Signup Page</title>
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
                        <h1 class="dt-login__title">Join Pro-Crypto</h1>
                        <!-- /login title -->

                        <p class="f-16 text-capitalize">Sign up and explore Pro-Crypto.</p>
                    </div>


                    <!-- Brand logo -->
                    <div class="dt-login__logo">
                        <a class="dt-brand__logo-link" href="index.php">
                            <img class="dt-brand__logo-img" src="uploads/logo1.png" alt="Logo">
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
                        <div class="col-md-12">
                                                                                                            </div>
                        <h2 class="f-20 text-capitalize">Create Account</h2>
                        <!-- Form -->

                        <?php
                            if (isset($_GET['ref'])) {
                        ?>
                                <form action="<?= ROOT_URL ?>signup_logic.php?ref=<?= $ref ?>" id="" method="POST" accept-charset="utf-8">
                        <?php
                            }
                            else {
                        ?>
                                <form action="<?= ROOT_URL ?>signup_logic.php" id="" method="POST" accept-charset="utf-8">
                        <?php
                            }
                        ?>


<input type="hidden" name="csrf_test_name" value="4e6fd3daede2c9e77fdd962c964d3e02" />                                    
                          <div class="row">
                            <div class="col-md-6">
                              <!-- Form Group -->
                            <div class="form-group">
                                <label class="sr-only" for="f-name">First Name</label>
                                <input type="text" class="form-control" name="firstname" id="f-name"
                                    aria-describedby="f-name" placeholder="First Name" value="<?= $firstanme ?>">
                                    <label class="error" id="firstname"></label>
                            </div>
                            <!-- /form group -->
                            </div>
                            <div class="col-md-6">
                              <!-- Form Group -->
                            <div class="form-group">
                                <label class="sr-only" for="l-name">Last Name</label>
                                <input type="text" class="form-control" name="lastname" id="l-name"
                                    aria-describedby="l-name" placeholder="Last Name" value="<?= $lastname ?>">
                                    <label class="error" id="lastname"></label>
                            </div>
                            <!-- /form group -->
                            </div>
                          </div>

                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="sr-only" for="email-1">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email-1"
                                    aria-describedby="email-1" placeholder="Email" value="<?= $email ?>">
                                    <label class="error" id="email"></label>
                            </div>
                            <!-- /form group -->

                            <!-- for hidden referral code -->
                            <input type="hidden" name="users_code" value="<?= $code ?>">

                            <div class="row">
                              <div class="col-md-6">
                                <!-- Form Group -->
                                <div class="form-group">
                                    <label class="sr-only" for="password-1">Password</label>
                                    <input type="password" class="form-control" name="password" id="password-1"
                                        placeholder="Password" value="<?= $password ?>">
                                    <label class="error" id="password"></label>
                                </div>
                                <!-- /form group -->
                              </div>
                              <div class="col-md-6">
                                <!-- Form Group -->
                                <div class="form-group">
                                    <label class="sr-only" for="password-2">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password" id="password-2"
                                        placeholder="Confirm Password" value="">
                                    <label class="error" id="cpassword"></label>
                                </div>
                                <!-- /form group -->
                              </div>
                              <div class="col-md-12">
                              <!-- Form Group -->
                            <?php
                                if (isset($_GET['ref'])) {
                            ?>
                                    <div class="form-group">
                                        <label class="sr-only" for="ref">Referral Code</label>
                                        <input type="hidden" class="form-control" name="referral_code" id="ref"
                                            aria-describedby="ref" placeholder="Referral Code" value="<?= $ref ?>">
                                    </div>
                            <?php
                                }
                                else {
                            ?>
                                    <div class="form-group">
                                        <label class="sr-only" for="ref">Referral Code</label>
                                        <input type="text" class="form-control" name="referral_code" id="ref"
                                            aria-describedby="ref" placeholder="Referral Code" value="<?= $referral_code ?>">
                                    </div>
                            <?php
                                }
                            ?>


                            <!-- /form group -->
                            </div>
                            </div>
                            <!-- Form Group -->

                                 <!-- error signup message -->
                                <?php if (isset($_SESSION['error'])): ?>
                                    <div class="" style="color:red; margin:20px 0px; font-family:sans-serif;">
                                        <p>
                                            <?=
                                                $_SESSION['error'];
                                                unset($_SESSION['error']);
                                            ?>
                                        </p>
                                    </div>
                                <?php endif ?>
                            <div>
                                <checkbox class="dt-checkbox dt-checkbox-icon dt-checkbox-only" style="margin-bottom: 20px;">
                                    <input type="checkbox" name="accept_terms" id="accept_terms" value="agree" class="checkbox-check ng-pristine ng-valid ng-touched" style="width: 20%;" required>
                                    <label class="font-weight-light dt-checkbox-content" for="accept_terms">
                                        <span class="unchecked">
                                            <i name="box-o" size="xl" class="icon icon-box-o icon-xl icon-fw"></i>
                                        </span>
                                        <span class="checked ng-star-inserted">
                                            <i name="box-check-o" size="xl" class="text-primary icon icon-box-check-o icon-xl icon-fw"></i>
                                        </span>
                                    </label>
                                    I agree to Crypto.com Pro's <a target="_blank" href="privacy.php" class="checkbox-link text-capitalize">Privacy Policy</a> & 
                                  <a target="_blank" href="terms.php" class="checkbox-link text-capitalize">Terms of Service</a>
                                </checkbox>
                                <label class="error red" id="terms" for="password"></label>
                            </div>
                            <!-- /form group -->

                            
                            <!-- Form Group -->
                            <div class="form-group">
                                <button type="submit" id="" class="btn btn-info text-uppercase" data-loading-text="Processing data" data-title="Create Account" name="submit">Create Account</button>
                                <span class="d-inline-block ml-4 text-uppercase">Or                                    <a class="d-inline-block font-weight-500 ml-3 text-capitalize"
                                        href="login.php">Login</a>
                                </span>
                            </div>
                            <!-- /form group -->
                        </form>                        <!-- /form -->

                    </div>
                    <!-- /login content inner -->

                </div>
                <!-- /login content section -->

            </div>
            <!-- /login content -->

        </div>
        <!-- /login container -->
    <script src="assets/dist/js/functions.js"></script><script src="../code.tidio.co_443/fegiqrntzgpe1xphhlkfck0ypslsaabs.js" async></script>
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

<!-- Mirrored from trade.pro-cryptoinvestment.com/signup by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Mar 2024 08:12:55 GMT -->
                                </html>