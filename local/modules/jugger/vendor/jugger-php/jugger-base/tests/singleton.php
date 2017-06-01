<?php

use PHPUnit\Framework\TestCase;
use jugger\base\Singleton;

class Test1 extends Singleton
{
}

class Test2 extends Singleton
{
}

class SingletonTest extends TestCase
{
    public function testBase()
    {
        $t1 = Test1::getInstance();
        $t2 = Test1::getInstance();

        $t3 = Test2::getInstance();
        $t4 = Test2::getInstance();

        $this->assertInstanceOf(Test1::class, $t1);
        $this->assertInstanceOf(Test2::class, $t3);

        $this->assertTrue($t1 === $t2);
        $this->assertTrue($t3 === $t4);
    }
}
