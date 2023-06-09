<?php 
session_start();
include('db.php');


if(isset($_SESSION['user'])) {
    $row_c = $_SESSION['user'];
	header("location:user_home.php");
}

if(isset($_SESSION['admin_login'])) {
    $row_c = $_SESSION['admin_login'];
	header("location:admin_home.php");
}
$home = true;
$view = false;
$bids = false;
$products = false;

?>





<!DOCTYPE html>
<html>
<head>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel = "stylesheet" href = "style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php include 'head.php'; ?>

<style>
/*
body {
	background-image: url(Silver-Blur-Background-Wallpaper.jpg);
	background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;
}*/

.bg-gray {
    background-color: rgba(24, 44, 97, .3);
}
.container_flex {
	background-color: gray;
	display: flex;
	flex-direction: row-reverse;
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
}

.item {
	margin: 0;
}

.product_img {
	background-size: cover;
}

/*.card {
	width: 30%;
}*/

.row {
	display: flex;
	align-items: stretch;

}

.max-width {
	max-width: 30%;
}

.bg-card {
	background-color: rgba(189, 195, 199, .7);/*
	background-color: rgba(112, 111, 211, .7);*/
	color: #6c757d !important;
}


.bg-card-footer {
	background-color: rgba(236, 240, 241, .5);/*
	background-color: rgba(39, 60, 117, .7);*/
}

.text {
  color: #6c757d !important;
}

a.text:hover,
a.text:focus {
  color: #57606f !important;
}
.m-3 {
    /* margin: 1rem!important; */
    margin-top: 3rem !important;
    margin-right: 1rem !important;
    margin-bottom: -2rem !important;
    margin-left: 39rem !important;
}
</style>

<body>
<?php
if (!isset($_SESSION['user'])){
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-nav animated fadeInDown">
		<div class="container">

			<a style="color: #ffc107;" class="navbar-brand" href="index.php">
				<img style="max-width:190px; margin-top: -1px;" src="logo.png">
			</a>

			
			<div class="search-box">
            	<form action = "searchmusicresult.php" method="POST" class = "search-bar" autocomplete = "off">
              		<!-- <div class="control-group" style="display:flex;"> -->
                		<input type = "text" name = "search" placeholder="Search here..." required/>
                		<button type="submit"><img src = "images/search.png"> </button> 
              		<!-- </div> -->
            	</form>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div class="nav-item">
					<a class="nav-link text-white <?php { echo 'active'; }?>" href="index.php">Home</a>
</div>
				<div class="nav-item">
					<a class="nav-link text-white <?php  { echo 'active'; }?>" href="home.php">Signup</a>
</div>
				<div class="nav-item">
					<a class="nav-link text-white <?php { echo 'active'; }?>" href="home.php">Login</a>
</div>
				<!-- <li class="nav-item">
					<a class="nav-link <?php if ($home == true) { echo 'active'; }?>" href="admin_login.php">Admin Login</a>
				</li> -->
          	</div>
		</div>
	</nav>
	<?php
}
?>

		
<br><br><br>

    <?php
    $query1 = "select * from products where status = 'On Sale' and category_id = 7 ORDER BY pro_id DESC;";
	$run_q1 = $con->query($query1);
	$showing_products = $run_q1->num_rows;
    ?>


    <h4 style="padding:35px 0px 0px 20px;" class="text-info" text-align = "left">Showing <?php echo $showing_products; ?>&nbsp;Products&nbsp;for&nbsp;Sale</h4>

    <!-- <h4 class="m-3 text-info">Showing <?php echo $showing_products; ?>&nbsp;Products&nbsp;for&nbsp;Sale</h4> -->


    <form>
		    <div class="container mt-5 mb-5">
				<?php

				?>
				<div class="row">
				<?php
				
				while ($row_q1 = $run_q1->fetch_object()) {
					
					// $bid_s_time = $row_q1->bidstarttime;
        			// $bid_e_time = $row_q1->bidendtime;
        	
        			// $nt = new DateTime($bid_s_time);
        			
					// $bid_s_time = $nt->getTimestamp();

        			// $nt = new DateTime($bid_e_time);
        			// $bid_e_time = $nt->getTimestamp();

        			// $date = time(); //Return current Unix timestamp

					$pro_id = $row_q1->pro_id;
					
					// $query5 = "select * from tbl_bid where pro_id = $pro_id;";
					// $run_q5 = $con->query($query5);
					// $total_bids = $run_q5->num_rows;
					
						?>
							<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">	
							<div class="card mt-3 mb-3" style="border-radius:15px 15px 15px 15px;">
									<?php  
									$query6 = "select * from product_images where pro_id = $pro_id LIMIT 1";
									$run_q6 = $con->query($query6);
									$row_q6 = $run_q6->fetch_object();
									$image_name = $row_q6->img_name;
									$image_destination = "product_images/".$image_name;
									?>
									<img class="product_img card-img-top" style="border-radius:15px 15px 0px 0px;" src="<?php echo $image_destination; ?>"  height="200vh" width="100%" alt="Product Image">
									<div class="card-body" style="border-radius:0px 0px 15px 15px; background: linear-gradient(to right, rgb(242, 112, 156), rgb(255, 148, 114));">
										
										<a class="card-title " style="color:white;" href="view_product.php?pro_id=<?php echo $pro_id; ?>"><h5><?php echo $row_q1->name; ?></h5></a>
										
										<h4 class="font-weight-light" style="color:white;">&nbsp;&#8377;<?php echo $row_q1->price; ?></h4>
										<a href="home.php" class="btn btn-success mt-3">Buy</a>
										
                                    </div>
									
								</div>
							</div>
						<?php
				}
				?>
				</div>
			</div>
	</form>

	
	

	


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>