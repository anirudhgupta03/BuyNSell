
<?php
if (isset($_SESSION['user'])){
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-nav animated fadeInDown">
		<div class="container">

			<a style="color: #ffc107;" class="navbar-brand" href="index.php">
				<img style="max-width:130px; margin-top: -1px;" src="logo.png">&nbsp;
			</a>

			
			<div class="search-area">
            <form action = "searchresult.php" method="POST">
              <div class="control-group" style="display:flex;">
                <input class="search-field" name = "search" placeholder="Search here..." />
                <button type="submit" class="search-button" > </button> 
              </div>
            </form>
          </div>
			<ul class="navbar-nav">
				<!-- <li class="nav-item">
					<a class="nav-link <?php if ($home == true) { echo 'active'; }?>" href="index.php">Home</a>
				</li>&nbsp;&nbsp;&nbsp;&nbsp; -->
				<li class="nav-item dropdown">
					
					<a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown"><?php echo $row_c->name;?></a>
					<div class="dropdown-menu bg-darkblue">
						<a href="view_profile.php" class="text-warning dropdown-item ">View Profile</a>
						<a href="wishlist.php" class="text-warning dropdown-item ?>">Products in my Wishlisht </a>
						<a href="product.php" class="text-warning dropdown-item ">Products I put for Sale</a>
						<a href="got.php" class="text-warning dropdown-item ">Products I Purchased!!</a>
					</div>
				</li>&nbsp;&nbsp;&nbsp;	
				<li class = "nav-item">
				<a class="btn btn-warning" href="add_product.php">Add A Product To Sell</a>
				</li>&nbsp;&nbsp;&nbsp;	
				<li class="nav-item">
					<a class="btn btn-danger " href="logout.php">Logout</a>
				</li>
			</ul>
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