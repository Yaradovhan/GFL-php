<?php

class Cookie implements iWorkData
{
    public function saveData($key, $val)
	{	
		if(setcookie($key,$val, time() + 3600)){
			return "Success. Cookie was written";
		} else {
			return "Error in writing cookie";
		}
	}

	public function getData($key)
	{
        if(!empty($_COOKIE[$key])){
            return $_COOKIE[$key];
        }
        return "Cookie key not found";
	}
    

	public function deleteData($key)
	{
        return (setcookie($key, "", time() - 3600)) ? "Success. Cookie key was deleted" : "Error in deleting cookie key" ;
	}
}