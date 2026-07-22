<?php

namespace Buzz\Control\Campaign;

use Carbon\Carbon;

/**
 * Class Credit
 *
 * @property string $order_id
 * @property string $customer_id
 * @property string $payment_provider_id
 * @property string $credit_note_id
 * @property string $currency
 * @property int $amount
 * @property string $reason
 * @property string $status
 * @property string $reference_id
 * @property string $description
 * @property array $response
 * @property string $settled
 * @property Carbon $captured_at
 * @property-read Order $order
 * @property-read Customer $customer
 * @property-read PaymentProvider $payment_provider
 * @property-read CreditNote $credit_note
 * @property-read Fee[] $fees
 */
class Credit extends SdkObject {}
