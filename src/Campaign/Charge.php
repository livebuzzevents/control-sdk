<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;

/**
 * Class Charge
 *
 * @property string $order_id
 * @property string $customer_id
 * @property string $payment_provider_id
 * @property string $invoice_id
 * @property string $currency
 * @property integer $amount
 * @property integer $amount_refunded
 * @property integer $amount_disputed
 * @property integer $amount_chargebacked
 * @property-read integer $balance
 * @property-read integer $amount_refundable
 * @property string $authorized
 * @property string $captured
 * @property string $refunded
 * @property string $disputed
 * @property string $chargebacked
 * @property string $status
 * @property string $reference_id
 * @property string $description
 * @property array $response
 * @property string $success_url
 * @property string $cancel_url
 * @property string $settled
 * @property \DateTime $captured_at
 * @property-read \Buzz\Control\Campaign\Order $order
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\PaymentProvider $payment_provider
 * @property-read \Buzz\Control\Campaign\Invoice $invoice
 * @property-read \Buzz\Control\Campaign\Dispute[] $disputes
 * @property-read \Buzz\Control\Campaign\Refund[] $refunds
 * @property-read \Buzz\Control\Campaign\Fee[] $fees
 */
class Charge extends Object
{
}
