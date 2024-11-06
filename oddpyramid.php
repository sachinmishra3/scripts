<?php
$n = 1; /*Initializing starting number*/

$lim = $_GET["upto"]!="" ? $_GET["upto"]: "";
$arr = array();
for ($i = 1; $i <= $lim; $i++)
{
    for ($j = 1; $j <= $i; $j++ )
    {
        if($j % 2!=0){
            if(!in_array($j, $arr)){
                echo $j." ";
            }
            $arr[]= $j;
            $j += 1;

        }
    }
} 
echo "<br/>----------<br/>";

$rows = 4;
/*for ($i = 1; $i <= $rows; $i++) {
    // Print leading spaces
    for ($k = $rows - $i; $k >= 1; $k--) {
        // echo "<br />";
    }
    // Print odd numbers
    for ($j = 1; $j <= $i; $j++) {
        echo $n . " ";
        $n += 2;
    }
    echo "<br />";
}*/