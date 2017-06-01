<?php

namespace jugger\bootstrap;

class WarningButton extends Button
{
    public function __construct(string $content = '', array $options = [])
    {
        $options['type'] = 'warning';
        parent::__construct($content, $options);
    }
}
