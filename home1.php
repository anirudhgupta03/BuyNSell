<?php
session_start();
include 'db.php';
// include('pro_table_check.php');

if (isset($_SESSION['user'])) {
    header("location:user_home.php");
}

//Important
if (isset($_REQUEST['login'])) {
    $email = $_REQUEST['email'];
    $email = strtolower($email);
    $password = $_REQUEST['password'];
    
    $query = "select * from user where email = '$email' and password = '$password'";  //query
    $run_q = $con->query($query);   //will select rows according to query
    $row_login = $run_q->fetch_object();    //will give rows sequence wise
    $num_rows = $run_q->num_rows;       
    
    if ($num_rows == 1) {
        if ($row_login->status == "Disable") {
            $b = 1;
        }
        else {
            if (isset($_REQUEST['rem'])) {
                setcookie('email', $row_login->email, time()+60);       //This sets the cookie to expire 1 min from the time the web page is accessed by the site 
                setcookie('password', $row_login->password, time()+60);
            }
            $_SESSION['user']=$row_login;
            header("location:user_home.php");
        }
    }
}

    

if (isset($_REQUEST['submit'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['pass'];
    $date = date('Y-m-d h:i:s');
    
    $email = strtolower($email);
    $errormsg = "Already existing email, try another!";
    $query5 = "select * from user where email = BINARY '$email'";
    $run_q5 = $con->query($query5);
    $row_login5 = $run_q5->fetch_object();
    $num_rows = $run_q5->num_rows;	
	
    if($num_rows > 0)
	echo "<script type='text/javascript'>alert('$errormsg');</script>";
	else
    {
		$ins = "insert into user (name, email, password, dor) values ('$name', '$email', '$password', '$date');";
		$con->query($ins);                  
		header("location:registered.php");
	}
}

if (isset($_REQUEST['admin_login'])) {
    header("location:admin_login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignUp/Login</title>
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
    background: -webkit-linear-gradient(left, #a445b2, #fa4299) !important;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    z-index: 5;
}

.container_login {
    width: 60vw;
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
    background-color: lightgreen;/*rgb(179, 55, 113);rgb(231, 76, 60);/*/
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



<body  style="background-color:white;">
	 
    <nav class="navbar navbar-expand-sm navbar-dark bg-nav">
        <div class="container">
          <a style="color: #ffc107;" class="navbar-brand" href="index.php">
            <img style="max-width:130px; margin-top: -1px;" src="logo.png">&nbsp;
          </a>
             
        </div>
    </nav>
    

    <div class="container_login">

        <div class="item item-2 p-4" style="border-radius:10px;">
            <h2 class="mb-5" align="center">Sign Up</h2>
            <form method="post">
                <table  align="center" cellspacing="0" cellpadding="11" width="400" >
                    <tr>
                        <th>Name</th>
                        <td><input class="form-control" type="text" name="name" required="required"></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><input name="email" type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" class="form-control" id="email" required="required"></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input class="form-control" type="password" name="pass" required="required"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" class="btn btn-secondary" name="submit" value="Sign Up"></td> 
                    </tr>
                </table>
            </form>
            
        </div>




        <div class="item item-1 p-4" style="border-radius:10px;">
            <h2 class="mb-5" align="center">Login</h2>
            <form method="post">
                <table border="0" align="center" cellpadding="11" cellspacing="0" width="400">
                    <?php
                    if (isset($_REQUEST['login'])) {
                        if($num_rows != 1) {
                            ?>
                            <tr class="bg_danger text-danger" align="center">
                                <td colspan="2" ><?php echo "Entered wrong User Name or Password!";?></td>
                            </tr>
                            <?php
                        }
                    }
                    if (isset($_REQUEST['login'])) {
                        if($num_rows == 1) {
                            if ($b == 1) {
                                ?>
                                <tr class="bg_danger text-danger" align="center">
                                    <td colspan="2">You are blocked!!!&nbsp;&nbsp;<a class="btn btn-danger btn-sm" href="index.php">OK</a></td>
                                </tr>
                                <?php
                            }
                        }
                    }
                    ?>
                    <tr>
                        <th>Email</th>
                        <td><input class="form-control" type="text" name="email" required="required" value="<?php
                         if(isset($_COOKIE['email'])){
                            echo $_COOKIE['email'];
                         }
                        ?>"></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input class="form-control" type="Password" id="myInput" name="password" required="required" value="<?php
                        if(isset($_COOKIE['password'])){
                         echo $_COOKIE['password'];
                        }
                        ?>"></td>
                    </tr>
					  
                    <tr align="center">
                        <td colspan="1">
                            <label><input type="checkbox" onclick="funcnmy()"> Show Password</label>
							<script>
								function funcnmy() {
							  var x = document.getElementById("myInput");
							  if (x.type === "password") {
								x.type = "text";
							  } else {
								x.type = "password";
							  }
							}
							</script>
                        </td>
						<td colspan="2">
                            <label><input type="checkbox" name="rem"> Remember Me</label>
                        </td>
                    </tr>
                    
                    <tr align="center">
                        <td colspan="2" align="center"><input class="btn btn-light" type="submit" name="login" value="Login"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <div class="admin">
        <form>    
            <table align="center">
                <tr align="center">
                    <td align="center"><input class="btn btn-danger" type="submit" name="admin_login" value="Admin Login"></td>
                </tr>
            </table>
        </form>
    </div>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>