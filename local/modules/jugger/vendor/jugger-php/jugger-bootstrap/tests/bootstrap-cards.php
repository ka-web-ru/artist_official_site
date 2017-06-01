<?php

use PHPUnit\Framework\TestCase;
use jugger\bootstrap\Card;
use jugger\bootstrap\LinkButton;
use jugger\html\tag\Link;
use jugger\html\tag\Img;
use jugger\html\tag\Div;
use jugger\html\EmptyTag;

class CardsTest extends TestCase
{
    public function testBase()
    {
        $this->assertEquals(
            (string) new Card([
                'inverse' => true,
                'title' => 'Title',
                'header' => 'Заголовок',
                'footer' => 'Подвальчик',
                'img' => 'src-to-img.ext',
                'subtitle' => 'Sub Title',
                'content' => 'Content block',
                'links' => [
                    new Link('Test1'),
                    new LinkButton('Test2', '#', [
                        'type' => 'primary',
                    ]),
                ],
            ]),
            "<div class='card card-inverse'>".
            "<div class='card-header'>Заголовок</div>".
            "<img src='src-to-img.ext' class='card-img'>".
            "<div class='card-block'>".
            "<h4 class='card-title'>Title</h4>".
            "<h6 class='card-subtitle mb-2 text-muted'>Sub Title</h6>".
            "<div class='card-text'>Content block</div>".
            "<a href='#' class='card-link'>Test1</a>".
            "<a class='btn btn-primary' href='#' role='button'>Test2</a>".
            "</div>".
            "<div class='card-footer'>Подвальчик</div>".
            "</div>"
        );

        $this->assertEquals(
            (string) new Card([
                'options' => [
                    'id' => 'test',
                    'class' => 'card card-inverse card-primary',
                ],
                'img' => new Img('src-to-img.ext', [
                    'class' => 'card-img-top',
                ]),
                'title' => 'Title',
                'subtitle' => new EmptyTag('Sub Title'),
                'content' => new Div('Content block'),
            ]),
            "<div id='test' class='card card-inverse card-primary'>".
            "<img class='card-img-top' src='src-to-img.ext'>".
            "<div class='card-block'>".
            "<h4 class='card-title'>Title</h4>".
            "<h6 class='card-subtitle mb-2 text-muted'>Sub Title</h6>".
            "<div class='card-text'><div>Content block</div></div>".
            "</div>".
            "</div>"
        );
    }
}
