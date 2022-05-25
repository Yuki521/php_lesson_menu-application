<?php

use Yuki\lesson2\Calculate;

require __DIR__ . '/vendor/autoload.php';

####### Q1 #######

//echo match ($argv[1]) {
//    '+' => $argv[2] + $argv[3] . PHP_EOL,
//    '-' => $argv[2] - $argv[3] . PHP_EOL,
//    'm' => $argv[2] * $argv[3] . PHP_EOL,
//    '/' => $argv[2] / $argv[3] . PHP_EOL,
//    default => '正しい符号を入力してください。' . PHP_EOL,
//};

####### Q2 #######

//$calculate = new Calculate($argv[1]);
//$answer = $calculate->calc($argv[2],$argv[3]);
//
//echo $answer. PHP_EOL;

####### Q3 #######

//$calculate = new Calculate($argv[1]);
//$answer = $calculate->calc($argv[2],$argv[3]);
//
//echo $answer. PHP_EOL;

####### Q4 #######

echo 'Welcome to Calculation.' . PHP_EOL;

while (true) {
    $formula = trim(fgets(STDIN));

    if ($formula == 'quit') {
        echo 'Goody bye.' . PHP_EOL;
        return false;
    }

    $n = explode(' ', $formula);
    $calculate = new Calculate($n[0]);
    $answer = $calculate->calc($n[1], $n[2]);

    echo $answer . PHP_EOL;
}