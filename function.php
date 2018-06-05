<?php

require_once("config.php");

function uploadFile($file)
{
    if (isset($_POST['submit'])) {
        $uploadfile = UPDIR . "/" . basename($file['uploaded_file']['name']);
        if (copy($file['uploaded_file']['tmp_name'], $uploadfile)) {
            chmod($uploadfile, 0777);
            header("Location: index.php?msg=uploadSuccess");
        } else {
            header("Location: index.php?error=errorPermissionDenied");
        }
    }
}

function getFileList($dirpath)
{
    $result = array();
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
}

function deleteFile($name)
{
    if (unlink(UPDIR . "/" . $name)) {

        header("Location: index.php?msg=deleteSuccess");
    } else {
        header("Location: index.php?error=errorPermissionDenied");
    }
}

function sizeFilter($bytes)
{
    $label = array('B', 'KB', 'MB');
    for ($i = 0; $bytes >= 1024 && $i < (count($label) - 1); $bytes /= 1024, $i++);

    return (round($bytes, 2) . " " . $label[$i]);
}


