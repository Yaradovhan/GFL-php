<?php

class Sql
{

public function select($table)
{
	$query = "SELECT 'userid', 'userdata' FROM '$table' WHERE 'userid'='6'";
	return $query;
}

public function delete($table)
{
	$query = "DELETE 'userid', 'userdata' FROM '?' WHERE 'userid'='6'";
	return $query;
}

public function insert($table,$userdata)
{
	$query = "INSERT INTO '?' SET 'userdata' VALUE '?'";
	return $query;
}

public function update($table,$userdata)
{
	$query = "UPDATE '?' SET 'userdata'='?' WHERE 'userid'='6'";
	return $query;
}

}
