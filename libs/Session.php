<?php
require_once 'iWorkData.php';

class Session implements iWorkData
{

	public function __construct()
	{
		session_start();
	}

	public function saveData($key, $val) 
	{
		$_SESSION[$key] = $val;
	}
    
	public function getData($key)
	{
		return (!empty($_SESSION[$key])) ? $_SESSION[$key] : false;
	}
    
	public function deleteData($key)
	{
		unset($_SESSION[$key]);		

	}

}


?>
