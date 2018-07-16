<?php

class Select
{
    private $table;
    private $columns;
    private $distinct;
    private $joins;
    private $where;
    private $order;
    private $group;
    private $limit;
    private $offset;


    public function __construct($table, $columns)
    {
        $this->table($table);
        $this->columns($columns);
        $this->joins  = array();
        $this->where  = new Condition("WHERE");
        $this->order  = new OrderBy();
        $this->group  = new GroupBy();
        $this->limit  = new Limit();
        $this->offset = new Offset();
    }

    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    public function columns($columns)
    {
        $this->columns = $columns;
        return $this;
    }

    public function where($conditions)
    {
        $this->where->setConditions($conditions);
        return $this;
    }

    public function distinct()
    {
        $this->distinct = 'DISTINCT ';
        return $this;
    }

    public function leftJoin($table, $conditions = null)
    {
        $join = new Join();
        $join->leftJoin($table, $conditions);
        $this->joins[] = $join;
        return $this;
    }

    public function rightJoin($table, $conditions = null)
    {
        $join = new Join();
        $join->rightJoin($table, $conditions);
        $this->joins[] = $join;
        return $this;
    }

    public function innerJoin($table, $conditions = null)
    {
        $join = new Join();
        $join->innerJoin($table, $conditions);
        $this->joins[] = $join;
        return $this;
    }

    public function crossJoin($table)
    {
        $join = new Join();
        $join->crossJoin($table);
        $this->joins[] = $join;
        return $this;
    }

    public function naturalJoin($table)
    {
        $join = new Join();
        $join->naturalJoin($table);
        $this->joins[] = $join;
        return $this;
    }

    public function orderBy($orders)
    {
        $this->order->setOrders($orders);
        return $this;
    }

    public function groupBy($groups)
    {
        $this->group->setGroups($groups);
        return $this;
    }

    public function limit($limit, $offset = 0)
    {
        $this->limit->setLimit($limit);
        $this->offset->setOffset($offset);
        return $this;
    }

    public function build()
    {
        $columns = join(", ", $this->columns);
        $query = "SELECT {$this->distinct}{$columns} FROM {$this->table}";

        $bind = array();
        foreach($this->joins as $join){
            list($joinQuery, $joinBind) = $join->build();
            $query .= $joinQuery;
            $bind = array_merge($bind, $joinBind);
        }

        list($whereQuery, $whereBind) = $this->where->build();

        $group = $this->group->build();
        $order = $this->order->build();

        list($limit,  $limitBind)  = $this->limit->build();
        list($offset, $offsetBind) = $this->offset->build();

        return array(
            $query . $whereQuery . $group . $order . $limit . $offset ,
            array_merge($bind, $whereBind, $limitBind, $offsetBind)
        );
    }
}
