
<?php

session_start();
include('db.php');
// include('pro_table_check.php');

if(isset($_SESSION['user'])) {
    $row_c = $_SESSION['user'];
}

$str = "String to loop through";
$len = strlen($str);

for( $i = 0; $i < $len - 1; $i++ ) {
    $char = substr( $str, $i, 1 );
    if($char !== ' ')
    echo $char;
    // $char contains the current character, so do your processing here
}

// echo $row_c->name;
?>