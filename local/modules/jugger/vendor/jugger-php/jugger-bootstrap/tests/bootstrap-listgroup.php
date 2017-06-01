<?php

use PHPUnit\Framework\TestCase;
use jugger\bootstrap\ListGroup;
use jugger\bootstrap\Button;
use jugger\html\tag\Link;

class ListGroupTest extends TestCase
{
    public function testBase()
    {
        $this->assertEquals(
            ListGroup::widget([
                'options' => [
                    'id' => 'test',
                ],
                'items' => [
                    'any content',
                    new Link('Test'),
                    [
                        'active' => true,
                        'content' => new Button('Hahaha'),
                    ],
                    [
                        'disabled' => true,
                        'content' => new Button('Hahaha'),
                    ],
                ],
            ]),
            "<ul class='list-group' id='test'>".
            "<li class='list-group-item'>any content</li>".
            "<li class='list-group-item'><a href='#'>Test</a></li>".
            "<li class='list-group-item active'><button class='btn' type='button'>Hahaha</button></li>".
            "<li class='list-group-item disabled'><button class='btn' type='button'>Hahaha</button></li>".
            "</ul>"
        );

        $this->assertEquals(
            ListGroup::widget([
                'links' => [
                    new Link('Test1', '#', [
                        'class' => 'list-group-item-success',
                    ]),
                    [
                        'active' => true,
                        'content' => new Link('Test2'),
                    ],
                    [
                        'disabled' => true,
                        'content' => new Link('Test3'),
                    ],
                    [
                        'content' => new Link('Test4'),
                    ],
                ],
            ]),
            "<div class='list-group'>".
            "<a class='list-group-item list-group-item-success list-group-item-action' href='#'>Test1</a>".
            "<a href='#' class='list-group-item  active'>Test2</a>".
            "<a href='#' class='list-group-item  disabled list-group-item-action'>Test3</a>".
            "<a href='#' class='list-group-item  list-group-item-action'>Test4</a>".
            "</div>"
        );
    }
}
