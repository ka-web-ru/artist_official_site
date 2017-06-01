<?php

namespace jugger\base;

class Object
{
	use GetSetTrait;

	public function __construct(array $config = [])
	{
		Configurator::setValues($this, $config);
	}
}
