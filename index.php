<?php
session_start();
include 'db.php';
// include('pro_table_check.php');

if (isset($_SESSION['user'])) {
    header("location:user_home.php");
}

if (isset($_SESSION['admin_login'])) {
  header("location:admin_home.php");
}
// $queryy = "Select * FROM user" ;
// $run_queryy = $con->query($queryy);
// while($rwoy = $run_queryy->fetch_object()){
//   $password = password_hash($rwoy->password, PASSWORD_DEFAULT);
//   $q = "update user set password = '$password' where uid = '$rwoy->uid'";
//   $con->query($q);
// }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>BuyNSell</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="logo/auction.png">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Customizable CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/blue.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/rateit.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Barlow:200,300,300i,400,400i,500,500i,600,700,800" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  </head>

  <header class="header-style-1">
      <!-- ============================================== TOP MENU ============================================== -->
      <div class="top-bar animate-dropdown">
        <div class="container">
          <div class="header-top-inner">
            <!-- /.cnt-account -->
            <!-- /.header-top-inner -->
          </div>
          <!-- /.container -->
        </div>
      
        <!-- /.header-top -->
        <!-- ============================================== TOP MENU : END ============================================== -->
        <div class="main-header">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-2 logo-holder">
                <!-- ============================================================= LOGO ============================================================= -->
                <div class="logo">
                  <a href="index.php">
                    <img src="logo.png" alt="logo">
                  </a>
                </div>
                <!-- /.logo -->
                <!-- ============================================================= LOGO : END ============================================================= -->
              </div>
              <!-- /.logo-holder -->
              <div class="col-lg-8 col-md-15 col-sm-9 col-xs-12 top-search-holder">
                <!-- /.contact-row -->
                <!-- ============================================================= SEARCH AREA ============================================================= -->
                <div class="search-area">
                  <form action="searchresult.php" method="POST">
                    <div class="control-group" style="display:flex;">
                      <!-- <ul class="categories-filter animate-dropdown"><li class="dropdown"><a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a><ul class="dropdown-menu" role="menu" ><li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Books</a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Essentials</a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Sports and Fitness</a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Stationery</a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Subscriptions</a></li></ul></li></ul> -->
                      <input class="search-field" name="search" placeholder="Search here..." autocomplete="off" required />
                      <button type="submit" class="search-button"></button>
                      <!-- <a class="search-button" href="#" ></a>  -->
                    </div>
                  </form>
                </div>
                <!-- /.search-area -->
                <!-- ============================================================= SEARCH AREA : END ============================================================= -->
              </div>
              <!-- /.top-cart-row -->
              <div class="cnt-account">
                <ul class="list-unstyled">
                  <li class="login">
                    <a href="home.php">
                      <span>Signup</span>
                    </a>
                  </li>
                  <li class="login">
                    <a href="home.php">
                      <span>Login</span>
                    </a>
                  </li>
                  <li class="login">
                    <a href="admin_login.php">
                      <span>Admin Login</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container -->
        </div>
      </div>

    </header>
  <body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    
    <style>
      .center {
        margin: auto;
        width: 100%;
        justify-content: center;
        /* display:flex; */
        /* border: 3px solid green; */
        /* padding: 10px; */
      }
    </style>
    <br>
    <br>
    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-vs" id="top-banner-and-menu">
      <div class="container">
        
        <div class="center">
          <!-- ========================================== SECTION – HERO ========================================= -->
          <!-- <div id="hero"><div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm"><div class="item" style="background-image: url(assets/images/sliders/011.jpg);"><div class="container-fluid"><div class="caption bg-color vertical-center text-left"><div class="slider-header fadeInDown-1" style = "color:red; "><strong>Top Brands</strong></div><div class="big-text fadeInDown-1"> New Collections </div><div class="excerpt fadeInDown-2 hidden-xs " style = "color:yellow; "><span>Get functional laptops at discounts.</span></div><div class="button-holder fadeInDown-3"><a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a></div></div> -->
          <!-- /.caption -->
          <!-- </div> -->
          <!-- /.container-fluid -->
          <!-- </div> -->
          <!-- /.item -->
          <!-- <div class="item" style="background-image: url(assets/images/sliders/021.jpg);"><div class="container-fluid"><div class="caption bg-color vertical-center text-left"><div class="slider-header fadeInDown-1" style = "color:red; "><strong>Ride</strong></div><div class="big-text fadeInDown-1"> Bicycle </div><div class="excerpt fadeInDown-2 hidden-xs" style = "color:yellow; "><span>Grab your fitness and travel buddy.</span></div><div class="button-holder fadeInDown-3"><a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a></div></div> -->
          <!-- /.caption -->
          <!-- </div> -->
          <!-- /.container-fluid -->
          <!-- </div> -->
          <!-- /.item -->
          <!-- </div> -->
          <!-- /.owl-carousel -->
          <!-- </div> -->
          <!-- ========================================= SECTION – HERO : END ========================================= -->
          <!-- ============================================== SCROLL TABS ============================================== -->
          <div id="product-tabs-slider" class="scroll-tabs outer-top-vs">
            <div class="more-info-tab clearfix " style="background:  -webkit-linear-gradient(left, yellow, #fa4299) !important;">
              <h3 style="margin-top:0px; margin-bottom:0px;" align="center">Product Categories</h3>
              <!-- <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1"><li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li><li><a data-transition-type="backSlide" href="#smartphone" data-toggle="tab">Books</a></li><li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li><li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Music</a></li></ul> -->
              <!-- /.nav-tabs -->
            </div>
            <div class="tab-content outer-top-xs" >
              <div class="tab-pane in active" id="all">
                <div class="product-slider" >
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                    <div class="item item-carousel" >
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image">
                              <a href="books1.php">
                                <img src="product_category/books.jpg" alt="">
                                <!-- <img src="assets/images/products/p1_hover.jpg" alt="" class="hover-image"> -->
                              </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                          <div class="product-info text-left">
                            <h3 class="name">
                              <a href="books1.php">Books</a>
                            </h3>
                            <div class="description"></div>
                            <!-- /.product-price -->
                          </div>
                          <!-- /.product-info -->
                          <!-- /.cart -->
                        </div>
                        <!-- /.product -->
                      </div>
                      <!-- /.products -->
                    </div>
                    <!-- /.item -->
                    <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image">
                              <a href="electronics1.php">
                                <img src="product_category/electronic_items.jpg" alt="">
                                <!-- <img src="assets/images/products/p4_hover.jpg" alt="" class="hover-image"> -->
                              </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                          <div class="product-info text-left">
                            <h3 class="name">
                              <a href="electronics1.php">Electronic Items</a>
                            </h3>
                            <div class="description"></div>
                            <!-- /.product-price -->
                          </div>
                          <!-- /.product-info -->
                          <!-- /.cart -->
                        </div>
                        <!-- /.product -->
                      </div>
                      <!-- /.products -->
                    </div>
                    <!-- /.item -->
                    <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image">
                              <a href="essentials1.php">
                                <img src="product_category/essentials.jpg" alt="">
                                <!-- <img src="assets/images/products/p3_hover.jpg" alt="" class="hover-image"> -->
                              </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                          <div class="product-info text-left">
                            <h3 class="name">
                              <a href="essentials1.php">Essentials</a>
                            </h3>
                            <div class="description"></div>
                            <!-- /.product-price -->
                          </div>
                          <!-- /.product-info -->
                          <!-- /.cart -->
                        </div>
                        <!-- /.product -->
                      </div>
                      <!-- /.products -->
                    </div>
                    <!-- /.item -->
                    <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image">
                              <a href="sports and fitness1.php">
                                <img src="product_category/sports_and_fitness.jpg" alt="">
                                <!-- <img src="assets/images/products/p2_hover.jpg" alt="" class="hover-image"> -->
                              </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                          <div class="product-info text-left">
                            <h3 class="name">
                              <a href="sports and fitness1.php">Sports and Fitness</a>
                            </h3>
                            <div class="description"></div>
                            <!-- /.product-price -->
                          </div>
                          <!-- /.product-info -->
                          <!-- /.cart -->
                        </div>
                        <!-- /.product -->
                      </div>
                      <!-- /.products -->
                    </div>
                    <!-- /.item -->
                    <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image">
                              <a href="stationery1.php">
                                <img src="product_category/stationery.png" alt="">
                                <!-- <img src="assets/images/products/p6_hover.jpg" alt="" class="hover-image"> -->
                              </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                          <div class="product-info text-left">
                            <h3 class="name">
                              <a href="stationery1.php">Stationery</a>
                            </h3>
                            <div class="description"></div>
                            <!-- /.product-price -->
                          </div>
                          <!-- /.product-info -->
                          <!-- /.cart -->
                        </div>
                        <!-- /.product -->
                      </div>
                      <!-- /.products -->
                    </div>
                    <!-- /.item -->
                    <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image">
                              <a href="subscriptions1.php">
                                <img src="product_category/subscriptions.jpg" alt="">
                                <!-- <img src="assets/images/products/p5_hover.jpg" alt="" class="hover-image"> -->
                              </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                          <div class="product-info text-left">
                            <h3 class="name">
                              <a href="subscriptions1.php">Subscriptions</a>
                            </h3>
                            <div class="description"></div>
                            <!-- /.product-price -->
                          </div>
                          <!-- /.product-info -->
                          <!-- /.cart -->
                        </div>
                        <!-- /.product -->
                      </div>
                      <!-- /.products -->
                    </div>
                    <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image">
                              <a href="music instruments1.php">
                                <img src="product_category/music.jpg" alt="">
                                <!-- <img src="assets/images/products/p5_hover.jpg" alt="" class="hover-image"> -->
                              </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                          <div class="product-info text-left">
                            <h3 class="name">
                              <a href="music1.php">Music Instruments</a>
                            </h3>
                            <div class="description"></div>
                            <!-- /.product-price -->
                          </div>
                          <!-- /.product-info -->
                          <!-- /.cart -->
                        </div>
                        <!-- /.product -->
                      </div>
                      <!-- /.products -->
                    </div>
                    <!-- /.item -->
                  </div>
                  <!-- /.home-owl-carousel -->
                </div>
                <!-- /.product-slider -->
              </div>
              <!-- /.tab-pane -->
              <!-- ============================================== SCROLL TABS : END ============================================== -->
              <!-- ============================================== WIDE PRODUCTS ============================================== -->
              <!-- /.wide-banners -->
              <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
              <!-- /.sidebar-widget -->
              <!-- ============================================== BEST SELLER : END ============================================== -->
              <!-- ============================================== BLOG SLIDER ============================================== -->
              <!-- /.section -->
              <!-- ============================================== BLOG SLIDER : END ============================================== -->
              <!-- ============================================== FEATURED PRODUCTS ============================================== -->
              <!-- /.section -->
              <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
          </div>
          <!-- /.row -->
          <!-- ============================================== BRANDS CAROUSEL ============================================== -->
          <!-- /.logo-slider -->
          <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->
      </div>
      <!-- /#top-banner-and-menu -->
      <!-- ============================================== INFO BOXES ============================================== -->
      <div class="row our-features-box">
        <div class="container">
          <ul>
            <li>
              <div class="feature-box">
                <div class="icon-truck"></div>
                <div class="content-blocks">We serve IIITA</div>
              </div>
            </li>
            <li>
              <div class="feature-box">
                <div class="icon-support"></div>
                <div class="content-blocks">call +1 800 789 0000</div>
              </div>
            </li>
            <li>
              <div class="feature-box">
                <div class="fa fa-envelope" style="margin: 8px;"></div>
                <a href="mailto:teambuynsell36@gmail.com">
                  <div class="content-blocks" style="color:black;"> Mail </div>
                </a>
              </div>
            </li>
            <li>
              <div class="feature-box">
                <i class="material-icons">feedback</i>
                <a href="https://forms.gle/ZjbcvAZEgJu291t97">
                  <div class="content-blocks" style="color:black;">Give Feedback</div>
                </a>
                <!-- <div class="content">Buy and Sell</div> -->
              </div>
            </li>
          </ul>
        </div>
      </div>
      <!-- /.info-boxes -->
      <!-- ============================================== INFO BOXES : END ============================================== -->
      <!-- ============================================================= FOOTER ============================================================= -->
      <!-- ============================================================= FOOTER : END============================================================= -->
      <!-- For demo purposes – can be removed on production -->
      <!-- For demo purposes – can be removed on production : End -->
      <!-- JavaScripts placed at the end of the document so the pages load faster -->
      <script src="assets/js/jquery-1.11.1.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
      <script src="assets/js/owl.carousel.min.js"></script>
      <script src="assets/js/echo.min.js"></script>
      <script src="assets/js/jquery.easing-1.3.min.js"></script>
      <script src="assets/js/bootstrap-slider.min.js"></script>
      <script src="assets/js/jquery.rateit.min.js"></script>
      <script src="assets/js/lightbox.min.js"></script>
      <script src="assets/js/bootstrap-select.min.js"></script>
      <script src="assets/js/wow.min.js"></script>
      <script src="assets/js/scripts.js"></script>
  </body>
</html>