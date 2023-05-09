<?php 
session_start();
include('db.php');
// include('pro_table_check.php');
if(isset($_SESSION['user'])) {
    $row_c = $_SESSION['user'];
}

if(!isset($_SESSION['user'])) {
    header("location:user_home.php");
}

if (!isset($_REQUEST['pro_id']) && isset($_SESSION['user'])) {
	header("location:user_home.php");
}

if (isset($_REQUEST['pro_id'])) {
	$pro_id = $_REQUEST['pro_id'];
	$query1 = "select * from products where pro_id = $pro_id;";
	$run_q1 = $con->query($query1);
	$row_q1 = $run_q1->fetch_object();	
}

if($row_c -> uid == $row_q1 -> uid){
	header("location:view_product1.php");
}

if(isset($_REQUEST['pid'])) {
    $pro_id = $_REQUEST['pid'];
    // $uid = $_REQUEST['usid'];
    $cmnd = $_REQUEST['do'];
    echo $cmnd;

    $cmd = json_decode( json_encode($cmnd), true);
    if($cmd == 'rmv') {
        $pro_id = json_decode( json_encode($pro_id), true);
        $usr = json_decode( json_encode($row_c -> uid), true);
        $query39 = "delete from tbl_wishlist where pro_id = $pro_id and uid = $usr";
 	    $con->query($query39);
        //  header("location:view_product.php");
    }
    else {
        $pro_id = json_decode( json_encode($pro_id), true);
        $usr = json_decode( json_encode($row_c -> uid), true);

        $query29 = "insert into tbl_wishlist (pro_id, uid) values ($pro_id, $usr);";
        $con->query($query29);
        // header("location:view_product.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $row_q1->name; ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel = "stylesheet" href = "style.css">
<link rel = "stylesheet" href = "sliderstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<style>



/********/
/* IMAGE POPUT STARTING */
/********/

.container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    width: 100%;
    padding-right: calc(var(--bs-gutter-x) * 5.5);
    padding-left: calc(var(--bs-gutter-x) * 4.5);
    margin-right: auto;
    margin-left: auto;
}

.myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 10; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

element.style {
    /* padding: 120px; */
    padding-top: 120px;
    padding-right: 120px;
    padding-bottom: 80px;
    padding-left: 120px;
}
/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.3s;
    animation-name: zoom;
    animation-duration: 0.3s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}

/********/
/* IMAGE POPUT ENDING */
/********/



