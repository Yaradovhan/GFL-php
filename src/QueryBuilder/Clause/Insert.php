<?php

class Insert
{
    private $table;
    private $params;

    public function __construct($table, $params)
    {
        $this->table($table);
        $this->set($params);
    }

    public function table($table)
    {
        $this->table  = $table;
        return $this;
    }

    public function set($params)
    {
        $this->params = $params;
        return $this;
    }

    public function build()
    {
        $columns = array_keys($this->params);
        $bind    = array_values($this->params);

        $placeHolders = join(", ", array_fill(0, count($columns), "?"));
        $columns = join(", ", $columns);
        $query = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeHolders})";

        return array($query, $bind);
    }
}
