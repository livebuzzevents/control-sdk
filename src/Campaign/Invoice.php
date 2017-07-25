<?php

namespace Buzz\Control\Campaign;

/**
 * Class Invoice
 *
 * @property string $order_id
 * @property string $destination
 * @property string $currency
 * @property string $subtotal
 * @property-read int $subtotal_refundable
 * @property-read int $total_refundable
 * @property-read int $vat_refundable
 * @property int $vat
 * @property int $total
 * @property int $node
 * @property int $sequence
 * @property string $number
 * @property string $paid
 *
 * @property-read \Buzz\Control\Campaign\Order $order
 * @property-read \Buzz\Control\Campaign\CreditNote[] $credit_notes
 * @property-read \Buzz\Control\Campaign\Charge[] $charges
 */
class Invoice extends Object
{
}
