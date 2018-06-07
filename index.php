<?php

require_once 'config.php';
require_once 'libs/File.php';

$title = "Task3";

$file = new File(FILE);
$newSting = new File(NEWSTR);
$newSymbol = new File(NEWSYM);

$data = [
    "stringFromFile" => '3',
    "symbolByStringFromFile1" => "2",
    "symbolByStringFromFile2" => "3",
    "replaceSymbol1" => "1",
    "replaceSymbol2" => "1",
    "replaceSymbol3" => 'M',
    "replaceString1" => "56",
    "replaceString2" => 'SOME TEXT VALUE '
];

$newStr = $file->replaceString($data['replaceString1'], $data['replaceString2']);
$newSym = $file->replaceSymbol($data['replaceSymbol1'], $data['replaceSymbol2'],$data['replaceSymbol3']);
$string = $file->getStringFromFile($data['stringFromFile']);
$symbol = $file->getSymbolByStringFromFile($data['symbolByStringFromFile1'],$data['symbolByStringFromFile2']);
$file->saveFileWithChange($newStr, NEWSTR);
$file->saveFileWithChange($newSym, NEWSYM);

dd(preg_split('//', FILE));

require_once 'template/index.php';