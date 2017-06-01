<?php

namespace jugger\base;

abstract class Singleton
{
    private static $instances = [];

    protected function __construct()
    {
        // pass
    }

    public static function getInstance()
    {
        $class = get_called_class();
        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new $class();
        }
        return self::$instances[$class];
    }
}
