<?php

namespace jugger\fontawesome;

use jugger\html\ContentTag;

abstract class Fa
{
    public static function tag($class, $size = 0, array $options = [])
    {
        $class = "fa fa-{$class}";
        if ($size > 1) {
            $class .= " fa-{$size}x";
        }
        elseif ($size == 1) {
            $class .= " fa-lg";
        }

        if (isset($options['li'])) {
            $class .= ' fa-li';
        }
        if (isset($options['spin'])) {
            $class .= ' fa-spin';
        }
        if (isset($options['pulse'])) {
            $class .= ' fa-pulse';
        }
        if (isset($options['class'])) {
            $class .= ' '. $options['class'];
        }

        return new ContentTag('i', '', [
            'class' => $class,
            'aria' => [
                'hidden' => 'true',
            ],
        ]);
    }

    public static function i($class, $size = 0, array $options = [])
    {
        return self::tag($class, $size, $options)->render();
    }
}
