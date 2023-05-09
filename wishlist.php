<?php 
session_start();
include('db.php');
// include('pro_table_check.php');

if(!isset($_SESSION['user'])) {
    header("location:user_home.php");
}

if(isset($_SESSION['user'])) {
    $row_c = $_SESSION['user'];

    $query22 = "select pro_id from tbl_wishlist where uid = $row_c->uid";
    $runq22 = $con->query($query22);
    $amount = 0;    
    $num1 = $runq22->num_rows;
    $prodcts = array();

    while( $rowq22 = $runq22->fetch_object() ){
        array_push($prodcts, $rowq22->pro_id);

        $query23 = "select price from products where pro_id = $rowq22->pro_id";
        $runq23 = $con->query($query23);
        $rowq23 = $runq23->fetch_object();
        $amount = $amount + $rowq23->price;
    }

    $Text = json_encode($prodcts);
    $RequestText = urlencode($Text);
    // print_r( $prodcts);
}

if (isset($_REQUEST['did'])) {
    
    echo $did = $_REQUEST['did'];
    // $pro_id = json_decode( json_encode($pro_id), true);
    $usr = json_decode( json_encode($row_c -> uid), true);
    $query39 = "delete from tbl_wishlist where pro_id = $did and uid = $usr";
 	$con->query($query39);
   
   if (isset($_SESSION['user'])) {
       header("location:wishlist.php");
   } else {
       header("location:index.php");
   }	
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
        header("location:view_product.php");
    }
}

$errormessage1 = "Seller can not buy his own product";
$errormessage2 = "Your bid is already at the top";

if (isset($_REQUEST['buy'])) {
	// $bid_amount = $_REQUEST['bid_amount'];
    header("location:make_payment.php");
}
?>

<!doctype html>