.bg-nav {
    background:  -webkit-linear-gradient(left, #a445b2, #fa4299) !important;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    z-index: 5;
}

.bg-darkblue {
    background-color: rgb(24, 44, 97) !important;
}

.flex-container {
	display: flex;
	flex-direction: column;
}

.card-hover {
	width: 50%;
}

.card-header {
	width: 50%;
}

.card-hover:hover {
	background-color: rgba(127, 140, 141, .2);
}


a {
    font-family: Arial, Helvetica, sans-serif;
    text-decoration:none;
    font-size: 14px;
    color: black;
}

a:hover, a.active   
{
    /* text-decoration: none; */
    color:blue;
}

input.razorpay-payment-button {
            display: block;
            /* margin: 30px auto 0; */
            padding: 10px;
            cursor: pointer;
            background: seagreen;
            border-radius: 5px !important;
            border: none;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
        }
        input.razorpay-payment-button:hover {
            background: mediumseagreen;
        }
        .checked {
  color: orange;
}
</style>
<body>
 

<?php
if (isset($_SESSION['user'])){
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-nav animated fadeInDown">
		<div class="container">

			<a style="color: #ffc107;" class="navbar-brand" href="index.php">
				<img style="max-width:190px; margin-top: -1px;" src="logo.png">
			</a>

			
			<div class="search-box">
            	<form action = "searchresult.php" method="POST" class = "search-bar" autocomplete = "off">
              		<!-- <div class="control-group" style="display:flex;"> -->
                		<input type = "text" name = "search" placeholder="Search here..." required />
                		<button type="submit"><img src = "images/search.png"> </button> 
              		<!-- </div> -->
            	</form>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


				<div class="nav-item dropdown">
					
					<a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown"><?php echo $row_c->name;?></a>
					<div class="dropdown-menu bg-darkblue">
						<a href="view_profile.php" class="text-warning dropdown-item ">View Profile</a>
                        <a href="seller_rating.php" class="text-warning dropdown-item ">My Rating</a>
						<a href="wishlist.php" class="text-warning dropdown-item ?>">Products in my Wishlisht </a>
						<a href="product.php" class="text-warning dropdown-item ">Products I put for Sale</a>
						<a href="got.php" class="text-warning dropdown-item ">Products I Purchased!!</a>
					</div>
				</div>&nbsp;&nbsp;&nbsp;	
				<div class = "nav-item">
				<a class="btn btn-warning" href="add_product.php">Add A Product To Sell</a>
				</div>&nbsp;&nbsp;&nbsp;	
				<div class="nav-item">
					<a class="btn btn-danger <?php echo 'active';?>" href="logout.php">Logout</a>
				</div>
          	</div>
		</div>
	</nav>
	<?php
}
?>


	


	<div class="container" style="padding: 120px 120px 50px 120px">		

    <div style=" border-radius: 15px; border-color: blue; " class="card" >
    		<div style=" display:inline-block; width:100%; border-radius:15px; background: radial-gradient(circle at 12.3% 19.3%, rgb(85, 88, 218) 0%, rgb(95, 209, 249) 100.2%);" class="card-header"><h3 style="display:inline-block; color:white;"><?php echo $row_q1->name; ?> </h3>
            <?php
                    $query89 = "select * from tbl_wishlist where pro_id = $pro_id and uid = $row_c->uid";
					$run_q89 = $con->query($query89);
                    ?>
                    
                    <?php
                    if($run_q89->num_rows > 0) {?>
                        <a style = "float:right;" class="btn btn-warning" href="view_product.php?pid=<?php echo $pro_id; ?>&do=<?php echo "rmv"; ?>">Remove From Wishlist</a>
                    <?php
                    }
                    ?>
                    
                    <?php
                    if($run_q89->num_rows == 0) {?>
                        <a style = "float:right;" class="btn btn-warning" style="background-color:pink;" href="view_product.php?pid=<?php echo $pro_id; ?>&do=<?php echo "raddmv"; ?>">Add to Wishlist</a>
                    <?php
                    }
                    ?>
                    <?php
                        $querytofindseller = "select products.uid, user.name from products inner join user on products.uid = user.uid where pro_id = '$pro_id'";
                        $runquerytofindseller = $con->query($querytofindseller);
                        $rowquerytofindseller = $runquerytofindseller->fetch_object();

                        $sellerid = $rowquerytofindseller->uid;
                        $sellername = $rowquerytofindseller->name;
                        $query_for_reviewed_products = " 
                            SELECT review_table.user_review, review_table.user_rating, review_table.datetime, review_table.review_id, review_table.uid, review_table.pro_id, user.name, products.name as 'proname', products.uid as 'sellerid' FROM review_table INNER JOIN user ON review_table.uid = user.uid
                            INNER JOIN products ON review_table.pro_id = products.pro_id where products.uid = '$sellerid'
                            ORDER BY review_id DESC";
                        
                        $run_query_for_reviewed_products = $con->query($query_for_reviewed_products);
                        $average_rating_seller = 0;
                        $total_rating_seller = 0;
                        $total_review = 0;

                        while($row_query_for_reviewed_products = $run_query_for_reviewed_products->fetch_object()) {
                            $rating_seller = $row_query_for_reviewed_products->user_rating;
                            $total_rating_seller = $total_rating_seller + $rating_seller;
                            $total_review = $total_review + 1;
                        }                      
                        if($total_review > 0){
                            $average_rating_seller = $total_rating_seller / $total_review;
                        }
                    ?>
                    <h5 style = "color:white;" > Seller: <?php echo $sellername;?> <div style="background: linear-gradient(to right, rgb(242, 112, 156), rgb(255, 148, 114)); border-radius: 5px; border: solid white; padding: 1px; display: inline-block;">
                        <?php echo number_format($average_rating_seller, 1); echo '<span style="color:white;" class="star">&#9733;</span>';?>
                        </div>
                    </h5>          
                    
            </div>
    
			<div class="card-body">
                <!-- <div>
                    <h2 class="card-title" style="display:inline-block;"><?php echo $row_q1->name; ?></h2>
                    
                    <?php
                    $query89 = "select * from tbl_wishlist where pro_id = $pro_id and uid = $row_c->uid";
					$run_q89 = $con->query($query89);
                    ?>
                    <?php
                    if($run_q89->num_rows > 0) {?>
                        <a style = "float:right;" class="btn btn-info" href="view_product.php?pid=<?php echo $pro_id; ?>&do=<?php echo "rmv"; ?>">Remove From Wishlist</a>
                    <?php
                    }
                    ?>
                    
                    <?php
                    if($run_q89->num_rows == 0) {?>
                        <a style = "float:right;" class="btn btn-info" style="background-color:pink;" href="view_product.php?pid=<?php echo $pro_id; ?>&do=<?php echo "raddmv"; ?>">Add to Wishlist</a>
                    <?php
                    }
                    ?>
                    </div> -->
                <p class="card-text"><?php echo $row_q1->description; ?></p>
				<div class="container">
					<?php

					$query4 = "select * from product_images where pro_id = $pro_id";
					$run_q4 = $con->query($query4);

					$image_for_payment = "";

					while ($row_q4 = $run_q4->fetch_object()) {
						$image_name = $row_q4->img_name;
						$image_destination = "product_images/".$image_name;
						if($image_for_payment == ""){
							$image_for_payment = $image_destination;
						}
						?>



						<img class="img-fluid myImg" id="myImg<?php echo $image_name; ?>" src="<?php echo $image_destination; ?>" alt="Product Image" width="20%">
						<!-- The Modal -->
						<div id="myModal<?php echo $image_name; ?>" class="modal">
							<span class="close close<?php echo $image_name; ?>">&times;</span>
							<img class="modal-content" id="<?php echo $image_name; ?>">
							<div id="caption<?php echo $image_name; ?>"></div>
						</div>

						<script>
						// Get the modal
						var modal = document.getElementById('myModal<?php echo $image_name; ?>');

						// Get the image and insert it inside the modal - use its "alt" text as a caption
						var img = document.getElementById('myImg<?php echo $image_name; ?>');
						var modalImg = document.getElementById("<?php echo $image_name; ?>");
						var captionText = document.getElementById("caption<?php echo $image_name; ?>");
						img.onclick = function(){
						    modal.style.display = "block";
						    modalImg.src = this.src;
						    captionText.innerHTML = this.alt;
						}

						// Get the <span> element that closes the modal
						var span = document.getElementsByClassName("close<?php echo $image_name; ?>")[0];

						// When the user clicks on <span> (x), close the modal
						span.onclick = function() { 
						    modal.style.display = "none";
						}
						</script>
						<?php
					}
					?>
				</div>
				<br>
				<h3 class="font-weight-light">Price: <?php echo $row_q1->price; ?></h3>
				
				
				<!-- <a href="buyer_bid.php?pro_id=<?php echo $row_q1->pro_id;?>" class="btn btn-secondary mt-3">Buy</a> -->
				<br>
				<form action="confirmation.php?pro_id=<?php echo $row_q1->pro_id; ?>" method="POST">
                    <script
                    src="https://checkout.razorpay.com/v1/checkout.js"
                    data-key="rzp_test_SDMJHxtZKexHq1"
                    data-amount="<?= $row_q1->price * 100 ?>"
                    data-buttontext="Proceed to pay &#x20B9 <?= $row_q1->price ?>!"
                    data-name= "<?= $row_q1->name?>"
                    data-description="Entry Ticket Purchase"
                    data-image="<?= $image_for_payment ?>"
                    data-theme.color="#b21e8e"
                    ></script>

                </form>
        <br>
        <!-- <a style = "" class="btn btn-warning" href="show_rating.php?pro_id=<?php echo $pro_id; ?>">Ratings and Reviews</a> -->
			</div>
			
		

                </div>
		
		
		</div>
		

	</div>


	<!-- <script>
	    if ( window.history.replaceState ) {
	        window.history.replaceState( null, null, window.location.href );
	    }
	    window.addEventListener("beforeunload", function (e) {
		  var confirmationMessage = "Please print this receipt before moving!!!\o/";
		  (e || window.event).returnValue = confirmationMessage; 
		  return confirmationMessage;                            
		});

	</script> -->   
   <?php
    if(isset($_REQUEST['show'])){
        $mess = $_REQUEST['show'];
        $mess = json_decode( json_encode($mess), true);
        // echo "lelo";
        if($mess === 'his'){?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style="padding: 50px 5px 10px 100px; display: inline-block;"><a href="view_product.php?pro_id=<?php echo $pro_id; ?>&show=<?php echo "his"; ?>" onclick="clickSingleA(this)" class="single active"><h5>Inspired by your browsing history</h5></a></div>
            
            <div style="padding: 30px 5px 10px 100px; display: inline-block;"><a href="view_product.php?pro_id=<?php echo $pro_id; ?>&show=<?php echo "sim";?>" onclick="clickSingleA(this)" class="single"><h5>Similar Products</h5></a></div>
            <div style="padding: 30px 5px 10px 100px; display: inline-block; margin-bottom: 2em;"><a href="view_product.php?pro_id=<?php echo $pro_id; ?>&show=<?php echo "samusr"; ?>" onclick="clickSingleA(this)" class="single"><h5>Other Products by the Seller</h5></a></div>
        <?php
        }
        else if($mess === 'sim'){?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style="padding: 50px 5px 10px 100px; display: inline-block;"><a href="view_product.php?pro_id=<?php echo $pro_id; ?>&show=<?php echo "his"; ?>" onclick="clickSingleA(this)" class="single"><h5>Inspired by your browsing history</h5></a></div>
            
            <div style="padding: 30px 5px 10px 100px; display: inline-block;"><a href="view_product.php?pro_id=<?php echo $pro_id; ?>&show=<?php echo "sim";?>" onclick="clickSingleA(this)" class="single active"><h5>Similar Products</h5></a></div>
            <div style="padding: 30px 5px 10px 100px; display: inline-block; margin-bottom: 2em;"><a href="view_product.php?pro_id=<?php echo $pro_id; ?>&show=<?php echo "samusr"; ?>" onclick="clickSingleA(this)" class="single"><h5>Other Products by the Seller</h5></a></div>
        <?php
        }
        else if($mess === 'samusr'){?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style="padding: 50px 5px 10px 100px; display: inline-block;"><a href="view_product.php?pro_id=<?php echo $pro_id; ?>&show=<?php echo "his"; ?>" onclick="clickSingleA(this)" class="single"><h5>Inspired by your browsing history</h5></a></div>
            
            <div style="padding: 30px 5px 10px 100px; display: inline-block;"><a href="view_product.php?pro_id=<?php echo $pro_id; ?>&show=<?php echo "sim";?>" onclick="clickSingleA(this)" class="single"><h5>Similar Products</h5></a></div>
            <div style="padding: 30px 5px 10px 100px; display: inline-block; margin-bottom: 2em;"><a href="view_product.php?pro_id=<?php echo $pro_id; ?>&show=<?php echo "samusr"; ?>" onclick="clickSingleA(this)" class="single active"><h5>Other Products by the Seller</h5></a></div>
        <?php
        }
    }
    else{?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style="padding: 50px 5px 10px 100px; display: inline-block;"><a href="view_product.php?pro_id=<?php echo $pro_id; ?>&show=<?php echo "his"; ?>" onclick="clickSingleA(this)" class="single active"><h5>Inspired by your browsing history</h5></a></div>
    
        <div style="padding: 30px 5px 10px 100px; display: inline-block;"><a href="view_product.php?pro_id=<?php echo $pro_id; ?>&show=<?php echo "sim";?>" onclick="clickSingleA(this)" class="single"><h5>Similar Products</h5></a></div>
        <div style="padding: 30px 5px 10px 100px; display: inline-block; margin-bottom: 2em;"><a href="view_product.php?pro_id=<?php echo $pro_id; ?>&show=<?php echo "samusr"; ?>" onclick="clickSingleA(this)" class="single"><h5>Other Products by the Seller</h5></a></div>
    <?php
    }
    ?>
   <script>
        function clickSingleA(a)
        {
            items = document.querySelectorAll('.single.active');

            if(items.length) 
            {
                items[0].className = 'single';
            }

            a.className = 'single active';
        }
    </script>
    <!-- <div class="row" style="padding:30px 5px 10px 100px;">
            
            <p style="display: inline-block;">Search History</p>
            
            
            <p style="display: flex;">Compare Products</p>
            
            <p style="display: inline-block;">By same User</p>
           
    </div> -->
 
	<!-- <section class="product" style="border-color:red;"> 


	</script> --> 

    
	
	<section class="product"> 

        <button class="pre-btn"><img src="images/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="images/arrow.png" alt=""></button>
        <div class="product-container">

            <?php
                $usr = json_decode( json_encode($row_c -> uid), true);

                
                if(isset($_REQUEST['show'])){
                    $mess = $_REQUEST['show'];
                    $mess = json_decode( json_encode($mess), true);
                    // echo "lelo";
                    if($mess === 'his'){
                        $queryrecommendation = "SELECT DISTINCT pro_id FROM product_search WHERE uid = $usr ORDER BY search_id DESC LIMIT 20";
                        $runqueryrecommendation = $con->query($queryrecommendation);
                        
                        if($runqueryrecommendation->num_rows == 0)
                        {?>
                            <h4 align="center" style="width:100%;padding: 50px;background:linear-gradient(to right, rgb(242, 112, 156), rgb(255, 148, 114));color:white;"> <?php echo "There is no product to show";?> </h4>
                        <?php
                        }

                        $cnt = 0;
                        while ($rowqueryrecommendation = $runqueryrecommendation->fetch_object()){
                            $pro_id = $rowqueryrecommendation -> pro_id;
                            // echo $pro_id;
                            $queryproductdetails = "SELECT * FROM products WHERE pro_id = $pro_id AND status = 'On Sale' AND uid <> $usr ";
                            $runqueryproductdetails = $con->query($queryproductdetails);
                            $rowqueryproductdetails =  $runqueryproductdetails -> fetch_object();

                            if($runqueryproductdetails -> num_rows !== 0)
                            {
                                $cnt = $cnt + 1;
                                // echo $rowqueryproductdetails->price;
                                $query6 = "select * from product_images where pro_id = $pro_id LIMIT 1";
                                            $run_q6 = $con->query($query6);
                                            $row_q6 = $run_q6->fetch_object();
                                            $image_name = $row_q6->img_name;
                                            $image_destination = "product_images/".$image_name;
                                // $image_name = $rowqueryproductdetails->img_name;
                                // $image_destination = "product_images/".$image_name;
                                ?>
                                <div class="product-card">
                                <div class="product-image">
                                    <!-- <span class="discount-tag">50% off</span> -->
                                    <img src="<?php echo $image_destination; ?>" class="product-thumb" alt="">
                                    <!-- <button class="card-btn">add to wishlist</button> -->
                                </div>
                                <div class="product-info">
                                <div>
                                    <br>
                                                    <a class="card-title text-dark"   href="view_product.php?pro_id=<?php echo $pro_id; ?>"><h5><?php echo $rowqueryproductdetails->name; ?></h5></a>
                                                    <h4 class="font-weight-light" style="color:black;" >&#8377;<?php echo $rowqueryproductdetails->price; ?></h4>
                                                </div>	
                                                <!-- <div>
                                                        
                                                </div> -->
                                    <!-- <h2 class="product-brand">brand</h2> -->
                                    <!-- <p class="product-short-description">a short line about the cloth..</p> -->
                                    <!-- <span class="price">$20</span><span class="actual-price">$40</span> -->
                                </div>
                            </div>
                            <?php
                            }?>
                            <!-- echo $pro_id; -->
                        <?php
                            if($cnt == 0){?>
                                <h4 align="center" style="width:100%;padding: 50px;background:linear-gradient(to right, rgb(242, 112, 156), rgb(255, 148, 114));color:white;"> <?php echo "There is no product to show";?> </h4>
                            <?php                                
                            }
                        }
                    }
                    else if($mess === 'sim'){
                        $queryrecommendation = "SELECT DISTINCT pro_id FROM products WHERE (name LIKE '%$row_q1->name%') and pro_id != '$pro_id' and status = 'On Sale' AND uid <> $usr ORDER BY pro_id DESC";
                        $runqueryrecommendation = $con->query($queryrecommendation);
                        if($runqueryrecommendation->num_rows == 0)
                        {?>
                            <h4 align="center" style="width:100%;padding: 50px;background:linear-gradient(to right, rgb(242, 112, 156), rgb(255, 148, 114));color:white;"> <?php echo "There is no product to show";?> </h4>
                        <?php
                        }
                        while ($rowqueryrecommendation = $runqueryrecommendation->fetch_object()){
                            $pro_id = $rowqueryrecommendation -> pro_id;
                            // echo $pro_id;
                            $queryproductdetails = "SELECT * FROM products WHERE pro_id = $pro_id AND status = 'On Sale' AND uid <> $usr ";
                            $runqueryproductdetails = $con->query($queryproductdetails);
                            $rowqueryproductdetails =  $runqueryproductdetails -> fetch_object();

                            if($runqueryproductdetails -> num_rows !== 0)
                            {
                                // echo $rowqueryproductdetails->price;
                                $query6 = "select * from product_images where pro_id = $pro_id LIMIT 1";
                                            $run_q6 = $con->query($query6);
                                            $row_q6 = $run_q6->fetch_object();
                                            $image_name = $row_q6->img_name;
                                            $image_destination = "product_images/".$image_name;
                                // $image_name = $rowqueryproductdetails->img_name;
                                // $image_destination = "product_images/".$image_name;
                                ?>
                                <div class="product-card">
                                <div class="product-image">
                                    <!-- <span class="discount-tag">50% off</span> -->
                                    <img src="<?php echo $image_destination; ?>" class="product-thumb" alt="">
                                    <!-- <button class="card-btn">add to wishlist</button> -->
                                </div>
                                <div class="product-info">
                                <div>
                                    <br>
                                                    <a class="card-title text-dark"   href="view_product.php?pro_id=<?php echo $pro_id; ?>"><h5><?php echo $rowqueryproductdetails->name; ?></h5></a>
                                                    <h4 class="font-weight-light" style="color:black;" >&#8377;<?php echo $rowqueryproductdetails->price; ?></h4>
                                                </div>	
                                                <!-- <div>
                                                        
                                                </div> -->
                                    <!-- <h2 class="product-brand">brand</h2> -->
                                    <!-- <p class="product-short-description">a short line about the cloth..</p> -->
                                    <!-- <span class="price">$20</span><span class="actual-price">$40</span> -->
                                </div>
                            </div>
                            <?php
                            }?>
                            <!-- echo $pro_id; -->
                        <?php
                        }
                    }   
                    else if($mess === 'samusr'){
                        $queryrecommendation = "SELECT DISTINCT pro_id FROM products WHERE uid = '$row_q1->uid' and pro_id != '$pro_id' and status = 'On Sale' AND uid <> $usr ORDER BY pro_id DESC";
                        $runqueryrecommendation = $con->query($queryrecommendation);
                        if($runqueryrecommendation->num_rows == 0)
                        {?>
                            <h4 align="center" style="width:100%;padding: 50px;background:linear-gradient(to right, rgb(242, 112, 156), rgb(255, 148, 114));color:white;"> <?php echo "There is no product to show";?> </h4>
                        <?php
                        }
                        while ($rowqueryrecommendation = $runqueryrecommendation->fetch_object()){
                            $pro_id = $rowqueryrecommendation -> pro_id;
                            // echo $pro_id;
                            $queryproductdetails = "SELECT * FROM products WHERE pro_id = $pro_id AND status = 'On Sale' AND uid <> $usr ";
                            $runqueryproductdetails = $con->query($queryproductdetails);                    
                            $rowqueryproductdetails =  $runqueryproductdetails -> fetch_object();

                            if($runqueryproductdetails -> num_rows !== 0)
                            {
                                // echo $rowqueryproductdetails->price;
                                $query6 = "select * from product_images where pro_id = $pro_id LIMIT 1";
                                            $run_q6 = $con->query($query6);
                                            $row_q6 = $run_q6->fetch_object();
                                            $image_name = $row_q6->img_name;
                                            $image_destination = "product_images/".$image_name;
                                // $image_name = $rowqueryproductdetails->img_name;
                                // $image_destination = "product_images/".$image_name;
                                ?>
                                <div class="product-card">
                                <div class="product-image">
                                    <!-- <span class="discount-tag">50% off</span> -->
                                    <img src="<?php echo $image_destination; ?>" class="product-thumb" alt="">
                                    <!-- <button class="card-btn">add to wishlist</button> -->
                                </div>
                                <div class="product-info">
                                <div >
                                    <br>
                                                    <a class="card-title text-dark"   href="view_product.php?pro_id=<?php echo $pro_id; ?>"><h5><?php echo $rowqueryproductdetails->name; ?></h5></a>
                                                    <h4 class="font-weight-light" style="color:black;" >&#8377;<?php echo $rowqueryproductdetails->price; ?></h4>
                                                </div>	
                                                <!-- <div>
                                                        
                                                </div> -->
                                    <!-- <h2 class="product-brand">brand</h2> -->
                                    <!-- <p class="product-short-description">a short line about the cloth..</p> -->
                                    <!-- <span class="price">$20</span><span class="actual-price">$40</span> -->
                                </div>
                            </div>
                            <?php
                            }?>
                            <!-- echo $pro_id; -->
                        <?php
                        }
                    }                   
                }
                else{
                    $queryrecommendation = "SELECT DISTINCT pro_id FROM product_search WHERE uid = $usr ORDER BY search_id DESC LIMIT 20";
                    $runqueryrecommendation = $con->query($queryrecommendation);
                    if($runqueryrecommendation->num_rows == 0)
                        {?>
                            <h4 align="center" style="width:100%;padding: 50px;background:linear-gradient(to right, rgb(242, 112, 156), rgb(255, 148, 114));color:white;"> <?php echo "There is no product to show";?> </h4>
                        <?php
                        }
                    while ($rowqueryrecommendation = $runqueryrecommendation->fetch_object()){
                        $pro_id = $rowqueryrecommendation -> pro_id;
                        // echo $pro_id;
                        $queryproductdetails = "SELECT * FROM products WHERE pro_id = $pro_id AND status = 'On Sale' AND uid <> $usr ";
                        $runqueryproductdetails = $con->query($queryproductdetails);
                        $rowqueryproductdetails =  $runqueryproductdetails -> fetch_object();

                        if($runqueryproductdetails -> num_rows !== 0)
                        {
                            // echo $rowqueryproductdetails->price;
                            $query6 = "select * from product_images where pro_id = $pro_id LIMIT 1";
                                        $run_q6 = $con->query($query6);
                                        $row_q6 = $run_q6->fetch_object();
                                        $image_name = $row_q6->img_name;
                                        $image_destination = "product_images/".$image_name;
                            // $image_name = $rowqueryproductdetails->img_name;
                            // $image_destination = "product_images/".$image_name;
                            ?>
                            <div class="product-card">
                            <div class="product-image">
                                <!-- <span class="discount-tag">50% off</span> -->
                                <img src="<?php echo $image_destination; ?>" class="product-thumb" alt="">
                                <!-- <button class="card-btn">add to wishlist</button> -->
                            </div>
                            <div class="product-info">
                            <div>
                                <br>
                                                <a class="card-title text-dark"   href="view_product.php?pro_id=<?php echo $pro_id; ?>"><h5><?php echo $rowqueryproductdetails->name; ?></h5></a>
                                                <h4 class="font-weight-light" style="color:black;" >&#8377;<?php echo $rowqueryproductdetails->price; ?></h4>
                                            </div>	
                                            <!-- <div>
                                                    
                                            </div> -->
                                <!-- <h2 class="product-brand">brand</h2> -->
                                <!-- <p class="product-short-description">a short line about the cloth..</p> -->
                                <!-- <span class="price">$20</span><span class="actual-price">$40</span> -->
                            </div>
                        </div>
                        <?php
                        }?>
                        <!-- echo $pro_id; -->
                    <?php
                    }
                }
                ?>

            <!-- <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="images/card1.jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="images/card2.jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="images/card3.jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="images/card4.jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="images/card5.jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="images/card6.jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="images/card7.jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="images/card8.jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="images/card9.jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="images/card10.jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div> -->
        </div>
    </section>  
    <script src="script.js"></script>
</body>
</html>