<?php 
session_start();
include('db.php');
// include('pro_table_check.php');
if(isset($_SESSION['user'])) {
    $row_c = $_SESSION['user'];
}


if (isset($_SESSION['admin_login'])) {
  
} else if (!isset($_SESSION['user'])) {
    header('location:index.php');
    
}

$home = false;
$view = true;
$bids = false;
$products = false;

if (isset($_REQUEST['did'])) {
    
 	echo $did = $_REQUEST['did'];
    $prod = "select * from tbl_purchase where buyer_id = '$did'; ";
    $runy = $con->query($prod);

  
 	echo $del = "delete from user where uid = '$did' ";
 	$con->query($del);

     while($rowx = $runy->fetch_object()){
        $proid = $rowx->pro_id;
        $proid = json_decode( json_encode($proid), true);
        echo $qury = "update products set status = 'On Sale' where pro_id = '$proid';"; 
        $con->query($qury);
    }
    
    if (isset($_SESSION['user'])) {
        header("location:logout.php");
    } else {
        header("location:view_users.php");
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
  	header("location:view_users.php");
}
?>

<!DOCTYPE html>
<html>
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

<?php if(isset($_SESSION['user'])) { ?>


    <?php include 'nav.php'; ?>
<?php } ?>
<br>
<br>
    <?php
    if (isset($_SESSION['admin_login'])) {
        ?>
        <nav class="navbar navbar-expand-sm navbar-dark bg-nav">
        <div class="container">
          <a style="color: #ffc107;" class="navbar-brand" href="admin_home.php">
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


    


 	<form>
 		<table class="mt-5" align="center" cellspacing="0" cellpadding="10" width="80%">
 			<tr align="center">
                <th style="border-radius:15px 0px 0px 0px;">Name</th>
                <!-- <th>Surname</th> -->
 				<th>Email</th>
 				<!-- <th>Gender</th>
 				<th>Hobby</th>
 				<th>Country</th> -->
                <th>Registered before</th>
                <?php if (isset($_SESSION['admin_login'])): ?>
                <th>Status</th>                    
                <?php endif ?>
 				<th style="border-radius:0px 15px 0px 0px;" colspan="2">Action</th>
 			</tr>
            <?php
            if(isset($_SESSION['user'])) {
                $join = "select * from user'";
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
                <td><a class="btn btn-primary" href="view_users.php?sid=<?php echo $row_j->uid; ?>&status=<?php echo $row_j->status; ?>">Change Status</a></td>
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
                <td><a class="btn btn-danger" href="view_users.php?did=<?php echo $row_j->uid; ?>">Delete</a></td>
                <?php
                }
                ?>
 			</tr>
            <?php 
            }
            ?>
        </table>
    </form>	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
