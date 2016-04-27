<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToExhibitor;
use Buzz\Control\Objects\Traits\BelongsToStream;
use Buzz\Control\Objects\Traits\HasDestination;

/**
 * Class Basket
 *
 * @package Buzz\Control\Objects
 */
class Basket extends Object
{
    use BelongsToCustomer,
        BelongsToExhibitor,
        BelongsToCampaign,
        BelongsToStream,
        HasDestination;

    /**
     * @var array
     */
    protected $products;

    /**
     * @var string
     */
    protected $discount_code;

    /**
     * @var array
     */
    protected $billing_details;

    /**
     * @var array
     */
    protected $shipping_details;

    /**
     * @return array
     */
    public function getBillingDetails()
    {
        return $this->billing_details;
    }

    /**
     * @param array $billing_details
     */
    public function setBillingDetails(array $billing_details = null)
    {
        $this->billing_details = $billing_details;
    }

    /**
     * @return string
     */
    public function getDiscountCode()
    {
        return $this->discount_code;
    }

    /**
     * @param string $discount_code
     */
    public function setDiscountCode($discount_code)
    {
        $this->discount_code = $discount_code;
    }

    /**
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param array $products
     */
    public function setProducts(array $products = null)
    {
        $this->products = $products;
    }

    /**
     * @return array
     */
    public function getShippingDetails()
    {
        return $this->shipping_details;
    }

    /**
     * @param array $shipping_details
     */
    public function setShippingDetails(array $shipping_details = null)
    {
        $this->shipping_details = $shipping_details;
    }
}