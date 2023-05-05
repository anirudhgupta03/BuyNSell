<?php
session_start();
include('db.php');
//submit_rating.php

// $connect = new PDO("mysql:host=localhost;dbname=buynsell", "root", "");

// if(!isset($_SESSION['user'])) {
//     header('location: user_home.php');
// }

if(isset($_SESSION['admin_login'])) {
    $row_c = $_SESSION['admin_login'];
}

// if(!isset($_SESSION['admin_login']) || !isset($_REQUEST['pro_id'])) {
//     header("location:user_home.php");
// }

if(isset($_REQUEST['seller_id']))
{
	$seller = $_REQUEST['seller_id'];
    $qu = "select * from user where uid = '$seller'";
    $ru = $con->query($qu);
    $rowu = $ru->fetch_object();
}

?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
      <!-- <link rel="stylesheet" href="style.css"> -->
      <!-- Boxicons CDN Link -->
      <title><?php echo $rowu->name;?>: Ratings & Reviews</title>
      <link rel="icon" type="image/jpg" href="logo/auction.png">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    </head>
   <style >
      /*
      .align {
      position: absolute;
      top: 0;
      right: 0;
      padding-right: 10px;
      }*/
      /*
      .bg-nav {
      background-color: rgba(24, 44, 97, .6);
      background-color:  rgba(179, 55, 113, .6);
      background-color: rgba(87, 75, 144, .6);
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      z-index: 5;
      }*/
      /* body {
      background-repeat: no-repeat;
      background-size: cover;
      }
      .bg-nav {
      background: -webkit-linear-gradient(left, #a445b2, #fa4299) !important;
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      z-index: 5;
      }
      .bg-darkblue {
      background-color: rgb(24, 44, 97) !important;
      } */
      .right {
      margin: 20px;
      position: absolute;
      top: 0;
      right: 0;
      }
      tr:nth-child(odd) {
      background-color: lightgray;
      }
      tr:nth-child(even) {
      background-color: lightblue;
      }
      tr:nth-child(1) {
      background-color: #007bff;
      color: white;
      }
      /* Googlefont Poppins CDN Link */
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
      *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
      }
      .sidebar{
      position: fixed;
      height: 100%;
      width: 240px;
      background: -webkit-linear-gradient(left, #a445b2, #fa4299);
      transition: all 0.5s ease;
      }
      .sidebar.active{
      width: 60px;
      }
      .sidebar .logo-details{
      height: 80px;
      display: flex;
      align-items: center;
      }
      .sidebar .logo-details i{
      font-size: 28px;
      font-weight: 500;
      color: #fff;
      min-width: 60px;
      text-align: center
      }
      .sidebar .logo-details .logo_name{
      color: #fff;
      font-size: 24px;
      font-weight: 500;
      }
      .sidebar .nav-links{
      margin-top: 10px;
      }
      .sidebar .nav-links li{
      position: relative;
      list-style: none;
      height: 50px;
      }
      .sidebar .nav-links li a{
      height: 100%;
      width: 100%;
      display: flex;
      align-items: center;
      text-decoration: none;
      transition: all 0.4s ease;
      }
      .sidebar .nav-links li a.active{
      background: orange;
      }
      .sidebar .nav-links li a:hover{
      background: orange;
      }
      .sidebar .nav-links li i{
      min-width: 60px;
      text-align: center;
      font-size: 18px;
      color: #fff;
      }
      .sidebar .nav-links li a .links_name{
      color: #fff;
      font-size: 15px;
      font-weight: 400;
      white-space: nowrap;
      }
      .sidebar .nav-links .log_out{
      position: absolute;
      bottom: 0;
      width: 100%;
      }
      .home-section{
      position: relative;
      background: #f5f5f5;
      min-height: 100vh;
      width: calc(100% - 240px);
      left: 240px;
      transition: all 0.5s ease;
      }
      .sidebar.active ~ .home-section{
      width: calc(100% - 60px);
      left: 60px;
      }
      .home-section nav{
      display: flex;
      justify-content: space-between;
      height: 80px;
      background: #fff;
      display: flex;
      align-items: center;
      position: fixed;
      width: calc(100% - 240px);
      left: 240px;
      z-index: 100;
      padding: 0 20px;
      box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
      transition: all 0.5s ease;
      }
      .sidebar.active ~ .home-section nav{
      left: 60px;
      width: calc(100% - 60px);
      }
      .home-section nav .sidebar-button{
      display: flex;
      align-items: center;
      font-size: 24px;
      font-weight: 500;
      }
      nav .sidebar-button i{
      font-size: 35px;
      margin-right: 10px;
      }
      .home-section nav .search-box{
      position: relative;
      height: 50px;
      max-width: 550px;
      width: 100%;
      margin: 0 20px;
      }
      nav .search-box input{
      height: 100%;
      width: 100%;
      outline: none;
      background: #F5F6FA;
      border: 2px solid #EFEEF1;
      border-radius: 6px;
      font-size: 18px;
      padding: 0 15px;
      }
      nav .search-box .bx-search{
      position: absolute;
      height: 40px;
      width: 40px;
      background: #2697FF;
      right: 5px;
      top: 50%;
      transform: translateY(-50%);
      border-radius: 4px;
      line-height: 40px;
      text-align: center;
      color: #fff;
      font-size: 22px;
      transition: all 0.4 ease;
      }
      .home-section nav .profile-details{
      display: flex;
      align-items: center;
      background: #F5F6FA;
      border: 2px solid #EFEEF1;
      border-radius: 6px;
      height: 50px;
      min-width: 190px;
      padding: 0 15px 0 2px;
      }
      nav .profile-details img{
      height: 40px;
      width: 40px;
      border-radius: 6px;
      object-fit: cover;
      }
      nav .profile-details .admin_name{
      font-size: 15px;
      font-weight: 500;
      color: #333;
      margin: 0 10px;
      white-space: nowrap;
      }
      nav .profile-details i{
      font-size: 25px;
      color: #333;
      }
      .home-section .home-content{
      /* position: absolute; */
      padding: 80px 0px 15px 90px;
      /* align-items: center;
      justify-content: center; */
      /* padding-top: 104px; */
      }
      .home-content .overview-boxes{
      display: flex;
      width: 500px;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      padding: 0px 100px;
      margin-bottom: 26px;
      }
      .overview-boxes .box{
      display: flex;
      align-items: center;
      justify-content: center;
      width: calc(100% / 4 - 15px);
      background: #fff;
      padding: 15px 14px;
      border-radius: 12px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.1);
      }
      .overview-boxes .box-topic{
      font-size: 20px;
      font-weight: 500;
      }
      .home-content .box .number{
      display: inline-block;
      font-size: 35px;
      margin-top: -6px;
      font-weight: 500;
      }
      .home-content .box .indicator{
      display: flex;
      align-items: center;
      }
      .home-content .box .indicator i{
      height: 20px;
      width: 20px;
      background: #8FDACB;
      line-height: 20px;
      text-align: center;
      border-radius: 50%;
      color: #fff;
      font-size: 20px;
      margin-right: 5px;
      }
      .box .indicator i.down{
      background: #e87d88;
      }
      .home-content .box .indicator .text{
      font-size: 12px;
      }
      .home-content .box .cart{
      display: inline-block;
      font-size: 32px;
      height: 50px;
      width: 50px;
      background: #cce5ff;
      line-height: 50px;
      text-align: center;
      color: #66b0ff;
      border-radius: 12px;
      margin: -15px 0 0 6px;
      }
      .home-content .box .cart.two{
      color: #2BD47D;
      background: #C0F2D8;
      }
      .home-content .box .cart.three{
      color: #ffc233;
      background: #ffe8b3;
      }
      .home-content .box .cart.four{
      color: #e05260;
      background: #f7d4d7;
      }
      .home-content .total-order{
      font-size: 20px;
      font-weight: 500;
      }
      .home-content .sales-boxes{
      display: flex;
      justify-content: space-between;
      /* padding: 0 20px; */
      }
      /* left box */
      .home-content .sales-boxes .recent-sales{
      width: 65%;
      background: #fff;
      padding: 20px 30px;
      margin: 0 20px;
      border-radius: 12px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
      }
      .home-content .sales-boxes .sales-details{
      display: flex;
      align-items: center;
      justify-content: space-between;
      }
      .sales-boxes .box .title{
      font-size: 24px;
      font-weight: 500;
      /* margin-bottom: 10px; */
      }
      .sales-boxes .sales-details li.topic{
      font-size: 20px;
      font-weight: 500;
      }
      .sales-boxes .sales-details li{
      list-style: none;
      margin: 8px 0;
      }
      .sales-boxes .sales-details li a{
      font-size: 18px;
      color: #333;
      font-size: 400;
      text-decoration: none;
      }
      .sales-boxes .box .button{
      width: 100%;
      display: flex;
      justify-content: flex-end;
      }
      .sales-boxes .box .button a{
      color: #fff;
      background: #0A2558;
      padding: 4px 12px;
      font-size: 15px;
      font-weight: 400;
      border-radius: 4px;
      text-decoration: none;
      transition: all 0.3s ease;
      }
      .sales-boxes .box .button a:hover{
      background:  #0d3073;
      }
      /* Right box */
      .home-content .sales-boxes .top-sales{
      width: 35%;
      background: #fff;
      padding: 20px 30px;
      margin: 0 20px 0 0;
      border-radius: 12px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
      }
      .sales-boxes .top-sales li{
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin: 10px 0;
      }
      .sales-boxes .top-sales li a img{
      height: 40px;
      width: 40px;
      object-fit: cover;
      border-radius: 12px;
      margin-right: 10px;
      background: #333;
      }
      .sales-boxes .top-sales li a{
      display: flex;
      align-items: center;
      text-decoration: none;
      }
      .sales-boxes .top-sales li .product,
      .price{
      font-size: 17px;
      font-weight: 400;
      color: #333;
      }
      /* Responsive Media Query */
      @media (max-width: 1240px) {
      .sidebar{
      width: 60px;
      }
      .sidebar.active{
      width: 220px;
      }
      .home-section{
      width: calc(100% - 60px);
      left: 60px;
      }
      .sidebar.active ~ .home-section{
      /* width: calc(100% - 220px); */
      overflow: hidden;
      left: 220px;
      }
      .home-section nav{
      width: calc(100% - 60px);
      left: 60px;
      }
      .sidebar.active ~ .home-section nav{
      width: calc(100% - 220px);
      left: 220px;
      }
      }
      @media (max-width: 1150px) {
      .home-content .sales-boxes{
      flex-direction: column;
      }
      .home-content .sales-boxes .box{
      width: 100%;
      overflow-x: scroll;
      margin-bottom: 30px;
      }
      .home-content .sales-boxes .top-sales{
      margin: 0;
      }
      }
      @media (max-width: 1000px) {
      .overview-boxes .box{
      width: calc(100% / 2 - 15px);
      margin-bottom: 15px;
      }
      }
      @media (max-width: 700px) {
      nav .sidebar-button .dashboard,
      nav .profile-details .admin_name,
      nav .profile-details i{
      display: none;
      }
      .home-section nav .profile-details{
      height: 50px;
      min-width: 40px;
      }
      .home-content .sales-boxes .sales-details{
      width: 560px;
      }
      }
      @media (max-width: 550px) {
      .overview-boxes .box{
      width: 100%;
      margin-bottom: 15px;
      }
      .sidebar.active ~ .home-section nav .profile-details{
      display: none;
      }
      }
      @media (max-width: 400px) {
      .sidebar{
      width: 0;
      }
      .sidebar.active{
      width: 60px;
      }
      .home-section{
      width: 100%;
      left: 0;
      }
      .sidebar.active ~ .home-section{
      left: 60px;
      width: calc(100% - 60px);
      }
      .home-section nav{
      width: 100%;
      left: 0;
      }
      .sidebar.active ~ .home-section nav{
      left: 60px;
      width: calc(100% - 60px);
      }
      }
   </style>
   <body>
      <div class="sidebar">
         <div class="logo-details">
            &nbsp;&nbsp;&nbsp;<img style="max-width:130px; margin-top: -1px;" src="logo.png">
         </div>
         <ul class="nav-links">
            <li>
               <a href="admin_home.php" >
               <i class='bx bx-grid-alt' ></i>
               <span class="links_name">Dashboard</span>
               </a>
            </li>
            <li>
               <a href="admin_product.php" >
               <i class='bx bx-box' ></i>
               <span class="links_name">Product</span>
               </a>
            </li>
            <li>
               <a href="order_list.php">
               <i class='bx bx-list-ul' ></i>
               <span class="links_name">Order list</span>
               </a>
            </li>
            <li>
               <a href="view_users.php" class="active">
               <i class='bx bx-pie-chart-alt-2' ></i>
               <span class="links_name">Users</span>
               </a>
            </li>
            <li class="log_out">
               <a href = "logout.php">
               <i class='bx bx-log-out'></i>
               <span class="links_name">Log out</span>
               </a>
            </li>
         </ul>
      </div>
      <section class="home-section">
         <nav>
            <div class="sidebar-button">
               <i class='bx bx-menu sidebarBtn'></i>
               <span class="dashboard">Dashboard</span>
            </div>
            <div >
               <a href="admin_home.php">
               <button class="btn btn-info" >Go to Admin Home Page</button>           
               </a>
            </div>
            <div class="profile-details">
               <span class="admin_name"><?php echo $row_c->name; ?></span>
               <i class='bx bx-chevron-down' ></i>
            </div>
         </nav>

