<?php namespace Buzz\Control\Objects\Customer;

use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Parameter;

/**
 * Class Property
 *
 * @package Buzz\Control\Customer
 */
class Property extends Object
{
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
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * @param mixed $parameter
     */
    public function setParameter(Parameter $parameter)
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
