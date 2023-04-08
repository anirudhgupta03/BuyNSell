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

if (isset($_REQUEST['pro_id'])) {
	$pro_id = $_REQUEST['pro_id'];
	$query1 = "select * from products where pro_id = $pro_id;";
	$run_q1 = $con->query($query1);
	$row_q1 = $run_q1->fetch_object();	
	$pro_id = json_decode( json_encode($pro_id), true);
	$usr = json_decode( json_encode($row_c -> uid), true);
	// echo  $_POST['razorpay_payment_id']; 
	// $transaction_id = $_POST['razorpay_payment_id']; 
	// echo $transaction_id;
	// $trsn_id = json_decode( json_encode($transaction_id), true);
    $query2 = "insert into tbl_purchase (pro_id, buyer_id, transcn_id) values ($pro_id, $usr, '".$_POST['razorpay_payment_id']."');";
    $con->query($query2);

    $query3 = "update products set status = 'Sold' where pro_id = '$pro_id';";
	$con->query($query3);

    $query39 = "delete from tbl_wishlist where pro_id = $pro_id and uid = $usr";
 	$con->query($query39);
}

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
    background-color: #AFE1AF;
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

	<?php include 'nav.php'; ?>

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
