<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;

/**
 * Class Order
 *
 * @property string $customer_id
 * @property string $exhibitor_id
 * @property string $currency
 * @property integer $subtotal
 * @property integer $subtotal_final
 * @property integer $vat
 * @property integer $total
 * @property-read integer $amount_charged
 * @property-read integer $amount_refunded
 * @property-read integer $amount_disputed
 * @property-read integer $amount_chargebacked
 * @property-read integer $amount_refundable
 * @property-read integer $balance
 * @property-read integer $amount_due
 * @property-read integer $total_items
 * @property-read integer $total_scanners
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
}
