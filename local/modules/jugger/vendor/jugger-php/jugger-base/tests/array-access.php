<?php

use PHPUnit\Framework\TestCase;
use jugger\base\ArrayAccessTrait;

class TestObject implements \ArrayAccess
{
    use ArrayAccessTrait;

    var $p1;
    var $p2;
    var $p3;
}

class ArrayAccessTest extends TestCase
{
    public function testBase()
    {
        $obj = new TestObject();
        $obj['p1'] = 123;
        $obj['p2'] = 456;
        $obj['p3'] = 789;

        $this->assertEquals($obj['p1'], 123);
        $this->assertEquals($obj['p2'], 456);
        $this->assertEquals($obj['p3'], 789);
    }
}