<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Wishlist</title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel = "stylesheet" href = "style.css">
</head>
<?php include 'head.php'; ?>
<style>
/* Cart or Wishlist */
.pt-md-5, .py-md-5 {
    padding-top: 7rem!important;
}
.shopping-cart .cart-header{
    padding: 10px;
}
.shopping-cart .cart-header h4{
    font-size: 18px;
    margin-bottom: 0px;
}
.shopping-cart .cart-item a{
    text-decoration: none;
}
.shopping-cart .cart-item{
    background-color: #fff;
    box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
    padding: 10px 10px;
    margin-top: 10px;
}
.shopping-cart .cart-item .product-name{
    font-size: 16px;
    font-weight: 600;
    width: 100%;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    cursor: pointer;
}
.shopping-cart .cart-item .price{
    font-size: 16px;
    font-weight: 600;
    padding: 4px 2px;
}
.shopping-cart .btn1{
    border: 1px solid;
    margin-right: 3px;
    border-radius: 0px;
    font-size: 10px;
}
.shopping-cart .btn1:hover{
    background-color: #2874f0;
    color: #fff;
}
.shopping-cart .input-quantity{
    border: 1px solid #000;
    margin-right: 3px;
    font-size: 12px;
    width: 40%;
    outline: none;
    text-align: center;
}
/* Cart or Wishlist */
  /*
    .align {
        position: absolute;
        top: 0;
        right: 0;
        padding-right: 10px;
    }*/
    body {
	
    /* background-image: url(2254.jpg); */
    background-repeat: no-repeat;
    background-size: cover;
 
}
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
input.razorpay-payment-button {
            display: block;
            margin: 30px auto 0;
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
            	<form action = "searchresult.php" method="POST" class = "search-bar" autocomplete = "off">
              		<!-- <div class="control-group" style="display:flex;"> -->
                		<input type = "text" name = "search" placeholder="Search here..." />
                		<button type="submit"><img src = "images/search.png"> </button> 
              		<!-- </div> -->
            	</form>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


				<div class="nav-item dropdown">
					
					<a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown"><?php echo $row_c->name;?></a>
					<div class="dropdown-menu bg-darkblue">
						<a href="view_profile.php" class="text-warning dropdown-item ">View Profile</a>
						<!-- <a href="wishlist.php" class="text-warning dropdown-item ?>">Products in my Wishlisht </a> -->
                        <a href="seller_rating.php" class="text-warning dropdown-item ">My Rating</a>
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
				<img style="max-width:130px; margin-top: -1px;" src="logo.png">&nbsp;
			</a>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link <?php if ($home == true) { echo 'active'; }?>" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if ($home == true) { echo 'active'; }?>" href="home.php">Signup</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if ($home == true) { echo 'active'; }?>" href="home.php">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if ($home == true) { echo 'active'; }?>"" href="admin_login.php">Admin Login</a>
				</li>
			</ul>
		</div>
	</nav>
	<?php
}
?>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
        
            <div class="row">
                <div class="col-7">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Buy</h4>
                                </div>
                            </div>
                        </div>

                        <?php
                            $query15 = "select * from tbl_wishlist where uid=$row_c->uid ORDER BY pro_id DESC;";
                            $run_q15 = $con->query($query15);
                            // $showing_products = $run_q15->num_rows;
                        ?>
                        <?php
				
				        while ($row_q15 = $run_q15->fetch_object()) {
                            $pro_id = $row_q15->pro_id;
                            ?>
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-6 my-auto">
                                        <?php  
                                            $query6 = "select * from product_images where pro_id = $pro_id LIMIT 1";
                                            $run_q6 = $con->query($query6);
                                            $row_q6 = $run_q6->fetch_object();
                                            $image_name = $row_q6->img_name;
                                            $image_destination = "product_images/".$image_name;

                                            $query66 = "select * from products where pro_id = $pro_id";
                                            $run_q66 = $con->query($query66);
                                            $row_q66 = $run_q66->fetch_object();
                                        ?>
                                        <a href="">
                                            <label class="product-name">
                                                <img src="<?php echo $image_destination; ?>" style="width: 50px; height: 50px" alt="">
                                                <?php echo $row_q66->name;  ?>
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <label class="price"><?php echo $row_q66->price; ?> </label>
                                    </div>
                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove">
                                            <a href="wishlist.php?did=<?php echo $pro_id; ?>" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Remove
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove">
                                            <a href="view_product.php?pro_id=<?php echo $pro_id; ?>" class="btn btn-success btn-sm">
                                                Buy
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    <?php
                    }
                    ?>       
                    </div>
                </div>
                <div class="col-1">
                </div>
                <div class="col-4">
                    <div class="row">
                        <br>
                    </div>
                    <div class="row">
                        <br>
                    </div>
                    <div class="row">
                        <br>
                    </div>
                    <div class="row">
                        <br>
                    </div>
                    
                    <div class="row">
                        <div class="card" style = "border-color: rgb(242, 112, 156); border-radius:15px;">
                            
                            <div class="container">
                                <h4 class = "card-header" align = "center" style="width:100%;border-radius:0px 0px 15px 15px; background: linear-gradient(to right, rgb(242, 112, 156), rgb(255, 148, 114));"><b style="color:white;">Price Details</b></h4>
                                <!-- <div style="  height: 1px; border: 0; background: black;">
                                    <hr>
                                </div> -->
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <p> Price( <?php echo $num1;?> items ) </p>
                                    </div>
                                    <div class="col-6">
                                        <p> <?php echo $amount; ?> </p>
                                    </div>                                
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <p> Delivery Charges </p>
                                    </div>
                                    <div class="col-6">
                                        <p style="color:green;"> FREE </p>
                                    </div>                                
                                </div>
                                
                                <div style="  height: 1px; border: 0; background: black;">
                                    <hr>
                                </div>
                                <?php 
                                    $image_for_payment = "product_images/"."Iconpay.jpeg";
                                ?>
                               
                                <div class="row">
                                    <form action="confirmation1.php?cluster=<?php echo $RequestText; ?>" method="POST">
                                        <script
                                        src="https://checkout.razorpay.com/v1/checkout.js"
                                        data-key="rzp_test_SDMJHxtZKexHq1"
                                        data-amount="<?= $amount * 100 ?>"
                                        data-buttontext="Proceed to pay &#x20B9 <?= $amount ?>!"
                                        data-name= "<?= "dffff"?>"
                                        data-description="Product Purchase"
                                        data-image="<?= $image_for_payment ?>"
                                         data-prefill.email="<?= $row_c -> email ?>"
                                        data-theme.color="#b21e8e"
                                        ></script>

                                    </form>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>