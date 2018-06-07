<?php
require_once 'config.php';
require_once 'libs/Session.php';
require_once 'libs/Cookie.php';
require_once 'libs/Mysql.php';

//$ses = new Session();
//$ses->saveData('iduser',$_COOKIE['PHPSESSID']);
//$get = $ses->getData('iduser');
//$del = $ses->deleteData('if');
//var_dump($ses);
//var_dump($del)
//dd($_SESSION);

//$coo = new Cookie();
//$coo->saveData("gsdagsg","sdjkoghskj");
//$coo->deleteData('gsdagsg');
//dd($_COOKIE);

$con = new Mysql();
$con->conn();
dd($con);
require_once 'template/index.php';

?>
