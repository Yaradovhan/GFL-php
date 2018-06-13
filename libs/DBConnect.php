<?php

class DBConnect
{
	
	public function __construct($dsn='',$username='',$password='')
	{
		$this->connectionString=$dsn;
		$this->username=$username;
		$this->password=$password;
	}
	
}