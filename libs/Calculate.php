<?php

class Calculate
{

    private $num1, $num2, $mem;

    public function setNum($num1, $num2)
    {
        $this->num1 = (int)$num1;
        $this->num2 = (int)$num2;
    }

    public function ifIssetNum1()
    {
        return 0 !== $this->num1;
    }

    public function ifIssetNum2()
    {
        return 0 !== $this->num2;
    }

    public function ifIssetMem()
    {
        return 0 !== $this->mem;
    }

    public function getNum1()
    {
        return $this->num1;
    }

    public function getNum2()
    {
        return $this->num2;
    }

    public function setMem($val)
    {
        $this->mem = $val;
    }

    public function getMem()
    {
        return $this->mem;
    }

    //----------------------------------------

    public function sum()
    {
        return $this->num1 + $this->num2;
    }

    public function sub()
    {
        return $this->num1 - $this->num2;
    }

    public function mult()
    {
        return $this->num1 * $this->num2;
    }

    public function div()
    {
        if (0 == $this->num2) {
            return DIVERROR;
        }

        return $this->num1 / $this->num2;
    }

    public function sqrtNum1()
    {
        return sqrt($this->num1);
    }

    public function sqrtNum2()
    {
        return sqrt($this->num2);
    }

    public function oneDivBy($num)
    {
        if (0 == $num)
        {
            return DIVERROR;
        }
        return 1/$num;
    }

}