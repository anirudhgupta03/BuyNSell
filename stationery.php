<?php 
session_start();
include('db.php');
// include('pro_table_check.php');

if(isset($_SESSION['user'])) {
    $row_c = $_SESSION['user'];
}

// if(!isset($_SESSION['user'])) {
//     header("location:index.php");
// }

$home = false;
$view = false;
$bids = false;
$products = false;

?>





<!DOCTYPE html>
<html>
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
</style>

<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-nav animated fadeInDown">
		<div class="container">

			<a style="color: #ffc107;" class="navbar-brand" href="index.php">
				<img style="max-width:130px; margin-top: -1px;" src="logo.png">&nbsp;
			</a>
			<div align="center">
				<a class="btn btn-warning" href="add_product.php">Add A Product To Sell</a>
			</div>
			
			<ul class="navbar-nav">
				<li class="nav-item">
					<form action = "searchresult_catgry.php?catgid=<?php echo 5; ?>" method="POST">
						<input type="text" style="width: 70%; border-color: black;border-radius:13px 0px 0px 13px;" placeholder="Search here...." name="search">
						<button style="margin:0px;border-color: black;border-radius:0px 13px 13px 0px; background: -webkit-linear-gradient(left, #a445b2, #fa4299) !important;" type="submit"><i style="color:white;"class="fa fa-search"></i></button>                
					</form>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;
				<li class="nav-item">
					<a class="nav-link <?php if ($home == true) { echo 'active'; }?>" href="index.php">Home</a>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;
				<li class="nav-item dropdown">
					
					<a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown"><?php echo $row_c->name;?></a>
					<div class="dropdown-menu bg-darkblue">
						<a href="view_profile.php" class="text-warning dropdown-item ">View Profile</a>
						<a href="wishlist.php" class="text-warning dropdown-item ?>">Products in my Wishlisht </a>
						<a href="product.php" class="text-warning dropdown-item ">Products I put for Sale</a>
						<a href="got.php" class="text-warning dropdown-item ">Products I Purchased!!</a>
					</div>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
				<li class="nav-item">
					<a class="btn btn-danger " href="logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</nav>

		
<br><br><br>

    <?php
    $query1 = "select * from products where status = 'On Sale' and category_id = 5 ORDER BY pro_id DESC;";
	$run_q1 = $con->query($query1);
	$showing_products = $run_q1->num_rows;
    ?>

    <h4 class="m-3 text-info">Showing <?php echo $showing_products; ?>&nbsp;Products&nbsp;for&nbsp;Sale</h4>

    <form>
		    <div class="container mt-5 mb-5">
				<?php

				?>
				<div class="row">
				<?php
				
				while ($row_q1 = $run_q1->fetch_object()) {
					$pro_id = $row_q1->pro_id;
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
									<div class="card-body " style="border-radius:0px 0px 15px 15px; background: linear-gradient(to right, rgb(242, 112, 156), rgb(255, 148, 114));">
									<?php
										if($row_c -> uid == $row_q1 -> uid){?>
										<div>
											<a class="card-title text-dark"   href="view_product1.php?pro_id=<?php echo $pro_id; ?>"><h5><?php echo $row_q1->name; ?></h5></a>
										</div>	
										<div>
											<h4 class="font-weight-light" style="color:white;" >&#8377;<?php echo $row_q1->price; ?></h4>	
										</div>
										
										<?php
										}
										?>
										<?php
										if($row_c -> uid !== $row_q1 -> uid){?>
											<div>
												<a class="card-title" style="display:inline-block; color:white;" href="view_product.php?pro_id=<?php echo $pro_id; ?>"><h5><?php echo $row_q1->name; ?></h5></a>
												
											</div>
											<div >
												<h4 class="font-weight-light" style="display:inline-block; color:white;">&#8377;<?php echo $row_q1->price; ?></h4>
												<a href="view_product.php?pro_id=<?php echo $pro_id; ?>" style="float:right;" class="btn btn-success" >Buy</a>
											</div>
										<?php
										}
										?>
										
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