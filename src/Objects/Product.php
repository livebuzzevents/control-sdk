<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\HasBadgeType;
use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class Product
 *
 * @package Buzz\Control\Objects\Channel
 */
class Product extends Object
{
    use BelongsToCampaign, HasBadgeType, HasIdentifier;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var int
     */
    protected $cost;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $shippable;

    /**
     * @return string
     */
    public function getShippable()
    {
        return $this->shippable;
    }

    /**
     * @param string $shippable
     */
    public function setShippable($shippable)
    {
        $this->shippable = $shippable;
    }

    /**
     * @return string
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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param int $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
}