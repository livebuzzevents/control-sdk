<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;

/**
 * Class Refund
 *
 * @property string $charge_id
 * @property string $credit_note_id
 * @property string $currency
 * @property integer $amount
 * @property integer $fee
 * @property integer $fee_refunded
 * @property string $reason
 * @property string $reference_id
 * @property string $description
 * @property array $response
 * @property array $captured
 * @property array $settled
 * @property array $status
 * @property \DateTime $caputed_at
 *
 * @property-read \Buzz\Control\Campaign\Charge $charge
 * @property-read \Buzz\Control\Campaign\CreditNote $credit_note
 * @property-read \Buzz\Control\Campaign\Fee[] $fees
 */
class Refund extends Object
{
}
