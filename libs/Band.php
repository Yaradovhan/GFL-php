<?php

include_once 'libs/iMusician.php';
include_once 'libs/iBand.php';

class Band implements iBand
{

    private $name;
    private $genre;
    private $musician;

    public function __construct()
    {
        $this->name='';
        $this->genre='';
        $this->musician=array();
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    public function addMusician(iMusician $obj)
    {
        if(false === array_search($obj, $this->getMusician(), true))
        {
            array_push($this->musician, $obj);
        }
        else
        {
            return "MUSITIAN_ALREDY_IN_BAND_ERROR";
        }
    }

    public function getMusician()
    {
        return $this->musician;
    }
}