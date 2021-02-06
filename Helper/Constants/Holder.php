<?php


namespace Helper\Constants;


use MyCLabs\Enum\Enum;
use ReflectionClass;

class Holder extends Enum
{
    /*public static function getConstants(): ReflectionClass
    {
        return new ReflectionClass(static::class); // TODO : FWTLD
    }*/

    public static function values(): array
    {
        $values = [];
        foreach (parent::values() as $name => $value) {
            $out[] = $value;
        }
        return $values;
    }
}
