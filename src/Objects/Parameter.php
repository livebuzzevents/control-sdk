<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class Parameter
 *
 * @package Buzz\Control\Objects
 */
class Parameter extends Object
{
    use BelongsToCampaign, HasIdentifier;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $rules;

    /**
     * @var Customer\Property[]
     */
    protected $customerProperties;

    /**
     * @var Exhibitor\Property[]
     */
    protected $exhibitorProperties;

    /**
     * @var Badge\Property[]
     */
    protected $badgeProperties;

    /**
     * @var Product\Property[]
     */
    protected $productProperties;

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
     * @return Customer\Property[]
     */
    public function getCustomerProperties()
    {
        return $this->customerProperties;
    }

    /**
     * @return Exhibitor\Property[]
     */
    public function getExhibitorProperties()
    {
        return $this->exhibitorProperties;
    }

    /**
     * @return Badge\Property[]
     */
    public function getBadgeProperties()
    {
        return $this->badgeProperties;
    }

    /**
     * @return Product\Property[]
     */
    public function getProductProperties()
    {
        return $this->productProperties;
    }
}