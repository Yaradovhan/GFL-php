<?php

require_once 'config.php';
require_once 'libs/File.php';

$title = "Task3";

$file = new File(FILE);
$newSting = new File(NEWSTR);
$newSymbol = new File(NEWSYM);

$data = [
    "stringFromFile" => '8',
    "symbolByStringFromFile1" => "8",
    "symbolByStringFromFile2" => "9",
    "replaceSymbol1" => "2",
    "replaceSymbol2" => "2",
    "replaceSymbol3" => 'X',
    "replaceString1" => "2",
    "replaceString2" => 'SOME TEXT VALUE'
];

$newStr = $file->replaceString($data['replaceString1'], $data['replaceString2'] . PHP_EOL);
$newSym = $file->replaceSymbol($data['replaceSymbol1'], $data['replaceSymbol2'],$data['replaceSymbol3']);

$string = $file->getStringFromFile($data['stringFromFile']);
$symbol = $file->getSymbolByStringFromFile($data['symbolByStringFromFile1'],$data['symbolByStringFromFile2']);

$file->saveFileWithChange($newStr, NEWSTR);
$file->saveFileWithChange($newSym, NEWSYM);

$curFile = $file->readFileByString(FILE);
$newStrFile = $file->readFileByString(NEWSTR);
$newSymFile = $file->readFileByString(NEWSYM);
$readBySymb = $file->readFileBySymbol();


require_once 'template/index.php';