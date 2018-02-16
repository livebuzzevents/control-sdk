<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class CustomerSeminar
 *
 * @property string $customer_id
 * @property string $creator_id
 * @property string $seminar_id
 * @property string $role
 * @property string $type
 * @property string $status
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\Customer $creator
 * @property-read \Buzz\Control\Campaign\Seminar $seminar
 * @property-read \Buzz\Control\Campaign\Redemption[] $redemptions
 */
class CustomerSeminar extends SdkObject
{
    use SupportCrud;
    use Morphable;
}
