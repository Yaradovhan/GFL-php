<?php

use PHPUnit\Framework\TestCase;

class ContainsTest2 extends TestCase
{
    public function testFailure()
    {
        $this->assertContains('baz', 'foobar');
    }
}
?>
