<?php

class Mysql extends Sql
{

    public function connect()
    {
        $this->dbh = new PDO($this->dsn, $this->username, $this->password);
    }

}