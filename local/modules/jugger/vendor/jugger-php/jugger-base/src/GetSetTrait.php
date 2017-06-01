<?php

namespace jugger\base;

trait GetSetTrait
{
    public function __get($name)
	{
		$method = "get".$name;
		if (method_exists($this, $method)) {
			return $this->$method();
		}
		elseif (method_exists($this, "set".$name)) {
			throw new \ErrorException("Property '{$name}' is write-only");
		}
		else {
			throw new \ErrorException("Property '{$name}' not found");
		}
	}

	public function __set($name, $value)
	{
		$method = "set".$name;
		if (method_exists($this, $method)) {
			$this->$method($value);
		}
		elseif (method_exists($this, "get".$name)) {
			throw new \ErrorException("Property '{$name}' is read-only");
		}
		else {
			throw new \ErrorException("Property '{$name}' not found");
		}
	}
}
