<?php

namespace jugger\bootstrap;

use jugger\ui\Widget;
use jugger\html\Tag;
use jugger\html\tag\Ul;
use jugger\html\tag\Li;
use jugger\html\tag\Link;

class Nav extends Widget
{
    public $items = [];
    public $options = [];

    public function init()
    {
        $options = [
            'class' => 'nav',
        ];
        $this->options = array_merge($options, $this->options);
    }

    public function run()
    {
        $tag = new Ul('', $this->options);

        foreach ($this->items as $item) {
            $child = $this->getItemTag($item);
            $tag->add($child);
        }

        return $tag->render();
    }

    public function getItemTag($item)
    {
        $li = new Li('', [
            'class' => 'nav-item',
        ]);

        if ($item instanceof Link) {
            $link = $item;
            $link->class .= ' nav-link';
        }
        elseif ($item instanceof Tag) {
            $link = $item;
        }
        elseif (is_array($item)) {
            $content = $item['content'];
            if ($content instanceof Dropdown) {
                $li->class .= ' dropdown';
            }

            $link = $this->getLinkTag($content);
            if (isset($item['active'])) {
                $link->class .= ' active';
            }
            elseif (isset($item['disabled'])) {
                $link->class .= ' disabled';
            }
        }
        else {
            $link = new Link("{$item}");
        }

        $li->content = $link;
        return $li;
    }

    public function getLinkTag($content)
    {
        if ($content instanceof Link) {
            $link = $content;
        }
        elseif ($content instanceof Dropdown) {
            $content->button->class .= ' nav-link';
            $re = '/^<div[^>]*>(.+)<\/div>$/';
            preg_match($re, $content->render(), $m);

            return $m[1];
        }
        else {
            throw new \ErrorException("Property `content` in `item` must be extends `Link` or `Dropdown`");
        }

        $link->class .= ' nav-link';
        return $link;
    }
}
