<?php

namespace Buzz\Control\Campaign;

/**
 * Class BasketProduct
 *
 * @property string $basket_id
 * @property string $product_id
 * @property string $customer_id
 * @property-read array $actions
 * @property int $cost
 * @property-read int $cost_final
 * @property-read boolean $cost_overridden
 * @property-read array $discounts
 * @property-read int $total
 * @property-read int $vat
 * @property int $vat_percentage
 * @property-read int $vat_percentage_final
 * @property-read boolean $vat_percentage_overridden
 *
 * @property-read \Buzz\Control\Campaign\Basket $basket
 * @property-read \Buzz\Control\Campaign\Product $product
 * @property-read \Buzz\Control\Campaign\Customer $customer
 */
class BasketProduct extends Object
{
}
