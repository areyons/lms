<?php


namespace lms;


class Registry
{

    use TSingletone;

    protected static $properties = [];


    // Set choosed properties

    public function setProperties($name, $value)
    {
        self::$properties[$name] = $value;
    }

    // Get choosed property

    public static function getProperty($name)
    {
        if (isset(self::$properties[$name])) {
            return self::$properties[$name];
        }

        return null;
    }


    // Get all properties

    public static function getProperties()
    {
        return self::$properties;
    }


}