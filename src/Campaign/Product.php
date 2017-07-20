<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Object;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class Product
 *
 * @property string $identifier
 * @property string $name
 * @property string $description
 * @property string $destination
 * @property string $exhibitor_id
 * @property integer $cost
 * @property-read integer $vat
 * @property integer $vat_percentage
 * @property-read integer $total
 * @property string $shippable
 * @property string $publish
 * @property-read string $currency
 * @property string $active
 * @property \DateTime $valid_from
 * @property \DateTime $valid_to
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 * @property-read \Buzz\Control\Campaign\OrderProduct[] $order_products
 */
class Product extends Object
{
    use SupportRead,
        SupportWrite,
        Translatable;
}
