<?php

class Day4
{

    private $file;

    function __construct()
    {
        $this->file = file('input.txt', FILE_IGNORE_NEW_LINES);
    }

    function part1()
    {
        $total = 0;

        foreach ($this->file as $line) {
            $line = str_replace(',', '-', $line);

            $sections = explode('-', $line);

            $startElf1 = $sections[0];
            $endElf1 = $sections[1];
            $startElf2 = $sections[2];
            $endElf2 = $sections[3];

            if ($startElf1 >= $startElf2 && $endElf1 <= $endElf2) {
                $total++;
                continue;
            }

            if ($startElf1 <= $startElf2 && $endElf1 >= $endElf2) {
                $total++;
                continue;
            }
        }

        return $total;
    }

    function part2()
    {
        $total = 0;

        foreach ($this->file as $line) {
            $line = str_replace(',', '-', $line);

            $sections = explode('-', $line);

            $rangeSection1 = range($sections[0], $sections[1]);
            $rangeSection2 = range($sections[2], $sections[3]);

            $total += count(array_intersect($rangeSection1, $rangeSection2))
                ?  1 : 0;
        }

        return $total;
    }
}

$day4 = new Day4();

$answerPart1 = $day4->part1();
$answerPart2 = $day4->part2();


echo <<<EOT
<h1>Advent of code - Day 4</h1>
<br/>
<h2>Part 1</h2>
In <strong>{$answerPart1}</strong> assigment pairs one pair fully contained another.
<br/>
<br/>
<h2>Part 2</h2>
In <strong>{$answerPart2}</strong> assignment pairs the ranges overlap.

EOT;
