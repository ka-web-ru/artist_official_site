<?php

use PHPUnit\Framework\TestCase;
use jugger\base\Configurator;

class ConfiguratorTest extends TestCase
{
    public function testBase()
    {
        $obj = new stdClass();
        Configurator::setValues($obj, [
            'p1' => '123',
            'p2' => '456',
            'p3' => '789',
        ]);

        $this->assertEquals($obj->p1, 123);
        $this->assertEquals($obj->p2, 456);
        $this->assertEquals($obj->p3, 789);
    }
}
