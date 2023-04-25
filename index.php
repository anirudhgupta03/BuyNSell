<?php
session_start();
include 'db.php';
// include('pro_table_check.php');

if (isset($_SESSION['user'])) {
    header("location:user_home.php");
}

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
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
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
          <div class="logo"> <a href="index.php"> <img src="logo.png" alt="logo"> </a> </div>
          <!-- /.logo --> 
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->
        
        <div class="col-lg-8 col-md-15 col-sm-9 col-xs-12 top-search-holder"> 
          <!-- /.contact-row --> 
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search-area">
            <form action = "searchresult.php" method="POST">
              <div class="control-group" style="display:flex;">
                <!-- <ul class="categories-filter animate-dropdown">
                  <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" >
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Books</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Essentials</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Sports and Fitness</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Stationery</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Subscriptions</a></li>
                    </ul>
                  </li>
                </ul> -->
                <input class="search-field" name = "search" placeholder="Search here..." />
                <button type="submit" class="search-button" > </button> 
                <!-- <a class="search-button" href="#" ></a>  -->
              </div>
            </form>
          </div>
          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->
        
        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          
          
          <!-- /.dropdown-cart --> 
          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row --> 
        <div class="cnt-account">
          <ul class="list-unstyled">
            <?php
            if (isset($_SESSION['user'])){
            ?>
            <li class="myaccount"><a href="#"><span>My Account</span></a></li>
            <li class="wishlist"><a href="#"><span>Wishlist</span></a></li>
            <li class="header_cart hidden-xs"><a href="#"><span>My Cart</span></a></li>
            <li class="check"><a href="#"><span>Logout</span></a></li>
            <?php
            }
            ?>
            <li class="login"><a href="home.php"><span>Signup</span></a></li>
            <li class="login"><a href="home.php"><span>Login</span></a></li>
            <li class="login"><a href="admin_login.php"><span>Admin Login</span></a></li>
          </ul>
        </div>
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 
  
</header>
<style>
  .center {
  margin: auto;
  width: 80%;
  justify-content: center;
  /* display:flex; */
  /* border: 3px solid green; */
  /* padding: 10px; */
}
  </style>
