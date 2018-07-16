<?php
namespace QueryBuilder\Clause;

use QueryBuilder\Clause\Condition;

class Update 
{
    private $table;
    private $params;
    private $where;

    public function __construct($table, $params)
    {
        $this->table($table);
        $this->set($params);
        $this->where = new Condition("WHERE");
    }

    public function table($table)
    {
        $this->table = $table; 
        return $this;
    }

    public function set($params)
    {
        $this->params = $params; 
        return $this;
    }

    public function where($conditions)
    {
        $this->where->setConditions($conditions);
        return $this;
    }

    public function build()
    {
        $columns = array_keys($this->params);
        $bind = array_values($this->params);

        $sets = array();
        foreach($columns as $column){
            $sets[] = "{$column} = ?";
        }
        $sets = join(", ", $sets);

        $query = "UPDATE {$this->table} SET {$sets}";

        list($whereQuery, $whereBind) = $this->where->build();
        return array(
            $query . $whereQuery,
            array_merge($bind, $whereBind)
        );
    }
}
