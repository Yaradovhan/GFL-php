<?php

class SQL
{

    private $dsn;
    private $user;
    private $password;
    private $dbh;

    protected function connect()
    {
        $this->dbh = new PDO($this->getDsn(), $this->getUser(), $this->getPassword());
    }

    public function getDsn()
    {
        return $this->dsn;
    }
    public function setDsn($dsn)
    {
        $this->dsn = $dsn;
    }
    public function getUser()
    {
        return $this->user;
    }
    public function setUser($user)
    {
        $this->user = $user;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function prepare($sql)
    {
        return $this->dbh->prepare($sql);
    }

}
