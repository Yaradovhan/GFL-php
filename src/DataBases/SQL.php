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

    public function prepareExecute($sql, $binds=null)
    {
        $stmt = $this->dbh->prepare($sql);
        if(isset ($binds)) {
            foreach ($binds as $id => &$bind) {

                if (!empty($bind)) {
                    if (is_int($bind)) {
                        $stmt->bindParam(":$id", $bind, PDO::PARAM_INT);
                    } else {
                        $stmt->bindParam(":$id", $bind, PDO::PARAM_STR);
                    }
                }
            }
        }
        $stmt->execute();
        return $stmt;
    }

//    public function prepareExecute($sql, $binds)
//    {
//        $stmt = $this->dbh->prepare($sql);
//        foreach ($binds as $key => &$bind) {
//            if (isset($bind) && $bind != null) {
//                if (is_string($bind)) {
//                    echo "tytstr";
//                    $stmt->bindParam(":$key", $bind, PDO::PARAM_STR);
//                } elseif (is_int($bind)) {
//                    echo "tyt";
//                    $stmt->bindParam(":$key", $bind, PDO::PARAM_INT);
//                } else {
//                    return false;
//                }
//                $stmt->execute();
//            }
//            return $stmt;
//        }
//    }

}
