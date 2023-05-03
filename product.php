<?php 
session_start();
include('db.php');
// include('pro_table_check.php');
if(isset($_SESSION['user'])) {
    $row_c = $_SESSION['user'];
}

if (!isset($_SESSION['user'])) {
    header("location:user_home.php");
}

$home = false;
$view = false;
$bids = false;
$products = true;

if (isset($_REQUEST['pro_id'])) {
    $pro_id = $_REQUEST['pro_id'];
    $status = $_REQUEST['status'];
    if ($status == "On Sale") {
        $status = "Disable";
    } elseif ($status == "Disable") {
        $status = "On Sale";        
    }
    $query4 = "update products set status = '$status' where pro_id = '$pro_id';";
    $con->query($query4);
    header("location:product.php");
}


?>

<!DOCTYPE html>
<html>

<head>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel = "stylesheet" href = "style.css">
</head>
<?php include 'head.php'; ?>

<style>
body {/*
    background-image: url(1920x1200-data_out_12_164084632-blur-wallpapers.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;*/
    /background-color: rgba(23, 162, 184, .3);/
}

/*
.bg-nav {
    background-color: rgba(24, 44, 97, .6);
    background-color:  rgba(179, 55, 113, .6);
    background-color: #a9a9a9;
    background-color: rgba(87, 75, 144, .8);
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

.card-deck {
    flex-direction: column;
    width:100%;
}

.align-corner {
    position: absolute;
    top: 0%;
    right: 0%;
}
/*
.card {
    background-color: transparent;
    border: none;
}*/

.card-body {
    /background-color: rgba(207, 106, 135, .65);/
    background-color: #ddd;
    /color: #e5e5e5;/
    border: none;
    border-radius: 5px;
}

.card-hover {
    background-color: #ddd;
}

.card-hover:hover {
    /background-color: rgba(231, 76, 60, .5);/
    background-color: #17a2b8;
}

.sold {
    background-color: none;
    opacity: .4;
}

.flex-container {
    display: flex;
    justify-content: space-between;
}

.btn-magenta {
  color: #fff;
  background-color: rgba(179, 55, 113,1.0);
  border-color: rgba(179, 55, 113,1.0);
}

.btn-magenta:hover {
  color: #fff;
  background-color: rgba(109, 33, 79,1.0);
  border-color: rgba(111, 30, 81,1.0);
}

.btn-magenta:focus,
.btn-magenta.focus {
  box-shadow: 0 0 0 0.2rem rgba(131, 52, 113, 0.5);
}

.btn-outline-magenta {
  color: #fff;
  background-color: transparent;
  background-image: none;
  border-color: rgba(179, 55, 113,1.0);
}

.btn-outline-magenta:hover {
  color: #fff;
  background-color: rgba(109, 33, 79,1.0);
  border-color: rgba(111, 30, 81,1.0);
}

.btn-outline-magenta:focus,
.btn-outline-magenta.focus {
  box-shadow: 0 0 0 0.2rem rgba(131, 52, 113, 0.5);
}

.card-header {
    position: relative;
}

.people-bid {
    border: 1px solid #17a2b8;
    padding-bottom: 20px;
    margin-top: 30px;
}
     /* Style for the categories */
     .categories {
        display: flex;
        justify-content: center;
        margin-top: 45px;
        /* margin-left: 70px; */
      }
      
      .category {
        font-size: 20px;
        font-weight: bold;
        padding: 5px 20px;
        border: 2px solid blue;
        border-radius: 5px;
        cursor: pointer;
        margin: 0 10px;
      }
      
      .active {
        background: linear-gradient(to right, rgb(242, 112, 156), rgb(255, 148, 114));
        color: white;
      }
      
      /* Style for the products */
      .products {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 20px;
      }
      
      .product {
        width: 300px;
        border: 2px solid pink;
        border-radius: 5px;
        padding: 20px;
        margin: 10px;
      }
      
      .product h3 {
        font-size: 18px;
        margin-top: 0;
      }
      
      .product p {
        font-size: 16px;
      }
      
      /* Style for the on sale products */
      .onsale {
        display: none;
      }
      
      /* Style for the sold products */
      .sold1 {
        display: none;
      }
      
      /* Active category styles */
      .onsale.active ~ .products .onsale,
      .sold1.active ~ .products .sold1 {
        display: flex;
      }
</style>

