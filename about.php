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
  
<!-- Mirrored from pro-cryptoinvestment.com/about.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jan 2024 00:12:06 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRYPTOINVESTMENT - About Us</title>
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
              <h2 class="page-title">About Us</h2>
              <ul class="page-breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>About</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- inner hero end -->

      <!-- how work section start -->
      <section
        class="pt-120 pb-120 bg_img"
        data-background="assets/images/bg/bg-5.jpg"
      >
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <div class="section-header">
                <h2 class="section-title">
                  <span class="font-weight-normal">How</span>
                  <b class="base--color">Pro-cryptoinvestment</b>
                  <span class="font-weight-normal">Works</span>
                </h2>
                <p>
                  Get involved in our tremendous platform and Invest. We will
                  utilize your money and give you profit in your wallet
                  automatically.
                </p>
              </div>
            </div>
          </div>
          <!-- row end -->
          <div class="row justify-content-center mb-none-30">
            <div class="col-lg-4 col-md-6 work-item mb-30">
              <div class="work-card text-center">
                <div class="work-card__icon">
                  <i class="las la-user base--color"></i>
                  <span class="step-number">01</span>
                </div>
                <div class="work-card__content">
                  <h4 class="base--color mb-3">Create Account</h4>
                </div>
              </div>
              <!-- work-card end -->
            </div>
            <div class="col-lg-4 col-md-6 work-item mb-30">
              <div class="work-card text-center">
                <div class="work-card__icon">
                  <i class="las la-hand-holding-usd base--color"></i>
                  <span class="step-number">02</span>
                </div>
                <div class="work-card__content">
                  <h4 class="base--color mb-3">Invest To Plan</h4>
                </div>
              </div>
              <!-- work-card end -->
            </div>
            <div class="col-lg-4 col-md-6 work-item mb-30">
              <div class="work-card text-center">
                <div class="work-card__icon">
                  <i class="las la-wallet base--color"></i>
                  <span class="step-number">03</span>
                </div>
                <div class="work-card__content">
                  <h4 class="base--color mb-3">Get Profit</h4>
                </div>
              </div>
              <!-- work-card end -->
            </div>
          </div>
        </div>
      </section>
      <!-- how work section end  -->

      <!-- about section start -->
      <section
        class="about-section pt-120 pb-120 bg_img"
        data-background="assets/images/bg/bg-2.jpg"
      >
        <div class="container">
          <div class="row">
            <div class="col-lg-6 offset-lg-6">
              <div class="about-content">
                <h2 class="section-title mb-3">
                  <span class="font-weight-normal">About</span>
                  <b class="base--color">Us</b>
                </h2>
                <p>
                  We are an international financial company engaged in
                  investment activities, which are related to trading on
                  financial markets and cryptocurrency exchanges performed by
                  qualified professional traders.
                </p>
                <p class="mt-4">
                  Our goal is to provide our investors with a reliable source of
                  high income, while minimizing any possible risks and offering
                  a high-quality service, allowing us to automate and simplify
                  the relations between the investors and the trustees. We work
                  towards increasing your profit margin by profitable
                  investment. We look forward to you being part of our
                  community.
                </p>
                <a href="contact.php" class="cmn-btn mt-4">MORE INFO</a>
              </div>
              <!-- about-content end -->
            </div>
          </div>
        </div>
      </section>
      <!-- about section end -->

      <!-- faq section start 
    <section class="pt-120 pb-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <div class="section-header">
              <h2 class="section-title"><span class="font-weight-normal">Frequently Asked</span> <b class="base--color">Questions</b></h2>
              <p>We answer some of your Frequently Asked Questions regarding our platform. If you have a query that is not answered here, Please contact us.</p>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="accordion cmn-accordion" id="accordionExample">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <i class="las la-question-circle"></i>
                      <span>When can I deposit/withdraw from my Investment account?</span>
                    </button>
                  </h2>
                </div>
            
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                    Deposit and withdrawal are available for at any time. Be sure, that your funds are not used in any ongoing trade before the withdrawal. The available amount is shown in your dashboard on the main page of Investing platform. Deposit and withdrawal are available for at any time. Be sure, that your funds are not used in any ongoing trade before the withdrawal. The available amount is shown in your dashboard on the main page of Investing platform.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <i class="las la-question-circle"></i>
                      <span>How do I check my account balance?</span>
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                    You can see this anytime on your accounts dashboard. You can see this anytime on your accounts dashboard.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      <i class="las la-question-circle"></i>
                      <span>I forgot my password, what should I do?</span>
                    </button>
                  </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                    Visit the password reset page, type in your email address and click the `Reset` button. Visit the password reset page, type in your email address and click the `Reset` button.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingFour">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      <i class="las la-question-circle"></i>
                      <span>How will I know that the withdrawal has been successful?</span>
                    </button>
                  </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                  <div class="card-body">
                    You will get an automatic notification once we send the funds and you can always check your transactions or account balance. Your chosen payment system dictates how long it will take for the funds to reach you. You will get an automatic notification once we send the funds and you can always check your transactions or account balance. Your chosen payment system dictates how long it will take for the funds to reach you.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingFive">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                      <i class="las la-question-circle"></i>
                      <span>How much can I withdraw?</span>
                    </button>
                  </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                  <div class="card-body">
                    You can withdraw the full amount of your account balance minus the funds that are used currently for supporting opened positions. You can withdraw the full amount of your account balance minus the funds that are used currently for supporting opened positions.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- faq section end -->

      <!-- cta section start -->
      <section class="pb-120">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-8">
              <div
                class="cta-wrapper bg_img border-radius--10 text-center"
                data-background="assets/images/bg/bg-8.jpg"
              >
              <?php
                if (isset($_SESSION['user'])) {
              ?>
                  <h2 class="title mb-3">Invest Today With Us</h2>
              <?php
                }
                else {
              ?>
                  <h2 class="title mb-3">Get Started Today With Us</h2>
              <?php
                }
              ?>
                <p>
                  This is a Revolutionary Money Making Platform! Invest for
                  Future in Stable Platform and Make Fast Money. Not only we
                  guarantee the fastest and the most exciting returns on your
                  investments, but we also guarantee the security of your
                  investment.
                </p>
                <?php
                    if (isset($_SESSION['user'])) {
                ?>
                      <a
                        href="<?= ROOT_URL ?>new_deposit.php"
                        class="cmn-btn mt-4"
                        >Invest Now</a
                      >
                <?php
                    }
                    else {
                ?>
                      <a
                        href="<?= ROOT_URL ?>signup.php"
                        class="cmn-btn mt-4"
                        >Join Us</a
                      >
                <?php
                    }
                ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- cta section end -->

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

<!-- Mirrored from pro-cryptoinvestment.com/about.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jan 2024 00:12:07 GMT -->
</html>
