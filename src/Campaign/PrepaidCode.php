<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportCrud;

/**
 * Class PrepaidCode
 *
 * @property string $code
 * @property string $group
 * @property int $amount
 * @property string $charge_id
 * @property string $payment_provider_id
 * @property-read Charge $charge
 * @property-read PaymentProvider $payment_provider
 */
class PrepaidCode extends SdkObject
{
    use SupportCrud;
}
