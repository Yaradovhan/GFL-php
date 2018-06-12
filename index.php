<?php
require_once 'config.php';
require_once 'libs/HtmlHelper.php';

$array = [
			'a'=>'10',
			'b'=>'20',
			'c'=>'30',
			'd'=>'40',
];

$arrayNames = [
			'name1'=>'Vanya',
			'name2'=>'Vasya',
			'name3'=>'Petya',
			'name4'=>'Vova',
];

$arrayTable = [
	['first'=>'tom', 'last'=>'smith', 'email'=>'tom@example.org', 'company'=>'example ltd'],
    ['first'=>'hugh', 'last'=>'blogs', 'email'=>'hugh@example.org', 'company'=>'example ltd'],
    ['first'=>'steph', 'last'=>'brown', 'email'=>'steph@example.org', 'company'=>'example ltd'],
];


$selectMulti = HtmlHelper :: selectMulti('number',$array, 'class="form-control"');

$table = HtmlHelper :: table($arrayTable, 'class="table table-bordered"');
 
$ulol = HtmlHelper :: ulol($arrayNames);
  
$radioButGroup = HtmlHelper :: radioButGroup('names',$arrayNames);

$checkbox = HtmlHelper :: checkbox($arrayNames);

require_once 'template/index.php';