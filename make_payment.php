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

$home = true;
$view = false;
$bids = false;
$products = false;

?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>Confirm Details and Make Payment</title> -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <style>
        body {
            padding: 50px;
            background: #f5f5f5 url('assets/img/slider1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;Enter Your Details
        }
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
        form {
            max-width: 700px;
            margin: 0 auto;
        }

        .take_part_opts,
        .form-group {
            margin-top: 30px;
        }

        .take_part_opts {
            padding: 40px;
            border-radius: 5px;
            border: 1px solid #0002;
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
</head>

<body>
<?php include 'nav.php'; ?>

		
<br><br><br>
<?php
    $query1 = "select * from products where status = 'On Sale' and category_id = 1 ORDER BY pro_id DESC;";
	$run_q1 = $con->query($query1);
	$showing_products = $run_q1->num_rows;
    ?>
    <h4 class="m-3 text-info">Showing <?php echo $showing_products; ?>&nbsp;Products&nbsp;for&nbsp;Sale</h4>


    <!-- <div class="row">
        <div class="col-12">
            <div class="text-center">
                
                <img src="assets/img/text_logo_light.png" class="img-fluid" style="height: 100px;">
                <h1>Confirm Your Details</h1>
            </div>
        </div>
    </div> -->

    <!-- <div class="form-group" align="left">
                <button style="width: 3em;" onclick="history.back()" class="btn btn-primary"><i class="fa fa-caret-left" style="font-size:36px"></i></button>
            </div>
    <div> -->
        
        <form action="confirmation.php" method="POST">



            <input type="hidden" name="amount" value="<?= $amount ?>">

            <!-- <div class="form-group">
                <label class="form-label">Name</label>
                <input name="username" class="form-control" value="<?= $_POST['username'] ?>" readonly>
            </div> -->

            <!-- <div class="form-group">
                <label class="form-label">Email</label>
                <input name="email" class="form-control" value="<?= $_POST['email'] ?>" readonly>
            </div> -->

            <!-- <div class="form-group">
                <label class="form-label">Contact Number</label>
                <input name="contact" class="form-control" value="<?= $_POST['contact'] ?>" readonly>
            </div> -->

            <!-- <div class="form-group">
                <label class="form-label">WhatsApp Number</label>
                <input name="whatsapp_no" class="form-control" value="<?= $_POST['whatsapp_no'] ?>" readonly>
            </div> -->

            <!-- <div class="form-group">
                <label class="form-label">Date of Birth</label>
                <input name="dob" class="form-control" value="<?= $_POST['dob'] ?>" readonly>
            </div> -->

            <!-- <div class="form-group">
                <label class="form-label">Occupation</label>
                <input name="occupation" class="form-control" value="<?= $_POST['occupation'][0] ?>" readonly>
            </div> -->

            <?php if (!empty($_POST['inst_org'])) { ?>

                <!-- <div class="form-group">
                    <label class="form-label">Institution/Organisation Name</label>
                    <input name="inst_org" class="form-control" value="<?= $_POST['inst_org'] ?>" readonly>
                </div> -->

            <?php } else { ?>

                <!-- <input type="hidden" name="inst_org" class="form-control" value="<?= $_POST['inst_org'] ?>" readonly> -->

            <?php } ?>

            <!-- <div class="form-group">
                <label class="form-label">Do you want to come with your parents? *</label>
                <input name="is_parents" class="form-control" value="<?= $_POST['is_parents'][0] ?>" readonly>
            </div> -->

            <!-- <div class="form-group">
                <label class="form-label">How did you come to know about the Impressions’22 event?</label>
                <input name="inspiration" class="form-control" value="<?= $_POST['inspiration'] ?>" readonly>
            </div> -->

            <!-- <div class="form-group">
                <label class="form-label">Event you will be present for:</label>
                <input name="event" class="form-control" value="<?= $_POST['event'] ?>" readonly>
            </div> -->

            <!-- <div class="form-group">
                    <label for="id_card" class="form-label">Student ID card details which you will carry for the event *</label>
                    <input type="text" id="id_card  " name="id_card" class="form-control" value="<?= $_POST['id_card'] ?>" readonly>
            </div> -->

            <!-- <input type="hidden" name="age" value="<?= $_POST['age'] ?>">

            <div class="form-group">
                <em><strong>(Bring ID card for on spot verification)</strong></em>
            </div> -->
            
            <div class="container mt-5 mb-5">
				<?php

				?>
				<div class="row">
				<?php
				
				while ($row_q1 = $run_q1->fetch_object()) {
					

					$pro_id = $row_q1->pro_id;
						?>
							<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12" >	
								<div class="card mt-3 mb-3">
									<?php  
									$query6 = "select * from product_images where pro_id = $pro_id LIMIT 1";
									$run_q6 = $con->query($query6);
									$row_q6 = $run_q6->fetch_object();
									$image_name = $row_q6->img_name;
									$image_destination = "product_images/".$image_name;
									?>
									<img class="product_img card-img-top" src="<?php echo $image_destination; ?>"  height="200vh" width="100%" alt="Product Image">
									<div class="card-body bg-gray">
										<a class="card-title text-dark" href="view_product.php?pro_id=<?php echo $pro_id; ?>"><h5><?php echo $row_q1->name; ?></h5></a>
										
										<h4 class="font-weight-light">&nbsp;&#8377;<?php echo $row_q1->price; ?></h4>
										<!-- /* edit krna hai */ -->
										<!-- <a href="make_payment.php?pro_id=<?php echo $row_q1->pro_id;?>" class="btn btn-sm btn-light mt-3"> Buy </a> -->
										
                                    </div>
									
								</div>
							</div>
                            <script
                src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="rzp_test_SDMJHxtZKexHq1"
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
						<?php
				}
				?>
				</div>
			</div>
            

        </form>
    </div>
</body>

</html>
