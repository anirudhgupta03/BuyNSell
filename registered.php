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
    background: -webkit-linear-gradient(left, #a445b2, #fa4299) !important;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    z-index: 5;
}

.container_login {
    width: 20vw;
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
    background-color: #AFE1AF;
}

.admin {
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translate(-50%, -150%);
}

p {
  font-size: 25px;
}

</style>

<body>
	 
    <nav class="navbar navbar-expand-sm navbar-dark bg-nav" >
        <div class="container" >
          <a style="color: #ffc107;" class="navbar-brand" href="index.php">
                <img style="max-width:130px; margin-top: -1px;" src="logo.png" >&nbsp;
          </a>
             
        </div>
    </nav>
    

    <div class="container_login">

        <div class="item item-2 p-4">
            <h1 class="mb-5" align="center">Thank You!</h2>

            
            <p class="mb-5" align="center">Your details have been successfully submitted.</p>
            <form method="post" action="index.php">
                <table  align="center" cellspacing="0" cellpadding="5" width="500" >
                    <tr>
                        <td colspan="2" align="center"><input type="submit" class="btn btn-secondary" value = "Close"></td> 
                    </tr>
                </table>
            </form>
            <!-- <form action="nextpage.php" method="POST">
  <input type="submit"/>
</form> -->
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>