<?php

namespace Tests;


/**
 * A helper. Not a test
 */
class Helper
{

    public static function getHiddenProperty($className, $propertyName, $instance)
    {
        $prop = new \ReflectionProperty($className, $propertyName);
        $prop->setAccessible(true);
        return $prop->getValue($instance);
    }
}
