<?php

use PHPUnit\Framework\TestCase;
use jugger\bootstrap\Carousel;
use jugger\html\tag\Img;
use jugger\html\EmptyTag;

class CarouselTest extends TestCase
{
    public function testDropdown()
    {
        $this->assertEquals(
            Carousel::widget([
                'options' => [
                    'id' => 'test',
                    'data' => [
                        'ride' => 'carousel',
                    ],
                ],
                'items' => [
                    [
                        'src' => 'img-link.ext',
                    ],
                    new Img('img-link.ext', [
                        'class' => 'my-class',
                        'alt' => 'Carousel Item',
                    ]),
                    [
                        'src' => 'img-link.ext',
                        'caption' => new EmptyTag("<h3>Title</h3><p>Content</p>"),
                    ]
                ],
                'indicators' => true,
                'arrows' => false,
            ]),
            "<div id='test' class='carousel slide' data-ride='carousel'>".
            "<ol class='carousel-indicators'>".
            "<li data-target='#test' data-slide-to='0' class='active'></li>".
            "<li data-target='#test' data-slide-to='1'></li>".
            "<li data-target='#test' data-slide-to='2'></li>".
            "</ol>".
            "<div class='carousel-inner' role='listbox'>".
            "<div class='carousel-item active'>".
            "<img class='d-block img-fluid' src='img-link.ext'>".
            "</div>".
            "<div class='carousel-item'>".
            "<img class='my-class' alt='Carousel Item' src='img-link.ext'>".
            "</div>".
            "<div class='carousel-item'>".
            "<img class='d-block img-fluid' src='img-link.ext'>".
            "<div class='carousel-caption d-none d-md-block'>".
            "<h3>Title</h3>".
            "<p>Content</p>".
            "</div>".
            "</div>".
            "</div>".
            "</div>"
        );

        $this->assertEquals(
            Carousel::widget([
                'items' => [
                    [
                        'src' => 'img-link.ext',
                    ],
                    [
                        'active' => true,
                        'src' => 'img-link.ext',
                    ],
                ],
                'indicators' => true,
            ]),
            "<div id='carousel-id-2' class='carousel slide' data-ride='carousel'>".
            "<ol class='carousel-indicators'>".
            "<li data-target='#carousel-id-2' data-slide-to='0'></li>".
            "<li data-target='#carousel-id-2' data-slide-to='1' class='active'></li>".
            "</ol>".
            "<div class='carousel-inner' role='listbox'>".
            "<div class='carousel-item'>".
            "<img class='d-block img-fluid' src='img-link.ext'>".
            "</div>".
            "<div class='carousel-item active'>".
            "<img class='d-block img-fluid' src='img-link.ext'>".
            "</div>".
            "</div>".
            "<a class='carousel-control-prev' role='button' data-slide='prev' href='#carousel-id-2'>".
            "<span class='carousel-control-prev-icon' aria-hidden='true'></span>".
            "<span class='sr-only'>prev</span>".
            "</a>".
            "<a class='carousel-control-next' role='button' data-slide='next' href='#carousel-id-2'>".
            "<span class='carousel-control-next-icon' aria-hidden='true'></span>".
            "<span class='sr-only'>next</span>".
            "</a>".
            "</div>"
        );
    }
}
