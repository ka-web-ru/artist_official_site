<?php

use PHPUnit\Framework\TestCase;
use jugger\bootstrap\Badge;

class BadgeTest extends TestCase
{
    public function testDropdown()
    {
        $this->assertEquals(
            Badge::widget([
                'type' => 'success',
                'content' => 'value',
            ]),
            "<span class='badge badge-success'>value</span>"
        );
        $this->assertEquals(
            Badge::widget([
                'pill' => true,
                'type' => 'danger',
                'content' => 'value',
                'options' => [
                    'id' => 'test',
                ],
            ]),
            "<span class='badge badge-danger badge-pill' id='test'>value</span>"
        );
    }
}
