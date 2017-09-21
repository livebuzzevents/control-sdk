<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;

/**
 * Class ShippingDetails
 *
 * @property-read string $client
 * @property string $email
 * @property string $title
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $company
 * @property string $phone
 * @property string $postcode
 * @property string $line_1
 * @property string $line_2
 * @property string $line_3
 * @property string $city
 * @property string $county
 * @property string $country
 */
class ShippingDetails extends Object
{
    use Morphable;
}
