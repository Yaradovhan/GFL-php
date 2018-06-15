<?php
include ('config.php');
include ('libs/function.php');

try
{
  $obj = new Controller();
}
catch(Exception $e)
{
  echo $e->getMessage();	           
}