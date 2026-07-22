<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class CustomerSeminar
 *
 * @property string $customer_type_id
 * @property string $customer_id
 * @property string $creator_id
 * @property string $seminar_id
 * @property string $role
 * @property string $type
 * @property string $status
 * @property-read Customer $customer
 * @property-read Customer $creator
 * @property-read Seminar $seminar
 * @property-read CustomType $custom_type
 * @property-read Redemption[] $redemptions
 */
class CustomerSeminar extends SdkObject
{
    use Morphable;
    use SupportCrud;
}
