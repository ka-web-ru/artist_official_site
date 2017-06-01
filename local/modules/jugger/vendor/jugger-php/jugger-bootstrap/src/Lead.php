<?php

namespace jugger\bootstrap;

use jugger\html\tag\P;

class Lead extends P
{
    public function __construct(string $content, array $options = [])
    {
        $options['class'] = "lead";
        parent::__construct($content, $options);
    }
}
