<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;

/**
 * Class BillingDetails
 *
 * @property-read string $client
 * @property string $email
 * @property string $title
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $company
 * @property string $vat_number
 * @property string $phone
 * @property string $postcode
 * @property string $line_1
 * @property string $line_2
 * @property string $line_3
 * @property string $city
 * @property string $county
 * @property string $country
 */
class BillingDetails extends Object
{
    use Morphable;
}
