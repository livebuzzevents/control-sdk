<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;
use Buzz\Control\Campaign\Traits\Translatable;

/**
 * Class Parameter
 *
 * @property string $identifier
 * @property string $name
 * @property array $rules
 *
 * @property-read \Buzz\Control\Campaign\Property[] $properties
 * @property-read \Buzz\Control\Campaign\Property[] $customer_properties
 * @property-read \Buzz\Control\Campaign\Property[] $exhibitor_properties
 * @property-read \Buzz\Control\Campaign\Property[] $product_properties
 */
class Parameter extends Object
{
    use Translatable;
}
