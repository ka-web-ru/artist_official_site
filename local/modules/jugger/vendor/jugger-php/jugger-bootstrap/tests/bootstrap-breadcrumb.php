<?php

use PHPUnit\Framework\TestCase;

use jugger\bootstrap\Breadcrumb;
use jugger\html\tag\Link;

class BreadcrumbTest extends TestCase
{
    public function testBase()
    {
        $this->assertEquals(
            Breadcrumb::widget([
                'items' => [
                    new Link('Link1', '/'),
                    '<li>Link2</li>',
                    new Link('Link3'),
                ],
            ]),
            "<ol class='breadcrumb'><li class='breadcrumb-item'><a href='/'>Link1</a></li><li>Link2</li><li class='breadcrumb-item active'><a href='#'>Link3</a></li></ol>"
        );
        $this->assertEquals(
            Breadcrumb::widget([
                'options' => [
                    'id' => 'my-breadcrumb',
                ],
            ]),
            "<ol class='breadcrumb' id='my-breadcrumb'></ol>"
        );
    }
}
