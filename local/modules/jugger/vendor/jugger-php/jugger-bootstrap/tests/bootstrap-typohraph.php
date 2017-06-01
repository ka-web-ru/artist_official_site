<?php

use PHPUnit\Framework\TestCase;
use jugger\bootstrap\Lead;
use jugger\bootstrap\Display;
use jugger\bootstrap\Blockquote;

class TypographTest extends TestCase
{
    public function testDisplay()
    {
        $this->assertEquals(
            (string) new Display('Header'),
            "<h1 class='display-1'>Header</h1>"
        );
        $this->assertEquals(
            (string) new Display('Header', 1),
            "<h1 class='display-1'>Header</h1>"
        );
        $this->assertEquals(
            (string) new Display('Header', 2),
            "<h1 class='display-2'>Header</h1>"
        );
        $this->assertEquals(
            (string) new Display('Header', 3),
            "<h1 class='display-3'>Header</h1>"
        );
        $this->assertEquals(
            (string) new Display('Header', 4),
            "<h1 class='display-4'>Header</h1>"
        );
        // options
        $this->assertEquals(
            (string) new Display('Header', 1, [
                'data-id' => 'value',
            ]),
            "<h1 data-id='value' class='display-1'>Header</h1>"
        );
    }

    public function testLead()
    {
        $this->assertEquals(
            new Lead('Content'),
            "<p class='lead'>Content</p>"
        );
        $this->assertEquals(
            new Lead('Content', [
                'id' => 'test',
            ]),
            "<p id='test' class='lead'>Content</p>"
        );
    }

    public function testBlockquotes()
    {
        $this->assertEquals(
            (string) new Blockquote('Content'),
            "<blockquote class='blockquote'>Content</blockquote>"
        );
        $this->assertEquals(
            (string) new Blockquote('Content', [
                'id' => 'test',
            ]),
            "<blockquote id='test' class='blockquote'>Content</blockquote>"
        );
        $this->assertEquals(
            (string) new Blockquote('Content', [
                'id' => 'test',
                'footer' => 'Footer text',
            ]),
            "<blockquote id='test' class='blockquote'>Content<footer class='blockquote-footer'>Footer text</footer></blockquote>"
        );
        $this->assertEquals(
            (string) new Blockquote('Content', [
                'id' => 'test',
                'reverse' => true,
            ]),
            "<blockquote id='test' class='blockquote blockquote-reverse'>Content</blockquote>"
        );
    }
}
