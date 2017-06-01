<?php

namespace jugger\bootstrap;

use jugger\ui\Widget;
use jugger\html\EmptyTag;
use jugger\html\ContentTag;
use jugger\html\tag\Caption;
use jugger\html\tag\Th;
use jugger\html\tag\Td;
use jugger\html\tag\Tr;
use jugger\html\tag\Tbody;
use jugger\html\tag\Thead;

class Table extends Widget
{
    public $head;
    public $body;
    public $caption;
    public $inverse;
    public $bordered;
    public $striped;
    public $hover;
    public $options = [];

    public function init()
    {
        $options = [
            'class' => 'table',
        ];
        if ($this->inverse) {
            $options['class'] .= ' table-inverse';
        }
        if ($this->bordered) {
            $options['class'] .= ' table-bordered';
        }
        if ($this->striped) {
            $options['class'] .= ' table-striped';
        }
        if ($this->hover) {
            $options['class'] .= ' table-hover';
        }
        $this->options = array_merge($options, $this->options);
    }

    public function run()
    {
        $tag = new ContentTag('table', '', $this->options);
        $childs = [
            $this->getCaptionTag(),
            $this->getHeadTag(),
            $this->getBodyTag(),
        ];
        foreach ($childs as $child) {
            if ($child) {
                $tag->add($child);
            }
        }

        return $tag->render();
    }

    public function getCaptionTag()
    {
        if (!$this->caption) {
            return null;
        }
        else {
            return new Caption($this->caption);
        }
    }

    public function getHeadTag()
    {
        if (!$this->head) {
            return null;
        }
        elseif (is_array($this->head)) {
            $tr = new Tr();
            $tag = new Thead();
            if (isset($this->head['inverse'])) {
                $tag->class = 'thead-inverse';
            }

            $tag->add($tr);
            foreach ($this->head['items'] as $item) {
                if ($item instanceof Th) {
                    $th = $item;
                }
                else {
                    $th = new Th("$item");
                }
                $tr->add($th);
            }
            return $tag;
        }
        else {
            return new EmptyTag($this->head);
        }
    }

    public function getBodyTag()
    {
        if (!$this->body) {
            return null;
        }
        elseif (is_array($this->body)) {
            $tag = new Tbody();
            foreach ($this->body['items'] as $item) {
                $tr = $this->getBodyRowTag($item);
                $tag->add($tr);
            }
            return $tag;
        }
        else {
            return new EmptyTag($this->body);
        }
    }

    public function getBodyRowTag(array $items)
    {
        $tr = new Tr();

        foreach ($items as $item) {
            if ($item instanceof Td) {
                $td = $item;
            }
            else {
                $td = new Td("$item");
            }
            $tr->add($td);
        }

        return $tr;
    }
}
