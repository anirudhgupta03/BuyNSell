<?php
session_start();
include 'db.php'; 

if (isset($_SESSION['admin_login'])) {
	header("location:admin_home.php");
}


if (isset($_REQUEST['login'])) {
	$uname = $_REQUEST['uname'];
	$password = $_REQUEST['password'];
	$query1 = "select * from admin where username = BINARY '$uname' and password = BINARY '$password'";
	$run_q1 = $con->query($query1);
	$row_login = $run_q1->fetch_object();
	$num_rows = $run_q1->num_rows;
	if ($num_rows == 1) {
		// if (isset($_REQUEST['rem'])) {
		// 	setcookie('username', $row_login->uname, time()+60);
		// 	setcookie('password', $row_login->password, time()+60);
		// }

		$_SESSION['admin_login']=$row_login;
		header("location:admin_home.php");  
	}
}

if (isset($_REQUEST['user_login'])) {
    header("location:index.php");
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
    top: 50%;
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
    background-color: #FAD5A5;/*rgb(179, 55, 113);rgb(231, 76, 60);/*/
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

</style>



<body>
	 
    <nav class="navbar navbar-expand-sm navbar-dark bg-nav">
        <div class="container">
          <a style="color: #ffc107;" class="navbar-brand" href="index.php">
                <img style="max-width:130px; margin-top: -1px;" src="buynsell.jpg">&nbsp;
          </a>
             
        </div>
    </nav>
    

    <div class="container_login">




        <div class="item item-1 p-4">
            <h2 class="mb-5" align="center">Admin Login</h2>
            <form method="post">
                <table border="0" align="center" cellpadding="11" cellspacing="0" width="400">
                    <tr>
                        <th>User Name</th>
                        <td><input class="form-control" type="text" name="uname" required="required"></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input class="form-control" type="password" id="myInput" name="password" required="required"></td>
                    </tr>
                    
                    <tr align="center">
                        <td colspan="2" align="center"><input class="btn btn-light" type="submit" name="login" value="Login"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>