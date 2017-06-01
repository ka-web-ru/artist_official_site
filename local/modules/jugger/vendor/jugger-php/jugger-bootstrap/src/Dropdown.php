<?php

namespace jugger\bootstrap;

use jugger\ui\Widget;
use jugger\html\ContentTag;
use jugger\html\tag\H6;
use jugger\html\tag\Div;
use jugger\html\tag\Link;
use jugger\html\tag\Button;

class Dropdown extends Widget
{
    public $split;
    public $right;
    public $items = [];
    public $button;
    public $header;
    public $dropup;
    public $options = [];

    public function init()
    {
        $options = [
            'class' => 'dropdown',
        ];

        if ($this->dropup) {
            $options['class'] .= ' dropup';
        }
        $this->options = array_merge($options, $this->options);
    }

    public function run()
    {
        $tag = new Div('', $this->options);
        $childs = [
            $this->getButtonTag(),
            $this->getSplitTag(),
            $this->getMenuTag(),
        ];
        foreach ($childs as $child) {
            if ($child) {
                $tag->add($child);
            }
        }

        return $tag->render();
    }

    public function getButtonTag()
    {
        if ($this->button instanceof ContentTag) {
            $tag = $this->button;
        }
        else {
            $tag = new Button($this->button, [
                'type' => 'button',
                'class' => 'btn btn-secondary',
            ]);
        }

        if ($this->split) {
            return $tag;
        }
        else {
            return $this->setToggleOptions($tag);
        }
    }

    public function getSplitTag()
    {
        if (!$this->split) {
            return null;
        }

        $tag = new SecondaryButton("<span class='sr-only'>Toggle Dropdown</span>");
        $tag->class .= " dropdown-toggle-split";
        return $this->setToggleOptions($tag);
    }

    public function setToggleOptions(ContentTag $tag)
    {
        foreach ($this->getButtonOptions() as $name => $value) {
            if ($name == 'class') {
                $tag->class .= " {$value}";
            }
            else {
                $tag->$name = $value;
            }
        }
        return $tag;
    }

    public function getButtonOptions()
    {
        return [
            'class' => 'dropdown-toggle',
            'data' => [
                'toggle' => 'dropdown',
            ],
            'aria' => [
                'haspopup' => true,
                'expanded' => false,
            ],
        ];
    }

    public function getMenuTag()
    {
        $tag = new Div('', [
            'class' => 'dropdown-menu',
        ]);
        if ($this->right) {
            $tag->class .= " dropdown-menu-right";
        }
        if ($this->header) {
            $header = new H6($this->header, [
                'class' => 'dropdown-header',
            ]);
            $tag->add($header);
        }

        foreach ($this->items as $item) {
            if (empty($item)) {
                $divider = new Div('', [
                    'class' => 'dropdown-divider',
                ]);
                $tag->add($divider);
                continue;
            }
            elseif ($item instanceof Link) {
                $child = $item;
            }
            else {
                $child = new Link($item);
            }

            $child->class = 'dropdown-item';
            $tag->add($child);
        }
        return $tag;
    }
}
