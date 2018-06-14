<?php

require_once 'libs/iInstrument.php';

class Instrument implements iInstrument
{

    private $name;
    private $category;

    public function __construct()
    {
        $this->name='';
        $this->category='';
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }
}