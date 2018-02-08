<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class Discount
 *
 * @property string $identifier
 * @property string $name
 * @property string $description
 * @property string $destination
 * @property string $type
 * @property string $code
 * @property int $usages
 * @property int $max_usages
 * @property array $settings
 * @property string $active
 * @property \DateTime $valid_from
 * @property \DateTime $valid_to
 * @property-read string $currency
 * @property-read string $overview
 */
class Discount extends Object
{
    use Translatable,
        SupportCrud;
}
