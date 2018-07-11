<?php

use PHPUnit\Framework\TestCase;

class ExceptionTest4 extends TestCase
{
    public function testException() {
        try {
            // ... Code that is expected to raise an exception ...
        }

        catch (InvalidArgumentException $expected) {
            return;
        }

        $this->fail('An expected exception has not been raised.');
    }
}
?> 
