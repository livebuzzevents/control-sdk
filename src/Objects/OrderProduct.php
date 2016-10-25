<?php namespace Buzz\Control\Objects;

use Buzz\Control\Collection;
use Buzz\Control\Objects\Traits\BelongsToOrder;
use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class OrderProduct
 *
 * @package Buzz\Control\Objects
 */
class OrderProduct extends Object
{
    use BelongsToOrder, HasIdentifier;

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

}
