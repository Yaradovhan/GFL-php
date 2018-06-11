<?php

require_once 'config.php';
require_once 'libs/Session.php';
require_once 'libs/Cookie.php';
require_once 'libs/Mysql.php';

$title = "Task5";

$session = new Session();
$cookie = new Cookie();
$dbcon = new Mysql();

$arrayData = [
    'key' => 'name',
    'val' => 'yaroslav',
];

$arraySession = [];
$arrayCookie = [];
$arrayMysql = [];

//////////////////////////////////////////////SESSION//////////////////////////////////////////////

$arraySession[] = [
    "action" => "Save data with KEY - ". $arrayData['key'] ." and VALUE - " . $arrayData['val'],
    "result" => $session->saveData($arrayData['key'], $arrayData['val']),
];

$arraySession[] = [
    "action" => "Get data with KEY - ". $arrayData['key'],
    "result" => $session->getData($arrayData['key']),
];

$arraySession[] = [
    "action" => "Delete data with KEY - ". $arrayData['key'],
    "result" => $session->deleteData($arrayData['key']),
];

$arraySession[] = [
    "action" => "Get data with KEY - " . $arrayData['key'] . " after DELETE",
    "result" => $session->getData($arrayData['key']),
];

//////////////////////////////////////////////COOKIE//////////////////////////////////////////////

$arrayCookie[] = [
    "action" => "Save data with KEY - ". $arrayData['key'] ." and VALUE - " . $arrayData['val'],
    "result" => $cookie->saveData($arrayData['key'], $arrayData['val']),
];

$arrayCookie[] = [
    "action" => "Get data with KEY - ". $arrayData['key'],
    "result" => $cookie->getData($arrayData['key']),
];

$arrayCookie[] = [
    "action" => "Delete data with KEY - ". $arrayData['key'],
    "result" => $cookie->deleteData($arrayData['key']),
];

$arrayCookie[] = [
    "action" => "Get data with KEY - " . $arrayData['key'] . " after DELETE",
    "result" => $cookie->getData($arrayData['key']),
];

//////////////////////////////////////////////MYSQL//////////////////////////////////////////////

$array = [
    'id' => '3',
    'title' => 'Kolya',
];

$arrayMysql[] = [
    "action" => "Save data with KEY - ". $array['id'] ." and VALUE - " . $array['title'],
    "result" => $dbcon->saveData($array['id'], $array),
];

$arrayMysql[] = [
    "action" => "Get data with KEY - ". $array['id'],
    "result" => $dbcon->getData($array['id']),
];

$arrayMysql[] = [
    "action" => "Delete data with KEY - ". $array['id'],
    "result" => $dbcon->deleteData($array['id']),
];

$arrayMysql[] = [
    "action" => "Get data with KEY - " . $array['id'] . " after DELETE",
    "result" => $dbcon->getData($array['id']),
];

/////////////////////////////////////////////////////////////////////////////////////////////////

require_once 'template/index.php';
