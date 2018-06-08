<?php
include ('config.php');
include ('libs/Controller.php');
include ('libs/View.php');
include ('libs/Model.php');
try
{
  $obj = new Controller();
  dd($_POST);
}
catch(Exception $e)
{
  echo $e->getMessage();	           
}






