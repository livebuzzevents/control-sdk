<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportCrud;

/**
 * Class CustomerSeminar
 *
 * @property string $customer_id
 * @property string $side_event_id
 * @property string $status
 * @property-read Customer $customer
 * @property-read SideEvent $sideEvent
 */
class CustomerSideEvent extends SdkObject
{
    use SupportCrud;
}