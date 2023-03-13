<?php

namespace Tests;

use PhpParser\Node\Expr\Cast\Object_;

/**
 * A helper. Not a test
 */
class Helper
{

    public static function getHiddenProperty(Object $instance, $propertyName)
    {
        $prop = new \ReflectionProperty($instance::class, $propertyName);
        $prop->setAccessible(true);
        return $prop->getValue($instance);
    }
}
