<?php 
session_start();
include('db.php');
// include('pro_table_check.php');
if(isset($_SESSION['user'])) {
    $row_c = $_SESSION['user'];
}

if(!isset($_SESSION['user'])) {
    header("location:home.php");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<style>



/********/
/* IMAGE POPUT STARTING */
/********/



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
</style>
<body>
 

<?php include 'nav.php'; ?>


	
<br>
<br>

	<div class="container">

<br><br>
		

    <div style="border-radius: 15px; border-color: blue; " class="card" >
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
                    data-key="rzp_test_6ylMbjZf5RYhOG"
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
	
	
</body>
</html>