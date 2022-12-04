<?php
$file = file('input.txt');

$sum = 0;

$caloriesGrouped = [];
$sumCurrentGroup = 0;

foreach ($file as $line) {
    if ($line == PHP_EOL) {
        $caloriesGrouped[] = $sum;
        $sum = 0;
        continue;
    }

    $sum += $line;
}

rsort($caloriesGrouped);

$mostCalories = $caloriesGrouped[0];
$sumOfTop3 = array_sum(array_splice($caloriesGrouped, 0, 3));

echo <<<EOT
<h1>Advent of code day 1.</h1>

<p>The most calories is: 
    <strong>
        <i>
           $mostCalories 
        </i>
    </strong>
</p>

<p>The total of the top 3 calories is: 
    <strong>
        <i>
            $sumOfTop3;
        </i>
    </strong>
</p>


EOT;
