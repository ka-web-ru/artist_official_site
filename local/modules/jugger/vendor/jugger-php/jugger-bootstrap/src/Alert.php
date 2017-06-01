<?php

namespace jugger\bootstrap;

use jugger\ui\Widget;
use jugger\html\ContentTag;
use jugger\html\tag\P;
use jugger\html\tag\Div;
use jugger\html\tag\Button;

class Alert extends Widget
{
    public $type;
    public $content;
    public $header;
    public $dismiss;
    public $options = [];

    public function init()
    {
        $options = [
            'class' => 'alert',
            'role' => 'alert',
        ];
        if ($this->type) {
            $options['class'] .= " alert-{$this->type}";
        }

        $this->options = array_merge($options, $this->options);
    }

    public function run()
    {
        $tag = new Div('', $this->options);
        $childs = [
            $this->getDismissTag(),
            $this->getHeaderTag(),
            $this->getContentTag(),
        ];
        foreach ($childs as $child) {
            if ($child) {
                $tag->add($child);
            }
        }

        return $tag->render();
    }

    public function getDismissTag()
    {
        if (!$this->dismiss) {
            return null;
        }

        $tag = new Button('<span aria-hidden="true">&times;</span>', [
            'type' => 'button',
            'class' => 'close',
            'data' => [
                'dismiss' => 'alert',
            ],
            'aria' => [
                'label' => 'Close',
            ],
        ]);
        return $tag;
    }

    public function getHeaderTag()
    {
        if (!$this->header) {
            return null;
        }

        $tag = new ContentTag('h4', $this->header, [
            'class' => 'alert-heading',
        ]);
        return $tag;
    }

    public function getContentTag()
    {
        if (!$this->content) {
            return null;
        }

        return new P($this->content);
    }
}
