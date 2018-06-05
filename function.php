<?php

require_once("config.php");

if (isset($_POST['submit'])) {
    $uploadfile = UPDIR . "/" . basename($_FILES['uploaded_file']['name']);
    if (copy($_FILES['uploaded_file']['tmp_name'], $uploadfile)) {
        header("Location: index.php?msg=uploadSuccess");
    } else {
        $upError = UPERROR;
        header("Location: index.php?error=errorPermissionDenied");
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
            $result[$i]['size'] = number_format(filesize($dirpath . DIRECTORY_SEPARATOR . $value) / 1024, 2);
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
