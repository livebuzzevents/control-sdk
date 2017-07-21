<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportCrud;

/**
 * Class Address
 *
 * @property-read object $model
 * @property string $model_type
 * @property string $model_id
 * @property string $type
 * @property string $postcode
 * @property-read string $line
 * @property string $line_1
 * @property string $line_2
 * @property string $line_3
 * @property string $city
 * @property string $county
 * @property string $country
 * @property string $verified
 *
 */
class Address extends Object
{
    use SupportCrud;
}
