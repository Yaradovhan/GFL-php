<?php
include ('config.php');
include ('libs/Controller.php');
include ('libs/View.php');
include ('libs/Model.php');
include ('libs/simple_html_dom.php');
try
{
  $obj = new Controller();
}
catch(Exception $e)
{
  echo $e->getMessage();	           
}






