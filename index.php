<?php

require_once 'config.php';
require_once 'libs/FluentPDO/FluentPDO.php';

$mysql = new PDO('mysql:host=localhost','dbuser', 'dbuser');
$fmysql = new FluentPDO($mysql);

//$query = $fmysql->from('users');

$values = array('id' => '2', 'name' => 'John', 'password' => 'Doe', 'email' => 'fd@mail.com');
try {
    $query = $fmysql->insertInto('users')->values($values);
} catch (Exception $e) {
}
// or shortly
$query = $fmysql->insertInto('users', $values);
$query->execute();
