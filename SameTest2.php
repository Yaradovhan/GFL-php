<?php

use PHPUnit\Framework\TestCase;

class SameTest2 extends TestCase
{
    public function testFailure()
    {
        $this->assertSame(new stdClass, new stdClass);
    }
}
?> 
