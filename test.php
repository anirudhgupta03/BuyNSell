
<?php
$str = "String to loop through";
$len = strlen($str);

for( $i = 0; $i < $len - 1; $i++ ) {
    $char = substr( $str, $i, 1 );
    if($char !== ' ')
    echo $char;
    // $char contains the current character, so do your processing here
}
?>