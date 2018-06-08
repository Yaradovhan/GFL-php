<?php

require_once("config.php");
require_once("function.php");

$title = "Task1";
$allFiles = getFileList(UPDIR);

if(isArray($allFiles)){
    $errParam = $allFiles;
}

if (isset($_POST['delete'])) {
    $del = deleteFile($_POST['delete']);
    header("Refresh: 2; index.php");
}

if (isset($_POST['submit'])) {
    $upload = uploadFile($_FILES);
    $message = $upload;
    header('Refresh: 2; index.php');
}

require_once(ROOT_DIR . "/template/index.php");