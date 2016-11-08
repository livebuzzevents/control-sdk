<?php namespace Buzz\Control\Objects;

use Buzz\Control\Collection;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToExhibitor;
use Buzz\Control\Objects\Traits\HasDestination;
use Buzz\Control\Objects\Traits\HasSource;

/**
 * Class Order
 *
 * @package Buzz\Control\Objects
 */
class Order extends Object
{
    use BelongsToCustomer,
        BelongsToExhibitor,
        HasDestination,
        HasSource;

    /**
     * @var int
     */
    protected $subtotal;

    /**
     * @var int
     */
    protected $subtotal_final;

    /**
     * @var int
     */
    protected $vat;

    /**
     * @var int
     */
    protected $total;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $paid;

    /**
     * @var string
     */
    protected $refunded;

    /**
     * @var string
     */
    protected $disputed;

    /**
     * @var string
     */
    protected $chargebacked;

    /**
     * @var string
     */
    protected $shipped;

    /**
     * @var int
     */
    protected $amount_charged;

    /**
     * @var int
     */
    protected $amount_refunded;

    /**
     * @var int
     */
    protected $amount_chargebacked;

    /**
     * @var int
     */
    protected $amount_paid;

    /**
     * @var int
     */
    protected $amount_refundable;

    /**
     * @var int
     */
    protected $amount_due;

    /**
     * @var string
     */
    protected $amount_charged_formatted;

    /**
     * @var string
     */
    protected $amount_refunded_formatted;

    /**
     * @var string
     */
    protected $amount_chargebacked_formatted;

    /**
     * @var string
     */
    protected $amount_paid_formatted;

    /**
     * @var string
     */
    protected $amount_refundable_formatted;

    /**
     * @var string
     */
    protected $amount_due_formatted;

    /**
     * @var string
     */
    protected $subtotal_formatted;

    /**
     * @var string
     */
    protected $subtotal_final_formatted;

    /**
     * @var string
     */
    protected $vat_formatted;

    /**
     * @var string
     */
    protected $total_formatted;

    /**
     * @var string
     */
    protected $po_number;

    /**
     * @var string
     */
    protected $vat_exempt;

    //RELATIONS
    /**
     * @var
     */
    protected $discounts;

    /**
     * @var \Buzz\Control\Objects\Charge[]
     */
    protected $charges;

    /**
     * @var \Buzz\Control\Objects\BillingDetails
     */
    protected $billing_details;

    /**
     * @var \Buzz\Control\Objects\ShippingDetails
     */
    protected $shipping_details;

    /**
     * @var \Buzz\Control\Objects\Invoice
     */
    protected $invoice;

    /**
     * @var \Buzz\Control\Objects\OrderAction[]
     */
    protected $actions;

    /**
     * @return int
     */
    public function getAmountChargebacked()
    {
        return $this->amount_chargebacked;
    }

    /**
     * @param int $amount_chargebacked
     */
    public function setAmountChargebacked($amount_chargebacked)
    {
        $this->amount_chargebacked = $amount_chargebacked;
    }

    /**
     * @return string
     */
    public function getAmountChargebackedFormatted()
    {
        return $this->amount_chargebacked_formatted;
    }

    /**
     * @param string $amount_chargebacked_formatted
     */
    public function setAmountChargebackedFormatted($amount_chargebacked_formatted)
    {
        $this->amount_chargebacked_formatted = $amount_chargebacked_formatted;
    }

    /**
     * @return int
     */
    public function getAmountCharged()
    {
        return $this->amount_charged;
    }

    /**
     * @param int $amount_charged
     */
    public function setAmountCharged($amount_charged)
    {
        $this->amount_charged = $amount_charged;
    }

    /**
     * @return string
     */
    public function getAmountChargedFormatted()
    {
        return $this->amount_charged_formatted;
    }

    /**
     * @param string $amount_charged_formatted
     */
    public function setAmountChargedFormatted($amount_charged_formatted)
    {
        $this->amount_charged_formatted = $amount_charged_formatted;
    }

    /**
     * @return int
     */
    public function getAmountDue()
    {
        return $this->amount_due;
    }

    /**
     * @param int $amount_due
     */
    public function setAmountDue($amount_due)
    {
        $this->amount_due = $amount_due;
    }

    /**
     * @return string
     */
    public function getAmountDueFormatted()
    {
        return $this->amount_due_formatted;
    }

    /**
     * @param string $amount_due_formatted
     */
    public function setAmountDueFormatted($amount_due_formatted)
    {
        $this->amount_due_formatted = $amount_due_formatted;
    }

    /**
     * @return int
     */
    public function getAmountPaid()
    {
        return $this->amount_paid;
    }

    /**
     * @param int $amount_paid
     */
    public function setAmountPaid($amount_paid)
    {
        $this->amount_paid = $amount_paid;
    }

    /**
     * @return string
     */
    public function getAmountPaidFormatted()
    {
        return $this->amount_paid_formatted;
    }

    /**
     * @param string $amount_paid_formatted
     */
    public function setAmountPaidFormatted($amount_paid_formatted)
    {
        $this->amount_paid_formatted = $amount_paid_formatted;
    }

    /**
     * @return int
     */
    public function getAmountRefundable()
    {
        return $this->amount_refundable;
    }

    /**
     * @param int $amount_refundable
     */
    public function setAmountRefundable($amount_refundable)
    {
        $this->amount_refundable = $amount_refundable;
    }

