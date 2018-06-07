<?php

class Cookie implements iWorkData
{
    public function saveData($key, $val)
	{	
		if(setcookie($key,$val)){
			return true;
		} else {
			return false;
		}
	}
   

	public function getData($key)
	{
		return (!empty($_COOKIE[$key])) ? $_COOKIE[$key] : false;
	}
    

	public function deleteData($key)
	{
		setcookie($key, "", time() - 3600);
	}
}

?>
