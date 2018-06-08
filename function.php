<?php

require_once("config.php");

function dd($param)
{
    echo "<pre>";
    var_dump($param);
    echo "</pre>";
}

function uploadFile($file)
{
    $uploadfile = UPDIR . "/" . basename($file['uploaded_file']['name']);
    if (copy($file['uploaded_file']['tmp_name'], $uploadfile)) {
        chmod($uploadfile, 0777);
        return UPSUCCESS;
    }
    return UPERROR;
}

function getFileList($dirpath)
{
    $result = [];
    if (isExecutableDirOrFile() && isReadableDirOrFile() && isWritableDirOrFile()) {
        $cdir = scandir($dirpath);
        $i = 0;
        $j = 1;
        foreach ($cdir as $value) {
            if (!in_array($value, array(".", ".."))
                && !is_dir($dirpath . DIRECTORY_SEPARATOR . $value)) {

                $result[$i]['N'] = $j;
                $result[$i]['name'] = $value;
                $result[$i]['size'] = sizeFilter(filesize($dirpath . DIRECTORY_SEPARATOR . $value));
                $j++;
                $i++;
            }
        }
        return $result;
    } else {
        return PERDEN;
    }

}

function deleteFile($name)
{
    if (unlink(UPDIR . "/" . $name)) {
        return DELSUCCESS;
    }
    return DELERROR;
}

function sizeFilter($bytes)
{
    $mod = 1024;
    $units = explode(' ', 'B KB MB GB TB PB');
    for ($i = 0; $bytes > $mod; ++$i) {
        $bytes /= $mod;
    }
    return round($bytes, 2) . ' ' . $units[$i];
}

function isExecutableDirOrFile($file = null)
{
    return is_executable(UPDIR . "/" . $file);
}

function isReadableDirOrFile($file = null)
{
    return is_readable(UPDIR . "/" . $file);
}

function isWritableDirOrFile($file = null)
{
    return is_writable(UPDIR . "/" . $file);
}

function isArray($param)
{
    if(is_array($param)){
        return false;
    } else {
        return true;
    }
}