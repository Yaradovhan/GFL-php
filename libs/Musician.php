<?php

require_once 'libs/iInstrument.php';
require_once 'libs/iBand.php';
require_once 'libs/iMusician.php';

class Musician implements iMusician
{

    private $name;
    private $instrument;
    private $musicianType;

    public function __construct()
    {
        $this->name='';
        $this->instrument=array();
    }

    public function addInstrument(iInstrument $obj)
    {
        if(false === array_search($obj, $this->getInstrument(), true))
        {
            array_push($this->instrument, $obj);
        }
        else
        {
            return false;
        }
    }

    public function getInstrument()
    {
        return $this->instrument;
    }

    public function assingToBand(iBand $nameBand)
    {
        $nameBand->addMusician($this);
    }

    public function getMusicianType()
    {
        return $this->musicianType;
    }

    public function setMusicianType($musicanType)
    {
        $this->musicianType = $musicanType;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

}