<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;

/**
 * Class Charge
 *
 * @property string $customer_id
 * @property string $payment_provider_id
 * @property string $invoice_id
 * @property string $currency
 * @property int $amount
 * @property int $amount_refunded
 * @property int $amount_disputed
 * @property int $amount_chargebacked
 * @property-read int $balance
 * @property-read int $amount_refundable
 * @property string $authorized
 * @property string $captured
 * @property string $refunded
 * @property string $disputed
 * @property string $chargebacked
 * @property string $status
 * @property string $reference_id
 * @property string $description
 * @property array $response
 * @property string $settled
 * @property \DateTime $captured_at
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\PaymentProvider $payment_provider
 * @property-read \Buzz\Control\Campaign\Invoice $invoice
 * @property-read \Buzz\Control\Campaign\Dispute[] $disputes
 * @property-read \Buzz\Control\Campaign\Refund[] $refunds
 * @property-read \Buzz\Control\Campaign\Fee[] $fees
 */
class Charge extends SdkObject
{
    use Morphable;
}
