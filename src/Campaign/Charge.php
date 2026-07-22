<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Carbon\Carbon;

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
 * @property Carbon $captured_at
 * @property-read Customer $customer
 * @property-read PaymentProvider $payment_provider
 * @property-read Invoice $invoice
 * @property-read Dispute[] $disputes
 * @property-read Refund[] $refunds
 * @property-read Fee[] $fees
 */
class Charge extends SdkObject
{
    use Morphable;
}
