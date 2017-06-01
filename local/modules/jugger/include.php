<?php

include_once __DIR__.'/vendor/autoload.php';

$loader = new jugger\base\Autoloader();
$loader->addNamespace('jugger\\bitrix', __DIR__.'/lib');
$loader->register();
