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

    // to prevent sql injection
    $email = stripcslashes($email);
    $password = stripcslashes($password);

    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);
    // echo $password;
    $query = "select * from user where email = '$email'";  // query
    $run_q = $con->query($query);   // will select rows according to query
    $row_login = $run_q->fetch_object();    // will give rows sequence wise
    $num_rows = 0;       
    $b = 0;
    
    if($run_q !== false){
      $num_rows = $run_q->num_rows;
    }

    if ($num_rows > 0 && password_verify($password, $row_login->password)) {
        $num_rows = 1;
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
    else{
      $num_rows = 0;
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
        $password = password_hash($password, PASSWORD_DEFAULT);
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
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>User SignUp/Login</title>
      <link rel="icon" type="image/jpg" href="logo/auction.png">
      <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
  background: -webkit-linear-gradient(left, #a445b2, #fa4299);
}
::selection{
  background: #fa4299;
  color: #fff;
}
.wrapper{
  overflow: hidden;
  max-width: 390px;
  background: #fff;
  
  padding: 30px;
  border-radius: 5px;
  box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
}
.wrapper .title-text{
  display: flex;
  width: 200%;
}
.wrapper .title{
  width: 50%;
  font-size: 35px;
  font-weight: 600;
  text-align: center;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.wrapper .slide-controls{
  position: relative;
  display: flex;
  height: 50px;
  width: 100%;
  overflow: hidden;
  margin: 30px 0 10px 0;
  justify-content: space-between;
  border: 1px solid lightgrey;
  border-radius: 5px;
}
.slide-controls .slide{
  height: 100%;
  width: 100%;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  text-align: center;
  line-height: 48px;
  cursor: pointer;
  z-index: 1;
  transition: all 0.6s ease;
}
.slide-controls label.signup{
  color: #000;
}
.slide-controls .slider-tab{
  position: absolute;
  height: 100%;
  width: 50%;
  left: 0;
  z-index: 0;
  border-radius: 5px;
  background: -webkit-linear-gradient(left, #a445b2, #fa4299);
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
input[type="radio"]{
  display: none;
}
#signup:checked ~ .slider-tab{
  left: 50%;
}
#signup:checked ~ label.signup{
  color: #fff;
  cursor: default;
  user-select: none;
}
#signup:checked ~ label.login{
  color: #000;
}
#login:checked ~ label.signup{
  color: #000;
}
#login:checked ~ label.login{
  cursor: default;
  user-select: none;
}
.wrapper .form-container{
  width: 100%;
  overflow: hidden;
}
.form-container .form-inner{
  display: flex;
  width: 200%;
}
.form-container .form-inner form{
  width: 50%;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.form-inner form .field{
  height: 50px;
  width: 100%;
  margin-top: 20px;
}
.form-inner form .field input{
  height: 100%;
  width: 100%;
  outline: none;
  padding-left: 15px;
  border-radius: 5px;
  border: 1px solid lightgrey;
  border-bottom-width: 2px;
  font-size: 17px;
  transition: all 0.3s ease;
}
.form-inner form .field input:focus{
  border-color: #fc83bb;
  /* box-shadow: inset 0 0 3px #fb6aae; */
}
.form-inner form .field input::placeholder{
  color: #999;
  transition: all 0.3s ease;
}
form .field input:focus::placeholder{
  color: #b3b3b3;
}
.form-inner form .pass-link{
  margin-top: 5px;
}
.form-inner form .signup-link{
  text-align: center;
  margin-top: 30px;
}
.form-inner form .pass-link a,
.form-inner form .signup-link a{
  color: #fa4299;
  text-decoration: none;
}
.form-inner form .pass-link a:hover,
.form-inner form .signup-link a:hover{
  text-decoration: underline;
}
form .btn{
  height: 50px;
  width: 100%;
  border-radius: 5px;
  position: relative;
  overflow: hidden;
}
form .btn .btn-layer{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(right, #a445b2, #fa4299, #a445b2, #fa4299);
  border-radius: 5px;
  transition: all 0.4s ease;;
}
form .btn:hover .btn-layer{
  left: 0;
}
form .btn input[type="submit"]{
  height: 100%;
  width: 100%;
  z-index: 1;
  position: relative;
  background: none;
  border: none;
  color: #fff;
  padding-left: 0;
  border-radius: 5px;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
}
    </style>

    
   <body> 
   <a style="color: #ffc107;" class="navbar-brand" href="index.php">
            <img style="max-width:130px; margin-top: -1px;" src="logo.png">&nbsp;
          </a>
       <div class="wrapper" align="center">
         <div class="title-text" >
            <div class="title login">
               Login Form
            </div>
            <div class="title signup">
               Signup Form
            </div>
          </div>

         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form method="post" class="login">
               <?php
                    if (isset($_REQUEST['login'])) {
                        if($num_rows > 1 || $num_rows === 0) {
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
                  <div class="field">
                     <input type="text" placeholder="Email Address" class="form-control" name="email" required="required" value="<?php
                         if(isset($_COOKIE['email'])){
                            echo $_COOKIE['email'];
                         }
                        ?>">
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Password"  class="form-control" id="myInput" name="password" required="required" value="<?php
                        if(isset($_COOKIE['password'])){
                         echo $_COOKIE['password'];
                        }
                        ?>">
                  </div>
                  <div class="pass-link">
                  <input type="checkbox" onclick="funcnmy()"> Show Password</label>
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
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name="login" value="Login">
                  </div>
                  <div class="signup-link">
                     Not a member? <a href="">Signup now</a>
                  </div>
                  <div class="signup-link">
                     Are you an Admin? <a href="admin_login.php">Login Here</a>
                  </div>
               </form>
               <form method="post" class="signup">
                  <div class="field">
                    <input class="form-control" type="text" name="name" required="required" placeholder="Username">
                  </div>
                  <div class="field">
                     <input name="email" type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" class="form-control" id="email" required="required"placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input class="form-control" type="password" name="pass" required="required" id="password"  placeholder="Password" >
                  </div>
                  <div class="field">
                     <input type="password" id="confirm_password" placeholder="Confirm password" required>
                     <script>
                        var password = document.getElementById("password")
                            , confirm_password = document.getElementById("confirm_password");

                            function validatePassword(){
                            if(password.value != confirm_password.value) {
                                confirm_password.setCustomValidity("Passwords Don't Match");
                            } else {
                                confirm_password.setCustomValidity('');
                            }
                            }

                            password.onchange = validatePassword;
                            confirm_password.onkeyup = validatePassword;
                     </script>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" class="btn btn-secondary" name="submit" value="SignUp">
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
   </body>
</html>