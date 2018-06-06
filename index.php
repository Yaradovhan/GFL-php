<?php

require_once 'config.php';
require_once 'libs/File.php';

$title = "Task3";

$file = new File(FILE);
$newSting = new File(NEWSTR);
$newSymbol = new File(NEWSYM);

$data = [
    "stringFromFile" => '5',
    "symbolByStringFromFile1" => "3",
    "symbolByStringFromFile2" => "9",
    "replaceSymbol1" => "5",
    "replaceSymbol2" => "6",
    "replaceSymbol3" => 'M',
    "replaceString1" => "2",
    "replaceString2" => 'SOME TEXT VALUE '
];

$newStr = $file->replaceString($data['replaceString1'], $data['replaceString2']);
$newSym = $file->replaceSymbol($data['replaceSymbol1'], $data['replaceSymbol2'],$data['replaceSymbol3']);
$string = $file->getStringFromFile($data['stringFromFile']);
$symbol = $file->getSymbolByStringFromFile($data['symbolByStringFromFile1'],$data['symbolByStringFromFile2']);
$file->saveFileWithChange($newStr, NEWSTR);
$file->saveFileWithChange($newSym, NEWSYM);


require_once 'template/index.php';