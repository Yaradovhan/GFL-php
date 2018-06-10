<?php

require_once 'libs/Calculate.php';
require_once 'config.php';

$num1 = 12;
$num2 = 0;
$resultArray = [];

$calc = new Calculate();


$calc->setNum($num1,$num2);

$resultArray[] = [
    'operations' => "{$calc->getNum1()} + {$calc->getNum2()} ",
    'result' => $calc->sum(),
];

$resultArray[] = [
    'operations' => "{$calc->getNum1()} - {$calc->getNum2()} ",
    'result' => $calc->sub(),
];

$resultArray[] = [
    'operations' => "{$calc->getNum1()} x {$calc->getNum2()} ",
    'result' => $calc->mult(),
];

$resultArray[] = [
    'operations' => "{$calc->getNum1()} / {$calc->getNum2()} ",
    'result' => $calc->div(),
];

$resultArray[] = [
    'operations' => "Root of {$calc->getNum1()} ",
    'result' => $calc->sqrtNum1(),
];

$resultArray[] = [
    'operations' => "Root of {$calc->getNum2()} ",
    'result' => $calc->sqrtNum2(),
];

$resultArray[] = [
    'operations' => "1/ {$calc->getNum1()} ",
    'result' => $calc->oneDivBy($num1),
];

$resultArray[] = [
    'operations' => "1/ {$calc->getNum2()} ",
    'result' => $calc->oneDivBy($num2),
];

require_once 'template/index.php';

