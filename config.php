<?php

define("FILE",__DIR__."/file.txt");
define("NEWSTR",__DIR__."/newString.txt");
define("NEWSYM",__DIR__."/newSymbol.txt");
define("SYMBNOTFOUND", "Went beyond the line");
define("STRNOTFOUND", "String not found");

function dd($param)
{
    echo "<pre>";
    var_dump($param);
    echo "</pre>";
}