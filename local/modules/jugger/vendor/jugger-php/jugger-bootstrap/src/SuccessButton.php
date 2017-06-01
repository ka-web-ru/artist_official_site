<?php

namespace jugger\bootstrap;

class SuccessButton extends Button
{
    public function __construct(string $content = '', array $options = [])
    {
        $options['type'] = 'success';
        parent::__construct($content, $options);
    }
}
