<?php namespace Buzz\Control\Objects;

use ReflectionClass;
use ReflectionProperty;

/**
 * Class Object
 *
 * @package Buzz\Control\Objects
 */
abstract class Object
{
    /**
     * @var null
     */
    protected $id;
    /**
     * @var
     */
    protected $created_at;
    /**
     * @var
     */
    protected $updated_at;

    /**
     * @param null $id
     */
    public function __construct($id = null)
    {
        $this->id = $id;
    }

    /**
     * @param array $array
     *
     * @return static
     */
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

    /**
     * @param $created_at
     *
     * @return mixed
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param $updated_at
     *
     * @return mixed
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param bool $skip_null
     *
     * @return array
     */
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
