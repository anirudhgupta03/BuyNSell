<?php 
session_start();
include('db.php');
// include('pro_table_check.php');


if(isset($_SESSION['admin_login'])) {
    $row_c = $_SESSION['admin_login'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BuyNSell</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>


<style type="text/css">

body {
    /* background-image: url(2256.jpg); */
    background-repeat: no-repeat;
    background-size: cover;
}


.bg_danger {
    background-color: #ffc9ce;
}

.bg-nav {
    background-color: rgb(24, 44, 97) !important;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    z-index: 5;
}

.container_login {
    width: 40vw;
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: flex;
    justify-content: space-around;
}
.container_login_2 {
    width: 40vw;
    position: absolute;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: flex;
    justify-content: space-around;
}

.item {
    flex-grow: 1;
    color: #fff;
}

.item-1 {
    
}

.item-2 {
    background-color: skyblue;
}

.admin {
    position: absolute;
    top: 90%;
    left: 50%;
    transform: translate(-50%, -150%);
}

.button1{
    padding: 30px 129px;
    font-weight: 600;
    border: 1.5px solid var(--green);
    display: inline-block;
    border-radius: 999px;
    color: var(--black);
    width: 400px
}

.button1:hover {
    background-color: var(--green);
    cursor: pointer;
    color: var(--white);
    transition: .2s;
}
.button2{
    padding: 30px 120px;
    font-weight: 600;
    border: 1.5px solid var(--green);
    display: inline-block;
    border-radius: 999px;
    color: var(--black);
    width: 400px
}

.button2:hover {
    background-color: var(--green);
    cursor: pointer;
    color: var(--white);
    transition: .2s;
}
</style>



<body>
	 
    <nav class="navbar navbar-expand-sm navbar-dark bg-nav">
        <div class="container">
          <a style="color: #ffc107;" class="navbar-brand" href="index.php">
                <img style="max-width:130px; margin-top: -1px;" src="buynsell.jpg">&nbsp;
          </a>
          <ul class="navbar-nav">
				<li class="nav-item">
					<!-- <a class="nav-link text-danger" href="logout.php">Logout</a> -->
          <a href = "logout.php">
            <button class="btn btn-success" type="submit">Logout</button>
          </a>
				</li>
			</ul>
        </div>
    </nav>
    

    <div class="container_login">




        <div class="button1">
            <a href = "view_users.php">
            <button class="btn btn-success" type="submit">View All Users</button>
          </a>
        </div>
    </div>

    <div class = "container_login_2">
    <div class="button2">
          <a href = "view_product.php">
            <button class="btn btn-success" type="submit">View All Products</button>
          </a>
        </div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>