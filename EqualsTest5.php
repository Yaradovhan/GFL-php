<?php

use PHPUnit\Framework\TestCase;

class EqualsTest5 extends TestCase
{
    public function testFailure()
    {
        $this->assertEquals(array('a', 'b', 'c'), array('a', 'c', 'd'));
    }
}
?>
 
