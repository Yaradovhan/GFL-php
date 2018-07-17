<?php

class Condition
{
    private $phrase;
    private $query;
    // private $bind;


    public function __construct($phrase)
    {
        $this->phrase = $phrase;
        $this->query  = [];
        // $this->bind   = [];
    }


    public function setConditions($conditions)
    {
        foreach($conditions as $column){
        $this->addExpression($column);
        }
    }


    public function addExpression($column)
    {
      // dd($column);
      // dd($value);
        // if(is_int($column)){
        //     // $this->query[] = $value;
        //     $this->query[] = ":$column";
        //     dd($this->query);
        // }
        // // elseif(is_null($value)){
        // //     $this->query[] = "{$column} IS NULL";
        // // }
        // elseif(strpos($column, "?") !== false){
        //     $this->query[] = $column;
        //     if(is_array($value)){
        //         $this->bind = array_merge($this->bind, $value);
        //     }else{
        //         $this->bind[] = $value;
        //     }
        // }elseif(is_array($value)){
        //     $operators = array_keys($value);
        //     $value = array_values($value);
        //     $this->query[] = "{$column} {$operators[0]} ?";
        //     $this->bind[] = $value[0];
        // }else{
            $this->query[] .= "{$column} = :{$column}";
            // $this->bind[] = $column;

    }


    public function build()
    {
        if(empty($this->query)) return ["", []];
        return [" {$this->phrase} " . join(" AND ", $this->query)];
    }
}
