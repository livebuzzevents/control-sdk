<?php namespace Buzz\Control\Objects\Exhibitor;

use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Parameter;

/**
 * Class Property
 *
 * @package Buzz\Control\Exhibitor
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
    protected $exhibitor_id;

    /**
     * @return mixed
     */
    public function getExhibitorId()
    {
        return $this->exhibitor_id;
    }

    /**
     * @param mixed $exhibitor_id
     */
    public function setExhibitorId($exhibitor_id)
    {
        $this->exhibitor_id = $exhibitor_id;
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
