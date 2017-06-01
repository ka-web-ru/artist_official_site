<?php

namespace jugger\bootstrap;

class InfoButton extends Button
{
    public function __construct(string $content = '', array $options = [])
    {
        $options['type'] = 'info';
        parent::__construct($content, $options);
    }
}
