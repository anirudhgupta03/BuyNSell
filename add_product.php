<?php 
session_start();
include('db.php');
// include('pro_table_check.php');

if(isset($_SESSION['user'])) {
    $row_c = $_SESSION['user'];
}

$home = false;
$view = false;
$bids = false;
$products = false;

if (isset($_REQUEST['insert_product'])) {
	$name = $_REQUEST['name'];
	$description = $_REQUEST['desc'];
	$category = $_REQUEST['category'];
	$price = $_REQUEST['price'];

	$sound = " ";
    $words = explode(" ", $name);

    foreach($words as $word) {
      $sound.=metaphone($word)." ";
    }

    $words1 = explode(" ", $description);
    
    foreach ($words1 as $word) {
      $sound.=metaphone($word)." ";
    }


	$sound.=$price." ";
	$sound.=metaphone(strtolower($name))." ";
	$sound.=metaphone(strtolower($description))." ";

	$query1 = "insert into products (name, price, description, category_id, uid, indexing) values ('$name', '$price', '$description', '$category', '$row_c->uid', '$sound')";

	$file = $_FILES['img'];
	print_r($file);

	$true = false;


	for ($i=0; $i < count($_FILES['img']['name']); $i++) { 

		$fileName = $_FILES['img']['name'][$i];
		$fileTmpName = $_FILES['img']['tmp_name'][$i];
		$fileSize = $_FILES['img']['size'][$i];
		$fileError = $_FILES['img']['error'][$i];
		$fileType = $_FILES['img']['type'][$i];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array('jpg', 'jpeg', 'png','jfif');

		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 6000000) {

					$true = true;

					/*
						VERIFIES ALL THE NECESSARY CONDITIONS FOR UPLOADING THE FILES
					*/

				} else {
					$true = false;
					$error_upload_size_message = $fileName.", this file is too big, file size should be less then 6 MB";
					echo "<script type='text/javascript'>alert('$error_upload_size_message');</script>";
				}
			} else {
				$true = false;
				$error_upload_message = "There was an error uploading your file ".$fileName;
				echo "<script type='text/javascript'>alert('$error_upload_message');</script>";
			}
		} else {
			$true = false;
			$error_upload_type_message = "For file ".$fileName.", You cannot upload file of this type (.".$fileActualExt.")" ;
			echo "<script type='text/javascript'>alert('$error_upload_type_message');</script>";
		}
	}



	if ($true) {
		$con->query($query1);


		for ($i=0; $i < count($_FILES['img']['name']); $i++) { 

			$fileName = $_FILES['img']['name'][$i];
			$fileTmpName = $_FILES['img']['tmp_name'][$i];
			$fileSize = $_FILES['img']['size'][$i];
			$fileError = $_FILES['img']['error'][$i];
			$fileType = $_FILES['img']['type'][$i];

			$fileExt = explode('.', $fileName);	//File Extension
			$fileActualExt = strtolower(end($fileExt));	
			$fileNameNew = uniqid('', true).".".$fileActualExt;
			$fileDestination = "product_images/".$fileNameNew;
			
			$query2 = "select * from products ORDER BY pro_id DESC LIMIT 1";
			$run_2 = $con->query($query2);
			$row_2 = $run_2->fetch_object();
			$pro_id = $row_2->pro_id;
			
			$query3 = "insert into product_images (img_name, pro_id) values ('$fileNameNew', $pro_id);";
			$con->query($query3);
			move_uploaded_file($fileTmpName, $fileDestination);
			header("location:user_home.php");
		}

	}
	// }
}

?>


<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<style>
body {
	/* background-image: url(2257.jpg); */
	/* background-color: #a29bfe; */
	position: relative;
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
    background: -webkit-linear-gradient(left, #a445b2, #fa4299) !important;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    z-index: 5;
}

.bg-darkblue {
    background-color: rgb(24, 44, 97) !important;
}

.container {
	/* position: absolute; */
    /* top: 500%; */
	display: flex;
	justify-content: center;
}

.item {
	position: absolute;
    top: 175%;
	padding: 25px;
	background: -webkit-linear-gradient(left, #a445b2, #fa4299);
	border-radius: 5px;
	color: #fff;
}

table {
	
}
</style>
<body>
 
	<?php include 'nav.php'; ?>

<br>
<br>
	<form method="post" enctype="multipart/form-data">
		<div class="container mt-5 animated fadeIn"> 
			<div class="item">
				<table border="0" cellspacing="5" cellpadding="3">
					<tr>
						<th>Name</th>
						<td><input type="text" name="name" required="required"></td>
					</tr>
					<tr>
						<th>Description</th>
						<td><textarea name="desc" cols="30" rows="5" required="required"></textarea></td>
					</tr>
                    <tr>
					<th>Product Category</th>
						<!-- <td><input type="datetime-local" id="starttime" name="starttime" required="required"></td> -->
                        <td>
                            <select name="category">
                                <option value="">-select-</option>
                                <?php 
                                $sel_c = "select * from product_category";
                                $res_c = $con->query($sel_c);
                                while ($row_c = $res_c->fetch_object()) {
                                    ?>
                                    <option value="<?php echo $row_c->category_id; ?>"><?php echo $row_c->name; ?></option> 
                                    <?php                                 
                                }
                                ?>
                            </select>
                        </td>
					</tr>
					<tr>
						<th>
							Put images for your product
						</th>
						<td>
							<input type="file" name="img[]" required="required" multiple="multiple">
						</td>
					</tr>
					<tr>
						<th>Selling Price</th>
						<td><input type="number" name="price" required="required"></td>
					</tr>
					
					<!-- <th>End time of bid</th>
						<td><input type="datetime-local" id="endtime" name="endtime" required="required"></td>
					</tr> -->
					<tr align="center">
						<td colspan="2"><input class="btn btn-secondary" type="submit" name="insert_product" value="OK"></td>
					</tr>
				</table>
			</div>
		</div>
	</form>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>