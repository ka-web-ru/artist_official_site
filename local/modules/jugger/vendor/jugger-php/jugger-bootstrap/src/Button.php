<?php

namespace jugger\bootstrap;

use jugger\ds\Ds;
use jugger\html\ContentTag;

class Button extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        $this->class = 'btn';
        $this->type = 'button';
        $options = Ds::arr($options);

        if ($options['type'] && $options['outline']) {
            $this->class .= " btn-outline-{$options['type']}";
        }
        elseif ($options['type']) {
            $this->class .= " btn-{$options['type']}";
        }
        if (in_array($options['size'], ['sm', 'lg'])) {
            $this->class .= " btn-{$options['size']}";
        }
        if ($options['block']) {
            $this->class .= " btn-block";
        }
        if ($options['active']) {
            $this->class .= " active";
        }

        $options->remove('type', 'outline', 'size', 'block', 'active');
        parent::__construct('button', $content, $options->toArray());
    }
}
