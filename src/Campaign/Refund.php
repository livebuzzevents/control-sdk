<?php

namespace Buzz\Control\Campaign;

use Carbon\Carbon;

/**
 * Class Refund
 *
 * @property string $charge_id
 * @property string $credit_note_id
 * @property string $currency
 * @property int $amount
 * @property int $fee
 * @property int $fee_refunded
 * @property string $reason
 * @property string $reference_id
 * @property string $description
 * @property array $response
 * @property array $captured
 * @property array $settled
 * @property array $status
 * @property Carbon $caputed_at
 * @property-read Charge $charge
 * @property-read CreditNote $credit_note
 * @property-read Fee[] $fees
 */
class Refund extends SdkObject {}
