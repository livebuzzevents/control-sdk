<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportCrud;

/**
 * Class Basket
 *
 * @property string $customer_id
 * @property string $exhibitor_id
 * @property string $destination
 * @property string $discount_code
 * @property string $vat_exempt
 * @property string $po_number
 * @property-read string currency
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 * @property-read \Buzz\Control\Campaign\BasketProduct[] $basket_products
 * @property-read \Buzz\Control\Campaign\BillingDetails $billing_details
 * @property-read \Buzz\Control\Campaign\ShippingDetails $shipping_details
 */
class Basket extends Object
{
    use SupportCrud;

    /**
     * Generates and calculates basket totals
     *
     * @return \Buzz\Control\Campaign\Basket
     */
    public function generate(): self
    {
        return new self($this->api()->get($this->getEndpoint($this->id . '/generate')));
    }

    /**
     * Adds product to basket
     *
     * @param string $product_id
     * @param string|null $customer_id
     * @param int $quantity
     * @param int|null $cost
     * @param int|null $vat_percentage
     */
    public function addProduct(
        string $product_id,
        string $customer_id = null,
        int $quantity = 1,
        int $cost = null,
        int $vat_percentage = null
    ): void {
        $this->api()->post(
            $this->getEndpoint($this->id . '/add-product/' . $product_id . '/' . $customer_id),
            compact('quantity', 'cost', 'vat_percentage')
        );
    }

    /**
     * Adds discount code
     *
     * @param string $code
     */
    public function addDiscountCode(string $code): void
    {
        $this->api()->post($this->getEndpoint($this->id . '/add-discount-code/' . $code));
    }

    /**
     * Removes discount code
     *
     * @param string $code
     */
    public function removeDiscountCode(string $code): void
    {
        $this->api()->delete($this->getEndpoint($this->id . '/remove-discount-code/' . $code));
    }

    /**
     * removes all units for specific product
     *
     * @param string $product_id
     */
    public function removeByProduct(string $product_id): void
    {
        $this->api()->delete($this->getEndpoint($this->id . '/remove-by-product/' . $product_id));
    }

    /**
     * Removes all units for specific customer product
     *
     * @param string $product_id
     * @param string|null $customer_id
     */
    public function removeByCustomerProduct(string $product_id, string $customer_id = null): void
    {
        $this->api()->delete($this->getEndpoint($this->id . '/remove-by-customer-product/' . $product_id . '/' . $customer_id));
    }

    /**
     * Removes all customer product
     *
     * @param string|null $customer_id
     */
    public function removeByCustomer(string $customer_id = null): void
    {
        $this->api()->delete($this->getEndpoint($this->id . '/remove-by-customer/' . $customer_id));
    }

    /**
     * Removes specific basket product unit
     *
     * @param string|null $basket_product_id
     */
    public function removeBasketProduct(string $basket_product_id = null): void
    {
        $this->api()->delete($this->getEndpoint($this->id . '/remove-basket-product/' . $basket_product_id));
    }

    /**
     * Removes all products from basket
     */
    public function removeProducts(): void
    {
        $this->api()->delete($this->getEndpoint($this->id . '/remove-products'));
    }

    /**
     * Resets basket
     */
    public function reset(): void
    {
        $this->api()->delete($this->getEndpoint($this->id . '/reset'));
    }

    /**
     * Sets billing details
     *
     * @param array $details
     */
    public function setBillingDetails(array $details): void
    {
        $this->api()->post($this->getEndpoint($this->id . '/set-billing-details', $details));
    }

    /**
     * Unsets billing details
     */
    public function unsetBillingDetails(): void
    {
        $this->api()->delete($this->getEndpoint($this->id . '/unset-billing-details'));
    }

    /**
     * Sets shipping details
     *
     * @param array $details
     */
    public function setShippingDetails(array $details): void
    {
        $this->api()->post($this->getEndpoint($this->id . '/set-shipping-details', $details));
    }

    /**
     * Unsets shipping details
     */
    public function unsetShippingDetails(): void
    {
        $this->api()->delete($this->getEndpoint($this->id . '/unset-shipping-details'));
    }

    /**
     * Sets/Unsets PO Number
     *
     * @param string|null $po_number
     */
    public function setPoNumber(string $po_number = null): void
    {
        $this->api()->post($this->getEndpoint($this->id . '/set-po-number/' . $po_number));
    }

    /**
     * Sets vat exempt status
     *
     * @param string $vat_exempt
     */
    public function setVatExempt(string $vat_exempt = 'no'): void
    {
        $this->api()->post($this->getEndpoint($this->id . '/set-vat-exempt/' . $vat_exempt));
    }

    /**
     * Places the order
     *
     * @return Order $order
     */
    public function place(): Order
    {
        return new Order($this->api()->post($this->getEndpoint($this->id . '/place')));
    }
}
