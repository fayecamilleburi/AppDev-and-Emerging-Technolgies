<!-- Lab 3: Challenge 3 -->
<!-- By: Faye Camille Buri -->

<?php
$students = [
    ['name' => 'john', 'grades' => [85, 90, 92, 88]],
    ['name' => 'jane', 'grades' => [95, 88, 91, 87]],
    ['name' => 'joe', 'grades' => [75, 82, 79, 88]],
];

foreach($students as $student) {
    $name = $student['name'];
    $grades = $student['grades'];

    $average = array_sum($grades) / count($grades);

    echo "$name's average grade: " . $average . '<br>';
}

?>
