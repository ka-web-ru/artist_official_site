<?php

namespace jugger\bootstrap;

class SecondaryButton extends Button
{
    public function __construct(string $content = '', array $options = [])
    {
        $options['type'] = 'secondary';
        parent::__construct($content, $options);
    }
}
