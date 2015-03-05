<?php namespace Buzz\Control\Objects;

/**
 * Class Question
 *
 * @package Buzz\Control\Objects
 */
class Question extends Object
{
    /**
     * @var
     */
    protected $name;
    /**
     * @var
     */
    protected $type;
    /**
     * @var
     */
    protected $options;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param mixed $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }
}