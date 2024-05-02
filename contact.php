<?php
  include './config/database.php';
  if (isset($_SESSION['user'])) {
    $id = $_SESSION['user']['id'];
    $query = mysqli_query($con, "SELECT * FROM users WHERE id= '$id'");
    $details = mysqli_fetch_assoc($query);
    $avatar = $details['avatar'];
  }
?>

<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from pro-cryptoinvestment.com/contact.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jan 2024 00:12:07 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRYPTOINVESTMENT - Contact</title>
    <link
      rel="icon"
      type="image/png"
      href="assets/images/favicon.jpg"
      sizes="16x16"
    />
    <!-- bootstrap 4  -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css" />
    <!-- fontawesome 5  -->
    <link rel="stylesheet" href="assets/css/all.min.css" />
    <!-- line-awesome webfont -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/animate.min.css" />
    <!-- slick slider css -->
    <link rel="stylesheet" href="assets/css/vendor/slick.css" />
    <link rel="stylesheet" href="assets/css/vendor/dots.css" />
    <!-- dashdoard main css -->
    <link rel="stylesheet" href="assets/css/main.css" />
  </head>
  <body>
    <div class="preloader">
      <div class="preloader-container">
        <span class="animated-preloader"></span>
      </div>
    </div>

    <!-- scroll-to-top start -->
    <div class="scroll-to-top">
      <span class="scroll-icon">
        <i class="fa fa-rocket" aria-hidden="true"></i>
      </span>
    </div>
    <!-- scroll-to-top end -->

    <div class="full-wh">
      <!-- STAR ANIMATION -->
      <div class="bg-animation">
        <div id="stars"></div>
        <div id="stars2"></div>
        <div id="stars3"></div>
        <div id="stars4"></div>
      </div>
      <!-- / STAR ANIMATION -->
    </div>
    <div class="page-wrapper">
      <!-- header-section start  -->
      <header class="header">
        <div class="header__bottom">
          <div class="container">
            <nav class="navbar navbar-expand-xl p-0 align-items-center">
              <a class="site-logo site-title" href="index.php"
                ><img src="assets/images/logo.png" alt="site-logo"
              /></a>
              <?php
                  if (isset($_SESSION['user'])) {
              ?>
                  <ul class="account-menu mobile-acc-menu">
                        <li class="icon" id="icon">
                            <a href="<?= ROOT_URL ?>dashboard.php">
                              <img src="<?= ROOT_URL ?>assets/images/avatar/<?= $avatar ?>" alt="">
                            </a>
                        </li>
                  </ul>
              <?php
                  }
                  else {
              ?>

                    <ul class="account-menu mobile-acc-menu">
                      <li class="icon">
                        <a href="<?= ROOT_URL ?>login.php"
                          ><i class="las la-user"></i
                        ></a>
                      </li>
                    </ul>
              <?php
                  }
              ?>
              <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="menu-toggle"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav main-menu m-auto">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="about.php">About Us</a></li>
                  <li><a href="plan.php">Plan</a></li>
                  <li><a href="contact.php">Contact</a></li>
                </ul>
                <div class="nav-right">
                  <ul class="account-menu ml-3">
                  <?php
                      if (isset($_SESSION['user'])) {
                  ?>
                        <li class="icon" id="icon">
                            <a href="<?= ROOT_URL ?>dashboard.php">
                              <img src="<?= ROOT_URL ?>assets/images/avatar/<?= $avatar ?>" alt="">
                            </a>
                        </li>
                    <?php
                      }
                    else {
                    ?>

                      <li class="icon">
                        <a href="<?= ROOT_URL ?>login.php"
                          ><i class="las la-user"></i
                        ></a>
                      </li>
                    <?php
                    }
                    ?>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </div>
        <!-- header__bottom end -->
      </header>
      <!-- header-section end  -->

      <!-- inner hero start -->
      <section
        class="inner-hero bg_img"
        data-background="assets/images/bg/bg-1.jpg"
      >
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h2 class="page-title">Contact Us</h2>
              <ul class="page-breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>Contact</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- inner hero end -->

      <!-- contact section start -->
      <section class="pt-120 pb-120">
        <div class="container">
          <div class="contact-wrapper"></div>
          <!-- contact-wrapper end -->
        </div>
        <div class="container pt-120">
          <div class="row justify-content-center">
            <div class="col-lg-10 mb-50">
              <h2 class="font-weight-bold">Quick</h2>
              <h2 class="font-weight-bold">Support.</h2>
              <span>You can get all information</span>
            </div>
            <div class="col-lg-10">
              <div class="row mb-none-30">
                <div class="col-md-4 col-sm-6 mb-30">
                  <div class="contact-item">
                    <i class="fas fa-phone-alt"></i>
                    <h5 class="mt-2">Call Us</h5>
                    <div class="mt-4">
                      <p>+61 416 843 233</p>
                    </div>
                  </div>
                  <!-- contact-item end -->
                </div>
                <div class="col-md-4 col-sm-6 mb-30">
                  <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <h5 class="mt-2">Mail Us</h5>
                    <div class="mt-4">
                      <p>
                        <a
                          href="mailto:info@pro-cryptoinvestment.com"
                          style="text-decoration: underline"
                          >info@pro-cryptoinvestment.com</a
                        >
                      </p>
                    </div>
                  </div>
                  <!-- contact-item end -->
                </div>
                <div class="col-md-4 col-sm-6 mb-30">
                  <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <h5 class="mt-2">Visit Us</h5>
                    <div class="mt-4">
                      <p>4 Defries Ave, Zetland NSW 2017, Australia</p>
                    </div>
                  </div>
                  <!-- contact-item end -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- contact section end -->

      <!-- footer section start -->
      <footer class="footer bg_img" data-background="assets/images/bg/bg-7.jpg">
        <div class="footer__top">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-12 text-center">
                <a href="#0" class="footer-logo"
                  ><img src="assets/images/logo.png" alt="image"
                /></a>
                <ul
                  class="footer-short-menu d-flex flex-wrap justify-content-center mt-4"
                >
                  <li><a href="index.php">Home</a></li>
                  <li><a href="plan.php">Investment Plan</a></li>
                  <li><a href="contact.php">Contact</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="footer__bottom">
          <div class="container">
            <div class="row">
              <div class="col-md-6 text-md-left text-center">
                <p>
                  © 2024
                  <a href="index.php" class="base--color"
                    >PRO-CRYPTOINVESTMENT</a
                  >. All rights reserved
                </p>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- footer section end -->
    </div>
    <!-- page-wrapper end -->

    <!-- jQuery library -->
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- slick slider js -->
    <script src="assets/js/vendor/slick.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/contact.js"></script>
    <!-- dashboard custom js -->
    <script src="assets/js/app.js"></script>
  </body>

<!-- Mirrored from pro-cryptoinvestment.com/contact.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jan 2024 00:12:08 GMT -->
</html>
