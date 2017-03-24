<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Objects\Product;

/**
 * Class HasProduct
 *
 * @package Buzz\Control\Objects\Traits
 */
trait HasProduct
{
    /**
     * @var string
     */
    protected $product_id;

    /**
     * @var \Buzz\Control\Objects\Product
     */
    protected $product;

    /**
     * @return \Buzz\Control\Objects\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param string $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }
}