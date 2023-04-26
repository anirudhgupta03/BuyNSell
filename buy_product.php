<?php 
session_start();
include('db.php');
// include('pro_table_check.php');

if(isset($_SESSION['user'])) {
    $row_c = $_SESSION['user'];
}

$home = false;
$view = false;
$bids = false;
$products = false;

if (isset($_REQUEST['pro_id'])) {
	$pro_id = $_REQUEST['pro_id'];
	$query1 = "select * from products where pro_id = $pro_id; ";
	$run_1 = $con->query($query1);
	$row_1 = $run_1->fetch_object();
    $amount = $row_1 -> price;
}

// $query3 = "SELECT * from tbl_bid WHERE pro_id = $pro_id ORDER BY bid_amount DESC LIMIT 1;";
// $run_3 = $con->query($query3);

// if ($run_3->num_rows === 1) {				//Atlest one bid has been done
// 	$row_3 = $run_3->fetch_object();		
// 	echo $max_bid = $row_3->bid_amount;
// } else {
// 	$max_bid = $row_1->price;				//No bid done yet
// }

// $errormessage = "Your Bid Amount Should be greater than ". ($max_bid);
$errormessage1 = "Seller can not buy his own product";
$errormessage2 = "Your bid is already at the top";

if (isset($_REQUEST['buy'])) {
	// $bid_amount = $_REQUEST['bid_amount'];

	if($row_c->uid == ($row_1->uid)){
		echo "<script type='text/javascript'>alert('$errormessage1');</script>";
		// header("location:user_home.php");
	}
    else{
        header("location:make_payment.php");
    }
}

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
 
	<?php include 'nav.php'; ?>

<br>
<br>
<br>

	<form method="post">
		<table cellpadding="10">
			<tr>
				<th>Product Name</th>
				<td><?php echo $row_1->name; ?></td>
			</tr>
			<tr>
				<th>Product Price</th>
				<td><?php echo $row_1->price; ?></td>
			</tr>
			<tr>
				<th>Product Seller ID</th>
				<td><?php echo $row_1->uid; ?></td>
			</tr>
			<tr>
			</tr>
			<!-- <tr>
				<th>Enter Your amount to Bid</th>
				<td><input type="number" name="bid_amount" required="required"></td>
			</tr> -->
			<tr>
				<td colspan="2"><input class="btn btn-primary" type="submit" name="buy" value="Make Payment"></td>
			</tr>
            <script
                src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="rzp_test_6ylMbjZf5RYhOG"
                data-amount="<?= $amount * 100 ?>"
                data-buttontext="Proceed to pay &#x20B9 <?= $amount ?>!"
                data-name="Impressions 2022"
                data-description="Entry Ticket Purchase"
                data-image="/assets/img/color.png"
                data-prefill.name="<?= $_POST['username'] ?>"
                data-prefill.email="<?= $_POST['email'] ?>"
                data-prefill.contact="<?= $_POST['contact'] ?>"
                data-theme.color="#b21e8e"
            ></script>
		</table>
	</form>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>