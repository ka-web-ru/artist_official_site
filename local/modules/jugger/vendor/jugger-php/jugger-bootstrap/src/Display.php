<?php

namespace jugger\bootstrap;

use jugger\html\tag\H1;

class Display extends H1
{
    public function __construct(string $content, int $size = 1, array $options = [])
    {
        $options['class'] = "display-{$size}";
        parent::__construct($content, $options);
    }
}
