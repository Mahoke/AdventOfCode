<?php

class Day2
{

    private $WIN = 6;
    private $DRAW = 3;
    private $LOSE = 0;

    private $ROCK = 1;
    private $PAPER = 2;
    private $SCISSOR = 3;

    private $file;
    private $strategyPartOne;
    private $strategyPartTwo;

    function __construct()
    {
        $this->file = file("input.txt");

        $this->strategyPartOne = [
            'A' => [
                'X' => $this->ROCK + $this->DRAW,
                'Y' => $this->PAPER + $this->WIN,
                'Z' => $this->SCISSOR + $this->LOSE,
            ],
            'B' => [
                'X' => $this->ROCK + $this->LOSE,
                'Y' => $this->PAPER + $this->DRAW,
                'Z' => $this->SCISSOR + $this->WIN,
            ],
            'C' => [
                'X' => $this->ROCK + $this->WIN,
                'Y' => $this->PAPER + $this->LOSE,
                'Z' => $this->SCISSOR + $this->DRAW,
            ],
        ];

        $this->strategyPartTwo = [
            'A' => [
                'X' => $this->SCISSOR + $this->LOSE,
                'Y' => $this->ROCK + $this->DRAW,
                'Z' => $this->PAPER + $this->WIN,
            ],
            'B' => [
                'X' => $this->ROCK + $this->LOSE,
                'Y' => $this->PAPER + $this->DRAW,
                'Z' => $this->SCISSOR + $this->WIN,
            ],
            'C' => [
                'X' => $this->PAPER + $this->LOSE,
                'Y' => $this->SCISSOR + $this->DRAW,
                'Z' => $this->ROCK + $this->WIN,
            ],
        ];
    }

    function part1()
    {
        $total = 0;

        foreach ($this->file as $line) {
            $round = explode(' ', trim($line));
            $total += $this->strategyPartOne[$round[0]][$round[1]];
        }

        return $total;
    }
    function part2()
    {
        $total = 0;

        foreach ($this->file as $line) {
            $round = explode(' ', trim($line));
            $total += $this->strategyPartTwo[$round[0]][$round[1]];
        }

        return $total;
    }
}

$day2 = new Day2();

$answerPart1 = $day2->part1();

$answerPart2 = $day2->part2();

echo <<<EOT
<strong>Part 1</strong>
<br/>
The total score if everything goes exactly according to the strategy guide: {$answerPart1}
<br/>
The score if everything goes exactly according to the elf's strategy guide secret: {$answerPart2}
EOT;
