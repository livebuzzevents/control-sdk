<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\WithAnswerHelpers;
use Buzz\Control\Campaign\Traits\WithPropertyHelpers;
use Buzz\Control\Traits\SupportDelete;
use Buzz\Control\Traits\SupportRead;

/**
 * Class BasketProduct
 *
 * @property string $basket_id
 * @property string $product_id
 * @property string $customer_id
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
 * @property-read \Buzz\Control\Campaign\BasketActions[] $basket_actions
 * @property-read \Buzz\Control\Campaign\Basket $basket
 * @property-read \Buzz\Control\Campaign\Product $product
 * @property-read \Buzz\Control\Campaign\Customer $customer
 */
class BasketProduct extends SdkObject
{
    use SupportRead,
        SupportDelete,
        WithAnswerHelpers,
        WithPropertyHelpers;
}
