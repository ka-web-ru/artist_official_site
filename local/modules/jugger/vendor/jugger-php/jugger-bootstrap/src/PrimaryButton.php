<?php

namespace jugger\bootstrap;

class PrimaryButton extends Button
{
    public function __construct(string $content = '', array $options = [])
    {
        $options['type'] = 'primary';
        parent::__construct($content, $options);
    }
}
