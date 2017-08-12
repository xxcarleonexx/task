<?php


namespace task\core;


use DomainException;

class BaseApplication
{

    public static $classMap = [];

    /**
     * @param string $className
     */
    public static function autoload($className)
    {
        if (isset(static::$classMap[$className])) {
            $classFile = static::$classMap[$className];
        } else {
            return;
        }

        include($classFile);

        if (YII_DEBUG && !class_exists($className, false) &&
            !interface_exists($className, false) &&
            !trait_exists($className, false)) {
            throw new DomainException("Unable to find '$className' in file: $classFile.");
        }
    }

}
