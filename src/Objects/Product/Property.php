<?php namespace Buzz\Control\Objects\Product;

use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Traits\BelongsToProduct;
use Buzz\Control\Objects\Traits\BelongsToParameter;

/**
 * Class Property
 *
 * @package Buzz\Control\Product
 */
class Property extends Base
{
    use BelongsToProduct, BelongsToParameter;

    /**
     * @var string
     */
    protected $value;

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}
