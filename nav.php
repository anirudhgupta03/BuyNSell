<nav class="navbar navbar-expand-sm navbar-dark bg-nav animated fadeInDown">
		<div class="container">

			<a style="color: #ffc107;" class="navbar-brand" href="index.php">
				<img style="max-width:130px; margin-top: -1px;" src="buynsell.jpg">&nbsp;
			</a>
			<div align="center">
				<a class="btn btn-warning" href="add_product.php">Add A Product To Sell</a>
			</div>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link <?php if ($home == true) { echo 'active'; }?>" href="index.php">Home</a>
				</li>
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle text-warning" data-toggle="dropdown"><?php echo $row_c->name;?></a>
					<div class="dropdown-menu bg-darkblue">
						<a href="view.php" class="text-warning dropdown-item ">View Profile</a>
						<a href="bid.php" class="text-warning dropdown-item ?>">Bids I made on Products</a>
						<a href="product.php" class="text-warning dropdown-item ">Products I put for Sale</a>
						<a href="got.php" class="text-warning dropdown-item ">Products I WON!!</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link text-danger" href="logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</nav>