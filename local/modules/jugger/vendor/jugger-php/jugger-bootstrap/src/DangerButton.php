<?php

namespace jugger\bootstrap;

class DangerButton extends Button
{
    public function __construct(string $content = '', array $options = [])
    {
        $options['type'] = 'danger';
        parent::__construct($content, $options);
    }
}
