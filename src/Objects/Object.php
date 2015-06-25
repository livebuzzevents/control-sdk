<?php namespace Buzz\Control\Objects;

use DateTime;
use ReflectionClass;
use ReflectionProperty;

/**
 * @Annotation
 * Class Object
 *
 * @package Buzz\Control\Objects
 */
abstract class Object
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var \DateTime
     */
    protected $created_at;

    /**
     * @var \DateTime
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

            $type = self::getAnnotationVarType($property);

            if (strpos($type, '[]') !== false) { //array
                $type          = trim($type, '[]');
                $object->$name = [];
                foreach ($array[$name] as $key => $single) {
                    $object->{$name}[$key] = self::castSingleProperty($type, $single);
                }
            } else {
                $object->$name = self::castSingleProperty($type, $array[$name]);
            }
        }

        return $object;
    }

    /**
     * @param $property
     *
     * @return bool
     */
    private static function getAnnotationVarType($property)
    {
        $comment = $property->getDocComment();

        preg_match_all('/@var(.*)?\n/', $comment, $var);

        if (empty($var) || empty($var[1]) || empty($var[1][0])) {
            return false;
        }

        $value = trim($var[1][0]);

        if (empty($value)) {
            return false;
        }

        $type = explode(' ', $value)[0];

        return $type;
    }

    /**
     * @param $type
     * @param $value
     *
     * @return DateTime|float|int
     */
    private static function castSingleProperty($type, $value)
    {
        if ($type === 'int') {
            return intval($value);
        } elseif ($type === 'float') {
            return floatval($value);
        } elseif (class_exists($type)) {
            if ($type === '\DateTime') {
                return (new \DateTime())->setTimestamp(strtotime($value));
            } else {
                return $type::createFromArray($value);
            }
        } else { //all other types, including non specified arrays
            return $value;
        }
    }

    public function __get($key, $value)
    {
        $method = 'get' . str_replace(' ', '', ucwords(str_replace(['_'], ' ', $value)));

        return $this->{$method}($key);
    }

    public function __set($key, $value)
    {
        $method = 'set' . str_replace(' ', '', ucwords(str_replace(['_'], ' ', $value)));

        return $this->{$method}($key, $value);
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param DateTime $created_at
     *
     * @return mixed
     */
    public function setCreatedAt(DateTime $created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getSavedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param DateTime $updated_at
     *
     * @return mixed
     */
    public function setSavedAt(DateTime $updated_at)
    {
        $this->updated_at = $updated_at;
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
            $name = $property->getName();

            if (in_array($name, ['objectMap'])) { //skip
                continue;
            }

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
                } elseif ($value instanceof DateTime) {
                    $array[$name] = $value->format(DateTime::ISO8601);
                } else {
                    $array[$name] = $value;
                }
            }
        }

        return $array;
    }
}
