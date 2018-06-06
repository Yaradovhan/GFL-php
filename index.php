<?php

require_once 'libs/Sql.php';
require_once 'libs/Mysql.php';
require_once 'libs/Postgresql.php';

$mysql = new Mysql();
$postgresql = new Postgresql();
$sql = new Sql();
var_dump($sql);
var_dump ($sql->select('MY_TEST'));

var_dump($mysql->setDriver('mysql'));
