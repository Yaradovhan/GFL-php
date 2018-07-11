<?php

use PHPUnit\Framework\TestCase;

class JsonStringEqualsJsonFileTest extends TestCase
{
    public function testFailure()
    {
        $this->assertJsonStringEqualsJsonFile(
          'path/to/fixture/file', json_encode(array("Mascot" => "ux"))
        );
    }
}
?> 
