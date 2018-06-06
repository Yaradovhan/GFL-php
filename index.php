<?php

require_once 'libs/Calculate.php';

$num1 = 12;
$num2 = 5;
$resultArray = [];


$calc = new Calculate();
$calc->setNum($num1,$num2);
$calc->sum();
$resultArray[] = $calc->getResult();
$calc->sub();
$resultArray[] = $calc->getResult();
$calc->sqrt();
$resultArray[] = $calc->getResult();
    print_r($resultArray);
//echo $calc->getResult();
