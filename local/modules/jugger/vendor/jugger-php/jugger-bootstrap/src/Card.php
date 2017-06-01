<?php

namespace jugger\bootstrap;

use jugger\ui\Widget;
use jugger\html\ContentTag;
use jugger\html\tag\Div;
use jugger\html\tag\Img;

class Card extends Widget
{
    public $img;
    public $title;
    public $links = [];
    public $header;
    public $footer;
    public $inverse = false;
    public $content;
    public $subTitle;
    public $options = [];

    public function run()
    {
        $tag = new Div('', $this->getOptions());
        $childs = [
            $this->getHeaderTag(),
            $this->getImgTag(),
            $this->getBlockTag(),
            $this->getFooterTag()
        ];

        foreach ($childs as $child) {
            if ($child) {
                $tag->add($child);
            }
        }
        return $tag->render();
    }

    public function getOptions()
    {
        $options = $this->options;
        if (!isset($options['class'])) {
            $class = "card";
            if ($this->inverse) {
                $class .= " card-inverse";
            }
            $options['class'] = $class;
        }
        return $options;
    }


    public function getBlockTag()
    {
        $block = new Div('', [
            'class' => 'card-block',
        ]);
        $childs = [
            $this->getTitleTag(),
            $this->getSubTitleTag(),
            $this->getContentTag()
        ];

        foreach ($childs as $child) {
            if ($child) {
                $block->add($child);
            }
        }
        foreach ($this->links as $link) {
            if (!$link->class) {
                $link->class = 'card-link';
            }
            $block->add($link);
        }
        return $block;
    }

    public function getTitleTag()
    {
        if (!$this->title) {
            return null;
        }

        $tag = new ContentTag('h4', $this->title, [
            'class' => 'card-title',
        ]);
        return $tag;
    }

    public function getSubTitleTag()
    {
        if (!$this->subtitle) {
            return null;
        }

        $tag = new ContentTag('h6', $this->subtitle, [
            'class' => 'card-subtitle mb-2 text-muted',
        ]);
        return $tag;
    }

    public function getContentTag()
    {
        if (!$this->content) {
            return null;
        }

        $tag = new Div($this->content, [
            'class' => 'card-text',
        ]);
        return $tag;
    }

    public function getHeaderTag()
    {
        if (!$this->header) {
            return null;
        }

        $child = new Div($this->header, [
            'class' => 'card-header',
        ]);
        return $child;
    }

    public function getImgTag()
    {
        if (!$this->img) {
            return null;
        }
        elseif ($this->img instanceof Img) {
            $tag = $this->img;
        }
        else {
            $tag = new Img($this->img);
        }

        if (!$tag->class) {
            $tag->class = 'card-img';
        }
        return $tag;
    }

    public function getFooterTag()
    {
        if (!$this->footer) {
            return null;
        }

        $child = new Div($this->footer, [
            'class' => 'card-footer',
        ]);
        return $child;
    }
}
