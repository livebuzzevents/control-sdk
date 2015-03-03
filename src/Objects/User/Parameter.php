<?php namespace Buzz\Control\Objects\User;

use Buzz\Control\Objects\Object;

/**
 * Class Parameter
 *
 * @package Buzz\Control\User
 */
class Parameter extends Object
{
    /**
     * @var
     */
    protected $id;
    /**
     * @var
     */
    protected $parameter;
    /**
     * @var
     */
    protected $value;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * @param mixed $parameter
     */
    public function setParameter($parameter)
    {
        $this->parameter = $parameter;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}
