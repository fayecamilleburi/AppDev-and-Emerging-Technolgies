<?php 

# Challenge 1: Farenheit to Celsius

// Normal Function
function fahrenheitToCelsius($fahrenheit) {
    $celsius = ($fahrenheit - 32) * 5/9;
    echo $fahrenheit . "°F = " . round($celsius) . "°C";
}

echo fahrenheitToCelsius(68).'<br>';

// Arrow Function
$fahrenheitToCelsius = fn($fahrenheit) => $fahrenheit . "°F = " . ($fahrenheit - 32) * 5/9 . "°C";
echo $fahrenheitToCelsius(68) . '<br>';
