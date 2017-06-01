<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class P extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('p', $content, $options);
    }
}
