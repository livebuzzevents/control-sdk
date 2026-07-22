<?php

namespace Buzz\Control\Campaign;

use Carbon\Carbon;

/**
 * Class Dispute
 *
 * @property string $charge_id
 * @property string $currency
 * @property int $amount
 * @property string $reason
 * @property string $reference_id
 * @property string $description
 * @property array $response
 * @property array $captured
 * @property array $settled
 * @property array $status
 * @property Carbon $caputed_at
 * @property-read Charge $charge
 * @property-read Fee[] $fees
 */
class Dispute extends SdkObject {}
