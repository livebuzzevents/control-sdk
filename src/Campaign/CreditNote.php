<?php

namespace Buzz\Control\Campaign;

/**
 * Class CreditNote
 *
 * @property string $invoice_id
 * @property string $destination
 * @property string $currency
 * @property string $subtotal
 * @property int $vat
 * @property int $total
 * @property int $node
 * @property int $sequence
 * @property string $number
 * @property string $paid
 * @property-read \Buzz\Control\Campaign\Invoice $invoice
 * @property-read \Buzz\Control\Campaign\CreditNoteItem[] $items
 * @property-read \Buzz\Control\Campaign\Credit[] $credits
 * @property-read \Buzz\Control\Campaign\Refund[] $refunds
 */
class CreditNote extends Object
{
}
