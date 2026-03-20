<!-- Lab 3: Challenge 2 -->
<!-- By: Faye Camille Buri -->


<?php
$numbers = [1, 2, 3, 4, 5]; //sum using foreach loop
$numbers2 = [1, 2, 3, 4, 5,6,7,8,9,19];  //sum using for loop

$sum_foreach = 0;
foreach($numbers as $number) {
    $sum_foreach += $number;
}

$sum_for = 0;
for($i = 0; $i < count($numbers2); $i++) {
    $sum_for += $numbers2[$i];
}

echo 'Sum array using foreach loop' . '<br>' . $sum_foreach . '<br>';
echo 'Sum array using for loop' . '<br>' . $sum_for;

?>
