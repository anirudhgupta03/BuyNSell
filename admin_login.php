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
<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BuyNSell</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head> -->


<style>

body {
  background-image: linear-gradient(135deg, #a445b2 10%, #fa4299 100%);
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  font-family: "Open Sans", sans-serif;
  color: #333333;
}

.box-form {
  margin: 0 auto;
  width: 80%;
  background: #FFFFFF;
  border-radius: 10px;
  overflow: hidden;
  display: flex;
  flex: 1 1 100%;
  align-items: stretch;
  justify-content: space-between;
  box-shadow: 0 0 20px 6px #fa4299;
}
@media (max-width: 980px) {
  .box-form {
    flex-flow: wrap;
    text-align: center;
    align-content: center;
    align-items: center;
  }
}
.box-form div {
  height: auto;
}
.box-form .left {
  color: #FFFFFF;
  background-size: cover;
  background-repeat: no-repeat;
  background-image: url("https://i.pinimg.com/736x/5d/73/ea/5d73eaabb25e3805de1f8cdea7df4a42--tumblr-backgrounds-iphone-phone-wallpapers-iphone-wallaper-tumblr.jpg");
  overflow: hidden;
}
.box-form .left .overlay {
  padding: 30px;
  width: 100%;
  height: 100%;
  background: #5961f9ad;
  overflow: hidden;
  box-sizing: border-box;
}
.box-form .left .overlay h1 {
  font-size: 10vmax;
  line-height: 1;
  font-weight: 900;
  margin-top: 40px;
  margin-bottom: 20px;
}
.box-form .left .overlay span p {
  margin-top: 30px;
  font-weight: 900;
}
.box-form .left .overlay span a {
  background: #3b5998;
  color: #FFFFFF;
  margin-top: 10px;
  padding: 14px 50px;
  border-radius: 100px;
  display: inline-block;
  box-shadow: 0 3px 6px 1px #042d4657;
}
.box-form .left .overlay span a:last-child {
  background: #1dcaff;
  margin-left: 30px;
}
.box-form .right {
  padding: 40px;
  overflow: hidden;
}
@media (max-width: 980px) {
  .box-form .right {
    width: 100%;
  }
}
.box-form .right h5 {
  font-size: 6vmax;
  line-height: 0;
}
.box-form .right p {
  font-size: 14px;
  color: #B0B3B9;
}
.box-form .right .inputs {
  overflow: hidden;
}
.box-form .right input {
  width: 100%;
  padding: 10px;
  margin-top: 25px;
  font-size: 16px;
  border: none;
  outline: none;
  border-bottom: 2px solid #B0B3B9;
}
.box-form .right .remember-me--forget-password {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.box-form .right .remember-me--forget-password input {
  margin: 0;
  margin-right: 7px;
  width: auto;
}
.box-form .right button {
  float: right;
  color: #fff;
  font-size: 16px;
  padding: 12px 35px;
  border-radius: 50px;
  display: inline-block;
  border: 0;
  outline: 0;
  box-shadow: 0px 4px 20px 0px #49c628a6;
  background-image: linear-gradient(135deg, #70F570 10%, #49C628 100%);
}

label {
  display: block;
  position: relative;
  margin-left: 30px;
}

label::before {
  content: ' \f00c';
  position: absolute;
  font-family: FontAwesome;
  background: transparent;
  border: 3px solid #70F570;
  border-radius: 4px;
  color: transparent;
  left: -30px;
  transition: all 0.2s linear;
}

label:hover::before {
  font-family: FontAwesome;
  content: ' \f00c';
  color: #fff;
  cursor: pointer;
  background: #70F570;
}

label:hover::before .text-checkbox {
  background: #70F570;
}

label span.text-checkbox {
  display: inline-block;
  height: auto;
  position: relative;
  cursor: pointer;
  transition: all 0.2s linear;
}

label input[type="checkbox"] {
  display: none;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="./style.css">

</head>

<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-nav">
        <div class="container">
          <a style="color: #ffc107;" class="navbar-brand" href="index.php">
                <img style="max-width:130px; margin-top: -1px;" src="logo.png">&nbsp;
          </a>
             
        </div>
    </nav>

<!-- partial:index.partial.html -->
<div class="box-form">
	<div class="left">
		<div class="overlay">
		<h1>Welcome Admin!</h1>
		<h2>Explore the features of BuyNSell by signing in.</h2>
		</div>
	</div>
	
	
		<div class="right">
            <h5>Login</h5>
            <p>Not an admin? <a href="home.php"> Go to User Signup/Login page</a> it takes less than a minute</p>
            <form method="post">
                <table border="0" align="left" cellpadding="11" cellspacing="0" width="300">
                    <tr>
                        <td><input class="form-control" type="text" name="uname" required="required" placeholder="username"></td>
                    </tr>
                    <tr>
                        <td><input class="form-control" type="password" id="myInput" name="password" required="required" placeholder="password"></td>
                    </tr>
                    
                    <tr align="center">
                        <td colspan="2" align="center"><input class="btn btn-light" style="background-color:green;" type="submit" name="login" value="Login"></td>
                    </tr>
                </table>
            </form>
	    </div>
	
</div>
<!-- partial -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>


<!-- <body>
	 
    <nav class="navbar navbar-expand-sm navbar-dark bg-nav">
        <div class="container">
          <a style="color: #ffc107;" class="navbar-brand" href="index.php">
                <img style="max-width:130px; margin-top: -1px;" src="logo.png">&nbsp;
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
</body> -->
</html>