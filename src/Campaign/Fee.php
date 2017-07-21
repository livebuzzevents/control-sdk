<?php

namespace Buzz\Control\Campaign;

/**
 * Class Fee
 *
 * @property string $charge_id
 * @property string $refund_id
 * @property string $dispute_id
 * @property string $credit_id
 * @property string $currency
 * @property string $amount
 * @property string $type
 * @property string $payer
 * @property string $payee
 * @property array $settings
 * @property array $details
 * @property string $settled
 * @property-read \Buzz\Control\Campaign\Charge $charge
 * @property-read \Buzz\Control\Campaign\Refund $refund
 * @property-read \Buzz\Control\Campaign\Dispute $dispute
 * @property-read \Buzz\Control\Campaign\Credit $credit
 */
class Fee extends Object
{
}
