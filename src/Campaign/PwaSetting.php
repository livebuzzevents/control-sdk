<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportCrud;

/**
 * Class PwaSetting
 *
 * @property bool $enable_notifications
 * @property string $customer_id
 * @property string $device_id
 * @property string $device_type
 */
class PwaSetting extends SdkObject
{
    use SupportCrud;
}
