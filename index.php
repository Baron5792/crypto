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
  
<!-- Mirrored from pro-cryptoinvestment.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Jan 2024 20:15:51 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRYPTOINVESTMENT - Home</title>
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
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/fontawesome-free-6.1.1-web/css/all.css">
  </head>
  <body>
    <!-- <div class="preloader">
      <div class="preloader-container">
        <span class="animated-preloader"></span>
      </div>
    </div> -->

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
                              <img src="<?= ROOT_URL ?>assets/images/avatar/<?= $avatar ?>" alt="Img">
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

      <!-- hero start -->
      <section class="hero bg_img" data-background="assets/images/hero.jpg">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-8">
              <div class="hero__content">
                <h2 class="hero__title">
                  <span class="text-white font-weight-normal"
                    >Invest for your Future
                  </span>
                  <b class="base--color">with a reliable plaform</b>
                </h2>
                <p class="text-white f-size-18 mt-3">
                  Introducing the newest way to gain from the base ecosystem,
                  PRO-CRYPTOINVESTMENT. Using the best of coinbase algorithms
                  and nodes, we find the easiest ways to aggregate your funds
                  and earn you money while investing with us.
                </p>
                <?php
                  if (isset($_SESSION['user'])) {
                ?>
                    <a
                      href="<?= ROOT_URL ?>new_deposit.php"
                      class="cmn-btn text-uppercase font-weight-600 mt-4"
                      >Invest</a
                    >
                <?php
                  }

                  else {
                ?>
                    <a
                      href="<?= ROOT_URL ?>signup.php"
                      class="cmn-btn text-uppercase font-weight-600 mt-4"
                      >Sign Up</a
                    >
                <?php
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- hero end -->

      <!-- about section start -->
      <section
        class="about-section pt-120 pb-120 bg_img"
        data-background="assets/images/bg-2.jpg"
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

      <!-- package section start -->
      <section class="pt-120 pb-120">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <div class="section-header">
                <h2 class="section-title">
                  <span class="font-weight-normal">Investment</span>
                  <b class="base--color">Plans</b>
                </h2>
                <p>
                  To make a solid investment, you have to know where you are
                  investing. Find a plan which is best for you.
                </p>
              </div>
            </div>
          </div>
          <!-- row end -->
          <div class="row justify-content-center mb-none-30">
            <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
              <div
                class="package-card text-center bg_img"
                data-background="assets/images/bg-4.png"
              >
                <h4 class="package-card__title base--color mb-2">Starter</h4>
                <ul class="package-card__features mt-4">
                  <li>Return 20%</li>
                  <li>Daily</li>
                  <li>For 2 Weeks</li>
                </ul>
                <div class="package-card__range mt-5 base--color">
                  $100 - $2000
                </div>
                <?php
                    if (isset($_SESSION['user'])) {
                ?>
                      <a
                        href="<?= ROOT_URL ?>new_deposit.php"
                        class="cmn-btn btn-md mt-4"
                        >Invest Now</a
                      >
                <?php
                    }
                    else {
                ?>
                      <a
                        href="<?= ROOT_URL ?>signup.php"
                        class="cmn-btn btn-md mt-4"
                        >Invest Now</a
                      >
                <?php
                    }
                ?>
              </div>
              <!-- package-card end -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
              <div
                class="package-card text-center bg_img"
                data-background="assets/images/bg-4.png"
              >
                <h4 class="package-card__title base--color mb-2">Basic</h4>
                <ul class="package-card__features mt-4">
                  <li>Return 20%</li>
                  <li>Daily</li>
                  <li>For 2 Weeks</li>
                </ul>
                <div class="package-card__range mt-5 base--color">
                  $2100 - $4400
                </div>
                <?php
                    if (isset($_SESSION['user'])) {
                ?>
                      <a
                        href="<?= ROOT_URL ?>new_deposit.php"
                        class="cmn-btn btn-md mt-4"
                        >Invest Now</a
                      >
                <?php
                    }
                    else {
                ?>
                      <a
                        href="<?= ROOT_URL ?>signup.php"
                        class="cmn-btn btn-md mt-4"
                        >Invest Now</a
                      >
                <?php
                    }
                ?>
              </div>
              <!-- package-card end -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
              <div
                class="package-card text-center bg_img"
                data-background="assets/images/bg-4.png"
              >
                <h4 class="package-card__title base--color mb-2">Advanced</h4>
                <ul class="package-card__features mt-4">
                  <li>Return 20%</li>
                  <li>Daily</li>
                  <li>For 2 Weeks</li>
                </ul>
                <div class="package-card__range mt-5 base--color">
                  $5000 - $11000
                </div>
                <?php
                    if (isset($_SESSION['user'])) {
                ?>
                      <a
                        href="<?= ROOT_URL ?>new_deposit.php"
                        class="cmn-btn btn-md mt-4"
                        >Invest Now</a
                      >
                <?php
                    }
                    else {
                ?>
                      <a
                        href="<?= ROOT_URL ?>signup.php"
                        class="cmn-btn btn-md mt-4"
                        >Invest Now</a
                      >
                <?php
                    }
                ?>
              </div>
              <!-- package-card end -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
              <div
                class="package-card text-center bg_img"
                data-background="assets/images/bg-4.png"
              >
                <h4 class="package-card__title base--color mb-2">
                  Professional
                </h4>
                <ul class="package-card__features mt-4">
                  <li>Return 20%</li>
                  <li>Daily</li>
                  <li>For 2 Weeks</li>
                </ul>
                <div class="package-card__range mt-5 base--color">
                  $11200 - $15400
                </div>
                <?php
                    if (isset($_SESSION['user'])) {
                ?>
                      <a
                        href="<?= ROOT_URL ?>new_deposit.php"
                        class="cmn-btn btn-md mt-4"
                        >Invest Now</a
                      >
                <?php
                    }
                    else {
                ?>
                      <a
                        href="<?= ROOT_URL ?>signup.php"
                        class="cmn-btn btn-md mt-4"
                        >Invest Now</a
                      >
                <?php
                    }
                ?>
              </div>
              <!-- package-card end -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
              <div
                class="package-card text-center bg_img"
                data-background="assets/images/bg-4.png"
              >
                <h4 class="package-card__title base--color mb-2">Gold</h4>
                <ul class="package-card__features mt-4">
                  <li>Return 20%</li>
                  <li>Daily</li>
                  <li>For 2 Weeks</li>
                </ul>
                <div class="package-card__range mt-5 base--color">
                  $16000 - $22000
                </div>
                <?php
                    if (isset($_SESSION['user'])) {
                ?>
                      <a
                        href="<?= ROOT_URL ?>new_deposit.php"
                        class="cmn-btn btn-md mt-4"
                        >Invest Now</a
                      >
                <?php
                    }
                    else {
                ?>
                      <a
                        href="<?= ROOT_URL ?>signup.php"
                        class="cmn-btn btn-md mt-4"
                        >Invest Now</a
                      >
                <?php
                    }
                ?>
              </div>
              <!-- package-card end -->
            </div>
          </div>
          <!-- row end -->
          <!-- <div class="row mt-50">
          <div class="col-lg-12 text-center">
            <a href="#0" class="cmn-btn">View All Packages</a>
          </div>
        </div> -->
        </div>
      </section>
      <!-- package section end  -->

      <!-- choose us section start -->
      <section
        class="pt-120 pb-120 overlay--radial bg_img"
        data-background="assets/images/bg-3.jpg"
      >
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <div class="section-header">
                <h2 class="section-title">
                  <span class="font-weight-normal">Why Choose</span>
                  <b class="base--color">Pro-cryptoinvestment</b>
                </h2>
                <p>
                  Our goal is to provide our investors with a reliable source of
                  high income, while minimizing any possible risks and offering
                  a high-quality service.
                </p>
              </div>
            </div>
          </div>
          <!-- row end -->
          <div class="row justify-content-center mb-none-30">
            <div class="col-xl-4 col-md-6 mb-30">
              <div class="choose-card border-radius--5">
                <div class="choose-card__header mb-3">
                  <div class="choose-card__icon">
                    <i class="lar la-copy"></i>
                  </div>
                  <h4 class="choose-card__title base--color">Legal Company</h4>
                </div>
                <p>
                  Our company conducts absolutely legal activities in the legal
                  field. We are certified to operate investment business, we are
                  legal and safe.
                </p>
              </div>
              <!-- choose-card end -->
            </div>
            <div class="col-xl-4 col-md-6 mb-30">
              <div class="choose-card border-radius--5">
                <div class="choose-card__header mb-3">
                  <div class="choose-card__icon">
                    <i class="las la-lock"></i>
                  </div>
                  <h4 class="choose-card__title base--color">
                    High reliability
                  </h4>
                </div>
                <p>
                  We are trusted by a huge number of people. We are working hard
                  constantly to improve the level of our security system and
                  minimize possible risks.
                </p>
              </div>
              <!-- choose-card end -->
            </div>
            <div class="col-xl-4 col-md-6 mb-30">
              <div class="choose-card border-radius--5">
                <div class="choose-card__header mb-3">
                  <div class="choose-card__icon">
                    <i class="las la-user-lock"></i>
                  </div>
                  <h4 class="choose-card__title base--color">Anonymity</h4>
                </div>
                <p>
                  Anonymity and using cryptocurrency as a payment instrument. In
                  the era of electronic money – this is one of the most
                  convenient ways of cooperation.
                </p>
              </div>
              <!-- choose-card end -->
            </div>
            <div class="col-xl-4 col-md-6 mb-30">
              <div class="choose-card border-radius--5">
                <div class="choose-card__header mb-3">
                  <div class="choose-card__icon">
                    <i class="las la-shipping-fast"></i>
                  </div>
                  <h4 class="choose-card__title base--color">
                    Quick Withdrawal
                  </h4>
                </div>
                <p>
                  Our all retreats are treated spontaneously once requested.
                  There are high maximum limits.
                </p>
              </div>
              <!-- choose-card end -->
            </div>
            <div class="col-xl-4 col-md-6 mb-30">
              <div class="choose-card border-radius--5">
                <div class="choose-card__header mb-3">
                  <div class="choose-card__icon">
                    <i class="las la-users"></i>
                  </div>
                  <h4 class="choose-card__title base--color">
                    Referral Program
                  </h4>
                </div>
                <p>
                  We are offering a certain level of referral income through our
                  referral program. you can increase your income by simply refer
                  a few people.
                </p>
              </div>
              <!-- choose-card end -->
            </div>
            <div class="col-xl-4 col-md-6 mb-30">
              <div class="choose-card border-radius--5">
                <div class="choose-card__header mb-3">
                  <div class="choose-card__icon">
                    <i class="las la-headset"></i>
                  </div>
                  <h4 class="choose-card__title base--color">24/7 Support</h4>
                </div>
                <p>
                  We provide 24/7 customer support through e-mail and telegram.
                  Our support representatives are periodically available to
                  elucidate any difficulty..
                </p>
              </div>
              <!-- choose-card end -->
            </div>
            <div class="col-xl-4 col-md-6 mb-30">
              <div class="choose-card border-radius--5">
                <div class="choose-card__header mb-3">
                  <div class="choose-card__icon">
                    <i class="las la-server"></i>
                  </div>
                  <h4 class="choose-card__title base--color">
                    Dedicated Server
                  </h4>
                </div>
                <p>
                  We are using a dedicated server for the website which allows
                  us exclusive use of the resources of the entire server.
                </p>
              </div>
              <!-- choose-card end -->
            </div>
            <div class="col-xl-4 col-md-6 mb-30">
              <div class="choose-card border-radius--5">
                <div class="choose-card__header mb-3">
                  <div class="choose-card__icon">
                    <i class="fab fa-expeditedssl"></i>
                  </div>
                  <h4 class="choose-card__title base--color">SSL Secured</h4>
                </div>
                <p>
                  Comodo Essential-SSL Security encryption confirms that the
                  presented content is genuine and legitimate.
                </p>
              </div>
              <!-- choose-card end -->
            </div>
            <div class="col-xl-4 col-md-6 mb-30">
              <div class="choose-card border-radius--5">
                <div class="choose-card__header mb-3">
                  <div class="choose-card__icon">
                    <i class="las la-shield-alt"></i>
                  </div>
                  <h4 class="choose-card__title base--color">
                    DDOS Protection
                  </h4>
                </div>
                <p>
                  We are using one of the most experienced, professional, and
                  trusted DDoS Protection and mitigation provider.
                </p>
              </div>
              <!-- choose-card end -->
            </div>
          </div>
        </div>
      </section>
      <!-- choose us section end  -->

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

      <!-- testimonial section start -->
      <section
        class="pt-120 pb-120 bg_img overlay--radial"
        data-background="assets/images/bg-7.jpg"
      >
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <div class="section-header">
                <h2 class="section-title">
                  <span class="font-weight-normal">What Users Say</span>
                  <b class="base--color">About Us</b>
                </h2>
              </div>
            </div>
          </div>
          <!-- row end -->
          <div class="row">
            <div class="col-lg-12">
              <div class="testimonial-slider">
                <div class="single-slide">
                  <div class="testimonial-card">
                    <div class="testimonial-card__content">
                      <p>
                        Your company is exactly what I was looking for. Clear,
                        clean, continuous, with a focus on clients. Thank you so
                        much for your work.
                      </p>
                    </div>
                    <div class="testimonial-card__client">
                      <div class="thumb">
                        <img
                          src="assets/images/1.jpg"
                          alt="image"
                        />
                      </div>
                      <div class="content">
                        <h6 class="name">Chris</h6>
                        <div class="ratings">
                          <i class="las la-star"></i>
                          <i class="las la-star"></i>
                          <i class="las la-star"></i>
                          <i class="las la-star"></i>
                          <i class="las la-star"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- testimonial-card end -->
                </div>
                <!-- single-slide end -->
                <div class="single-slide">
                  <div class="testimonial-card">
                    <div class="testimonial-card__content">
                      <p>
                        The program like Pro-cryptoinvestment.com enables me to
                        execute the kind of one-on-one business Ive looking for.
                        Its the kind of product that is taking our business to a
                        different level.
                      </p>
                    </div>
                    <div class="testimonial-card__client">
                      <div class="thumb">
                        <img
                          src="assets/images/2.jpg"
                          alt="image"
                        />
                      </div>
                      <div class="content">
                        <h6 class="name">Amelia</h6>
                        <div class="ratings">
                          <i class="las la-star"></i>
                          <i class="las la-star"></i>
                          <i class="las la-star"></i>
                          <i class="las la-star"></i>
                          <i class="las la-star"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- testimonial-card end -->
                </div>
                <!-- single-slide end -->
                <div class="single-slide">
                  <div class="testimonial-card">
                    <div class="testimonial-card__content">
                      <p>
                        Ive always liked good stylish programs, but never
                        invested quite enough to have a good profit. Now, thanks
                        to Pro-cryptoinvestment.com, we have a program we can be
                        proud of.
                      </p>
                    </div>
                    <div class="testimonial-card__client">
                      <div class="thumb">
                        <img
                          src="assets/images/3.jpg"
                          alt="image"
                        />
                      </div>
                      <div class="content">
                        <h6 class="name">Matt</h6>
                        <div class="ratings">
                          <i class="las la-star"></i>
                          <i class="las la-star"></i>
                          <i class="las la-star"></i>
                          <i class="las la-star"></i>
                          <i class="las la-star"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- testimonial-card end -->
                </div>
                <!-- single-slide end -->
                <div class="single-slide">
                  <div class="testimonial-card">
                    <div class="testimonial-card__content">
                      <p>
                        Easy, Fast And reliable. got my profits immediately
                        after trading. Pro-cryptoinvestment is Awesome
                      </p>
                    </div>
                    <div class="testimonial-card__client">
                      <div class="thumb">
                        <img
                          src="assets/images/4.jpg"
                          alt="image"
                        />
                      </div>
                      <div class="content">
                        <h6 class="name">George</h6>
                        <div class="ratings">
                          <i class="las la-star"></i>
                          <i class="las la-star"></i>
                          <i class="las la-star"></i>
                          <i class="las la-star"></i>
                          <i class="las la-star"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- testimonial-card end -->
                </div>
                <!-- single-slide end -->
              </div>
            </div>
          </div>
          <!-- row end -->
        </div>
      </section>
      <!-- testimonial section end -->

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

      <!-- payment brand section start -->
      <!-- <section class="pb-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <div class="section-header">
              <h2 class="section-title"><span class="font-weight-normal">Payment We</span> <b class="base--color">Accept</b></h2>
              <p>We accept all major cryptocurrencies and fiat payment methods to make your investment process easier with our platform.</p>
            </div>
          </div>
        </div>row end -->
      <!-- <div class="row">
          <div class="col-lg-12">
            <div class="payment-slider">
              <div class="single-slide">
                <div class="brand-item">
                  <img src="assets/images/brand/1.png" alt="image">
                </div>brand-item end -->
      <!-- </div>
              <div class="single-slide">
                <div class="brand-item">
                  <img src="assets/images/brand/2.png" alt="image">
                </div>brand-item end -->
      <!-- </div>
              <div class="single-slide">
                <div class="brand-item">
                  <img src="assets/images/brand/3.png" alt="image">
                </div><!-- brand-item end -->
      <!-- </div>
              <div class="single-slide">
                <div class="brand-item">
                  <img src="assets/images/brand/4.png" alt="image">
                </div>brand-item end
              </div>
              <div class="single-slide">
                <div class="brand-item">
                  <img src="assets/images/brand/5.png" alt="image">
                </div>brand-item end -->
      <!-- </div>
              <div class="single-slide">
                <div class="brand-item">
                  <img src="assets/images/brand/6.png" alt="image">
                </div>brand-item end -->
      <!-- </div>
              <div class="single-slide">
                <div class="brand-item">
                  <img src="assets/images/brand/7.png" alt="image">
                </div>brand-item end -->
      <!-- </div>
              <div class="single-slide">
                <div class="brand-item">
                  <img src="assets/images/brand/8.png" alt="image">
                </div>brand-item end -->
      <!-- </div>
            </div>payment-slider end -->
      <!-- </div>
        </div>
      </div>
    </section> -->
      <!-- payment brand section end -->

      <!-- footer section start -->
      <footer class="footer bg_img" data-background="assets/images/bg-7.jpg">
        <div class="footer__top">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-12 text-center">
                <a href="index.php" class="footer-logo"
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

<!-- Mirrored from pro-cryptoinvestment.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Jan 2024 20:16:33 GMT -->
</html>
