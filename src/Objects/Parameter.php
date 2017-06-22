<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\HasIdentifier;
use Buzz\Control\Objects\Traits\Translatable;

/**
 * Class Parameter
 *
 * @package Buzz\Control\Objects
 */
class Parameter extends Base
{
    use HasIdentifier,
        Translatable;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $rules;

    /**
     * @var Property[]
     */
    protected $properties;

    /**
     * @var Property[]
     */
    protected $customer_properties;

    /**
     * @var Property[]
     */
    protected $exhibitor_properties;

    /**
     * @var Property[]
     */
    protected $product_properties;

    /**
     * @return array
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * @param array $rules
     */
    public function setRules($rules)
    {
        $this->rules = $rules;
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Property[]
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @return Property[]
     */
    public function getCustomerProperties()
    {
        return $this->customer_properties;
    }

    /**
     * @return Property[]
     */
    public function getExhibitorProperties()
    {
        return $this->exhibitor_properties;
    }

    /**
     * @return Property[]
     */
    public function getProductProperties()
    {
        return $this->product_properties;
    }
}
