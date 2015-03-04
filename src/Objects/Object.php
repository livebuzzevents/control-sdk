<?php namespace Buzz\Control\Objects;

use ReflectionClass;
use ReflectionProperty;

abstract class Object
{
    protected $id;

    public function __construct($id = null)
    {
        $this->id = $id;
    }

    public static function createFromArray(array $array)
    {
        $object = new static;

        $reflect   = new ReflectionClass($object);
        $protected = $reflect->getProperties(ReflectionProperty::IS_PROTECTED);

        foreach ($protected as $property) {
            $name = $property->getName();

            if (!isset($array[$name])) {
                continue;
            }

            $object->$name = $array[$name];
        }

        return $object;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

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
