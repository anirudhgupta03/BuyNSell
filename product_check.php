<?php
	date_default_timezone_set("Asia/Kolkata");
    $user = "root";
    $pass = "";
    $db = "buynsell";
	
	$db_connect = mysqli_connect("localhost", $user, $pass, $db) or die("no database found");
    
    $qry = "SELECT * FROM products";
    $res = mysqli_query($db_connect, $qry);
    while($row = mysqli_fetch_assoc($res)){
        $product_id = $row['pro_id'];

        $currentstatus = $row['status'];
        
        if($currentstatus != 'Disable')
        {
            $qry = "UPDATE products SET Status = 'On Sale' WHERE pro_id = '$product_id'";
            mysqli_query($db_connect, $qry);
        }
        else if($currentstatus == 'Disable')
        {
            
        }
        else if($currentstatus != 'Sold')   // edit krna hai yahan
        {
            $qry = "UPDATE products SET Status = 'Sold' WHERE pro_id = '$product_id'";
            mysqli_query($db_connect, $qry);

            $query = "select * from tbl_bid where pro_id = '$product_id' ORDER BY bid_amount DESC";
            $run = $db_connect->query($query);
            $num = $run->num_rows;
            if($num > 0)
            {
                $res_q = $run->fetch_object();
                $bid_id = ($res_q)->bid_id;
                $buyer_id = ($res_q)->uid;
                $purchase_qry = "INSERT into tbl_purchase (bid_id, buyer_id) values ($bid_id, $buyer_id) ;";
         
                mysqli_query($db_connect, $purchase_qry);
            }
            
        }
    }
?>