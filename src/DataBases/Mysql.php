<?php

class Mysql extends SQL
{

  public function __construct()
  {
      $this->setDsn(DSN_MY.':host=localhost;dbname='. DATABASE);
      $this->setUser(USER);
      $this->setPassword(PASSWORD);
      $this->connect();
  }

}
