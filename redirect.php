<?php 
session_start();
include('db.php');
// include('pro_table_check.php');

if (!isset($_REQUEST['eid'])) {
	header("location:user_home.php");
}
if (isset($_REQUEST['eid'])) {
	$eid = $_REQUEST['eid'];
 	$edit = "select * from user where uid = '$eid' ";
 	$run_e = $con->query($edit);
 	$row_e = $run_e->fetch_object();
}


if (isset($_REQUEST['update'])) {
	$name = $_REQUEST['name'];
	// $surname = $_REQUEST['surname'];
	$password = $_REQUEST['password'];
	$password = password_hash($password, PASSWORD_DEFAULT);
 	$update = "update user set name='$name', password='$password' where uid = '$eid' ";
 	$con->query($update);
 	header("location:view_profile.php");
}

?>		

<!DOCTYPE html>
<html>
<head>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel = "stylesheet" href = "style.css">
	<title> Edit Profile </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php include 'head.php'; ?>
<style>
body {
	/* background-image: url(2257.jpg); */
	/* background-color: #a29bfe; */
	position: relative;
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

h1, h2, h3, h4, h5, h6 {
    margin-top: 60px;
    margin-bottom: 0.5rem;
}
.bg-darkblue {
    background-color: rgb(24, 44, 97) !important;
}

.container {
	/* position: absolute; */
    /* top: 500%; */
	display: flex;
	justify-content: center;
}

.item {
	position: absolute;
    top: 100%;
	padding: 25px;
	background: -webkit-linear-gradient(left, #a445b2, #fa4299);
	border-radius: 5px;
	color: #fff;
}

table {
	
}

</style>
<body>
<?php
if (isset($_REQUEST['eid'])){
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-nav animated fadeInDown">
		<div class="container">

			<a style="color: #ffc107;" class="navbar-brand" href="index.php">
				<img style="max-width:190px; margin-top: -1px;" src="logo.png">
			</a>

			
			<div class="search-box">
            	<form action = "searchresult.php" method="POST" class = "search-bar" autocomplete = "off">
              		<!-- <div class="control-group" style="display:flex;"> -->
                		<input type = "text" name = "search" placeholder="Search here..." required/>
                		<button type="submit"><img src = "images/search.png"> </button> 
              		<!-- </div> -->
            	</form>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


				<div class="nav-item dropdown">
					
					<a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown"><?php echo $row_e->name;?></a>
					<div class="dropdown-menu bg-darkblue">
						<a href="view_profile.php" class="text-warning dropdown-item ">View Profile</a>
						<a href="seller_rating.php" class="text-warning dropdown-item ">My Rating</a>
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
if (!isset($_REQUEST['eid'])){
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
<!-- <nav class="navbar navbar-expand-sm navbar-dark bg-nav animated fadeInDown">
		<div class="container">

			<a style="color: #ffc107;" class="navbar-brand" href="index.php">
				<img style="max-width:130px; margin-top: -1px;" src="logo.png">&nbsp;
			</a>

			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link <?php if ($home == true) { echo 'active'; }?>" href="index.php">Home</a>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;
				<li class="nav-item dropdown">
					
					
				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
				<li class="nav-item">
					<a class="btn btn-warning " href="logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</nav> -->
	<br><br><br>
	<h1  align="center" class="text-primary">Edit Profile</h1>
 	<form method="post" >
	 	<div class="container mt-5 animated fadeIn"> 
			<div class="item">
				<table align="center" cellspacing="0" cellpadding="5" width="500" >
					<tr>
						<th>Email</th>
						<td>
							<?php echo $row_e->email; ?>
						</td>
					</tr>
					<tr>
						<th>Name</th>
						<td><input type="text" name="name" required="required" value="<?php 
							
								echo $row_e->name;
							?>">
						</td>
					</tr>

					
					<tr>
					<th>Password</th>
						<td><input type="password" name="password" required="required" value="<?php 
							
								echo $row_e->password;
							?>">
						</td>
					</tr>
					
					<tr>
						<td colspan="2" align="center"><input type="submit" class="btn btn-success" name="update" value="UPDATE"></td>						
					</tr>

					<tr>
					<td colspan="2" align="center"><a href="view_profile.php" class="btn btn-warning">Cancel</a></td>
					</tr>
				</table>
				
			</div>
		</div>
	</form>
	<!-- <a href="view_profile.php" class="btn btn-danger">Cancel</a> -->
	<!-- <table align="center">
		<tr align="center">
			<td>
				<a href="view_profile.php" class="btn btn-danger">Cancel</a>
			</td>
		</tr>
	</table> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>