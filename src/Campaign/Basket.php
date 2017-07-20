<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class Basket
 *
 * @property string $customer_id
 * @property string $exhibitor_id
 * @property string $payment_provider_id
 * @property string $stream_id
 * @property string $destination
 * @property string $discount_code
 * @property array $billing_details
 * @property array $shipping_details
 * @property string $vat_exempt
 * @property string $po_number
 * @property-read string currency
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 * @property-read \Buzz\Control\Campaign\PaymentProvider $payment_provider
 * @property-read \Buzz\Control\Campaign\Stream $stream
 * @property-read \Buzz\Control\Campaign\BasketProduct[] $basket_products
 */
class Basket extends Object
{
    use SupportCrud;
}
