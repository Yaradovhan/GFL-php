<?php

require_once 'config.php';
include 'autoload.php';

$names = new names();
$cars = new cars();

$cars->getAll();
//$cars->getFieldsFromTable();
//$cars->id = 666;
//$cars->title = 'demon';
//dd($cars->getFieldsFromTable());
//$cars->save();
//dd($cars->getFieldsFromTable());
//$names->getAll();
//$names->getAll();
//$names->findById(4);
//$names->id = 4;
//$names->name = "yara";

//$names->seve();

//dd($names->tableName());
//dd($tabl = $names->getFieldsFromTable());
//dd($tabl);






/////////////////////////INSERT/////////////////////////
//
//$queryIns = Query::insert("names", ["id", "name"])
//    ->build();
//
////dd($queryIns);
//
//$dataIns = [
//    'id' =>100,
//    'name' => 'user100'
//];

//$pgsql->prepareExecute($queryIns,$dataIns);

//
////////////////////////////////////////////////////////


/////////////////////////SELECT/////////////////////////
///
//$querySel = Query::select('names', ['id','name'])
//    ->distinct()
//    ->where(['id'])
//    ->leftJoin("cars", array("names.id = cars.id"))
//    ->rightJoin("cars", array("names.id = cars.id"))
//    ->naturalJoin("cars")
//    ->crossJoin("cars")
//    ->groupBy(array("column4"))
//    ->orderBy(['name'])
//    ->limit()
//    ->offset()
//    ->build();

//dd($querySel);

//$dataSel = [
//    'id'=>1
//];
/*
если в запросе не присутствует условие в метод prepareExecute второй параметр можем не передавать или передавать пустой массив
второй параметр обязательно должен быть массивом.
*/
//$stmt = $pgsql->prepareExecute($querySel,$dataSel);

//dd($stmt->fetchAll(PDO::FETCH_ASSOC));

//
////////////////////////////////////////////////////////


/////////////////////////DELETE/////////////////////////
///
//$queryDel = Query::delete('names')
//    ->where(['id'])
//    ->build();
//
//$dataDel = [
//    'id' => 100
//];

//dd($queryDel);

//$pgsql->prepareExecute($queryDel, $dataDel);
//
/////////////////////////////////////////////////////////


/////////////////////////UPDATE/////////////////////////
/// ключи в изменяемых ячейках не должны повторяться в параметре WHERE
//$queryUp = Query::update('names',['name'])
//    ->where(['id'])
//    ->build();
//
////dd($queryUp);
//
//$dataUp=[
//    'name'=>'user111',
//    'id'=> 100
//];

//$pgsql->prepareExecute($queryUp, $dataUp);

////////////////////////////////////////////////////////

//include 'src/view/index.php';