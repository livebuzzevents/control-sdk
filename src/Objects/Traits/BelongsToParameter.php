<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Objects\Parameter;

/**
 * Class BelongsToParameter
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToParameter
{
    /**
     * @var string
     */
    protected $parameter_id;

    /**
     * @var \Buzz\Control\Objects\Parameter
     */
    protected $parameter;

    /**
     * @return \Buzz\Control\Objects\Parameter
     */
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * @param \Buzz\Control\Objects\Parameter $parameter
     */
    public function setParameter(Parameter $parameter)
    {
        $this->parameter = $parameter;
    }

    /**
     * @return string
     */
    public function getParameterId()
    {
        return $this->parameter_id;
    }

    /**
     * @param string $parameter_id
     */
    public function setParameterId($parameter_id)
    {
        $this->parameter_id = $parameter_id;
    }
}