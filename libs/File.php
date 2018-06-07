<?php

class File
{
    public $fp;
    public $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function __destruct()
    {

    }

    public function getArray()
    {
        return file($this->file);
    }

//    public function getSymbol()
//    {
//        return ;
//    }

    public function readFileByString($file)
    {
        $text = file_get_contents($file);
        $text = nl2br($text);

        return $text;
    }

    public function readFileBySymbol()
    {

    }

    public function getStringFromFile($int)
    {
        if ($int < count($this->getArray())) {
            return $this->getArray()[$int];
        }
        return STRNOTFOUND;

    }

    public function getSymbolByStringFromFile($int1, $int2)
    {
        $string = $this->getStringFromFile($int1);
        if ($int2 < iconv_strlen($string)) {
            return $string[$int2];
        }
        return SYMBNOTFOUND;
    }

    public function replaceString($int, $newStr)
    {
        $string = $this->getStringFromFile($int);
        $new = str_replace($string, $newStr, $this->getArray());

        return $new;
    }

    public function replaceSymbol($str, $symb, $val)
    {
        $string = $this->getStringFromFile($str);
        if ($symb < iconv_strlen($string)) {
            $string[$symb] = $val;
            $newArrSymb = $this->replaceString($str, $string);
            return $newArrSymb;
        }
        return SYMBNOTFOUND;

    }

    public function saveFileWithChange($array, $fileName)
    {
        $fh = fopen($fileName, 'w');
        foreach ($array as $str) {
            fwrite($fh, "$str");
        }
        fclose($fh);

        return true;
    }
}