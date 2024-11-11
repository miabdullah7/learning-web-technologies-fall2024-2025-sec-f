<?php

$array = array( 1,2,3,4,5,6,7,8,9,10);
$search = 7;
for ($i = 0; $i < count($array); $i++) {
    if ($array[$i] == $search) 
    {
        
        echo "The element is : " . $search ;
        echo "<br>";
        echo "The element is found! Try again with another number" ;
        break;
    }
    
}
?>