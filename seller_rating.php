<?php
session_start();
include('db.php');
//submit_rating.php

// $connect = new PDO("mysql:host=localhost;dbname=buynsell", "root", "");

if(!isset($_SESSION['user'])) {
    header('location: user_home.php');
}

if(isset($_SESSION['user'])) {
    $row_c = $_SESSION['user'];
}

// if(!isset($_SESSION['admin_login']) || !isset($_REQUEST['pro_id'])) {
//     header("location:user_home.php");
// }

// if(isset($_REQUEST['pro_id']))
// {
// 	echo $proid = $_REQUEST['pro_id'];
//     $query131 = "select * from products where pro_id = $proid;";
// 	$run_q131 = $con->query($query131);
//     $row_q131 = $run_q131->fetch_object();
// }

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel = "stylesheet" href = "style.css">
    <title><?php echo $row_c->name;?>: Review & Rating</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<style>
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

.flex-container {
	display: flex;
	flex-direction: column;
}
.mt-5, .my-5 {
    margin-top: 5rem!important;
}

</style>
<body>
<?php
if (isset($_SESSION['user'])){
    ?>
    <nav class="navbar navbar-expand-sm navbar-dark bg-nav animated fadeInDown">
            <div class="container">
    
                <a style="color: #ffc107;" class="navbar-brand" href="index.php">
                    <img style="max-width:190px; margin-top: -1px;" src="logo.png">
                </a>
    
                
                <div class="search-box">
                    <form action = "searchresult.php" method="POST" class = "search-bar" autocomplete = "off">
                          <!-- <div class="control-group" style="display:flex;"> -->
                            <input type = "text" name = "search" placeholder="Search here..." required/>
                            <button type="submit"><img src = "images/search.png"> </button> 
                          <!-- </div> -->
                    </form>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
    
                    <div class="nav-item dropdown">
                        
                        <a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown"><?php echo $row_c->name;?></a>
                        <div class="dropdown-menu bg-darkblue">
                            <a href="view_profile.php" class="text-warning dropdown-item ">View Profile</a>
                            <a href="wishlist.php" class="text-warning dropdown-item ?>">Products in my Wishlisht </a>
                            <a href="product.php" class="text-warning dropdown-item ">Products I put for Sale</a>
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
        <?php
    }
    ?>
<br>
<br>
    <div class="container">
    	<h1 class="mt-5 mb-5">Review & Rating</h1>
    	<div style="border-radius: 15px; border-color: blue;" class="card" >
    		<div class="card-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating">0.0</span> / 5</b>
    					</h1>
    					<div class="mb-3">
    						<i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
	    				</div>
    					<h3><span id="total_review">0</span> Review</h3>
    				</div>
    				<div class="col-sm-4">
    					<p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>               
                        </p>
    				</div>
    				
    			</div>
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
    </div>
</body>
</html>



<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#e9ecef;
}
</style>

<script>

$(document).ready(function(){

	var rating_data = 0;

    $('#add_review').click(function(){
        
        $('#review_modal').modal('show');
    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();
        // var prodid = echo $proid;
        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"submit_rating.php",
                method:"POST",
                data:{rating_data:rating_data, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    alert(data);
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data()
    {
        $.ajax({
            url:"submit_seller_rating.php",
            method:"POST",
            data:{action:'load_data', sellerid:<?php echo $row_c->uid;?>},
            dataType:"JSON",
            success:function(data)
            {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    var average_rating = parseFloat(data.average_rating);
                    if (count_star <= average_rating) {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    } else if (count_star - 1 < average_rating) {
                        var remaining_rating = average_rating - (count_star - 1);
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                        $(this).css('clip-path', 'inset(0 ' + (1 - remaining_rating) * 100 + '% 0 0)');
                    }
                });


                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].product_name.charAt(0)+'</h3></div></div>';
                        
                        html += '<div class="col-sm-11">';

                        html += '<div style="border-color: rgb(255, 148, 114); border-radius: 15px;" class="card">';

                        html += '<div style="border-radius: 15px; background: linear-gradient(to right, rgb(242, 112, 156), rgb(255, 148, 114));" class="card-header"><b>'+data.review_data[count].product_name+'</b></div>';
                        html += '<div class="card-header"><b>'+ 'User Name: ' + data.review_data[count].user_name+'</b></div>';
                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div style="border-color:rgb(255, 148, 114);" class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
    }

});

</script>