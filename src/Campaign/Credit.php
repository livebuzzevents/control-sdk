<?php

namespace Buzz\Control\Campaign;

/**
 * Class Credit
 *
 * @property string $order_id
 * @property string $customer_id
 * @property string $payment_provider_id
 * @property string $credit_note_id
 * @property string $currency
 * @property integer $amount
 * @property string $reason
 * @property string $status
 * @property string $reference_id
 * @property string $description
 * @property array $response
 * @property string $settled
 * @property \DateTime $captured_at
 * @property-read \Buzz\Control\Campaign\Order $order
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\PaymentProvider $payment_provider
 * @property-read \Buzz\Control\Campaign\CreditNote $credit_note
 * @property-read \Buzz\Control\Campaign\Fee[] $fees
 */
class Credit extends Object
{
}
