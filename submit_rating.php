<?php
session_start();
//submit_rating.php

$connect = new PDO("mysql:host=localhost;dbname=buynsell", "root", "");

if(isset($_SESSION['user'])) {
    $row_c = $_SESSION['user'];
}

// if(isset($_REQUEST['pid']))
// {
// 	$proid = $_REQUEST['pid'];
// }

if(isset($_POST["rating_data"]))
{
	$proid = $_POST["proid"];
	$data = array(
		':user_rating'		=>	$_POST["rating_data"],
		':user_review'		=>	$_POST["user_review"],
		':uid'				=>  $_POST["uid"],
		':pro_id'			=>  $_POST["proid"],
		':datetime'			=>	time()
	);

		$query = "
		INSERT INTO review_table 
		(user_rating, user_review, uid, pro_id, datetime) 
		VALUES (:user_rating, :user_review, :uid, :pro_id, :datetime)
		";
	
		$statement = $connect->prepare($query);
	
		$statement->execute($data);
	
		echo "Your Review & Rating Successfully Submitted";
		
}

if(isset($_POST["action"]))
{
	$proid = $_POST["proid"];
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "
	SELECT * FROM review_table INNER JOIN user ON review_table.uid = user.uid where pro_id = $proid;
	ORDER BY review_id DESC
	";

	$result = $connect->query($query, PDO::FETCH_ASSOC);

	foreach($result as $row)
	{
		$review_content[] = array(
			'user_name'		=>	$row["name"],
			'user_review'	=>	$row["user_review"],
			'rating'		=>	$row["user_rating"],
			'datetime'		=>	date('l jS, F Y h:i:s A', $row["datetime"])
		);

		if($row["user_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["user_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["user_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["user_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["user_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}
// header("location:user_home.php");
?>