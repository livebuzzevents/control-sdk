<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Taggable;
use Buzz\Control\Traits\SupportRead;

/**
 * Class Order
 *
 * @property string $customer_id
 * @property string $exhibitor_id
 * @property string $currency
 * @property int $subtotal
 * @property int $subtotal_final
 * @property int $vat
 * @property int $total
 * @property-read int $amount_charged
 * @property-read int $amount_refunded
 * @property-read int $amount_disputed
 * @property-read int $amount_chargebacked
 * @property-read int $amount_refundable
 * @property-read int $balance
 * @property-read int $amount_due
 * @property-read int $total_items
 * @property-read int $total_scanners
 * @property string $status
 * @property string $fulfilled
 * @property string $shipped
 * @property string $paid
 * @property string $refunded
 * @property string $disputed
 * @property string $chargebacked
 * @property string $vat_exempt
 * @property string $destination
 * @property string $source
 * @property string $source_id
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 * @property-read \Buzz\Control\Campaign\Note[] $notes
 * @property-read \Buzz\Control\Campaign\Log[] $logs
 * @property-read \Buzz\Control\Campaign\ModelTag[] $tags
 * @property-read \Buzz\Control\Campaign\OrderProduct[] $products
 * @property-read \Buzz\Control\Campaign\OrderDiscount[] $discounts
 * @property-read \Buzz\Control\Campaign\Charge[] $charges
 * @property-read \Buzz\Control\Campaign\Credit[] $credits
 * @property-read \Buzz\Control\Campaign\BillingDetails $billing_details
 * @property-read \Buzz\Control\Campaign\ShippingDetails $shipping_details
 * @property-read \Buzz\Control\Campaign\Invoice $invoice
 * @property-read \Buzz\Control\Campaign\OrderAction[] $actions
 */
class Order extends Object
{
    use SupportRead,
        Taggable;
}
