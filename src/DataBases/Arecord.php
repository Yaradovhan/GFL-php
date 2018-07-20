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
//        dd($this->tableFields);
        if (in_array($key, $this->tableFields)) {
            $this->data[$key] = $value;
        }

    }

    public function getAll()
    {
        $res = $this->prepareExecute(Query::select($this->tableName(), ['*'])->build());
        dd($res->fetchAll(PDO::FETCH_ASSOC));
    }

    public function findById($id)
    {
        $res = $this->prepareExecute((Query::select($this->tableName(), ['*'])->where(['id'])->limit()->build()), ['id' => $id, 'limit' => 1]);
        dd($res->fetch(PDO::FETCH_ASSOC));
    }

    public function save()
    {
        $this->prepareExecute(Query::insert($this->tableName(), $this->tableFields)->build(), $this->data);
    }

    public function getFieldsFromTable()
    {
        $results = $this->con->query('SHOW COLUMNS FROM ' . $this->tableName());
        foreach ($results as $result) {
            $this->tableFields[] = $result['Field'];
        }
        return $this->tableFields;

    }

}