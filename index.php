<?php

require_once 'config.php';
include 'autoload.php';
// require_once 'src/DataBases/SQL.php';
// require_once 'src/DataBases/Pgsql.php';
// require_once 'src/DataBases/Mysql.php';
// require_once 'src/QueryBuilder/Query.php'

// use QueryBuilder\Query;




//list($query, $bind) = Query::insert("names", ["id" => "5", "name" => "Ivan"])
//    ->build();
//
//dd($query);
//dd($bind);

list($query, $bind) = Query::select("Tuser6", ["id", "title"])
   ->distinct()
    ->where(["title" => 'Title3'])
//    ->naturalJoin("table2")
//    ->limit(2)
    ->build();

dd($query);
dd($bind);

$dbh = new Mysql();

dd($dbh);

//$dbh = new PDO(DSN_PG.':host=localhost;dbname='. DATABASE, USER, PASSWORD);
$stmt = $dbh->prepare($query);
$stmt->execute($bind);
dd($stmt->fetchAll(PDO::FETCH_ASSOC));

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
