<?php

namespace jugger\bootstrap;

use jugger\ui\Widget;
use jugger\html\Tag;
use jugger\html\EmptyTag;
use jugger\html\ContentTag;
use jugger\html\tag\H1;
use jugger\html\tag\Div;
use jugger\html\tag\Link;
use jugger\html\tag\Span;

class Navbar extends Widget
{
    static $inc = 1;

    public $brand;
    public $fixed;
    public $nav;
    public $text;
    public $options = [];

    protected $id;

    public function getCollapseId()
    {
        if (!$this->id) {
            $this->id = 'navbar-nav-id-'.self::$inc++;
        }
        return $this->id;
    }

    public function init()
    {
        $options = [
            'class' => 'navbar navbar-light navbar-toggleable-md bg-faded',
        ];
        if ($this->fixed) {
            $options['class'] .= ' fixed-top';
        }
        $this->options = array_merge($options, $this->options);
    }

    public function run()
    {
        $tag = new ContentTag('nav', '', $this->options);
        $childs = [
            $this->getCollapseButtonTag(),
            $this->getBrandTag(),
            $this->getCollapseTag(),
        ];
        foreach ($childs as $child) {
            if ($child) {
                $tag->add($child);
            }
        }

        return $tag->render();
    }

    public function getCollapseButtonTag()
    {
        $content = "<span class='navbar-toggler-icon'></span>";
        $tag = new Button($content, [
            'class' => 'navbar-toggler navbar-toggler-right',
            'type' => 'button',
            'data' => [
                'toggle' => 'collapse',
                'target' => '#'.$this->getCollapseId(),
            ],
            'aria' => [
                'controls' => $this->getCollapseId(),
                'expanded' => 'false',
                'label' => 'Toggle navigation',
            ],
        ]);

        return $tag;
    }

    public function getBrandTag()
    {
        if (!$this->brand) {
            return null;
        }
        elseif ($this->brand instanceof Link) {
            $tag = $this->brand;
        }
        else {
            $tag = new H1($this->brand, [
                'class' => 'mb-0',
            ]);
        }

        $tag->class .= ' navbar-brand';
        return $tag;
    }

    public function getCollapseTag()
    {
        $tag = new Div('', [
            'id' => $this->getCollapseId(),
            'class' => 'collapse navbar-collapse',
        ]);
        $childs = [
            $this->getNavTag(),
            $this->getTextTag(),
        ];
        foreach ($childs as $child) {
            if ($child) {
                $tag->add($child);
            }
        }

        return $tag;
    }

    public function getNavTag()
    {
        if (!$this->nav) {
            return null;
        }
        elseif ($this->nav instanceof Nav) {
            $this->nav->options['class'] = 'navbar-nav mr-auto';
            return new EmptyTag("{$this->nav}");
        }
        else {
            throw new \ErrorException('Property `nav` must extends `Nav`');
        }
    }

    public function getTextTag()
    {
        if (!$this->text) {
            return null;
        }
        elseif ($this->text instanceof Tag) {
            return $this->text;
        }
        else {
            return new Span("{$this->text}", [
                'class' => 'navbar-text',
            ]);
        }
    }
}
