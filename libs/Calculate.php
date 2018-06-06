<?php

class Calculate
{

    private $num1, $num2, $output;

    public function setNum($num1, $num2)
    {
        $this->num1 = (int) $num1;
        $this->num2 = (int) $num2;
    }

    public function sum()
    {
        $this->output = $this->num1 + $this->num2;
    }

    public function sub()
    {
        $this->output = $this->num1 - $this->num2;
    }

    public function mult()
    {
        $this->output = $this->num1 * $this->num2;
    }

    public function div()
    {
        $this->output = $this->num1 / $this->num2;
    }

    public function sqrt()
    {
        $this->output = sqrt($this->num1);
    }

    public function getResult()
    {
        return $this->output;
    }
}