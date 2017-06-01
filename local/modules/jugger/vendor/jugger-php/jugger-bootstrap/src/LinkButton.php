<?php

namespace jugger\bootstrap;

use jugger\html\Html;

class LinkButton extends Button
{
    public function __construct(string $content, string $href = '#', array $options = [])
    {
        $default = [
            'type' => 'link',
            'href' => $href,
        ];
        parent::__construct($content, array_merge($default, $options));
        $this->name = 'a';
        $this->type = null;
        $this->role = $options['role'] ?? 'button';
    }
}
