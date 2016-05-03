<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class BelongsToOrder
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToOrder
{
    /**
     * @var string
     */
    protected $order_id;

    /**
     * @var \Buzz\Control\Objects\Order
     */
    protected $order;

    /**
     * @return \Buzz\Control\Objects\Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param string $order_id
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }
}