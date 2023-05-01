<?php 
session_start();
include('db.php');
// include('pro_table_check.php');
if(isset($_SESSION['user'])) {
    $row_c = $_SESSION['user'];
}


if (!isset($_SESSION['user'])) {
    header('location:user_home.php');
}

$home = false;
$view = true;
$bids = false;
$products = false;

if (isset($_REQUEST['did'])) {
 	$did = $_REQUEST['did'];
    $usr = json_decode( json_encode($did), true);
 	echo $del = "delete from user where uid = '$usr' ";
 	$con->query($del);
    if (isset($_SESSION['user'])) {
        header("location:logout.php");
    } else {
        header("location:view.php");
    }	
} 

if (isset($_REQUEST['sid'])) {
  	$sid = $_REQUEST['sid'];
  	$status = $_REQUEST['status'];
  	if ($status == "Enable") {
  		$up = "Disable";
  	}
  	else if ($status == "Disable") {
  		$up = "Enable";
  	}
  	else {
  		$up = "Enable";
  	}
  	$update = "update user set status = '$up' where uid = '$sid' ";
  	$con->query($update);
  	header("location:view.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" href = "style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php include 'head.php'; ?>

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
.mt-5, .my-5 {
    margin-top: 5rem!important;
}
tr:nth-child(odd) {
    background-color: lightgray;
}
/* .dropdown-menu {
    position: absolute;
    top: 100%;
    left: 19px;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 10rem;
    padding: -0.5rem 0;
    margin: -0.875rem 0 0;
    font-size: 1rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 0.25rem;
} */
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
if (isset($_SESSION['user'])){
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-nav animated fadeInDown">
		<div class="container">

			<a style="color: #ffc107;" class="navbar-brand" href="index.php">
				<img style="max-width:190px; margin-top: -1px;" src="logo.png">&nbsp;
			</a>

			
			<div class="search-box">
            	<form action = "searchresult.php" method="POST" class = "search-bar" autocomplete = "off">
              		<!-- <div class="control-group" style="display:flex;"> -->
                		<input type = "text" name = "search" placeholder="Search here..." required/>
                		<button type="submit"><img src = "images/search.png"> </button> 
              		<!-- </div> -->
            	</form>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
                <!-- <div class="nav-item">
					<a class="nav-link text-white<?php if ($home == true) { echo 'active'; }?>" href="index.php">Home</a>
                </div> -->
				<div class="nav-item dropdown">
					
					<a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown"><?php echo $row_c->name;?></a>
					<div class="dropdown-menu bg-darkblue">
						<!-- <a href="view_profile.php" class="text-warning dropdown-item ">View Profile</a> -->
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
<br>
<br>
    <?php
    if (isset($_SESSION['admin_login'])) {
        ?>
        <div class="right">
            <a class="btn btn-danger" href="logout.php">LOGOUT</a>
        </div>
        <?php
    }
    ?>


    


 	<form>
 		<table class="mt-5" align="center" cellspacing="0" cellpadding="10" width="80%">
 			<tr align="center">
                <th style="border-radius:15px 0px 0px 0px;">Name</th>
 				<th>Email</th>
                <th>Registered before</th>
                <?php if (isset($_SESSION['admin_login'])): ?>
                <th>Status</th>                    
                <?php endif ?>
 				<th style="border-radius:0px 15px 0px 0px;" colspan="2">Action</th>
 			</tr>
            <?php
            if(isset($_SESSION['user'])) {
                $join = "select * from user where uid = '$row_c->uid'";
            }
            else {
                $join = "select * from user";
            }
            
            $run_j = $con->query($join);
            $date = date('Y-m-d');
            while ($row_j = $run_j->fetch_object()) {
            ?>		
 			<tr align="center">
                <td><?php echo $row_j->name; ?></td>
 				<td><?php echo $row_j->email; ?></td>
                <td>
                    <?php
                    $c_date = date('Y-m-d h:i:s');
                    $tot_time = strtotime($c_date) - strtotime($row_j->dor);
                    $day = (int)($tot_time / (24*60*60));
                    $hour = (int)(($tot_time - (24*60*60*$day)) / (60*60));
                    $min = (int)((($tot_time - (24*60*60*$day) - (60*60*$hour))) / 60);
                    $sec = (($tot_time - (24*60*60*$day) - (60*60*$hour)) - (60*$min));
                    echo ($day);
                    if($day>1) {
                        echo " Days ";
                    }
                    else {
                        echo " Day ";
                    }

                    echo ($hour);
                    if($hour>1) {
                        echo " Hours ";
                    }
                    else {
                        echo " Hour ";
                    }

                    echo ($min);
                    if($min>1) {
                        echo " Minutes ";
                    }
                    else {
                        echo " Minute ";
                    }

                    echo ($sec);
                    if($sec>1) {
                        echo " Seconds ";
                    }
                    else {
                        echo " Second ";
                    }
                    ?>
                </td>
                <?php if (isset($_SESSION['admin_login'])): ?>
                <td><?php echo $row_j->status; ?></td>                    
                <?php endif ?>
                <?php
                if(!isset($_SESSION['user'])) {
                ?>
                <td><a class="btn btn-primary" href="view.php?sid=<?php echo $row_j->uid; ?>&status=<?php echo $row_j->status; ?>">Change Status</a></td>
 				<?php
                }
                ?>
                <?php
                if(isset($_SESSION['user'])) {
                ?>
                <td><a class="btn btn-success" href="redirect.php?eid=<?php echo $row_j->uid; ?>">Edit Profile</a></td>
                <?php
                }
                ?>
                <?php
                if(!isset($_SESSION['user'])) {
                ?>
                <td><a class="btn btn-danger" href="view.php?did=<?php echo $row_j->uid; ?>">Delete</a></td>
                <?php
                }
                ?>
 			</tr>
            <?php 
            }
            ?>
        </table>
    </form>	

    <?php
    if (isset($_SESSION['admin_login'])) {
        ?>
        <div>
            <a class="btn btn-primary" href="admin_home.php">Go to Admin Home Page</a>
        </div>
        <?php
    }
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
