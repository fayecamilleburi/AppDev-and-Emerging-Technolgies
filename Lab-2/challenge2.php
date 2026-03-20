<!-- Lab 2: Challenge 2 -->
<!-- By: Faye Camille Buri -->

<?php
echo '<h3>Colors Array</h3>';

// Given array color value
$colors = ['red', 'blue', 'green', 'yellow']; // don't make any changes on this to do the challenge!

sort($colors);
array_push($colors, 'purple', 'orange');
array_unshift($colors, 'Red Apple');
$colors[2] = 'Green mango';

print_r($colors);
?>
