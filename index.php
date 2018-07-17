<?php

require_once 'config.php';
include 'autoload.php';

$mysql = new Mysql();
$pgsql = new Pgsql();

dd($mysql);
dd($pgsql);
list($queryIns, $bindIns) = Query::insert("Tuser6", ["id" => "5", "title" => "Ivan"])
   ->build();
//
// dd($queryIns);
// dd($bindIns);

$querySel = Query::select("Tuser6", ["id", "title"])
   // ->distinct()
    ->where(['title'])
    // ->leftJoin("table3", array("table2.column3 = table3.column3"))
   //  ->rightJoin("table3", array("table2.column3 = table3.column3"))
   // ->naturalJoin("table2")
   // ->crossJoin("table2")
   // ->groupBy(array("column4"))
   // ->orderBy(['id'])
   // ->limit()
   // ->offset()
    ->build();

dd($querySel);
// dd($bindSel);
$a=2;
$n=1;
$title='title2';
$stmt = $mysql->prepare($querySel);
// $stmt->bindParam(':limit', $a, PDO::PARAM_INT);
// $stmt->bindParam(':id', $n, PDO::PARAM_STR);
$stmt->bindParam(':title', $title, PDO::PARAM_STR);
$stmt->execute();
dd($stmt->fetchAll(PDO::FETCH_ASSOC));

//$dbh = new PDO(DSN_PG.':host=localhost;dbname='. DATABASE, USER, PASSWORD);
// $stmt = $dbh->prepare($query);
// $stmt->execute($bind);
// dd($stmt->fetchAll(PDO::FETCH_ASSOC));

//list($delQuery, $delBind) = Query::delete("names")
//    ->where(["id" => "4"])
//    ->build();
//
//dd($delQuery);
//dd($delBind);

//$dbh = new PDO('mysql:host=localhost;dbname=dbuser', 'dbuser', 'dbuser');
//$stmt = $dbh->prepare($delQuery);
//$stmt->execute($delBind);

//list($query, $bind) = Query::update("table", ["column1" => "value1"])
//    ->where(["column1" => "value1"])
//    ->build();
//
//dd($query);
//dd($bind);

//$dbh = new PDO('mysql:host=localhost;dbname=dbuser', 'dbuser', 'dbuser');
//$stmt = $dbh->prepare($query);
//$stmt->execute($bind);
