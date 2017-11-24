<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class BelongsToOrderProduct
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToOrderProduct
{
    /**
     * @var string
     */
    protected $order_product_id;

    /**
     * @var \Buzz\Control\Objects\OrderProduct
     */
    protected $order_product;

    /**
     * @return \Buzz\Control\Objects\OrderProduct
     */
    public function getOrderProduct()
    {
        return $this->order_product;
    }

    /**
     * @return string
     */
    public function getOrderProductId()
    {
        return $this->order_product_id;
    }

    /**
     * @param string $order_product_id
     */
    public function setOrderProductId($order_product_id)
    {
        $this->order_product_id = $order_product_id;
    }
}