<div class="home-content" >
    <div class="container">
    	<h1 class="mt-5 mb-5">Review & Rating</h1>
    	<div style="border-radius: 15px; border-color: blue;" class="card" >
    		<div class="card-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating">0.0</span> / 5</b>
    					</h1>
    					<div class="mb-3">
    						<i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
	    				</div>
    					<h3><span id="total_review">0</span> Review</h3>
    				</div>
    				<div class="col-sm-4">
    					<p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>               
                        </p>
    				</div>
    				
    			</div>
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
    </div>
    </div>
    </section>
    <script>
         let sidebar = document.querySelector(".sidebar");
         let sidebarBtn = document.querySelector(".sidebarBtn");
         sidebarBtn.onclick = function() {
         sidebar.classList.toggle("active");
         if(sidebar.classList.contains("active")){
         sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
         }else
         sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
         }
      </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>



<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#e9ecef;
}
</style>

<script>

$(document).ready(function(){

	var rating_data = 0;

    $('#add_review').click(function(){
        
        $('#review_modal').modal('show');
    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();
        // var prodid = echo $proid;
        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"submit_rating.php",
                method:"POST",
                data:{rating_data:rating_data, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    alert(data);
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data()
    {
        $.ajax({
            url:"submit_seller_rating.php",
            method:"POST",
            data:{action:'load_data', sellerid:<?php echo $seller;?>},
            dataType:"JSON",
            success:function(data)
            {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                
                $('.main_star').each(function(){
                    count_star++;
                    var average_rating = parseFloat(data.average_rating);
                    if (count_star <= average_rating) {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    } else if (count_star - 1 < average_rating) {
                        var remaining_rating = average_rating - (count_star - 1);
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                        $(this).css('clip-path', 'inset(0 ' + (1 - remaining_rating) * 100 + '% 0 0)');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].product_name.charAt(0)+'</h3></div></div>';
                        
                        html += '<div class="col-sm-11">';

                        html += '<div style="border-color: rgb(255, 148, 114); border-radius: 15px;" class="card">';

                        html += '<div style="border-radius: 15px; background: linear-gradient(to right, rgb(242, 112, 156), rgb(255, 148, 114));" class="card-header"><b>'+data.review_data[count].product_name+'</b></div>';
                        html += '<div class="card-header"><b>'+ 'User Name: ' + data.review_data[count].user_name+'</b></div>';
                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div style="border-color:rgb(255, 148, 114);" class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
    }

});

</script>