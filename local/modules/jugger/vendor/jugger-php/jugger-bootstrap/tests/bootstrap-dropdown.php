<?php

use PHPUnit\Framework\TestCase;
use jugger\bootstrap\Dropdown;
use jugger\html\tag\Link;

class DropdownTest extends TestCase
{
    public function testDropdown()
    {
        $this->assertEquals(
            Dropdown::widget([
                'options' => [
                    'id' => 'test',
                    'class' => 'dropdown show',
                ],
                'button' => 'Test Label',
                'header' => 'Header Items',
                'items' => [
                    '<span>Link1</span>',
                    new Link('Link2', '#'),
                    null, // devider
                    new Link('Link3'),
                ],
            ]),
            "<div class='dropdown show' id='test'>".
            "<button type='button' class='btn btn-secondary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Test Label</button>".
            "<div class='dropdown-menu'>".
            "<h6 class='dropdown-header'>Header Items</h6>".
            "<a href='#' class='dropdown-item'><span>Link1</span></a>".
            "<a href='#' class='dropdown-item'>Link2</a>".
            "<div class='dropdown-divider'></div>".
            "<a href='#' class='dropdown-item'>Link3</a>".
            "</div>".
            "</div>"
        );

        $this->assertEquals(
            Dropdown::widget([
                'right' => true,
                'dropup' => true,
                'split' => true,
                'button' => new Link('Test Label', '#', [
                    'class' => 'btn btn-secondary',
                ]),
                'items' => [
                    new Link('Link1'),
                    new Link('Link2'),
                    new Link('Link3'),
                ],
            ]),
            "<div class='dropdown dropup'>".
            "<a class='btn btn-secondary' href='#'>Test Label</a>".
            "<button class='btn btn-secondary dropdown-toggle-split dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><span class='sr-only'>Toggle Dropdown</span></button>".
            "<div class='dropdown-menu dropdown-menu-right'>".
            "<a href='#' class='dropdown-item'>Link1</a>".
            "<a href='#' class='dropdown-item'>Link2</a>".
            "<a href='#' class='dropdown-item'>Link3</a>".
            "</div>".
            "</div>"
        );
    }
}
