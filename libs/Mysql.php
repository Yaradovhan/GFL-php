<?php

class Mysql extends Sql
{

public function __construct($driver)
{
	$this->driver = $driver;	
}

public function setDriver()
{
	return $this->driver;	
}

}
