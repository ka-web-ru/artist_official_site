<?php

namespace jugger\bootstrap;

use jugger\ui\Widget;
use jugger\html\ContentTag;
use jugger\html\tag\Ol;
use jugger\html\tag\Li;
use jugger\html\tag\Div;
use jugger\html\tag\Img;
use jugger\html\tag\Link;
use jugger\html\tag\Span;

class Carousel extends Widget
{
    static $inc = 1;

    public $items = [];
    public $arrows = true;
    public $options = [];
    public $indicators = false;

    public function init()
    {
        $options = [
            'id' => 'carousel-id-'. self::$inc++,
            'class' => 'carousel slide',
            'data' => [
                'ride' => 'carousel',
            ],
        ];

        $this->options = array_merge($options, $this->options);
    }

    public function getKeyActiveItem()
    {
        foreach ($this->items as $key => $item) {
            if (is_array($item) && ($item['active'] ?? false)) {
                return $key;
            }
        }
        return key($this->items);
    }

    public function run()
    {
        $tag = new Div('', $this->options);
        $childs = [
            $this->getIndicatorsTag(),
            $this->getItemsTag(),
        ];
        $childs = array_merge($childs, $this->getArrowsTags());

        foreach ($childs as $child) {
            if ($child) {
                $tag->add($child);
            }
        }
        return $tag->render();
    }

    public function getIndicatorsTag()
    {
        if (!$this->indicators) {
            return null;
        }

        $id = $this->options['id'];
        $tag = new Ol('', [
            'class' => 'carousel-indicators',
        ]);
        $activeIndex = $this->getKeyActiveItem();

        for ($i=0; $i < count($this->items); $i++) {
            $li = new Li('', [
                'data' => [
                    'target' => '#'.$id,
                    'slide-to' => $i,
                ],
            ]);
            if ($activeIndex == $i) {
                $li->class = 'active';
            }
            $tag->add($li);
        }
        return $tag;
    }

    public function getItemsTag()
    {
        $tag = new Div('', [
            'class' => 'carousel-inner',
            'role' => 'listbox',
        ]);
        $activeIndex = $this->getKeyActiveItem();

        foreach ($this->items as $i => $item) {
            $child = $this->getItemTag($item);
            if ($activeIndex == $i) {
                $child->class .= " active";
            }
            $tag->add($child);
        }
        return $tag;
    }

    public function getItemTag($item)
    {
        $child = new Div('', [
            'class' => 'carousel-item',
        ]);

        if ($item instanceof Img) {
            $child->add($item);
        }
        else {
            $img = new Img($item['src'], [
                'class' => 'd-block img-fluid',
            ]);
            $child->add($img);

            if (isset($item['caption'])) {
                $caption = (string) $item['caption'];
                $child->add(new Div($caption, [
                    'class' => 'carousel-caption d-none d-md-block',
                ]));
            }
        }
        return $child;
    }

    public function getArrowsTags()
    {
        if (!$this->arrows) {
            return [];
        }

        return [
            $this->getArrowByType('prev'),
            $this->getArrowByType('next'),
        ];
    }

    public function getArrowByType(string $type)
    {
        $id = $this->options['id'];
        $link = new Link('', "#{$id}", [
            'class' => "carousel-control-{$type}",
            'role' => 'button',
            'data-slide' => $type,
        ]);
        $link->add(new Span('', [
            'class' => "carousel-control-{$type}-icon",
            'aria-hidden' => 'true',
        ]));
        $link->add(new Span($type, [
            'class' => 'sr-only',
        ]));
        return $link;
    }
}