    /**
     * @return string
     */
    public function getAmountRefundableFormatted()
    {
        return $this->amount_refundable_formatted;
    }

    /**
     * @param string $amount_refundable_formatted
     */
    public function setAmountRefundableFormatted($amount_refundable_formatted)
    {
        $this->amount_refundable_formatted = $amount_refundable_formatted;
    }

    /**
     * @return int
     */
    public function getAmountRefunded()
    {
        return $this->amount_refunded;
    }

    /**
     * @param int $amount_refunded
     */
    public function setAmountRefunded($amount_refunded)
    {
        $this->amount_refunded = $amount_refunded;
    }

    /**
     * @return string
     */
    public function getAmountRefundedFormatted()
    {
        return $this->amount_refunded_formatted;
    }

    /**
     * @param string $amount_refunded_formatted
     */
    public function setAmountRefundedFormatted($amount_refunded_formatted)
    {
        $this->amount_refunded_formatted = $amount_refunded_formatted;
    }

    /**
     * @return BillingDetails
     */
    public function getBillingDetails()
    {
        return $this->billing_details;
    }

    /**
     * @param BillingDetails $billing_details
     */
    public function setBillingDetails($billing_details)
    {
        $this->billing_details = $billing_details;
    }

    /**
     * @return string
     */
    public function getChargebacked()
    {
        return $this->chargebacked;
    }

    /**
     * @param string $chargebacked
     */
    public function setChargebacked($chargebacked)
    {
        $this->chargebacked = $chargebacked;
    }

    /**
     * @return Charge[]
     */
    public function getCharges()
    {
        return $this->charges;
    }

    /**
     * @param Charge[] $charges
     */
    public function setCharges($charges)
    {
        $this->charges = new Collection($charges);
    }

    /**
     * @return OrderAction[]
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * @param OrderAction[] $actions
     */
    public function setActions($actions)
    {
        $this->actions = new Collection($actions);
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getDiscounts()
    {
        return $this->discounts;
    }

    /**
     * @param mixed $discounts
     */
    public function setDiscounts($discounts)
    {
        $this->discounts = new Collection($discounts);
    }

    /**
     * @return string
     */
    public function getDisputed()
    {
        return $this->disputed;
    }

    /**
     * @param string $disputed
     */
    public function setDisputed($disputed)
    {
        $this->disputed = $disputed;
    }

    /**
     * @return Invoice[]
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param Invoice $invoice
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * @return string
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * @param string $paid
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;
    }

    /**
     * @return string
     */
    public function getRefunded()
    {
        return $this->refunded;
    }

    /**
     * @param string $refunded
     */
    public function setRefunded($refunded)
    {
        $this->refunded = $refunded;
    }

    /**
     * @return string
     */
    public function getShipped()
    {
        return $this->shipped;
    }

    /**
     * @param string $shipped
     */
    public function setShipped($shipped)
    {
        $this->shipped = $shipped;
    }

    /**
     * @return ShippingDetails
     */
    public function getShippingDetails()
    {
        return $this->shipping_details;
    }

    /**
     * @param ShippingDetails $shipping_details
     */
    public function setShippingDetails($shipping_details)
    {
        $this->shipping_details = $shipping_details;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * @param int $subtotal
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
    }

    /**
     * @return int
     */
    public function getSubtotalFinal()
    {
        return $this->subtotal_final;
    }

    /**
     * @param int $subtotal_final
     */
    public function setSubtotalFinal($subtotal_final)
    {
        $this->subtotal_final = $subtotal_final;
    }

    /**
     * @return string
     */
    public function getSubtotalFinalFormatted()
    {
        return $this->subtotal_final_formatted;
    }

    /**
     * @param string $subtotal_final_formatted
     */
    public function setSubtotalFinalFormatted($subtotal_final_formatted)
    {
        $this->subtotal_final_formatted = $subtotal_final_formatted;
    }

    /**
     * @return string
     */
    public function getSubtotalFormatted()
    {
        return $this->subtotal_formatted;
    }

    /**
     * @param string $subtotal_formatted
     */
    public function setSubtotalFormatted($subtotal_formatted)
    {
        $this->subtotal_formatted = $subtotal_formatted;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return string
     */
    public function getTotalFormatted()
    {
        return $this->total_formatted;
    }

    /**
     * @param string $total_formatted
     */
    public function setTotalFormatted($total_formatted)
    {
        $this->total_formatted = $total_formatted;
    }

    /**
     * @return int
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @param int $vat
     */
    public function setVat($vat)
    {
        $this->vat = $vat;
    }

    /**
     * @return string
     */
    public function getVatFormatted()
    {
        return $this->vat_formatted;
    }

    /**
     * @param string $vat_formatted
     */
    public function setVatFormatted($vat_formatted)
    {
        $this->vat_formatted = $vat_formatted;
    }

    /**
     * @return string
     */
    public function getPoNumber()
    {
        return $this->po_number;
    }

    /**
     * @param string $po_number
     */
    public function setPoNumber($po_number)
    {
        $this->po_number = $po_number;
    }

    /**
     * @return string
     */
    public function getVatExempt()
    {
        return $this->vat_exempt;
    }

    /**
     * @param string $vat_exempt
     */
    public function setVatExempt($vat_exempt)
    {
        $this->vat_exempt = $vat_exempt;
    }
}
