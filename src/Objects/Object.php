<?php namespace Buzz\Control\Objects;

use ReflectionClass;
use ReflectionProperty;

abstract class Object
{
    public function toArray($skip_null = true)
    {
        $reflect   = new ReflectionClass($this);
        $protected = $reflect->getProperties(ReflectionProperty::IS_PROTECTED);

        $array = [];

        foreach ($protected as $property) {
            $name  = $property->getName();
            $value = $this->$name;

            if ($skip_null && $value === null) {
                continue;
            }

            if (is_array($value)) {
                foreach ($value as $key => $single) {
                    if ($single instanceof Object) {
                        $array[$name][$key] = $single->toArray();
                    } else {
                        $array[$name][$key] = $single;
                    }
                }
            } else {
                if ($value instanceof Object) {
                    $array[$name] = $value->toArray();
                } else {
                    $array[$name] = $value;
                }
            }
        }

        return $array;
    }
}
