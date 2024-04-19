<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportCrud;

/**
 * Class PwaSetting
 *
 * @property string $customer_id
 * @property string $device_id
 * @property string $comet_auth_token
 */
class PwaSetting extends SdkObject
{
    use SupportCrud;
}
