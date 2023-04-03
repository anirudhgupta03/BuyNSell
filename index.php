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
          <div class="logo"> <a href="home.html"> <img src="logo.png" alt="logo"> </a> </div>
          <!-- /.logo --> 
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->
        
        <div class="col-lg-8 col-md-15 col-sm-9 col-xs-12 top-search-holder"> 
          <!-- /.contact-row --> 
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search-area">
            <form>
              <div class="control-group">
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
                <input class="search-field" placeholder="Search here..." />
                <a class="search-button" href="#" ></a> </div>
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

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-vs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        
        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
             
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-laptop" aria-hidden="true"></i>Electronics</a> 
                <!-- ================================== MEGAMENU VERTICAL ================================== -->
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-6">
                        <ul>
                          <li><a href="#">Gaming</a></li>
                          <li><a href="#">Laptop Skins</a></li>
                          <li><a href="#">Apple</a></li>
                          <li><a href="#">Dell</a></li>
                          <li><a href="#">Lenovo</a></li>
                          <li><a href="#">Microsoft</a></li>
                          <li><a href="#">Asus</a></li>
                          <li><a href="#">Adapters</a></li>
                          <li><a href="#">Batteries</a></li>
                          <li><a href="#">Cooling Pads</a></li>
                        </ul>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-6">
                        <ul>
                          <li><a href="#">Routers &amp; Modems</a></li>
                          <li><a href="#">CPUs, Processors</a></li>
                          <li><a href="#">PC Gaming Store</a></li>
                          <li><a href="#">Graphics Cards</a></li>
                          <li><a href="#">Components</a></li>
                          <li><a href="#">Webcam</a></li>
                          <li><a href="#">Memory (RAM)</a></li>
                          <li><a href="#">Motherboards</a></li>
                          <li><a href="#">Keyboards</a></li>
                          <li><a href="#">Headphones</a></li>
                        </ul>
                      </div>
                      <!-- <div class="dropdown-banner-holder"> <a href="#"><img alt="" src="assets/images/banners/banner-side.png" /></a> </div> -->
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> 
                <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
              <!-- /.menu-item -->
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-book" aria-hidden="true"></i>Books</a>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                      <div class="col-sm-12 col-md-4">
                        <ul class="links list-unstyled">
                          <li><a href="#">Let Us C</a></li>
                          <li><a href="#"> JavaScript: The Good Parts </a></li>
                          <li><a href="#">The Pragmatic Programmer</a></li>
                          <li><a href="#">Modern Operating Systems</a></li>
                          <li><a href="#">Introduction to Algorithms</a></li>
                          <li><a href="#">C Programming Language</a></li>
                          <li><a href="#">The Little Schemer</a></li>
                          <li><a href="#">Computer Organization and Designs</a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-12 col-md-4">
                        <ul class="links list-unstyled">
                          <li><a href="#">Programming Pearls</a></li>
                          <li><a href="#">Design Patterns</a></li>
                          <li><a href="#">Effective Java </a></li>
                          <li><a href="#">Data Structures and Algorithms</a></li>
                          <li><a href="#"> Introduction to the TOC</a></li>
                          <li><a href="#">Coders at Work</a></li>
                          <li><a href="#">Database System Concepts</a></li>
                          <li><a href="#">Advanced Data Structures</a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-12 col-md-4">
                        <ul class="links list-unstyled">
                          <li><a href="#">Gulliver Travels</a></li>
                          <li><a href="#">The Pilgrim Progress</a></li>
                          <li><a href="#">The Moonstone </a></li>
                          <li><a href="#">Three Men in a Boat </a></li>
                          <li><a href="#">The Sun Also Rises</a></li>
                          <li><a href="#">Scoop </a></li>
                          <li><a href="#">The Grapes of Wrath</a></li>
                          <li><a href="#">The Adventures of Augie March </a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                      <!-- <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                          <li><a href="#">Sandals </a></li>
                          <li><a href="#">Shorts</a></li>
                          <li><a href="#">Dresses</a></li>
                          <li><a href="#">Jwellery</a></li>
                          <li><a href="#">Bags</a></li>
                          <li><a href="#">Night Dress</a></li>
                          <li><a href="#">Swim Wear</a></li>
                          <li><a href="#">Toys</a></li>
                        </ul>
                      </div> -->
                      <!-- /.col --> 
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-clock-o"></i>Essentials</a>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                  <div class="row">
                      <div class="col-sm-12 col-md-6">
                        <ul class="links list-unstyled">
                          <li><a href="#">Cooler </a></li>
                          <li><a href="#"> Fan </a></li>
                          <li><a href="#">Room Heater</a></li>
                          <li><a href="#">Water Container</a></li>
                          <li><a href="#">Desk lamp </a></li>
                          <li><a href="#">Purifier </a></li>
                          <li><a href="#">Mattress</a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-12 col-md-6">
                        <ul class="links list-unstyled">
                          <li><a href="#">Laundary basket</a></li>
                          <li><a href="#">Curtain </a></li>
                          <li><a href="#">Bowls </a></li>
                          <li><a href="#">Chair</a></li>
                          <li><a href="#"> Lap Desk </a></li>
                          <li><a href="#">Flashlight </a></li>
                          <li><a href="#">Ethernet Cable </a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports and Fitness</a> 
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                      <div class="col-sm-12 col-md-6">
                        <ul class="links list-unstyled">
                          <li><a href="#">Volleyball </a></li>
                          <li><a href="#"> Exercise Mats </a></li>
                          <li><a href="#">Skipping ropes</a></li>
                          <li><a href="#">Weighted vest</a></li>
                          <li><a href="#">Medicine Balls </a></li>
                          <li><a href="#">Squat stand </a></li>
                          <li><a href="#">Hammer Gloves</a></li>
                          <li><a href="#">Helmet</a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-12 col-md-6">
                        <ul class="links list-unstyled">
                          <li><a href="#">Rubber Dumbbells</a></li>
                          <li><a href="#">Badminton racquet </a></li>
                          <li><a href="#">Basketball </a></li>
                          <li><a href="#">Football</a></li>
                          <li><a href="#"> Bicycle </a></li>
                          <li><a href="#">Bat </a></li>
                          <li><a href="#">Batting Gloves</a></li>
                          <li><a href="#">Keeping Gloves </a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                      <!-- <div class="col-sm-12 col-md-4">
                        <ul class="links list-unstyled">
                          <li><a href="#">Gulliver Travels</a></li>
                          <li><a href="#">The Pilgrim Progress</a></li>
                          <li><a href="#">The Moonstone </a></li>
                          <li><a href="#">Three Men in a Boat </a></li>
                          <li><a href="#">The Sun Also Rises</a></li>
                          <li><a href="#">Scoop </a></li>
                          <li><a href="#">The Grapes of Wrath</a></li>
                          <li><a href="#">The Adventures of Augie March </a></li>
                        </ul>
                      </div> -->
                      <!-- /.col -->
                      <!-- <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                          <li><a href="#">Sandals </a></li>
                          <li><a href="#">Shorts</a></li>
                          <li><a href="#">Dresses</a></li>
                          <li><a href="#">Jwellery</a></li>
                          <li><a href="#">Bags</a></li>
                          <li><a href="#">Night Dress</a></li>
                          <li><a href="#">Swim Wear</a></li>
                          <li><a href="#">Toys</a></li>
                        </ul>
                      </div> -->
                      <!-- /.col --> 
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- ================================== MEGAMENU VERTICAL ================================== --> 
                <!-- /.dropdown-menu --> 
                <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
              <!-- /.menu-item -->
              
              
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-pencil"></i>Stationery</a> 
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                      <div class="col-sm-12 col-md-6">
                        <ul class="links list-unstyled">
                          <li><a href="#">Staplers </a></li>
                          <li><a href="#"> Punching Machine </a></li>
                          <li><a href="#">Sticky Tapes</a></li>
                          <li><a href="#">Scissors</a></li>
                          <li><a href="#">Glue </a></li>
                          <li><a href="#">Calculator </a></li>
                          <li><a href="#">Tape Dispenser</a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-12 col-md-6">
                        <ul class="links list-unstyled">
                          <li><a href="#">Pen Cups</a></li>
                          <li><a href="#">Note Holders </a></li>
                          <li><a href="#">Paper Clip </a></li>
                          <li><a href="#">Waste buckets</a></li>
                          <li><a href="#"> Ink Cartridges </a></li>
                          <li><a href="#">Printing Papers </a></li>
                          <li><a href="#">Highlighter Pen </a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                      <!-- <div class="col-sm-12 col-md-4">
                        <ul class="links list-unstyled">
                          <li><a href="#">Gulliver Travels</a></li>
                          <li><a href="#">The Pilgrim Progress</a></li>
                          <li><a href="#">The Moonstone </a></li>
                          <li><a href="#">Three Men in a Boat </a></li>
                          <li><a href="#">The Sun Also Rises</a></li>
                          <li><a href="#">Scoop </a></li>
                          <li><a href="#">The Grapes of Wrath</a></li>
                          <li><a href="#">The Adventures of Augie March </a></li>
                        </ul>
                      </div> -->
                      <!-- /.col -->
                      <!-- <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                          <li><a href="#">Sandals </a></li>
                          <li><a href="#">Shorts</a></li>
                          <li><a href="#">Dresses</a></li>
                          <li><a href="#">Jwellery</a></li>
                          <li><a href="#">Bags</a></li>
                          <li><a href="#">Night Dress</a></li>
                          <li><a href="#">Swim Wear</a></li>
                          <li><a href="#">Toys</a></li>
                        </ul>
                      </div> -->
                      <!-- /.col --> 
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>  
              <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
             
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-star"></i>Subscriptions</a> 
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                      <div class="col-sm-12 col-md-6">
                        <ul class="links list-unstyled">
                          <li><a href="#">Spotify </a></li>
                          <li><a href="#"> Gaana.com </a></li>
                          <li><a href="#">Wynk music</a></li>
                          <li><a href="#">Youtube Premium</a></li>
                          <li><a href="#">Disney hotstar</a></li>
                          <li><a href="#">Netflix </a></li>
                          <li><a href="#">Prime Video</a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-12 col-md-6">
                        <ul class="links list-unstyled">
                          <li><a href="#">GFG Premium</a></li>
                          <li><a href="#">Scaler </a></li>
                          <li><a href="#">Coding Ninjas </a></li>
                          <li><a href="#">Leetcode Premium</a></li>
                          <li><a href="#"> Code Blocks </a></li>
                          <li><a href="#">Zomato </a></li>
                          <li><a href="#">Lenskart </a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                      <!-- <div class="col-sm-12 col-md-4">
                        <ul class="links list-unstyled">
                          <li><a href="#">Gulliver Travels</a></li>
                          <li><a href="#">The Pilgrim Progress</a></li>
                          <li><a href="#">The Moonstone </a></li>
                          <li><a href="#">Three Men in a Boat </a></li>
                          <li><a href="#">The Sun Also Rises</a></li>
                          <li><a href="#">Scoop </a></li>
                          <li><a href="#">The Grapes of Wrath</a></li>
                          <li><a href="#">The Adventures of Augie March </a></li>
                        </ul>
                      </div> -->
                      <!-- /.col -->
                      <!-- <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                          <li><a href="#">Sandals </a></li>
                          <li><a href="#">Shorts</a></li>
                          <li><a href="#">Dresses</a></li>
                          <li><a href="#">Jwellery</a></li>
                          <li><a href="#">Bags</a></li>
                          <li><a href="#">Night Dress</a></li>
                          <li><a href="#">Swim Wear</a></li>
                          <li><a href="#">Toys</a></li>
                        </ul>
                      </div> -->
                      <!-- /.col --> 
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>    
              <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->

              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-music"></i>Music</a> 
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                      <div class="col-sm-12 col-md-6">
                        <ul class="links list-unstyled">
                          <li><a href="#">Guitar </a></li>
                          <li><a href="#"> Flute </a></li>
                          <li><a href="#">Violin</a></li>
                          <li><a href="#">Mandolin</a></li>
                          <li><a href="#">Drum Set</a></li>
                          <li><a href="#">Saxophone </a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-12 col-md-6">
                        <ul class="links list-unstyled">
                          <li><a href="#">Harmonium</a></li>
                          <li><a href="#">Mouth Organ </a></li>
                          <li><a href="#">Lute </a></li>
                          <li><a href="#">Harmonica</a></li>
                          <li><a href="#"> Tabla </a></li>
                          <li><a href="#">Banjo </a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                      <!-- <div class="col-sm-12 col-md-4">
                        <ul class="links list-unstyled">
                          <li><a href="#">Gulliver Travels</a></li>
                          <li><a href="#">The Pilgrim Progress</a></li>
                          <li><a href="#">The Moonstone </a></li>
                          <li><a href="#">Three Men in a Boat </a></li>
                          <li><a href="#">The Sun Also Rises</a></li>
                          <li><a href="#">Scoop </a></li>
                          <li><a href="#">The Grapes of Wrath</a></li>
                          <li><a href="#">The Adventures of Augie March </a></li>
                        </ul>
                      </div> -->
                      <!-- /.col -->
                      <!-- <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                          <li><a href="#">Sandals </a></li>
                          <li><a href="#">Shorts</a></li>
                          <li><a href="#">Dresses</a></li>
                          <li><a href="#">Jwellery</a></li>
                          <li><a href="#">Bags</a></li>
                          <li><a href="#">Night Dress</a></li>
                          <li><a href="#">Swim Wear</a></li>
                          <li><a href="#">Toys</a></li>
                        </ul>
                      </div> -->
                      <!-- /.col --> 
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>    
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
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
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
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
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">Products</h3>
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
                          <a href="detail.html">
                             <img src="assets/images/products/a1.jpg" alt=""> 
                              <!-- <img src="assets/images/products/p1_hover.jpg" alt="" class="hover-image"> -->
                          </a> 
                       </div>
                          <!-- /.image -->
                          
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Books</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
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
                          <a href="detail.html">
                             <img src="assets/images/products/a2.jpg" alt=""> 
                              <!-- <img src="assets/images/products/p4_hover.jpg" alt="" class="hover-image"> -->
                          </a>
                           </div>
                          <!-- /.image -->
                          
                          
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Bicycle</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
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
                           <a href="detail.html">
                             <img src="assets/images/products/a3.jpg" alt=""> 
                              <!-- <img src="assets/images/products/p3_hover.jpg" alt="" class="hover-image"> -->
                          </a>
                           </div>
                          <!-- /.image -->
                          
                          <div class="tag sale"><span>sale</span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Guitar</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
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
                           <a href="detail.html">
                             <img src="assets/images/products/a4.jpg" alt=""> 
                              <!-- <img src="assets/images/products/p2_hover.jpg" alt="" class="hover-image"> -->
                          </a> 
                          </div>
                          <!-- /.image -->
                          
                          
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Kettle</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
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
                           <a href="detail.html">
                             <img src="assets/images/products/a5.jpg" alt=""> 
                              <!-- <img src="assets/images/products/p6_hover.jpg" alt="" class="hover-image"> -->
                          </a> 
                          </div>
                          <!-- /.image -->
                          
                          <div class="tag hot"><span>hot</span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Laptop</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
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
                           <a href="detail.html">
                             <img src="assets/images/products/a6.jpg" alt=""> 
                              <!-- <img src="assets/images/products/p5_hover.jpg" alt="" class="hover-image"> -->
                          </a>
                          </div>
                          <!-- /.image -->
                          
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html">Cooler</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
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
            <div class="content-blocks"> <a href="#"> Mail </a></div>
          </div>
        </li>
        <li>
          <div class="feature-box">
            <div class="icon-return"></div>
            <div class="content">30 days return</div>
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