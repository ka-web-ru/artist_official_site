<?php

namespace jugger\bootstrap;

use jugger\ui\Widget;
use jugger\html\EmptyTag;
use jugger\html\ContentTag;
use jugger\html\tag\Li;
use jugger\html\tag\Ol;

class Breadcrumb extends Widget
{
    public $items = [];
    public $options = [];

    public function init()
    {
        $options = [
            'class' => 'breadcrumb',
        ];
        $this->options = array_merge($options, $this->options);
    }

    public function run()
    {
        $tag = new Ol('', $this->options);
        foreach ($this->items as $item) {
            if (is_scalar($item)) {
                $li = new EmptyTag($item);
            }
            else {
                $li = new Li("{$item}", [
                    'class' => 'breadcrumb-item',
                ]);
                if ($item === end($this->items)) {
                    $li->class .= ' active';
                }
            }
            $tag->add($li);
        }

        return $tag->render();
    }
}
