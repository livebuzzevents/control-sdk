<?php

namespace Buzz\Control\Campaign;

/**
 * Class BasketProduct
 *
 * @property string $basket_id
 * @property string $product_id
 * @property string $customer_id
 * @property-read array $actions
 * @property integer $cost
 * @property-read integer $cost_final
 * @property-read boolean $cost_overridden
 * @property-read array $discounts
 * @property-read integer $total
 * @property-read integer $vat
 * @property integer $vat_percentage
 * @property-read integer $vat_percentage_final
 * @property-read boolean $vat_percentage_overridden
 *
 * @property-read \Buzz\Control\Campaign\Basket $basket
 * @property-read \Buzz\Control\Campaign\Product $product
 * @property-read \Buzz\Control\Campaign\Customer $customer
 */
class BasketProduct extends Object
{
}
