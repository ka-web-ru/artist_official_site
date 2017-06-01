<?php

namespace jugger\bootstrap;

use jugger\ui\Widget;
use jugger\html\Tag;
use jugger\html\tag\Ul;
use jugger\html\tag\Li;
use jugger\html\tag\Div;
use jugger\html\tag\Link;

class ListGroup extends Widget
{
    public $items;
    public $links;
    public $options = [];

    public function init()
    {
        $options = [
            'class' => 'list-group',
        ];
        $this->options = array_merge($options, $this->options);
    }

    public function isLinksList()
    {
        return !empty($this->links);
    }

    public function run()
    {
        $tag = $this->getMainTag();

        foreach ($this->getItems() as $item) {
            if ($this->isLinksList()) {
                $tag->add($this->getItemLinkTag($item));
            }
            else {
                $tag->add($this->getItemLiTag($item));
            }
        }
        return $tag->render();
    }

    public function getMainTag()
    {
        if ($this->items) {
            return new Ul('', $this->options);
        }
        elseif ($this->links) {
            return new Div('', $this->options);
        }
        else {
            throw new \ErrorException("Properties 'items' and 'links' is required");
        }
    }

    public function getItems(): array
    {
        return $this->items ?? $this->links;
    }

    public function getItemLiTag($item)
    {
        $tag = new Li('', [
            'class' => 'list-group-item',
        ]);

        if ($item instanceof Tag) {
            $tag->add($item);
        }
        elseif (is_array($item)) {
            $tag->content = (string) $item['content'];
            if (isset($item['active'])) {
                $tag->class .= ' active';
            }
            elseif (isset($item['disabled'])) {
                $tag->class .= ' disabled';
            }
        }
        else {
            $tag->content = (string) $item;
        }

        return $tag;
    }

    public function getItemLinkTag($item)
    {
        if ($item instanceof Link) {
            $tag = $item;
        }
        elseif (is_array($item)) {
            $tag = $item['content'];
            if (isset($item['disabled'])) {
                $tag->class .= ' disabled';
            }
        }

        $tag->class = 'list-group-item ' . $tag->class;
        if (is_array($item) && isset($item['active'])) {
            $tag->class .= ' active';
        }
        else {
            $tag->class .= ' list-group-item-action';
        }

        return $tag;
    }
}
