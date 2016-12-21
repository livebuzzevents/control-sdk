<?php namespace Buzz\Control\Objects;

use Buzz\Control\Collection;
use Buzz\Control\Objects\Traits\BelongsToOrder;
use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class OrderProduct
 *
 * @package Buzz\Control\Objects
 */
class OrderProduct extends Base
{
    use BelongsToOrder, HasIdentifier;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $shippable;

    /**
     * @var int
     */
    protected $vat_percentage;

    /**
     * @var string
     */
    protected $vat_percentage_formatted;

    /**
     * @var int
     */
    protected $cost;

    /**
     * @var string
     */
    protected $cost_formatted;

    /**
     * @var int
     */
    protected $cost_final;

    /**
     * @var string
     */
    protected $cost_final_formatted;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var \Buzz\Control\Objects\OrderAction[]
     */
    protected $actions;

    /**
     * @return OrderAction[]
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * @param OrderAction[] $actions
     */
    public function setActions($actions)
    {
        $this->actions = new Collection($actions);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getShippable()
    {
        return $this->shippable;
    }

    /**
     * @return int
     */
    public function getVatPercentage()
    {
        return $this->vat_percentage;
    }

    /**
     * @return string
     */
    public function getVatPercentageFormatted()
    {
        return $this->vat_percentage_formatted;
    }

    /**
     * @return int
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @return string
     */
    public function getCostFormatted()
    {
        return $this->cost_formatted;
    }

    /**
     * @return int
     */
    public function getCostFinal()
    {
        return $this->cost_final;
    }

    /**
     * @return string
     */
    public function getCostFinalFormatted()
    {
        return $this->cost_final_formatted;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param string $shippable
     */
    public function setShippable($shippable)
    {
        $this->shippable = $shippable;
    }

    /**
     * @param int $vat_percentage
     */
    public function setVatPercentage($vat_percentage)
    {
        $this->vat_percentage = $vat_percentage;
    }

    /**
     * @param int $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @param int $cost_final
     */
    public function setCostFinal($cost_final)
    {
        $this->cost_final = $cost_final;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

}
