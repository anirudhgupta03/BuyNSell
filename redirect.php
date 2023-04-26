<?php 
include('db.php');
// include('pro_table_check.php');

if (isset($_REQUEST['eid'])) {
	$eid = $_REQUEST['eid'];
 	$edit = "select * from user where uid = '$eid' ";
 	$run_e = $con->query($edit);
 	$row_e = $run_e->fetch_object();
}


if (isset($_REQUEST['update'])) {
	$name = $_REQUEST['name'];
	$surname = $_REQUEST['surname'];
	$password = $_REQUEST['password'];
	
 	$update = "update user set name='$name', password='$password' where uid = '$eid' ";
 	$con->query($update);
 	header("location:view_profile.php");
}

?>		

<!DOCTYPE html>
<html>
	
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
    top: 175%;
	padding: 25px;
	background: -webkit-linear-gradient(left, #a445b2, #fa4299);
	border-radius: 5px;
	color: #fff;
}

table {
	
}

</style>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-nav animated fadeInDown">
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
	</nav>
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