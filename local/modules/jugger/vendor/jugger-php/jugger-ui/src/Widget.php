<?php

namespace jugger\ui;

use jugger\base\Configurator;

abstract class Widget
{
    public function __construct(array $options = [])
    {
        Configurator::setValues($this, $options);
        $this->init();
    }

    public function init()
    {

    }

    public function render()
    {
        try {
            ob_start();
            $content  = $this->run();
            $content .= ob_get_contents();
            return $content;
        }
        finally {
            ob_end_clean();
        }
    }

    public function __toString()
    {
        return $this->render();
    }

    abstract public function run();

    public static function widget(array $options = [])
    {
        $class = get_called_class();
        $class = new $class($options);
        return $class->render();
    }
}