<br><br>
<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-vs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      <!-- <div class="col-xs-12 col-sm-12 col-md-3 sidebar">  -->
        
        <!-- ================================== TOP NAVIGATION ================================== -->
        <!-- <div class="side-menu animate-dropdown outer-bottom-xs"> -->
          <!-- <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal"> -->
            <!-- <ul class="nav">

            <li class="dropdown menu-item"> <a href="books1.php"><i class="icon fa fa-book" aria-hidden="true"></i>Books</a>
             
              <li class="dropdown menu-item"> <a href="electronics1.php" ><i class="icon fa fa-laptop" aria-hidden="true"></i>Electronics</a> 
              
              
                
              
              <li class="dropdown menu-item"> <a href="essentials1.php"><i class="icon fa fa-clock-o"></i>Essentials</a>
              
              <li class="dropdown menu-item"> <a href="sports and fitness1.php"><i class="icon fa fa-futbol-o"></i>Sports and Fitness</a></li>
               /.menu-item -->
              
              
              
              <!-- <li class="dropdown menu-item"> <a href="stationery1.php"><i class="icon fa fa-pencil"></i>Stationery</a> 
                
              
             
              
              <li class="dropdown menu-item"> <a href="subscriptions1.php"><i class="icon fa fa-star"></i>Subscriptions</a> 

              <li class="dropdown menu-item"> <a href="music instruments1.php"><i class="icon fa fa-music"></i>Music Instruments</a>  -->
              
            <!-- </ul>  -->
            <!-- /.nav --> 
          <!-- </nav> -->
          <!-- /.megamenu-horizontal --> 
        <!-- W</div> -->
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== --> 
        
        <!-- ============================================== HOT DEALS ============================================== -->
        <!-- <div class="sidebar-widget hot-deals outer-bottom-xs">
          <h3 class="section-title">Hot deals</h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <div class="image"> 
                  <a href="#">
                  <img src="assets/images/hot-deals/p131.jpg" alt=""> 
                  <img src="assets/images/hot-deals/p131_hover.jpg" alt="" class="hover-image">
                  </a>
                  </div>
                  <div class="sale-offer-tag"><span>49%<br>
                    off</span></div>
                  <div class="timing-wrapper">
                    <div class="box-wrapper">
                      <div class="date box"> <span class="key">20</span> <span class="value">DAYS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="hour box"> <span class="key">10</span> <span class="value">HRS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="minutes box"> <span class="key">23</span> <span class="value">MINS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="seconds box"> <span class="key">19</span> <span class="value">SEC</span> </div>
                    </div>
                  </div>
                </div>
                
                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href="detail.html">Cooler</a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="product-price"> <span class="price"> Rs. 600.00 </span> <span class="price-before-discount">Rs. 800.00</span> </div>
                  
                </div>
                
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <div class="add-cart-button btn-group">
                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <div class="image"> 
                   <a href="#">
                  <img src="assets/images/hot-deals/p141.jpg" alt=""> 
                  <img src="assets/images/hot-deals/p141_hover.jpg" alt="" class="hover-image">
                  </a>
                   </div>
                  <div class="sale-offer-tag"><span>35%<br>
                    off</span></div>
                  <div class="timing-wrapper">
                    <div class="box-wrapper">
                      <div class="date box"> <span class="key">20</span> <span class="value">Days</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="hour box"> <span class="key">10</span> <span class="value">HRS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="minutes box"> <span class="key">30</span> <span class="value">MINS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="seconds box"> <span class="key">50</span> <span class="value">SEC</span> </div>
                    </div>
                  </div>
                </div>
                
                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href="detail.html">Room Heater</a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="product-price"> <span class="price"> Rs. 600.00 </span> <span class="price-before-discount">Rs. 800.00</span> </div>
                  
                </div>
                
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <div class="add-cart-button btn-group">
                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <div class="image">
                   <a href="#">
                  <img src="assets/images/hot-deals/p151.jpg" alt=""> 
                  <img src="assets/images/hot-deals/p151_hover.jpg" alt="" class="hover-image">
                  </a>
                   </div>
                  <div class="sale-offer-tag"><span>35%<br>
                    off</span></div>
                  <div class="timing-wrapper">
                    <div class="box-wrapper">
                      <div class="date box"> <span class="key">20</span> <span class="value">Days</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="hour box"> <span class="key">30</span> <span class="value">HRS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="minutes box"> <span class="key">43</span> <span class="value">MINS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="seconds box"> <span class="key">54</span> <span class="value">SEC</span> </div>
                    </div>
                  </div>
                </div>
                
                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href="detail.html">Dumbell</a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="product-price"> <span class="price"> Rs. 500.00 </span> <span class="price-before-discount">Rs. 700.00</span> </div>
                  
                </div>
                
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <div class="add-cart-button btn-group">
                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <!-- ============================================== HOT DEALS: END ============================================== --> 
        
        <!-- ============================================== SPECIAL OFFER ============================================== -->
        
       
        <!-- ============================================== SPECIAL OFFER : END ============================================== --> 
        <!-- ============================================== PRODUCT TAGS ============================================== -->
        <!-- <div class="sidebar-widget product-tag">
          <h3 class="section-title">Product tags</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="tag-list"> <a class="item" title="Phone" href="category.html">Laptop</a> <a class="item active" title="Vest" href="category.html">Kettle</a> <a class="item" title="Smartphone" href="category.html">Guitar</a> <a class="item" title="Furniture" href="category.html">Lamps</a> <a class="item" title="T-shirt" href="category.html">Cooler</a> <a class="item" title="Sweatpants" href="category.html">Room heaters</a> <a class="item" title="Sneaker" href="category.html">Lan Cable</a> <a class="item" title="Toys" href="category.html">Subscriptions</a> <a class="item" title="Rose" href="category.html">Cycle</a> <a class="item" title="Rose" href="category.html">Books</a> <a class="item" title="Rose" href="category.html">Dumbell</a> </div> -->
            <!-- /.tag-list --> 
          <!-- </div> -->
          <!-- /.sidebar-widget-body --> 
        <!-- </div> -->

      
        <!-- /.sidebar-widget --> 
        <!-- ============================================== PRODUCT TAGS : END ============================================== --> 
        <!-- ============================================== SPECIAL DEALS ============================================== -->
        
        
        <!-- /.sidebar-widget --> 
        <!-- ============================================== SPECIAL DEALS : END ============================================== --> 
        <!-- ============================================== NEWSLETTER ============================================== -->
        <!-- <div class="sidebar-widget newsletter outer-bottom-small">
          <h3 class="section-title">Newsletters</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p>Sign Up for Our Newsletter!</p>
            <form>
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
              </div>
              <button class="btn btn-primary">Subscribe</button>
            </form>
          </div>
        </div> -->
        <!-- /.sidebar-widget --> 
        <!-- ============================================== NEWSLETTER: END ============================================== --> 
        
        <!-- ============================================== Testimonials============================================== -->
        <!-- <div class="sidebar-widget outer-top-vs ">
          <div id="advertisement" class="advertisement">
            <div class="item">
              <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
              <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer. Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat.<em>"</em></div>
              <div class="clients_author">John Doe <span>Abc Company</span> </div>
            </div>
            
            <div class="item">
              <div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
              <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer. Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat.<em>"</em></div>
              <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
            </div>
            
            <div class="item">
              <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
              <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer. Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat.<em>"</em></div>
              <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
            </div>
            
          </div>
        </div> -->
        
        <!-- ============================================== Testimonials: END ============================================== -->
        
        
      </div>
      

      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      
      <!-- ============================================== CONTENT ============================================== -->
      <div class="center"> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <!-- <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
            <div class="item" style="background-image: url(assets/images/sliders/011.jpg);">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1" style = "color:red; "><strong>Top Brands</strong></div>
                  <div class="big-text fadeInDown-1"> New Collections </div>
                  <div class="excerpt fadeInDown-2 hidden-xs " style = "color:yellow; "> <span>Get functional laptops at discounts.</span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div> -->
                <!-- /.caption --> 
              <!-- </div> -->
              <!-- /.container-fluid --> 
            <!-- </div> -->
            <!-- /.item -->
            
            <!-- <div class="item" style="background-image: url(assets/images/sliders/021.jpg);">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1" style = "color:red; "><strong>Ride</strong></div>
                  <div class="big-text fadeInDown-1"> Bicycle </div>
                  <div class="excerpt fadeInDown-2 hidden-xs" style = "color:yellow; "> <span>Grab your fitness and travel buddy.</span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div> -->
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
            <h3 class="new-product-title pull-left">Product Categories</h3>
            <!-- <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
              <li><a data-transition-type="backSlide" href="#smartphone" data-toggle="tab">Books</a></li>
              <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>
              <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Music</a></li>
            </ul> -->
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                  <div class="item item-carousel">
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
                          <h3 class="name"><a href="books1.php">Books</a></h3>
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
                          <h3 class="name"><a href="electronics1.php">Electronic Items</a></h3>
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
                          <h3 class="name"><a href="essentials1.php">Essentials</a></h3>
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
                          <h3 class="name"><a href="sports and fitness1.php">Sports and Fitness</a></h3>
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
                          <h3 class="name"><a href="stationery1.php">Stationery</a></h3>
                          
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
                          <h3 class="name"><a href="subscriptions1.php">Subscriptions</a></h3>
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
                          <h3 class="name"><a href="music instruments1.php">Music Instruments</a></h3>
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
            <div class="content-blocks">call 
              +1 800 789 0000</div>
          </div>
        </li>
        <li>
          <div class="feature-box">
            <div class="fa fa-envelope" style="margin: 8px;"></div>
             <a href="mailto:teamBYS@gmail.com"><div class="content-blocks" style="color:black;"> Mail </div></a>
          </div>
        </li>
        <li>
          <div class="feature-box">
          <i class="material-icons">feedback</i>
            <a href="https://forms.gle/ZjbcvAZEgJu291t97"><div class="content-blocks" style="color:black;">Give Feedback</div></a>

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