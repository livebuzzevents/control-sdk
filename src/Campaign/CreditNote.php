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
 * @property-read Invoice $invoice
 * @property-read CreditNoteItem[] $items
 * @property-read Credit[] $credits
 * @property-read Refund[] $refunds
 */
class CreditNote extends SdkObject {}
