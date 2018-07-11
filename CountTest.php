<?php

use PHPUnit\Framework\TestCase;

class CountTest extends TestCase
{
    public function testFailure()
    {
        $this->assertCount(0, array('foo'));
    }
}
?> 
