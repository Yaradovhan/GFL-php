<?php

include_once 'Foo.php';
include_once 'Bar.php';
use PHPUnit\Framework\TestCase;

class ContainsOnlyInstancesOfTest extends TestCase
{
    public function testFailure()
    {
        $this->assertContainsOnlyInstancesOf(Foo::class, array(new Foo(), new Bar(), new Foo()));
    }
}
?> 
