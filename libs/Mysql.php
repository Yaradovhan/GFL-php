<?php

class Mysql implements iWorkData
{

    private $dsn = 'mysql:dbname=testdb;host=localhost';
    private $user = 'root';
    private $password = '';
    private $db;

    public function __construct()
    {
        $this->db = new PDO($this->dsn, $this->user, $this->password);
    }

    public function saveData($key, $val)
    {
        if (!$this->ifIssetId($key)) {
            $query = "INSERT INTO users(id, name, password, first_name, last_name) 
            VALUES (:id, :name, :password, :first_name, :last_name)";
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':id', $key, PDO::PARAM_STR);
            $stmt->bindParam(':name', $val['name'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $val['password'], PDO::PARAM_STR);
            $stmt->bindParam(':first_name', $val['first_name'], PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $val['last_name'], PDO::PARAM_STR);
            $stmt->execute();
            return "Success. Data was written";
        }
        return "Save data error";

    }

    public function getData($key)
    {
        if ($this->ifIssetId($key)) {
            $query = "SELECT `id`,`name`,`password`,`first_name`,`last_name` FROM `users` WHERE `id` = $key ";
            $q = $this->db->query($query);
            $result = $q->fetch(PDO::FETCH_ASSOC);
            return implode(",", $result);
        }
        return "Get data error";
    }

    public function deleteData($key)
    {
        if ($this->ifIssetId($key)) {
            $sql = "DELETE FROM users WHERE id =  :key";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':key', $key, PDO::PARAM_INT);
            $stmt->execute();
            return "Success. Data was deleted";
        }
        return "Delete data error";
    }

    public function ifIssetId($key)
    {
        $sql = "SELECT EXISTS(SELECT id FROM users WHERE id = $key)";
        $q = $this->db->query($sql);
        $result = $q->fetch(PDO::FETCH_NUM);

        return boolval(implode($result));
    }

}
