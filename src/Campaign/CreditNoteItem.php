<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;

/**
 * Class CreditNoteItem
 *
 * @property string $credit_note_id
 * @property string $order_product_id
 * @property string $reason
 * @property string $description
 * @property integer $cost
 * @property integer $vat
 * @property integer $vat_percentage
 * @property integer $total
 * @property string $returned
 * @property-read string $currency
 * @property-read \Buzz\Control\Campaign\CreditNote $credit_note
 * @property-read \Buzz\Control\Campaign\OrderProduct $order_product
 */
class CreditNoteItem extends Object
{
}
