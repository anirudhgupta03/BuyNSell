<?php 
session_start();
include('db.php');
// include('pro_table_check.php');
if(isset($_SESSION['admin_login'])) {
    $row_c = $_SESSION['admin_login'];
}

if (!isset($_SESSION['admin_login'])) {
    header('location:user_home.php');
    
}

$home = false;
$view = true;
$bids = false;
$products = false;

if (isset($_REQUEST['did'])) {
    
 	echo $did = $_REQUEST['did'];
    $prod = "select * from tbl_purchase where buyer_id = '$did'; ";
    $runy = $con->query($prod);

  
 	echo $del = "delete from user where uid = '$did' ";
 	$con->query($del);

     while($rowx = $runy->fetch_object()){
        $proid = $rowx->pro_id;
        $proid = json_decode( json_encode($proid), true);
        echo $qury = "update products set status = 'On Sale' where pro_id = '$proid';"; 
        $con->query($qury);
    }
    
    if (isset($_SESSION['user'])) {
        header("location:logout.php");
    } else {
        header("location:view_users.php");
    }	
} 

if (isset($_REQUEST['sid'])) {
  	$sid = $_REQUEST['sid'];
  	$status = $_REQUEST['status'];
  	if ($status == "Enable") {
  		$up = "Disable";
  	}
  	else if ($status == "Disable") {
  		$up = "Enable";
  	}
  	else {
  		$up = "Enable";
  	}
  	$update = "update user set status = '$up' where uid = '$sid' ";
  	$con->query($update);
  	header("location:view_users.php");
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
      <title>Users</title>
      <link rel="icon" type="image/jpg" href="logo/auction.png">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
      padding: 80px 0px 15px 30px;
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
               <a href="order_list.php" >
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
            <!-- <div class="overview-boxes"> -->
            <form>
 		<table class="mt-5" align="center" cellspacing="0" cellpadding="10" width="96%">
 			<tr align="center">
                <th style="padding:7px; border-radius:15px 0px 0px 0px;">Name</th>
                <!-- <th>Surname</th> -->
 				<th style = "padding:5px;">Email</th>
 				<!-- <th>Gender</th>
 				<th>Hobby</th>
 				<th>Country</th> -->
                <th style = "padding:5px;">Registered before</th>
                <?php if (isset($_SESSION['admin_login'])): ?>
                <th style = "padding:5px;">Status</th>   
                <th style = "padding:5px;">Rating</th>            
                <?php endif ?>
 				<th style="padding:5px; border-radius:0px 15px 0px 0px;" colspan="2">Action</th>
 			</tr>
            <?php
            if(isset($_SESSION['user'])) {
                $join = "select * from user'";
            }
            else {
                $join = "select * from user";
            }
            
            $run_j = $con->query($join);
            $date = date('Y-m-d');
            while ($row_j = $run_j->fetch_object()) {
            ?>		
 			<tr align="center">
                <td style = "padding:5px;"><?php echo $row_j->name; ?></td>
                
 				<td style = "padding:5px;"><?php echo $row_j->email; ?></td>
                <td style = "padding:5px;">
                    <?php
                    $c_date = date('Y-m-d h:i:s');
                    $tot_time = strtotime($c_date) - strtotime($row_j->dor);
                    $day = (int)($tot_time / (24*60*60));
                    $hour = (int)(($tot_time - (24*60*60*$day)) / (60*60));
                    $min = (int)((($tot_time - (24*60*60*$day) - (60*60*$hour))) / 60);
                    $sec = (($tot_time - (24*60*60*$day) - (60*60*$hour)) - (60*$min));
                    echo ($day);
                    if($day>1) {
                        echo " Days ";
                    }
                    else {
                        echo " Day ";
                    }

                    echo ($hour);
                    if($hour>1) {
                        echo " Hours ";
                    }
                    else {
                        echo " Hour ";
                    }

                    echo ($min);
                    if($min>1) {
                        echo " Minutes ";
                    }
                    else {
                        echo " Minute ";
                    }

                    echo ($sec);
                    if($sec>1) {
                        echo " Seconds ";
                    }
                    else {
                        echo " Second ";
                    }
                    ?>
                </td>
                <?php if (isset($_SESSION['admin_login'])): ?>
                <td style = "padding:5px;"><?php echo $row_j->status; ?></td>                    
                <?php endif ?>
                <?php if (isset($_SESSION['admin_login'])): ?>
                <td style = "padding:5px;"><a class="btn btn-warning" href="admin_seller_rating.php?seller_id=<?php echo $row_j->uid; ?>">Show Ratings</a></td>                    
                <?php endif ?>
                <?php
                if(!isset($_SESSION['user'])) {
                ?>
                <td style = "padding:5px;"><a class="btn btn-primary" style = "font-size: 14px;" href="view_users.php?sid=<?php echo $row_j->uid; ?>&status=<?php echo $row_j->status; ?>">Change Status</a></td>
 				<?php
                }
                ?>
                <?php
                if(isset($_SESSION['user'])) {
                ?>
                <td style = "padding:5px;"><a class="btn btn-success" href="redirect.php?eid=<?php echo $row_j->uid; ?>">Edit Profile</a></td>
                <?php
                }
                ?>
                <?php
                if(!isset($_SESSION['user'])) {
                ?>
                <td style = "padding:5px;"><a class="btn btn-danger" style = "font-size: 17px;"href="view_users.php?did=<?php echo $row_j->uid; ?>">Delete</a></td>
                <?php
                }
                ?>
 			</tr>
            <?php 
            }
            ?>
        </table>
    </form>	

            <!-- </div> -->
            <!-- <div class="sales-boxes">
               <div class="recent-sales box">
                 <div class="title">Recent Sales</div>
                 <div class="sales-details">
                   <ul class="details">
                     <li class="topic">Date</li>
                     <li><a href="#">02 Jan 2021</a></li>
                     <li><a href="#">02 Jan 2021</a></li>
                     <li><a href="#">02 Jan 2021</a></li>
                     <li><a href="#">02 Jan 2021</a></li>
                     <li><a href="#">02 Jan 2021</a></li>
                     <li><a href="#">02 Jan 2021</a></li>
                     <li><a href="#">02 Jan 2021</a></li>
                   </ul>
                   <ul class="details">
                   <li class="topic">Customer</li>
                   <li><a href="#">Alex Doe</a></li>
                   <li><a href="#">David Mart</a></li>
                   <li><a href="#">Roe Parter</a></li>
                   <li><a href="#">Diana Penty</a></li>
                   <li><a href="#">Martin Paw</a></li>
                   <li><a href="#">Doe Alex</a></li>
                   <li><a href="#">Aiana Lexa</a></li>
                   <li><a href="#">Rexel Mags</a></li>
                    <li><a href="#">Tiana Loths</a></li>
                 </ul>
                 <ul class="details">
                   <li class="topic">Sales</li>
                   <li><a href="#">Delivered</a></li>
                   <li><a href="#">Pending</a></li>
                   <li><a href="#">Returned</a></li>
                   <li><a href="#">Delivered</a></li>
                   <li><a href="#">Pending</a></li>
                   <li><a href="#">Returned</a></li>
                   <li><a href="#">Delivered</a></li>
                    <li><a href="#">Pending</a></li>
                   <li><a href="#">Delivered</a></li>
                 </ul>
                 <ul class="details">
                   <li class="topic">Total</li>
                   <li><a href="#">$204.98</a></li>
                   <li><a href="#">$24.55</a></li>
                   <li><a href="#">$25.88</a></li>
                   <li><a href="#">$170.66</a></li>
                   <li><a href="#">$56.56</a></li>
                   <li><a href="#">$44.95</a></li>
                   <li><a href="#">$67.33</a></li>
                    <li><a href="#">$23.53</a></li>
                    <li><a href="#">$46.52</a></li>
                 </ul>
                 </div>
                 <div class="button">
                   <a href="#">See All</a>
                 </div>
               </div>
               <div class="top-sales box">
                 <div class="title">Top Seling Product</div>
                 <ul class="top-sales-details">
                   <li>
                   <a href="#">
                     <span class="product">Vuitton Sunglasses</span>
                   </a>
                   <span class="price">$1107</span>
                 </li>
                 <li>
                   <a href="#">
                     <span class="product">Hourglass Jeans </span>
                   </a>
                   <span class="price">$1567</span>
                 </li>
                 <li>
                   <a href="#">
                     <span class="product">Nike Sport Shoe</span>
                   </a>
                   <span class="price">$1234</span>
                 </li>
                 <li>
                   <a href="#">
                     <span class="product">Hermes Silk Scarves.</span>
                   </a>
                   <span class="price">$2312</span>
                 </li>
                 <li>
                   <a href="#">
                     <span class="product">Succi Ladies Bag</span>
                   </a>
                   <span class="price">$1456</span>
                 </li>
                 <li>
                   <a href="#">
                     <span class="product">Gucci Womens's Bags</span>
                   </a>
                   <span class="price">$2345</span>
                 <li>
                   <a href="#">
                     <span class="product">Addidas Running Shoe</span>
                   </a>
                   <span class="price">$2345</span>
                 </li>
               <li>
                   <a href="#">
                     <span class="product">Bilack Wear's Shirt</span>
                   </a>
                   <span class="price">$1245</span>
                 </li>
                 </ul>
               </div>
               </div> -->
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
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </body>
</html>


