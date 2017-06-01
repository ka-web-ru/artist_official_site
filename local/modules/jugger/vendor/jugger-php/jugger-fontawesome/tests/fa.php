<?php

use PHPUnit\Framework\TestCase;
use jugger\fontawesome\Fa;

class FaTest extends TestCase
{
    public function testBase()
    {
        $this->assertEquals(
            Fa::i("address-book"),
            "<i class='fa fa-address-book' aria-hidden='true'></i>"
        );
        $this->assertEquals(
            Fa::i("address-book", 0),
            "<i class='fa fa-address-book' aria-hidden='true'></i>"
        );
        $this->assertEquals(
            Fa::i("address-book", 1, [
                'class' => 'any-css-class',
            ]),
            "<i class='fa fa-address-book fa-lg any-css-class' aria-hidden='true'></i>"
        );
        $this->assertEquals(
            Fa::i("address-book", 2, [
                'li' => true,
                'spin' => true,
                'pulse' => true,
            ]),
            "<i class='fa fa-address-book fa-2x fa-li fa-spin fa-pulse' aria-hidden='true'></i>"
        );
    }

    public function testTag()
    {
        $i = Fa::tag('bath');
        $i->data = [
            'id' => 'test',
        ];
        $this->assertEquals(
            $i->render(),
            "<i class='fa fa-bath' aria-hidden='true' data-id='test'></i>"
        );
    }
}
