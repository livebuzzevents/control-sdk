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
     * @var
     */
    protected $customer_id;

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * @param mixed $customer_id
     */
    public function setCustomerId($customer_id)
    {
        $this->customer_id = $customer_id;
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
