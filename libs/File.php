<?php

class File
{
    public $fp;
    public $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function getArray()
    {
        return file($this->file);
    }

    public function readFileByString($file)
    {
        $text = file_get_contents($file);
        $text = nl2br($text);

        return $text;
    }

    public function readFileBySymbol()
    {

        $arr = $this->getArray();
        foreach ($arr as $str)
        {
            $result[] = chunk_split($str, 1);
        }
        return implode($result);
    }

    public function getStringFromFile($int)
    {
        if ($int < count($this->getArray())) {
            return $this->getArray()[$int];
        } else {
            return STRNOTFOUND;
        }

    }

    public function getSymbolByStringFromFile($int1, $int2)
    {
        if (($string = $this->getStringFromFile($int1)) == STRNOTFOUND) {
            return STRNOTFOUND;
        } elseif ($int2 < strlen($string)) {
            return $string[$int2];
        } else {
            return SYMBNOTFOUND;
        }
    }

    public function replaceString($int, $newStr)
    {
        if ($int < count($this->getArray())) {
            $string = $this->getStringFromFile($int);
            $new = str_replace($string, $newStr, $this->getArray());
            return $this->saveFileWithChange($new, NEWSTR);
        } else {
            return $this->saveFileWithChange(STRNOTFOUND, NEWSTR);
        }
    }

    public function replaceSymbol($int1, $int2, $val)
    {
        if (($string = $this->getStringFromFile($int1)) == STRNOTFOUND) {
            return STRNOTFOUND;
        } elseif ($int2 < strlen($string)) {
            $string[$int2] = $val;
            $newArrSymb = $this->replaceString($int1, $string);
            return $newArrSymb;
        } else {
            return SYMBNOTFOUND;
        }
    }

    public function saveFileWithChange($array, $fileName)
    {
        $fh = fopen($fileName, 'w');
        if (is_array($array)) {
            foreach ($array as $str) {
                fwrite($fh, $str);
            }
        } else {
            fwrite($fh, $array);
        }
        fclose($fh);
        return file_get_contents($fileName);
    }
}