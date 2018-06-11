<?php
require_once 'iWorkData.php';

class Session implements iWorkData
{

    public function __construct()
    {
    }

    public function saveData($key, $val)
    {
        return ($_SESSION[$key] = $val) ? "Success. Session was written" : "Error in writing session";
    }

    public function getData($key)
    {
        return (!empty($_SESSION[$key])) ? $_SESSION[$key] : "Session key not found";
    }

    public function deleteData($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
            return "Success. Session key was deleted";
        } else {
            return "Error in deleting session key";
        }
    }
}