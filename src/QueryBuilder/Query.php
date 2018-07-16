<?php

namespace QueryBuilder;

use QueryBuilder\Clause\Select;
use QueryBuilder\Clause\Insert;
use QueryBuilder\Clause\Update;
use QueryBuilder\Clause\Delete;


class Query
{

    public static function select($table, $columns)
    {
        return new Select($table, $columns);
    }


    public static function insert($table, $params)
    {
        return new Insert($table, $params); 
    }


    public static function update($table, $params)
    {
        return new Update($table, $params); 
    }


    public static function delete($table)
    {
        return new Delete($table); 
    }
}
