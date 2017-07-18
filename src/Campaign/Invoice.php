<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;

/**
 * Class Invoice
 *
 * @property string $order_id
 * @property string $destination
 * @property string $currency
 * @property string $subtotal
 * @property-read integer $subtotal_refundable
 * @property-read integer $total_refundable
 * @property-read integer $vat_refundable
 * @property integer $vat
 * @property integer $total
 * @property integer $node
 * @property integer $sequence
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
