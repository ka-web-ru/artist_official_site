<?php

namespace jugger\base;

abstract class Configurator
{
	public static function setValues($object, array $config)
	{
		if (empty($config)) {
			return;
		}
		foreach ($config as $name => $value) {
			$object->$name = $value;
		}
	}
}
