<?php

namespace jugger\bootstrap;

use jugger\ui\Widget;
use jugger\html\Tag;
use jugger\html\tag\H5;
use jugger\html\tag\Div;

class Modal extends Widget
{
    static $inc = 1;

    public $button;
    public $title;
    public $content;
    public $footer;
    public $large;
    public $options = [];

    public function init()
    {
        $options = [
            'id' => 'modal-id-'. self::$inc++,
            'role' => 'dialog',
            'class' => 'modal',
            'tabindex' => '-1',
            'aria' => [
                'hidden' => true,
            ],
        ];
        $this->options = array_merge($options, $this->options);
    }

    public function run()
    {
        $btn = $this->getButtonTag();
        $win = $this->getModelTag();

        return "{$btn}{$win}";
    }

    public function getButtonTag()
    {
        if ($this->button instanceof Tag) {
            $tag = $this->button;
        }
        else {
            $tag = new Button($this->button, [
                'class' => 'btn btn-primary',
            ]);
        }

        $data = $tag->data ?? [];
        $data['toggle'] = 'modal';
        $data['target'] = '#'.$this->options['id'];
        $tag->data = $data;

        return $tag;
    }

    public function getModelTag()
    {
        $tag = new Div('', $this->options);
        $dialog = $this->getDialogTag();
        $content = $this->getContentTag();

        $tag->add($dialog);
        $dialog->add($content);
        $content->add($this->getHeaderTag());
        $content->add($this->getBodyTag());
        $content->add($this->getFooterTag());

        return $tag;
    }

    public function getDialogTag()
    {
        $tag = new Div('', [
            'class' => 'modal-dialog',
            'role' => 'document',
        ]);
        if ($this->large) {
            $tag->class .= ' modal-lg';
        }

        return $tag;
    }

    public function getContentTag()
    {
        $tag = new Div('', [
            'class' => 'modal-content',
        ]);

        return $tag;
    }

    public function getHeaderTag()
    {
        $tag = new Div('', [
            'class' => 'modal-header',
        ]);
        $title = new H5($this->title, [
            'class' => 'modal-title',
        ]);

        $tag->add($title);
        $tag->add($this->getCloseTag());

        return $tag;
    }

    public function getCloseTag()
    {
        $text = "<span aria-hidden='true'>&times;</span>";
        $tag = new Button($text, [
            'type' => 'button',
            'class' => 'close',
            'data-dismiss' => 'modal',
            'aria-label' => 'Close',
        ]);

        return $tag;
    }

    public function getBodyTag()
    {
        $tag = new Div($this->content, [
            'class' => 'modal-body',
        ]);

        return $tag;
    }

    public function getFooterTag()
    {
        $tag = new Div('', [
            'class' => 'modal-footer',
        ]);
        if (is_array($this->footer)) {
            foreach ($this->footer as $item) {
                $tag->content .= (string) $item;
            }
        }
        else {
            $tag->content = (string) $this->footer;
        }

        return $tag;
    }
}
