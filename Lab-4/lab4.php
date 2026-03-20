<?php

$number = 1;

while($number <= 100) {
    if($number % 3 == 0 && $number % 5 == 0) {
        echo $number . ' is divisible to 3 and 5 <br>';
    } else if ($number % 3 == 0) {
        echo $number . ' is divisible to 3 <br>';
    } else if ($number % 5 == 0) {
        echo $number . ' is divisible to 5 <br>';
    } else {
        echo $number . '<br>';
    }

    $number++;
}
