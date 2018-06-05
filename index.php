<?php

require_once ("config.php");
require_once ("function.php");

$title = "Task1";
$allFiles = getFileList(UPDIR);

if(isset($_POST['submit'])){
    uploadFile($_FILES);
}

if(isset($_GET['delFile'])){
	$file=$_GET['delFile'];
	deleteFile($file);
}

if(isset($_GET['msg']) || !empty($_GET['msg']))
{
	$message = $_GET['msg'];
}

if(isset($_GET['delFile']) && empty($_GET['delFile']))
{
    $delError = DELERROR;
} elseif(isset($_GET['delFile']) && !empty($_GET['delFile'])) {
    $error = UPERROR;
}

if(isset($_GET['error']))
{
    $error = UPERROR;
}

require_once (ROOT_DIR."/template/index.php");

?>
