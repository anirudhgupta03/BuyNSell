<?php 
session_start();
include('db.php');
// include('pro_table_check.php');

if(isset($_SESSION['user'])) {
    $row_c = $_SESSION['user'];
}

if(isset($_REQUEST['pid'])) {
    $pro_id = $_REQUEST['pid'];
    // $uid = $_REQUEST['usid'];
    $cmnd = $_REQUEST['do'];
    echo $cmnd;

    $cmd = json_decode( json_encode($cmnd), true);
    if($cmd == 'rmv') {
        $pro_id = json_decode( json_encode($pro_id), true);
        $usr = json_decode( json_encode($row_c -> uid), true);
        $query39 = "delete from tbl_wishlist where pro_id = $pro_id and uid = $usr";
 	    $con->query($query39);
         header("location:view_product.php");
    }
}
?>

<!doctype html>
<html lang="en">
<?php include 'head.php'; ?>
<style>
/* Cart or Wishlist */
.shopping-cart .cart-header{
    padding: 10px;
}
.shopping-cart .cart-header h4{
    font-size: 18px;
    margin-bottom: 0px;
}
.shopping-cart .cart-item a{
    text-decoration: none;
}
.shopping-cart .cart-item{
    background-color: #fff;
    box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
    padding: 10px 10px;
    margin-top: 10px;
}
.shopping-cart .cart-item .product-name{
    font-size: 16px;
    font-weight: 600;
    width: 100%;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    cursor: pointer;
}
.shopping-cart .cart-item .price{
    font-size: 16px;
    font-weight: 600;
    padding: 4px 2px;
}
.shopping-cart .btn1{
    border: 1px solid;
    margin-right: 3px;
    border-radius: 0px;
    font-size: 10px;
}
.shopping-cart .btn1:hover{
    background-color: #2874f0;
    color: #fff;
}
.shopping-cart .input-quantity{
    border: 1px solid #000;
    margin-right: 3px;
    font-size: 12px;
    width: 40%;
    outline: none;
    text-align: center;
}
/* Cart or Wishlist */
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
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Wishlist</title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <?php include('nav.php') ?>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
    
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Buy</h4>
                                </div>
                            </div>
                        </div>

                        <?php
                            $query15 = "select * from tbl_wishlist ORDER BY pro_id DESC;";
                            $run_q15 = $con->query($query15);
                            // $showing_products = $run_q15->num_rows;
                        ?>
                        <?php
				
				        while ($row_q15 = $run_q15->fetch_object()) {
                            $pro_id = $row_q15->pro_id;
                            ?>
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-6 my-auto">
                                        <?php  
                                            $query6 = "select * from product_images where pro_id = $pro_id LIMIT 1";
                                            $run_q6 = $con->query($query6);
                                            $row_q6 = $run_q6->fetch_object();
                                            $image_name = $row_q6->img_name;
                                            $image_destination = "product_images/".$image_name;

                                            $query66 = "select * from products where pro_id = $pro_id";
                                            $run_q66 = $con->query($query66);
                                            $row_q66 = $run_q66->fetch_object();
                                        ?>
                                        <a href="">
                                            <label class="product-name">
                                                <img src="<?php echo $image_destination; ?>" style="width: 50px; height: 50px" alt="">
                                                <?php echo $row_q66->name;  ?>
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <label class="price"><?php echo $row_q66->price; ?> </label>
                                    </div>
                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove">
                                            <a href="view_product.php?pid=<?php echo $pro_id; ?>&do=<?php echo "rmv"; ?>" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Remove
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove">
                                            <a href="view_product.php?pro_id=<?php echo $pro_id; ?>" class="btn btn-success btn-sm">
                                                Buy
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    <?php
                    }
                    ?>       
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>