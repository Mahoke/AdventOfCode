<?php

class Day3
{

    private $CAPITAL_ALPHABET_ASCII_OFFSET = 64;
    private $LOWER_ALPHABET_ASCII_OFFSET = 96;
    private $file;

    function __construct()
    {
        $this->file = file("input.txt");
    }

    function getPriority(string $letter)
    {
        // echo $letter . '<br/>';

        $asciiPosition = ord($letter);

        return ($asciiPosition > $this->LOWER_ALPHABET_ASCII_OFFSET)
            ?   $asciiPosition - $this->LOWER_ALPHABET_ASCII_OFFSET
            :   $asciiPosition + 26 - $this->CAPITAL_ALPHABET_ASCII_OFFSET;
    }

    function part1()
    {
        $sum = 0;

        foreach ($this->file as $line) {
            $spliceAt = strlen($line) / 2;

            $compartment1 = str_split(substr($line, 0, $spliceAt - 1));
            $compartment2 = str_split(substr($line, $spliceAt - 1));

            $charInBothCompartments = array_values(array_unique(array_intersect($compartment1, $compartment2)));

            $commonLetter = array_pop($charInBothCompartments) . '<br/>';

            $sum += $this->getPriority($commonLetter);
        }

        return $sum;
    }

    function part2()
    {
        $sum = 0;
        for ($i = 0; $i < count($this->file); $i += 3) {
            $badge =
                array_values(
                    array_unique(
                        array_intersect(
                            str_split(trim($this->file[$i])),
                            str_split(trim($this->file[$i + 1])),
                            str_split(trim($this->file[$i + 2])),
                        )
                    )
                )[0];

            $sum += $this->getPriority($badge);
        }
        return $sum;
    }
}

$day3 = new Day3();
$answerPart1 = $day3->part1();
$answerPart2 = $day3->part2();
echo <<<EOT

<h1>Advent of code day 3</h1>
The sum of item types that appear in both compartements of all rucksacks is:
<strong>{$answerPart1}</strong>
<br />
The sum of each thee-elf group badge types is:
<strong>{$answerPart2}</strong>

EOT;
