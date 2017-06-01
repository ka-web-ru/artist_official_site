<?php

namespace jugger\bootstrap;

use jugger\ui\Widget;
use jugger\html\tag\Div;

class ButtonGroup extends Widget
{
    public $size;
    public $vertical;
    public $items = [];
    public $options = [];

    public function init()
    {
        $options = [
            'class' => 'btn-group',
            'role' => 'group',
        ];

        if ($this->vertical) {
            $options['class'] = 'btn-group-vertical';
        }
        if ($this->size) {
            $options['class'] .= ' btn-group-'. $this->size;
        }

        $this->options = array_merge($options, $this->options);
    }

    public function run()
    {
        $tag = new Div('', $this->options);

        foreach ($this->getItemsTags() as $child) {
            $tag->add($child);
        }
        return $tag->render();
    }

    public function getItemsTags()
    {
        if (empty($this->items)) {
            return [];
        }

        $tags = [];
        foreach ($this->items as $item) {
            if ($item instanceof Button) {
                $tags[] = $item;
            }
            else {
                $tags[] = new Button($item);
            }
        }
        return $tags;
    }
}
