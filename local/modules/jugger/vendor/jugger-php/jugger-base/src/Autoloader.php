<?php

namespace jugger\base;

/**
 * @link http://www.php-fig.org/psr/psr-4/examples/
 */
class Autoloader
{
	protected $classMap = [];
	protected $prefixes = [];

    public function register()
	{
        spl_autoload_register(array($this, 'loadClass'));
    }

	public function addClass($class, $file)
	{
		$this->classMap[$class] = $file;
	}

	public function addClasses(array $classMap)
	{
		foreach ($classMap as $class => $file) {
			$this->addClass($class, $file);
		}
	}

    public function addNamespace($prefix, $baseDir, $prepend = false)
	{
        $prefix = trim($prefix, '\\') . '\\';
        $baseDir = rtrim($baseDir, DIRECTORY_SEPARATOR) . '/';
        if (isset($this->prefixes[$prefix]) === false) {
            $this->prefixes[$prefix] = array();
        }

        if ($prepend) {
            array_unshift($this->prefixes[$prefix], $baseDir);
        }
		else {
            array_push($this->prefixes[$prefix], $baseDir);
        }
    }

    public function loadClass($class)
	{
		$file = $this->classMap[$class] ?? false;
		if ($file && $this->requireFile($file)) {
			return $file;
		}

        $prefix = $class;
        while (false !== $pos = strrpos($prefix, '\\')) {
            $prefix = substr($class, 0, $pos + 1);
            $relativeClass = substr($class, $pos + 1);
            $mappedFile = $this->loadMappedFile($prefix, $relativeClass);

            if ($mappedFile) {
                return $mappedFile;
            }
            $prefix = rtrim($prefix, '\\');
        }
        return false;
    }

    protected function loadMappedFile($prefix, $relativeClass)
	{
        if (isset($this->prefixes[$prefix]) === false) {
            return false;
        }
        foreach ($this->prefixes[$prefix] as $baseDir) {
            $file = $baseDir
                  . str_replace('\\', '/', $relativeClass)
                  . '.php';

            if ($this->requireFile($file)) {
                return $file;
            }
        }
        return false;
    }

    protected function requireFile($file)
	{
        if (file_exists($file)) {
            require $file;
            return true;
        }
        return false;
    }
}
