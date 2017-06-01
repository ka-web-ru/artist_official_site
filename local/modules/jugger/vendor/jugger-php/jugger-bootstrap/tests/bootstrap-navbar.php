<?php

use PHPUnit\Framework\TestCase;
use jugger\html\EmptyTag;
use jugger\html\tag\Link;
use jugger\bootstrap\Nav;
use jugger\bootstrap\Navbar;

class NavbarTest extends TestCase
{
    public function testDropdown()
    {
        $this->assertEquals(
            Navbar::widget([
                'brand' => 'My brand',
                'fixed' => true,
                'nav' => new Nav([
                    'items' => [
                        new Link('Test1'),
                        new Link('Test2'),
                        new Link('Test3'),
                    ],
                ]),
                'text' => 'Navbar text',
            ]),
            "<nav class='navbar navbar-light navbar-toggleable-md bg-faded fixed-top'>".
            "<button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbar-nav-id-1' aria-controls='navbar-nav-id-1' aria-expanded='false' aria-label='Toggle navigation'>".
            "<span class='navbar-toggler-icon'></span>".
            "</button>".
            "<h1 class='mb-0 navbar-brand'>My brand</h1>".
            "<div id='navbar-nav-id-1' class='collapse navbar-collapse'>".
            "<ul class='navbar-nav mr-auto'>".
            "<li class='nav-item'><a href='#' class=' nav-link'>Test1</a></li>".
            "<li class='nav-item'><a href='#' class=' nav-link'>Test2</a></li>".
            "<li class='nav-item'><a href='#' class=' nav-link'>Test3</a></li>".
            "</ul>".
            "<span class='navbar-text'>Navbar text</span>".
            "</div>".
            "</nav>"
        );

        $this->assertEquals(
            Navbar::widget([
                'options' => [
                    'id' => 'test',
                    'class' => 'navbar navbar-inverse navbar-toggleable-sm bg-inverse',
                ],
                'brand' => new Link('My brand'),
                'nav' => new Nav([
                    'items' => [
                        new Link('Test1'),
                    ],
                ]),
                'text' => new EmptyTag("<form class='form-inline'>...</form>"),
            ]),
            "<nav class='navbar navbar-inverse navbar-toggleable-sm bg-inverse' id='test'>".
            "<button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbar-nav-id-2' aria-controls='navbar-nav-id-2' aria-expanded='false' aria-label='Toggle navigation'>".
            "<span class='navbar-toggler-icon'></span>".
            "</button>".
            "<a href='#' class=' navbar-brand'>My brand</a>".
            "<div id='navbar-nav-id-2' class='collapse navbar-collapse'>".
            "<ul class='navbar-nav mr-auto'>".
            "<li class='nav-item'><a href='#' class=' nav-link'>Test1</a></li>".
            "</ul>".
            "<form class='form-inline'>...</form>".
            "</div>".
            "</nav>"
        );

        $this->assertEquals(
            Navbar::widget(),
            "<nav class='navbar navbar-light navbar-toggleable-md bg-faded'>".
            "<button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbar-nav-id-3' aria-controls='navbar-nav-id-3' aria-expanded='false' aria-label='Toggle navigation'>".
            "<span class='navbar-toggler-icon'></span>".
            "</button>".
            "<div id='navbar-nav-id-3' class='collapse navbar-collapse'>".
            "</div>".
            "</nav>"
        );
    }
}
