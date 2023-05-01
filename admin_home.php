<?php 
   session_start();
   include('db.php');
   // include('pro_table_check.php');
   
   
   if(isset($_SESSION['admin_login'])) {
       $row_c = $_SESSION['admin_login'];
   }
   if(!isset($_SESSION['admin_login'])) {
    header("location: user_home.php");
  }
   $home = true;
   ?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
   <style>
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
      position: relative;
      padding-top: 104px;
      }
      .home-content .overview-boxes{
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      padding: 0 20px;
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
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
      <!-- <link rel="stylesheet" href="style.css"> -->
      <!-- Boxicons CDN Link -->
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
      <title>BuyNSell</title>
      <link rel="icon" type="image/jpg" href="logo/auction.png">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   </head>
   <body>
      <div class="sidebar">
         <div class="logo-details">
            &nbsp;&nbsp;&nbsp;<img style="max-width:130px; margin-top: -1px;" src="logo.png">
         </div>
         <ul class="nav-links">
            <li>
               <a href="#" class="active">
               <i class='bx bx-grid-alt' ></i>
               <span class="links_name">Dashboard</span>
               </a>
            </li>
            <li>
               <a href="admin_product.php">
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
               <a href="view_users.php">
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
         <div class="home-content">
            <div class="overview-boxes">
               <div class="box">
                  <div class="right-side">
                     <div class="box-topic">Total Active Products</div>
                     <?php 
                        $query444 = "select * from products where status = 'On Sale'";
                        $run_q444 = $con->query($query444);
                        $num_of_products = 0;
                        if ($run_q444 !== false && $run_q444->num_rows > 0)
                          $num_of_products = $run_q444->num_rows;
                        ?>
                     <div class="number"> <?php echo $num_of_products; ?></div>
                  </div>
                  <i class='bx bx-cart-alt cart'></i>
               </div>
               <div class="box">
                  <div class="right-side">
                     <div class="box-topic">Total Active Users</div>
                     <?php 
                        $query445 = "select * from user where status = 'Enable'";
                        $run_q445 = $con->query($query445);
                        $num_of_users = 0;
                        if ($run_q445 !== false && $run_q445->num_rows > 0)
                          $num_of_users = $run_q445->num_rows;
                        ?>
                     <div class="number"> <?php echo $num_of_users; ?> </div>
                  </div>
                  <i class='bx bxs-cart-add cart two' ></i>
               </div>
               <div class="box">
                  <div class="right-side">
                     <div class="box-topic">Total Sales</div>
                     <?php 
                        $query446 = "select * from tbl_purchase";
                        $run_q446 = $con->query($query446);
                        $num_of_sales = 0;
                        if ($run_q446 !== false && $run_q446->num_rows > 0)
                          $num_of_sales = $run_q446->num_rows;
                        ?>
                     <div class="number"><?php echo $num_of_sales ?></div>
                  </div>
                  <i class='bx bx-cart cart three' ></i>
               </div>
            </div>
            <br><br>
            <div class="overview-boxes">
               <div class="box" style="width: 350px; height: 300px;"id="piechart">
                  <div class="right-side" >         
                    <?php  
                      $queryft = "SELECT status, count(*) as number FROM products GROUP BY status";  
                      $run_ft = $con->query($queryft);
                    ?>  
                    <!-- <div id="piechart" ></div>   -->
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
                    <script type="text/javascript">  
                      google.charts.load('current', {'packages':['corechart']});  
                      google.charts.setOnLoadCallback(drawChart);  
                      function drawChart()  
                      {  
                            var data = google.visualization.arrayToDataTable([  
                                      ['Status', 'Number'],  
                                      <?php  
                                      while($row = $run_ft->fetch_object())  
                                      {  
                                          echo "['".$row->status."', ".$row->number."],";  
                                      }  
                                      ?>  
                                ]);  
                            var options = {  
                                  title: 'Percentage of Sold, Unsold and Disabled Products',  
                                  is3D:true,  
                                  pieHole: 0.4  
                                };  
                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                            chart.draw(data, options);  
                      }  
                    </script>           
                                         
                  </div>
               </div>
               <div class="box" style="width: 350px; height: 300px;"id="piechart1">
                  <div class="right-side" >         
                    <?php  
                      $queryft1 = "SELECT status, count(*) as number FROM user GROUP BY status";  
                      $run_ft1 = $con->query($queryft1);
                    ?>  
                    <!-- <div id="piechart" ></div>   -->
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
                    <script type="text/javascript">  
                      google.charts.load('current', {'packages':['corechart']});  
                      google.charts.setOnLoadCallback(drawChart);  
                      function drawChart()  
                      {  
                            var data = google.visualization.arrayToDataTable([  
                                      ['Status', 'Number'],  
                                      <?php  
                                      while($row = $run_ft1->fetch_object())  
                                      {  
                                          echo "['".$row->status."', ".$row->number."],";  
                                      }  
                                      ?>  
                                ]);  
                            var options = {  
                                  title: 'Percentage of Enabled and Disabled Users',  
                                  // is3D:true,  
                                  pieHole: 0.4  
                                };  
                            var chart = new google.visualization.PieChart(document.getElementById('piechart1'));  
                            chart.draw(data, options);  
                      }  
                    </script>           
                                         
                  </div>
               </div>

               <div style="width: 500px; height: 300px;" class="box" id="top_x_div" >
                  <div class="right-side" >
                    <?php
                      $queryft2 = "SELECT product_category.name, count(*) as number FROM product_category INNER JOIN products ON product_category.category_id = products.category_id GROUP BY product_category.category_id";   

                      $run_ft2 = $con->query($queryft2);
                      $num = $run_ft2->num_rows;
                      $tmp = 0;
                    ?>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
                    <script type="text/javascript">  
                      google.charts.load('current', {'packages':['bar']});  
                      google.charts.setOnLoadCallback(drawChart);  
                      function drawChart()  
                      {  
                            var data = google.visualization.arrayToDataTable([  
                                      ['Category', 'Number'],  
                                      <?php  
                                      while($row = $run_ft2->fetch_object())  
                                      {  
                                          if($tmp === $num-1){
                                            echo "['".$row->name."', ".$row->number."]";
                                            
                                          }
                                          else{
                                            echo "['".$row->name."', ".$row->number."],";  
                                          }
                                          ++$tmp;
                                      }  
                                      ?>  
                                ]);  
                            var options = {  
                              title: 'Number of products of each category',
                              width: 400,
                              titleTextStyle: {color: 'black'},
                              legend: { position: 'none' },
                              bars: 'vertical', // Required for Material Bar Charts.
                              axes: {
                                x: {
                                  0: { side: 'bottom', label: 'Category'} // Bottom x-axis.
                                },
                                y: {
                                  0: { side: 'left', label: 'Number'} // Left y-axis.
                                }
                              },
                              bar: { groupWidth: "50%" }  
                            };  
                            var chart = new google.charts.Bar(document.getElementById('top_x_div'));  
                            chart.draw(data, google.charts.Bar.convertOptions(options));  
                      }  
                    </script>           
                    

                  </div>
               </div>
            </div>
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
               </div>-->
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