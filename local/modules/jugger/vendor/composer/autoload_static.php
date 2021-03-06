<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8858b7ac1e9e67d2b3cce0916215cf95
{
    public static $prefixLengthsPsr4 = array (
        'j' => 
        array (
            'jugger\\ui\\' => 10,
            'jugger\\model\\' => 13,
            'jugger\\html\\' => 12,
            'jugger\\form\\' => 12,
            'jugger\\fontawesome\\' => 19,
            'jugger\\ds\\' => 10,
            'jugger\\di\\' => 10,
            'jugger\\db\\' => 10,
            'jugger\\data\\' => 12,
            'jugger\\bootstrap\\' => 17,
            'jugger\\bitrix\\' => 14,
            'jugger\\base\\' => 12,
            'jugger\\ar\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'jugger\\ui\\' => 
        array (
            0 => __DIR__ . '/..' . '/jugger-php/jugger-ui/src',
        ),
        'jugger\\model\\' => 
        array (
            0 => __DIR__ . '/..' . '/jugger-php/jugger-model/src',
        ),
        'jugger\\html\\' => 
        array (
            0 => __DIR__ . '/..' . '/jugger-php/jugger-html/src',
        ),
        'jugger\\form\\' => 
        array (
            0 => __DIR__ . '/..' . '/jugger-php/jugger-form/src',
        ),
        'jugger\\fontawesome\\' => 
        array (
            0 => __DIR__ . '/..' . '/jugger-php/jugger-fontawesome/src',
        ),
        'jugger\\ds\\' => 
        array (
            0 => __DIR__ . '/..' . '/jugger-php/jugger-ds/src',
        ),
        'jugger\\di\\' => 
        array (
            0 => __DIR__ . '/..' . '/jugger-php/jugger-di/src',
        ),
        'jugger\\db\\' => 
        array (
            0 => __DIR__ . '/..' . '/jugger-php/jugger-db/src',
        ),
        'jugger\\data\\' => 
        array (
            0 => __DIR__ . '/..' . '/jugger-php/jugger-data/src',
        ),
        'jugger\\bootstrap\\' => 
        array (
            0 => __DIR__ . '/..' . '/jugger-php/jugger-bootstrap/src',
        ),
        'jugger\\bitrix\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'jugger\\base\\' => 
        array (
            0 => __DIR__ . '/..' . '/jugger-php/jugger-base/src',
        ),
        'jugger\\ar\\' => 
        array (
            0 => __DIR__ . '/..' . '/jugger-php/jugger-ar/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8858b7ac1e9e67d2b3cce0916215cf95::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8858b7ac1e9e67d2b3cce0916215cf95::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
