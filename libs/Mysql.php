<?php

class Mysql implements iWorkData
{

    private $dsn = 'mysql:dbname=user6;host=localhost';
    private $user = 'user6';
    private $password = 'user6';
    private $db;

    public function __construct()
    {
        $this->db = new PDO($this->dsn, $this->user, $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

    public function saveData($key, $val)
    {
        if (!$this->ifIssetId($key)) {
            $query = "INSERT INTO testDB1(id, title) 
            VALUES (:id, :title)";
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':id', $key, PDO::PARAM_STR);
            $stmt->bindParam(':title', $val['title'], PDO::PARAM_STR);
            $stmt->execute();
            return "Success. Data was written";
        }
        return "Save data error";

    }

    public function getData($key)
    {
        if ($this->ifIssetId($key)) {
            $query = "SELECT `id`,`title` FROM `testDB1` WHERE `id` = $key ";
            $q = $this->db->query($query);
            $result = $q->fetch(PDO::FETCH_ASSOC);
            return implode(",", $result);
        }
        return "Get data error";
    }

    public function deleteData($key)
    {
        if ($this->ifIssetId($key)) {
            $sql = "DELETE FROM testDB1 WHERE id =  :key";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':key', $key, PDO::PARAM_INT);
            $stmt->execute();
            return "Success. Data was deleted";
        }
        return "Delete data error";
    }

    public function ifIssetId($key)
    {
        $sql = "SELECT EXISTS(SELECT id FROM testDB1 WHERE id = $key)";
        $q = $this->db->query($sql);
        $result = $q->fetch(PDO::FETCH_NUM);

        return boolval(implode($result));
    }

}
