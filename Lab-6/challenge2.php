<?php
# Challenge 2: Print Names In Uppercase
function printNamesToUpperCase($names) {
    foreach ($names as $name) {
        echo strtoupper($name) . '<br>';
    }
}

$names = ['Alice', 'Bob', 'Charlie', 'David'];
printNamesToUpperCase($names);

