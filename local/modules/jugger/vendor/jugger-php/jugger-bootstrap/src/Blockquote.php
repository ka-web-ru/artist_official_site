<?php

namespace jugger\bootstrap;

use jugger\html\ContentTag;
use jugger\html\tag\Footer;

class Blockquote extends ContentTag
{
    public function __construct(string $content, array $options = [])
    {
        $options['class'] = 'blockquote';
        if (isset($options['reverse'])) {
            $options['class'] .= ' blockquote-reverse';
            unset($options['reverse']);
        }

        $footer = "";
        if (isset($options['footer'])) {
            $footer = $options['footer'];
            unset($options['footer']);
        }

        parent::__construct('blockquote', $content, $options);

        if ($footer) {
            $footer = new Footer($footer, [
                'class' => 'blockquote-footer',
            ]);
            $this->add($footer);
        }
    }
}
