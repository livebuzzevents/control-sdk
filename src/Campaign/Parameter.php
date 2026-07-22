<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class Parameter
 *
 * @property string $identifier
 * @property string $name
 * @property array $rules
 * @property-read Property[] $properties
 * @property-read Property[] $customer_properties
 * @property-read Property[] $exhibitor_properties
 * @property-read Property[] $product_properties
 */
class Parameter extends SdkObject
{
    use SupportRead,
        SupportWrite,
        Translatable;
}
