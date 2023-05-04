<?php
session_start();
include 'db.php'; 

$err_login = false;
// $form_view = true;
if (isset($_SESSION['admin_login'])) {
	header("location:admin_home.php");
}

if (isset($_SESSION['user'])) {
	header("location:user_home.php");
}

if (isset($_REQUEST['login'])) {
	$uname = $_REQUEST['uname'];
	$password = $_REQUEST['password'];

  // $password = password_hash($password, PASSWORD_DEFAULT);
  // to prevent sql injection
  $uname = stripcslashes($uname);
  $password = stripcslashes($password);
  
  $uname = mysqli_real_escape_string($con, $uname);
  $password = mysqli_real_escape_string($con, $password);

	$query1 = "select * from admin where username = BINARY '$uname'";
	$run_q1 = $con->query($query1);
	$row_login = $run_q1->fetch_object();
  $num_rows = 0;
  if($run_q1 !== false){
	  $num_rows = $run_q1->num_rows;
  }

	if ($num_rows > 0 && password_verify($password, $row_login->password)) {
		// $err_login = false;
    $num_rows = 1;
		$_SESSION['admin_login']=$row_login;
		header("location:admin_home.php");  
	}
  else{
    $err_login = true;
    $num_rows = 0;
  }
}

if (isset($_REQUEST['user_login'])) {
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html>
        <head>
          
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Admin Panel</title>
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel = "stylesheet" href = "style.css">
            
            <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />  <!-- this icon shows in browser toolbar -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <style>

              .bg-nav {
                  background: -webkit-linear-gradient(left, #a445b2, #fa4299); !important;
                  position: fixed;
                  top: 0;
                  left: 0;
                  width: 100vw;
                  z-index: 5;
              }
                h1 {
                    text-align: center;
                    font-family: sans-serif;
                }

                #form-cont {
                    position: fixed;
                    top: 0;
                    left: -18px;
                    width: 100%;
                    height: 100%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                #form {
                    width: 500px;
                    padding-top: 40px;
    padding-right: 40px;
    padding-bottom: 40px;
    padding-left: 40px;
                    border: 1px solid #0002;
                }
                #form input {
                    display: block;
                    width: 100%;
                    margin-top: 20px;
                    padding: 10px;
                    border: 1px solid #0002;
                }
                ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: black;
  opacity: 0.5; /* Firefox */
}
            </style>
            <?php if ($err_login) echo '<script>alert("Invalid Credentials!")</script>'; ?>
        </head>
        <body>
          <nav class="navbar navbar-expand-sm navbar-dark bg-nav animated fadeInDown">
		<div class="container">

			<a style="color: #ffc107;" class="navbar-brand" href="index.php">
				<img style="max-width:190px; margin-top: -1px;" src="logo.png">
			</a>
    </div>   
	</nav>

            <div id="form-cont">
                <form id="form" method="POST">
                    <h1>Admin Panel</h1>
                    <input type="text" name="uname" placeholder="Username" required />
                    <input type="password" name="password" placeholder="Password" required />
                    <input type="submit" name = "login" value="Login" />
                </form>
            </div>
        </body>
    </html>
