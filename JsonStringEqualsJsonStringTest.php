<?php

use PHPUnit\Framework\TestCase;

class JsonStringEqualsJsonStringTest extends TestCase
{
    public function testFailure()
    {
        $this->assertJsonStringEqualsJsonString(
          json_encode(array("Mascot" => "Tux")), json_encode(array("Mascott" => "ux"))
        );
    }
}
?> 
