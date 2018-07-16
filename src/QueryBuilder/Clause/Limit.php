<?php
namespace QueryBuilder\Clause;

class Limit
{
    private $limit;

    public function __construct()
    {
        $this->limit = null;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    public function build()
    {
        if(is_null($this->limit)) return array("", array());
        return array(
            " LIMIT ?",
            array($this->limit)
        );
    }
}
