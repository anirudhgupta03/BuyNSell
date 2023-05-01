<?php
session_start();
include('db.php');
// print_r($_POST);

if(!isset($_POST['razorpay_payment_id'])) {
	die("Cannot proceed!");
}

// $conn = mysqli_connect('localhost', 'root', '', 'impressions');


if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}


if(isset($_SESSION['user'])) {
    $row_c = $_SESSION['user'];
}

if(!isset($_SESSION['user'])) {
    header("location:home.php");
}

if (isset($_REQUEST['cluster'])) {
    $Text = urldecode($_REQUEST['cluster']);
    $prodcts = json_decode($Text);
    // print_r( $prodcts);
    $usr = json_decode( json_encode($row_c -> uid), true);
	
    foreach($prodcts as $x => $val) {
        $pro_id = $val;
        $query2 = "insert into tbl_purchase (pro_id, buyer_id, transcn_id) values ($pro_id, $usr, '".$_POST['razorpay_payment_id']."');";
        $con->query($query2);

        $query3 = "update products set status = 'Sold' where pro_id = '$pro_id';";
        $con->query($query3);

        $query39 = "delete from tbl_wishlist where pro_id = $pro_id and uid = $usr";
        $con->query($query39);
    }
    //  $query390 = "update product_search set status = 'Sold' where pro_id = '$pro_id';";
    //  $con->query($query390);
}

$home = false;
$view = false;
$bids = false;
$products = false;
?>

<!DOCTYPE html>
<html>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel = "stylesheet" href = "style.css">
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
body {
    /* background-image: url(2256.jpg); */
    background-repeat: no-repeat;
    background-size: cover;
}


.bg_danger {
    background-color: #ffc9ce;
}

.bg-nav {
    background: -webkit-linear-gradient(left, #a445b2, #fa4299) !important;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    z-index: 5;
}

.container_login {
    width: 20vw;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: flex;
    justify-content: space-around;
}

.item {
    flex-grow: 1;
    color: #fff;
}

.item-1 {
    background: -webkit-linear-gradient(left, #a445b2, #fa4299);/*rgb(179, 55, 113);rgb(231, 76, 60);/*/
}

.item-2 {
    background: -webkit-linear-gradient(left, #a445b2, #fa4299);
}

.admin {
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translate(-50%, -150%);
}

p {
  font-size: 25px;
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

	<!-- <nav class="navbar navbar-expand-sm navbar-dark bg-nav" >
        <div class="container" >
          <a style="color: #ffc107;" class="navbar-brand" href="index.php">
                <img style="max-width:130px; margin-top: -1px;" src="logo.png" >&nbsp;
          </a>
             
        </div>
    </nav> -->
    

    <div class="container_login">

        <div class="item item-2 p-4">
            <h1 class="mb-5" align="center">Congrats!</h2>

            
            <p class="mb-5" align="center">Your payment is successful.</p>
            <form method="post" action="user_home.php">
                <table  align="center" cellspacing="0" cellpadding="5" width="500" >
                    <tr>
                        <td colspan="2" align="center"><input type="submit" class="btn btn-secondary" value = "Close"></td> 
                    </tr>
                </table>
            </form>
            <!-- <form action="nextpage.php" method="POST">
  <input type="submit"/>
</form> -->
        </div>
    </div>
		<script>
	    if ( window.history.replaceState ) {
	        window.history.replaceState( null, null, window.location.href );
	    }
	    window.addEventListener("beforeunload", function (e) {
		  var confirmationMessage = "Please print this receipt before moving!!!\o/";
		  (e || window.event).returnValue = confirmationMessage; 
		  return confirmationMessage;                            
		});
	</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
