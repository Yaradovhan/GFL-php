<?php

class Arecord extends Mysql
{

    private $data;
    protected $tableFields = [];


    public function __construct()
    {
        parent::__construct();
        $this->getFieldsFromTable();
    }

    public function setData($data)
    {
        foreach ($data as $key => $val) {
            $this->$key = $val;
        }
    }

    public function getData()
    {
        return $this->data;
    }

    public function __get($key)
    {
        $this->data[$key];
    }

    public function __set($key, $value)
    {
        if (in_array($key, $this->tableFields)) {
            $this->data[$key] = $value;
        } else {
          throw new \Exception("There are no such fields in the table: ". $this->tableName(), 1);
        }
    }

    public function getAll()
    {
        $res = $this->prepareExecute(Query::select($this->tableName(), ['*'])->build());
        dd($res->fetchAll(PDO::FETCH_ASSOC));
    }

    public function findById($id)
    {
      if(is_int($id)){
        $res = $this->prepareExecute((Query::select($this->tableName(), ['*'])->where([$this->tableFields[0]])->limit()->build()), [$this->tableFields[0] => $id, 'limit' => 1]);
        return $res->fetch(PDO::FETCH_ASSOC);
      } else {
        throw new \Exception("Your id is not integer ", 1);
      }
    }

    public function deleteAll()
    {
      $this->prepareExecute((Query::delete($this->tableName())->build()));
    }

    public function deleteById($id)
    {
      if(is_int($id)){
        if($this->ifIssetIdInTable($id)){
          $this->prepareExecute((Query::delete($this->tableName())->where([$this->tableFields[0]])->build()), [$this->tableFields[0]=> $id]);
        } else {
          throw new \Exception("Your id is not found in the table", 1);
        }
      } else {
        throw new \Exception("Your id is not integer ", 1);
      }

    }

    public function save()
    {
      $tmp = $this->data[$this->tableFields[0]];
        if($this->ifIssetIdInTable($tmp)){
          $this->prepareExecute((Query::update($this->tableName(),[array_pop($this->tableFields)])->where([$this->tableFields[0]])->build()), $this->data);
        } else {
        $this->prepareExecute(Query::insert($this->tableName(), $this->tableFields)->build(), $this->data);
        }

    }

    public function getFieldsFromTable()
    {
        $results = $this->con->query('SHOW COLUMNS FROM ' . $this->tableName());
        foreach ($results as $result) {
            $this->tableFields[] = $result['Field'];
        }
        return $this->tableFields;
    }

    public function ifIssetIdInTable($id)
    {
        $query = $this->prepareExecute((Query::select($this->tableName(), ['id'])->where(['id'])->limit()->build()), ['id' => $id, 'limit' => 1]);
        $resArr = $query->fetchAll(PDO::FETCH_ASSOC);
        if($resArr != null){
          return true;
        } else {
          return false;
        }
    }

}
