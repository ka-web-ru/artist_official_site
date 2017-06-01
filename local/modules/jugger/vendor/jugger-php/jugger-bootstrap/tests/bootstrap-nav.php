<?php

use PHPUnit\Framework\TestCase;
use jugger\html\tag\Link;
use jugger\bootstrap\Nav;
use jugger\bootstrap\Dropdown;

class NavTest extends TestCase
{
    public function testDropdown()
    {
        $this->assertEquals(
            Nav::widget([
                'options' => [
                    'id' => 'test',
                ],
                'items' => [
                    new Link('Test1'),
                    [
                        'content' => new Link('Test2'),
                        'active' => true,
                    ],
                    [
                        'content' => new Link('Test3'),
                        'disabled' => true,
                    ],
                    [
                        'content' => new Dropdown([
                            'button' => new Link('Test4'),
                            'items' => [
                                new Link('Link1'),
                                new Link('Link2'),
                                new Link('Link3'),
                            ],
                        ]),
                    ],
                ],
            ]),
            "<ul class='nav' id='test'>".
            "<li class='nav-item'>".
            "<a href='#' class=' nav-link'>Test1</a>".
            "</li>".
            "<li class='nav-item'>".
            "<a href='#' class=' nav-link active'>Test2</a>".
            "</li>".
            "<li class='nav-item'>".
            "<a href='#' class=' nav-link disabled'>Test3</a>".
            "</li>".
            "<li class='nav-item dropdown'>".
            "<a href='#' class=' nav-link dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Test4</a>".
            "<div class='dropdown-menu'>".
            "<a href='#' class='dropdown-item'>Link1</a>".
            "<a href='#' class='dropdown-item'>Link2</a>".
            "<a href='#' class='dropdown-item'>Link3</a>".
            "</div>".
            "</li>".
            "</ul>"
        );

        $this->assertEquals(
            Nav::widget([
                'options' => [
                    'class' => 'nav nav-tabs',
                ],
            ]),
            "<ul class='nav nav-tabs'></ul>"
        );
    }
}
