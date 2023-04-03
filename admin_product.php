<?php 
session_start();
include('db.php');



if(isset($_SESSION['admin_login'])) {
    $row_c = $_SESSION['admin_login'];
}


if (isset($_REQUEST['sid'])) {
  	$sid = $_REQUEST['sid'];
  	$status = $_REQUEST['status'];
  	$pro_id = $_REQUEST['pro_id'];
  	if ($status == "Enable") {
  		$update = "Disable";
  	} else {
  		$update = "Enable";
  	}
  	$query2 = "update products set status = '$update' where pro_id = '$pro_id' ";
  	$con->query($query2);
  	header("location:product.php");
}


?>

<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<head>
	<title>Admin Product</title>
    <link rel="icon" type="image/jpg" href="logo/auction.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<style type="text/css">
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
</style>
<body>

<?php
    if (isset($_SESSION['admin_login'])) {
        ?>
        <nav class="navbar navbar-expand-sm navbar-dark bg-nav">
        <div class="container">
          <a style="color: #ffc107;" class="navbar-brand" href="index.php">
                <img style="max-width:130px; margin-top: -1px;" src="logo.png">&nbsp;
          </a>
          <ul class="navbar-nav">
				<li class="nav-item">
					<!-- <a class="nav-link text-danger" href="logout.php">Logout</a> -->
                    <a href="admin_home.php">
            <button class="btn btn-primary" >Go to Admin Home Page</button>
            
            </a>
          <a href = "logout.php">
            <button class="btn btn-success" type="submit">Logout</button>
          </a>
          
				</li>
			</ul>
        </div>
    </nav>
        <?php
    }
    ?>
    <br></br>
	<form method="post">
		<table class="mt-5 mb-3" align="center" cellspacing="0" cellpadding="7" width="65%">
			<tr align="center">
				<th>Product ID</th>
				<th>Name</th>
				 <th>Seller Id</th>
				<th>Price by Seller</th>				
				<th> Category </th>

				<th>Description</th>
				<th>Status</th>
				<th colspan="2">Buyer Id </th>
				
			</tr>
			<?php
            $query1 = "select * from products";
            $run_q1 = $con->query($query1);
            while ($row_q1 = $run_q1->fetch_object()) {
            ?>		
 			<tr align="center">
 				<td><?php echo $row_q1->pro_id; ?></td>

 				<td><?php echo $row_q1->name; ?></td>
				<td><?php echo $row_q1->uid; ?></td>
 				<td><?php echo $row_q1->price; ?></td>
				 <td><?php echo $row_q1->category_id; ?></td>

 				<td><?php echo $row_q1->description; ?></td>
                <td><?php echo $row_q1->status; ?></td>		
								
						
                <td></td> 
 			</tr>
            <?php 
            }
            ?>
		</table>
	</form>
    
</body>
</html>