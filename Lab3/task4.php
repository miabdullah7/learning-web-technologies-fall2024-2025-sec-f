<?php
$number1 = 7;
$number2 = 10;
$number3 = 9;

echo "The 1st number is " . $number1 . "<br>";
echo "The 2nd number is " . $number2 . "<br>";
echo "The 3rd number is " . $number3 . "<br> <br>";

if ($number1 > $number2 && $number1 > $number3) {
    echo "The largest number is: " . $number1;
} 
elseif ($number2 > $number1 && $number2 > $number3) {
    echo "The largest number is: " . $number2;
} 

else {
    echo "The largest number is: " . $number3;
}
?>