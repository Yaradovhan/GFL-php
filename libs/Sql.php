<?php

class Sql
{

    protected $dsn;
    protected $username;
    protected $password;

    protected $select;
    protected $from;
    protected $where = "";
    protected $join = [];

    protected $group = '';
    protected $order = "";
    protected $limit = "";
    protected $having = "";
    protected $distinct = false;
    protected $delete = false;
    protected $insert;
    protected $update;
    protected $query;
    protected $dbh;

    public function __construct($dsn, $username, $password)
    {
        $this->dsn     = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }


}