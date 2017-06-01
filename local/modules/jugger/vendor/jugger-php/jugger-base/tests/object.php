<?php

use PHPUnit\Framework\TestCase;
use jugger\base\Object;

class ExampleObject extends Object
{
    private $p1 = 123;
    private $p2 = 456;
    private $p3 = 789;

    public function getP1()
    {
        return $this->p1;
    }

    public function setP1($value)
    {
        $this->p1 = $value;
    }

    public function getP2()
    {
        return $this->p2;
    }

    public function setP3($value)
    {
        $this->p3 = $value;
    }

    public function values()
    {
        return [
            $this->p1,
            $this->p2,
            $this->p3,
        ];
    }
}

class ObjectTest extends TestCase
{
    public function testBase()
    {
        $obj = new ExampleObject();

        $this->assertEquals($obj->p1, 123);
        $this->assertEquals($obj->p2, 456);

        $obj->p1 = 999;
        $obj->p3 = 666;

        $values = $obj->values();
        $this->assertEquals($values[0], 999);
        $this->assertEquals($values[1], 456);
        $this->assertEquals($values[2], 666);
    }

    public function testExceptions()
    {
        $obj = new ExampleObject();

        // read-only
        try {
            $obj->p2 = 123;
        }
        catch (\Exception $ex) {
            $this->assertEquals(
                "Property 'p2' is read-only",
                $ex->getMessage()
            );
        }

        // write-only
        try {
            $x = $obj->p3;
        }
        catch (\Exception $ex) {
            $this->assertEquals(
                "Property 'p3' is write-only",
                $ex->getMessage()
            );
        }

        // not found
        try {
            $obj->p4 = 123;
        }
        catch (\Exception $ex) {
            $this->assertEquals(
                "Property 'p4' not found",
                $ex->getMessage()
            );
        }
    }
}
