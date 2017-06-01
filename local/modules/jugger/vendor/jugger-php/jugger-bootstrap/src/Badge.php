<?php

namespace jugger\bootstrap;

use jugger\ui\Widget;
use jugger\html\tag\Span;

class Badge extends Widget
{
    public $pill;
    public $type;
    public $content;
    public $options = [];

    public function init()
    {
        $options = [
            'class' => 'badge',
        ];
        if ($this->type) {
            $options['class'] .= " badge-{$this->type}";
        }
        if ($this->pill) {
            $options['class'] .= " badge-pill";
        }
        $this->options = array_merge($options, $this->options);
    }

    public function run()
    {
        $tag = new Span($this->content, $this->options);
        return $tag->render();
    }
}
