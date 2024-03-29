<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Taggable;
use Buzz\Control\Traits\SupportRead;

/**
 * Class Order
 *
 * @property string $customer_id
 * @property string $exhibitor_id
 * @property string $po_number
 * @property string $currency
 * @property int $subtotal
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
 * @property-read bool $awaiting_interactions
 * @property-read string $summary_url
 * @property string $status
 * @property string $fulfilled
 * @property string $shipped
 * @property string $paid
 * @property string $refunded
 * @property string $disputed
 * @property string $chargebacked
 * @property string $vat_exempt
 * @property string $destination
 * @property string $return_url
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
class Order extends SdkObject
{
    use SupportRead,
        Taggable;

    /**
     * Returns checkout link
     *
     * @return string
     */
    public function getCheckoutLink(): string
    {
        return $this->api()->get($this->getEndpoint($this->id . '/checkout-link'))['checkout-link'];
    }

    /**
     * Gets invoice in base64 format
     *
     * @return self
     */
    public function complete(): self
    {
        return new self($this->api()->get($this->getEndpoint($this->id . '/complete')));
    }

    /**
     * Generates new charge
     *
     * @param string $payment_provider_id
     */
    public function generateCharge(string $payment_provider_id): void
    {
        $this->api()->post($this->getEndpoint($this->id . '/generate-charge/' . $payment_provider_id));
    }

    /**
     * Pay order with prepaid code
     *
     * @param string $code
     */
    public function payWithPrepaidCode(string $code): void
    {
        $this->api()->post($this->getEndpoint($this->id . '/pay-with-prepaid-code/' . $code));
    }

    /**
     * Cancel existing charge
     *
     * @param string $charge_id
     */
    public function cancelCharge(string $charge_id): void
    {
        $this->api()->delete($this->getEndpoint($this->id . '/cancel-charge/' . $charge_id));
    }

    /**
     * Capture existing charge
     *
     * @param string $charge_id
     * @param string $reference_id
     */
    public function captureCharge(string $charge_id, string $reference_id): void
    {
        $this->api()->post(
            $this->getEndpoint($this->id . '/capture-charge/' . $charge_id),
            ['reference_id' => $reference_id]
        );
    }

    /**
     * Refund, return, and cancel order
     *
     * @param string $reason
     */
    public function refund(string $reason): void
    {
        $this->api()->post(
            $this->getEndpoint($this->id . '/refund'),
            ['reason' => $reason]
        );
    }
}
