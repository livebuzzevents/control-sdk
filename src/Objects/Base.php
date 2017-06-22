<?php

namespace Buzz\Control\Objects;

use Buzz\Control\Arrayable;
use Buzz\Control\Collection;
use Buzz\Control\Objects\Traits\Translatable;
use DateTime;
use JsonSerializable;
use ReflectionClass;
use ReflectionProperty;

/**
 * @Annotation
 * Class Base
 *
 * @package Buzz\Control\Objects
 */
abstract class Base implements Arrayable, JsonSerializable
{
    use Translatable;

    /**
     * @var string
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
     * Creates new object
     * if data is object or array it clones all fields
     * else it sets the Id
     *
     * @param null|int|array|\StdClass $data
     */
    public function __construct($data = null)
    {
        if (is_object($data)) {
            $this->copy($data);
        } elseif (is_array($data)) {
            $this->copyFromArray($data);
        } else {
            $this->id = $data;
        }
    }

    /**
     * @todo REMOVE THOSE LINES WHEN CAMPAIGN IS REMOVED FROM ALL CONSUMER PROJECTS
     */
    public function setCampaign()
    {
        //do nothing
    }

    public function setCampaignId()
    {
        //do nothing
    }

    public function getCampaign()
    {
        return null;
    }

    public function getCampaignId()
    {
        return null;
    }

    /**
     * Copies attributes from target object
     *
     * @param \StdClass $target
     *
     * @return $this
     */
    public function copy($target)
    {
        $reflect   = new ReflectionClass($this);
        $protected = $reflect->getProperties(ReflectionProperty::IS_PROTECTED);

        foreach ($protected as $property) {
            $name = $property->getName();

            if (isset($target->{$name})) {
                $this->{$property->getName()} = $target->{$property->getName()};
            }
        }

        return $this;
    }

    /**
     * Creates object from array
     *
     * @param array $array
     *
     * @return static
     */
    public function copyFromArray(array $array)
    {
        $reflect   = new ReflectionClass($this);
        $protected = $reflect->getProperties(ReflectionProperty::IS_PROTECTED);

        foreach ($protected as $property) {

            $name = $property->getName();

            if (!isset($array[$name])) {
                continue;
            }

            $type = self::getAnnotationVarType($property);

            if (strpos($type, '[]') !== false) { //array
                $type        = trim($type, '[]');
                $this->$name = new Collection();
                foreach ($array[$name] as $key => $single) {
                    $this->{$name}[$key] = self::castSingleProperty($type, $single);
                }
            } else {
                $this->$name = self::castSingleProperty($type, $array[$name]);
            }
        }

        return $this;
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
     * @return DateTime|float|int|object
     */
    private static function castSingleProperty($type, $value)
    {
        if ($type === 'int') {
            return intval($value);
        } elseif ($type === 'float') {
            return floatval($value);
        } elseif ($type === 'bool') {
            return boolval($value);
        } elseif (class_exists($type)) {
            if ($type === '\DateTime') {
                return (new \DateTime())->setTimestamp(strtotime($value));
            } else {
                return new $type($value);
            }
        } elseif ($type === 'object') {
            return (object) $value;
        } else { //all other types, including non specified arrays
            return $value;
        }
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        $method = 'get' . str_replace(' ', '', ucwords(str_replace(['_'], ' ', $key)));

        return $this->{$method}($key);
    }

    /**
     * @param $key
     * @param $value
     *
     * @return mixed
     */
    public function __set($key, $value)
    {
        $method = 'set' . str_replace(' ', '', ucwords(str_replace(['_'], ' ', $key)));

        return $this->{$method}($value);
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function __isset($key)
    {
        return isset($this->$key);
    }

    /**
     * @param $key
     */
    public function __unset($key)
    {
        unset($this->$key);
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
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param DateTime $updated_at
     *
     * @return mixed
     */
    public function setUpdatedAt(DateTime $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @return string
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
     * @return string
     */
    function jsonSerialize()
    {
        return $this->toArray();
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

            $value = $this->$name;

            if ($skip_null && $value === null) {
                continue;
            }

            if (empty($value)) { //handle [] and ''
                $array[$name] = $value;
            }

            if (is_array($value)) {
                foreach ($value as $key => $single) {
                    if ($single instanceof Arrayable) {
                        $array[$name][$key] = $single->toArray();
                    } else {
                        $array[$name][$key] = $single;
                    }
                }
            } else {
                if ($value instanceof Arrayable) {
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

    protected function add(&$property, $value)
    {
        if (!$property) {
            $property = new Collection();
        }

        $property[] = $value;
    }
}
