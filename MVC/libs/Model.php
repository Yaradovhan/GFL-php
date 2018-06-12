<?php

class Model
{
    public function __construct()
    {

    }

    public function getArray()
    {
        return array('%TITLE%' => 'Search', '%ERRORS%' => 'Empty field' );
    }

    public function checkForm()
    {
        if(isset($_POST['query']) && (!empty($_POST['query']))){
            return true;
    }
        return false;
    }

    public function sendQuery($in)
    {
        $in = str_replace(' ', '+', $in);
        $url = 'http://www.google.com/search?hl=en&tbo=d&site=&source=hp&q=' . $in . '&oq=' . $in . '';

        $html = file_get_html($url);
        $arrayRes = [];
        $i = 0;
        $linkObjs = $html->find('h3.r a');
        foreach ($linkObjs as $linkObj) {
            $title = trim($linkObj->plaintext);
            $link = trim($linkObj->href);

            if (!preg_match('/^https?/', $link) && preg_match('/q=(.+)&amp;sa=/U', $link, $matches) && preg_match('/^https?/', $matches[1])) {
                $link = $matches[1];
            } else if (!preg_match('/^https?/', $link)) {
                continue;
            }

            $descr = $html->find('span.st', $i);
            $i++;
            array_push($arrayRes, [$title, $link, strval($descr)]);

        }
        return $arrayRes;
    }

}
