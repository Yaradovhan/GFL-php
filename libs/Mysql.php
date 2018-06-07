<?php

class Mysql implements iWorkData
{

private $dsn = 'mysql:dbname=user6;host=localhost';
private $user = 'user6';
private $password = 'user6';

//	public function __construct()
//	{
//		try {
//			$dbh = new PDO($dsn, $user, $password);
//				} catch (PDOException $e) {
//			echo 'Some error in connect' . $e->getMessage();
//		}
//	}	

    public function saveData($key, $val)
	{
	
	}
    
	public function getData($key)
	{

	}
    
	public function deleteData($key)
	{

	}
	
	public function conn()
	{
		$dbh = new PDO('mysql:host=localhost;dbname=user6', 'user6', 'user6');
		return $dbh;
	}

}

?>