<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-nav animated fadeInDown ">
		<div class="container sold1 onsale">

			<a style="color: #ffc107;" class="navbar-brand" href="index.php">
				<img style="max-width:190px; margin-top: -1px;" src="logo.png">
			</a>

			
			<div class="search-box">
            	<form action = "searchresult.php" method="POST" class = "search-bar" autocomplete = "off">
                		<input type = "text" name = "search" placeholder="Search here..." required/>
                		<button type="submit"><img src = "images/search.png"> </button> 
            	</form>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


				<div class="nav-item dropdown">
					
					<a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown"><?php echo $row_c->name;?></a>
					<div class="dropdown-menu bg-darkblue">
						<a href="view_profile.php" class="text-warning dropdown-item ">View Profile</a>
                        <a href="seller_rating.php" class="text-warning dropdown-item ">My Rating</a>
						<a href="wishlist.php" class="text-warning dropdown-item ?>">Products in my Wishlisht </a>
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

    <nav class="navbar navbar-expand-sm navbar-dark bg-nav animated fadeInDown ">
		<div class="container onsale sold1">

			<a style="color: #ffc107;" class="navbar-brand" href="index.php">
				<img style="max-width:190px; margin-top: -1px;" src="logo.png">
			</a>

			
			<div class="search-box">
            	<form action = "searchresult.php" method="POST" class = "search-bar" autocomplete = "off">
                		<input type = "text" name = "search" placeholder="Search here..." required/>
                		<button type="submit"><img src = "images/search.png"> </button> 
            	</form>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


				<div class="nav-item dropdown">
					
					<a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown"><?php echo $row_c->name;?></a>
					<div class="dropdown-menu bg-darkblue">
						<a href="view_profile.php" class="text-warning dropdown-item ">View Profile</a>
                        <a href="seller_rating.php" class="text-warning dropdown-item ">My Rating</a>
						<a href="wishlist.php" class="text-warning dropdown-item ?>">Products in my Wishlisht </a>
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
    <br><br><br>
    <div class="categories">
      <div class="category active" id="onsale">On Sale</div>
      <div class="category" id="sold1">Sold</div>
    </div>
    <?php
        
        $query1111 = "select * from products where uid = $row_c->uid and status = 'On Sale' ORDER BY pro_id DESC";
        $run_q1111 = $con->query($query1111);
        $showing_products = $run_q1111->num_rows;
    ?>
    <!-- <h4 class="m-3 text-info">Showing <?php echo $showing_products; ?>&nbsp;Products&nbsp;for&nbsp;Sale</h4> -->
    <div class="container mt-5 mb-5" >
        <div class="card-deck mt-5">
            <?php
          
            $query1 = "select * from products where uid = $row_c->uid and status = 'On Sale' ORDER BY pro_id DESC";
            $run_q1 = $con->query($query1);

            if($run_q1->num_rows == 0){?>
                <h4 align="center" style="width:100%;padding: 50px;background:linear-gradient(to right, rgb(242, 112, 156), rgb(255, 148, 114));color:white;"> <?php echo "There is no product to show";?> </h4>
            <?php
            }
            while ($row_q1 = $run_q1->fetch_object()) {
                $query2 = "select * from tbl_purchase where pro_id = $row_q1->pro_id; ";
                $run_q2 = $con->query($query2);
                $bid_num = $run_q2->num_rows;
                if($bid_num > 0)
                {
                    $res_q2 = $run_q2->fetch_object();
                    $buyer_id = $res_q2->buyer_id;
                    $query_user = "select * from user where uid = '$buyer_id'";
                    $run_user = $con->query($query_user);
                    $row_user = $run_user->fetch_object();
                    $name = $row_user->name;
                    // $final_price = ($res_q2)->bid_amount;
                }
                else
                {
                    $name = "No one";
                    $final_price = "Unsold";
                }
                $run_q2 = $con->query($query2);
                ?>
                
                <div class="card mt-5" style="border-radius: 15px; border-color:skyblue;">
                    

                    <div class="card-body <?php if ($row_q1->status == 'Sold') { echo 'sold';} ?>">
                        <div class="card-header mb-3 flex-container">
                            <div class="mr-3 ml-3 mt-1 mb-1">
                                <?php if($row_q1->status == 'Sold') { ?> 
                                    <h5 class="font-weight-light">This Product is&nbsp;<?php echo $row_q1->status; ?> to <?php echo $name ?> </h5> 
                                <?php } 
                                else { ?> 
                                    <h5 class="font-weight-light">This Product is&nbsp;<?php echo $row_q1->status; ?></h5> 
                                <?php } ?>
                                
                            </div>
                            <div class="mr-3 ml-3 mt-1 mb-1">
                                <?php if ($row_q1->status != 'Sold') {  $final_price = $row_q1->price;?>
                                    <a class="btn btn-info" href="?pro_id=<?php echo $row_q1->pro_id; ?>&status=<?php echo $row_q1->status; ?>">
                                        <?php 
                                        if ($row_q1->status == "On Sale") {
                                            echo "Disable this product";
                                        } elseif ($row_q1->status == "Disable") {
                                            echo "Enable this product";
                                        }
                                        ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <?php
                        $query33 = "select * from product_category where category_id = $row_q1->category_id; ";
                        $run_q33 = $con->query($query33);
                        $row_q33 = $run_q33->fetch_object();
                        ?>
                        <h3 class="card-title mt-4">Product&nbsp;Name:&nbsp;<?php echo $row_q1->name; ?></h3>
                        <div class="item"><h5 class="card-text mt-4 mr-5 font-weight-light">Product&nbsp;Description:&nbsp;<?php echo $row_q1->description; ?></h5></div> 
                        <div class="item"><h5 class="card-text mt-4 mr-5 font-weight-light">Product&nbsp;Category:&nbsp;<?php echo $row_q33->name; ?></h5></div>
                         <h1 class="card-text mt-4 mb-3 font-weight-light">Price:&nbsp;&#8377;&nbsp;<?php echo $row_q1->price; ?></h1>
                        <!-- <?php if ($row_q1->status == 'Sold') { ?>
						<h1 class="card-text mt-4 mb-3 font-weight-light">Sold Price:&nbsp;&#8377;&nbsp;<?php echo $final_price; ?></h1>
                        <?php } ?> -->
                        
                        
                    </div><!--End of card body-->
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="container mt-5 mb-5 onsale">
        <div class="card-deck mt-5">
            <?php
            $query1 = "select * from products where uid = $row_c->uid and status = 'On Sale' ORDER BY pro_id DESC";
            $run_q1 = $con->query($query1);
            if($run_q1->num_rows == 0){?>
                <h4 align="center" style="width:100%;padding: 50px;background:linear-gradient(to right, rgb(242, 112, 156), rgb(255, 148, 114));color:white;"> <?php echo "There is no product to show";?> </h4>
            <?php
            }
            while ($row_q1 = $run_q1->fetch_object()) {
                $query2 = "select * from tbl_purchase where pro_id = $row_q1->pro_id; ";
                $run_q2 = $con->query($query2);
                $bid_num = $run_q2->num_rows;
                if($bid_num > 0)
                {
                    $res_q2 = $run_q2->fetch_object();
                    $buyer_id = $res_q2->buyer_id;
                    $query_user = "select * from user where uid = '$buyer_id'";
                    $run_user = $con->query($query_user);
                    $row_user = $run_user->fetch_object();
                    $name = $row_user->name;
                    // $final_price = ($res_q2)->bid_amount;
                }
                else
                {
                    $name = "No one";
                    $final_price = "Unsold";
                }
                $run_q2 = $con->query($query2);
                ?>
                
                <div class="card mt-5" style="border-radius: 15px; border-color:skyblue;">
                    

                    <div class="card-body <?php if ($row_q1->status == 'Sold') { echo 'sold';} ?>">
                        <div class="card-header mb-3 flex-container">
                            <div class="mr-3 ml-3 mt-1 mb-1">
                                <?php if($row_q1->status == 'Sold') { ?> 
                                    <h5 class="font-weight-light">This Product is&nbsp;<?php echo $row_q1->status; ?> to <?php echo $name ?> </h5> 
                                <?php } 
                                else { ?> 
                                    <h5 class="font-weight-light">This Product is&nbsp;<?php echo $row_q1->status; ?></h5> 
                                <?php } ?>
                                
                            </div>
                            <div class="mr-3 ml-3 mt-1 mb-1">
                                <?php if ($row_q1->status != 'Sold') {  $final_price = $row_q1->price;?>
                                    <a class="btn btn-info" href="?pro_id=<?php echo $row_q1->pro_id; ?>&status=<?php echo $row_q1->status; ?>">
                                        <?php 
                                        if ($row_q1->status == "On Sale") {
                                            echo "Disable this product";
                                        } elseif ($row_q1->status == "Disable") {
                                            echo "Enable this product";
                                        }
                                        ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <?php
                        $query33 = "select * from product_category where category_id = $row_q1->category_id; ";
                        $run_q33 = $con->query($query33);
                        $row_q33 = $run_q33->fetch_object();
                        ?>
                        <h3 class="card-title mt-4">Product&nbsp;Name:&nbsp;<?php echo $row_q1->name; ?></h3>
                        <div class="item"><h5 class="card-text mt-4 mr-5 font-weight-light">Product&nbsp;Description:&nbsp;<?php echo $row_q1->description; ?></h5></div> 
                        <div class="item"><h5 class="card-text mt-4 mr-5 font-weight-light">Product&nbsp;Category:&nbsp;<?php echo $row_q33->name; ?></h5></div>
                         <h1 class="card-text mt-4 mb-3 font-weight-light">Price:&nbsp;&#8377;&nbsp;<?php echo $row_q1->price; ?></h1>
                        <!-- <?php if ($row_q1->status == 'Sold') { ?>
						<h1 class="card-text mt-4 mb-3 font-weight-light">Sold Price:&nbsp;&#8377;&nbsp;<?php echo $final_price; ?></h1>
                        <?php } ?> -->
                        
                        
                    </div><!--End of card body-->
                </div>
            <?php
            }
            ?>
        </div>
    </div>


    <div class="container mt-5 mb-5 sold1">
        <div class="card-deck mt-5">
            <?php
            $query1 = "select * from products where uid = $row_c->uid and status = 'Sold' ORDER BY pro_id DESC";
            $run_q1 = $con->query($query1);
            if($run_q1->num_rows == 0){?>
                <h4 align="center" style="width:100%;padding: 50px;background:linear-gradient(to right, rgb(242, 112, 156), rgb(255, 148, 114));color:white;"> <?php echo "There is no product to show";?> </h4>
            <?php
            }
            while ($row_q1 = $run_q1->fetch_object()) {
                $query2 = "select * from tbl_purchase where pro_id = $row_q1->pro_id; ";
                $run_q2 = $con->query($query2);
                $bid_num = $run_q2->num_rows;
                if($bid_num > 0)
                {
                    $res_q2 = $run_q2->fetch_object();
                    $buyer_id = $res_q2->buyer_id;
                    $query_user = "select * from user where uid = '$buyer_id'";
                    $run_user = $con->query($query_user);
                    $row_user = $run_user->fetch_object();
                    $name = $row_user->name;
                    // $final_price = ($res_q2)->bid_amount;
                }
                else
                {
                    $name = "No one";
                    $final_price = "Unsold";
                }
                $run_q2 = $con->query($query2);
                ?>
                
                <div class="card mt-5" style="border-radius: 15px; border-color:skyblue;">
                    

                    <div class="card-body <?php if ($row_q1->status == 'Sold') { echo 'sold';} ?>">
                        <div class="card-header mb-3 flex-container">
                            <div class="mr-3 ml-3 mt-1 mb-1">
                                <?php if($row_q1->status == 'Sold') { ?> 
                                    <h5 class="font-weight-light">This Product is&nbsp;<?php echo $row_q1->status; ?> to <?php echo $name ?> </h5> 
                                <?php } 
                                else { ?> 
                                    <h5 class="font-weight-light">This Product is&nbsp;<?php echo $row_q1->status; ?></h5> 
                                <?php } ?>
                                
                            </div>
                            <div class="mr-3 ml-3 mt-1 mb-1">
                                <?php if ($row_q1->status != 'Sold') {  $final_price = $row_q1->price;?>
                                    <a class="btn btn-info" href="?pro_id=<?php echo $row_q1->pro_id; ?>&status=<?php echo $row_q1->status; ?>">
                                        <?php 
                                        if ($row_q1->status == "On Sale") {
                                            echo "Disable this product";
                                        } elseif ($row_q1->status == "Disable") {
                                            echo "Enable this product";
                                        }
                                        ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <?php
                        $query33 = "select * from product_category where category_id = $row_q1->category_id; ";
                        $run_q33 = $con->query($query33);
                        $row_q33 = $run_q33->fetch_object();
                        ?>
                        <h3 class="card-title mt-4">Product&nbsp;Name:&nbsp;<?php echo $row_q1->name; ?></h3>
                        <div class="item"><h5 class="card-text mt-4 mr-5 font-weight-light">Product&nbsp;Description:&nbsp;<?php echo $row_q1->description; ?></h5></div> 
                        <div class="item"><h5 class="card-text mt-4 mr-5 font-weight-light">Product&nbsp;Category:&nbsp;<?php echo $row_q33->name; ?></h5></div>
                         <h1 class="card-text mt-4 mb-3 font-weight-light">Price:&nbsp;&#8377;&nbsp;<?php echo $row_q1->price; ?></h1>
                        <!-- <?php if ($row_q1->status == 'Sold') { ?>
						<h1 class="card-text mt-4 mb-3 font-weight-light">Sold Price:&nbsp;&#8377;&nbsp;<?php echo $final_price; ?></h1>
                        <?php } ?> -->
                        
                        
                    </div><!--End of card body-->
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <script>
      // Add click event listeners to the categories
      const onsale = document.getElementById("onsale");
      const sold = document.getElementById("sold1");
      
      onsale.addEventListener("click", () => {
        onsale.classList.add("active");
        sold1.classList.remove("active");
        document.querySelectorAll(".container").forEach(container => {
          if (container.classList.contains("onsale")) {
            container.style.display = "flex";
          } else {
            container.style.display = "none";
          }
        });
      });
      
      sold.addEventListener("click", () => {
        sold1.classList.add("active");
        onsale.classList.remove("active");
        document.querySelectorAll(".container").forEach(container => {
          if (container.classList.contains("sold1")) {
            container.style.display = "flex";
          } else {
            container.style.display = "none";
          }
        });
      });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>