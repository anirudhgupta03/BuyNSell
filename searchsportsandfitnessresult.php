<?php 
session_start();
include('db.php');
// include('pro_table_check.php');
if(isset($_SESSION['user'])) {
    $row_c = $_SESSION['user'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Search Results</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel = "stylesheet" href = "style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<style>

._1sHuca {
    background: #fff;
    padding: 50px;
    text-align: center;
}
._1sHuca ._3uTeW4 {
    font-size: 26px;
    font-weight: 500;
    margin: 20px 0 10px;
}

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
 
<?php
if (isset($_SESSION['user'])){
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-nav animated fadeInDown">
		<div class="container">

			<a style="color: #ffc107;" class="navbar-brand" href="index.php">
				<img style="max-width:190px; margin-top: -1px;" src="logo.png">
			</a>

			
			<div class="search-box">
            	<form action = "searchsportsandfitnessresult.php" method="POST" class = "search-bar" autocomplete = "off">
              		<!-- <div class="control-group" style="display:flex;"> -->
                		<input type = "text" name = "search" placeholder="Search here..." required/>
                		<button type="submit"><img src = "images/search.png"> </button> 
              		<!-- </div> -->
            	</form>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


				<div class="nav-item dropdown">
					
					<a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown"><?php echo $row_c->name;?></a>
					<div class="dropdown-menu bg-darkblue">
						<a href="view_profile.php" class="text-warning dropdown-item ">View Profile</a>
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

<?php
if (!isset($_SESSION['user'])){
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-nav animated fadeInDown">
		<div class="container">

			<a style="color: #ffc107;" class="navbar-brand" href="index.php">
				<img style="max-width:190px; margin-top: -1px;" src="logo.png">
			</a>

			
			<div class="search-box">
            	<form action = "searchsportsandfitnessresult.php" method="POST" class = "search-bar" autocomplete = "off">
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


	
<br>
<br>
<br>
    <?php
        $search_string = strtolower($_POST['search']);

        $totalChars = 0;

        $chars = str_split($search_string);

        foreach ($chars as $char) {
            if($char !== ' '){
                $totalChars++;
            }
        }
  
        $a=array();

        $query = "Select * FROM products WHERE status = 'On Sale' AND category_id = 4" ;
        $run_query = $con->query($query);

        while($row_query = $run_query->fetch_object()){

            $cindexing = $row_query -> indexing;
            $maxmatchcount = 0;

            $index2 = 0;

            while($index2 < strlen($cindexing)){
                $matchcount = 0;
                $index1 = 0;
                $cindex2 = $index2;
                while($index1 < $totalChars && $cindex2 < strlen($cindexing)){

                    $char1 = substr( $search_string, $index1, 1 );
                    $char2 = substr( $cindexing, $cindex2, 1);

                    if($char1 == ' '){
                        $index1++;
                    }
                    else if($char2 == ' '){
                        $cindex2++;
                    }
                    else if($char1 == $char2){
                        $matchcount++;
                        $index1++;
                        $cindex2++;
                    }
                    else{
                        break;
                    }
                }
                // echo $matchcount;
                if($matchcount > $maxmatchcount){
                    $maxmatchcount = $matchcount;
                }
                $index2++;
            }
            // array_push($a, $row_query -> pro_id, $maxmatchcount/$totalChars);
            // echo "$maxmatchcount <br>";
            $a[$row_query -> pro_id] = $maxmatchcount/$totalChars; 
        }

        $threshold = 0.3;
        $maxvalue = 0;
        $flag = false;
        foreach($a as $x => $val) {
            // echo "$x;
            // echo "$val <br>";
            if($val >= $threshold){
                if($val > $maxvalue){
                    $maxvalue = $val;
                }
                // echo $val;
            }
        }

        $ans = array();

        foreach($a as $x => $val) {
            if($val == $maxvalue){
                array_push($ans,$x);
            }
        }

        if($maxvalue == 0){
            ?>
            <div class="_1sHuca"><img src="images/noresult.jpg"><div class="_3uTeW4">Sorry, no results found!</div><div class="CqJpD_">Please check the spelling or try searching for something else</div></div>
        
        <?php
        }
        else{
            foreach ($ans as $value) {
                $query1 = "select pro_id, category_id, name, price, description from products where pro_id = '$value'";
                $run_q1 = $con->query($query1);

                while ($row_q1 = $run_q1->fetch_object()) {
                    ?>
                        <div class="container" style="padding:30px;">
                        <div style="border-radius: 15px; border-color: blue; width:100%;" class="card" >
                        <div style=" display:inline-block; width:100%; border-radius:15px; background: radial-gradient(circle at 12.3% 19.3%, rgb(85, 88, 218) 0%, rgb(95, 209, 249) 100.2%);" class="card-header"><h3 style="display:inline-block; color:white;"><?php echo $row_q1->name; ?> </h3>
                        <h2 class="card-title" style="float:right;"><a href="view_product.php?pro_id=<?php echo $row_q1 -> pro_id; ?>" class="btn btn-warning">Buy</a></h2>
                        </div>
                    
                                <div class="card-body">
                                    <!-- <div class="card-title">
                                        <h2 class="card-title" style="display:inline-block;"><?php echo $row_q1->name; ?></h2>
                                        <h2 class="card-title" style="float:right;"><a href="home.php" class="btn btn-success mt-3">Buy</a></h2>
                                    </div> -->
                                    <?php
                                        $query44 = "select * from product_category where category_id = $row_q1->category_id";
                                        $run_q44 = $con->query($query44);
                                        $row_q44 = $run_q44->fetch_object()
                                    ?>
                                    <h4 class="card-text">Category:&nbsp;<?php echo $row_q44->name; ?></h4>
                                    <p class="card-text"><?php echo $row_q1->description; ?></p>
                                    <div class="container">
                                        <?php
            
                                        $query4 = "select * from product_images where pro_id = $row_q1->pro_id";
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
                                    
                                    <!-- <form action="confirmation.php" method="POST">
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
                            </form> -->
                        </div>   
                    </div>
                    </div>
                    </div>
                <?php
                }
            }
        }
        
    ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

