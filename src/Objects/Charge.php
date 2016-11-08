<?php namespace Buzz\Control\Objects;

use Buzz\Control\Collection;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToOrder;

/**
 * Class Charge
 *
 * @package Buzz\Control\Objects
 */
class Charge extends Object
{
    use BelongsToCustomer,
        BelongsToOrder;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var int
     */
    protected $amount;

    /**
     * @var int
     */
    protected $amount_refunded;

    /**
     * @var int
     */
    protected $amount_disputed;

    /**
     * @var int
     */
    protected $amount_chargebacked;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $authorized;

    /**
     * @var string
     */
    protected $captured;

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
    protected $status;

    /**
     * @var string
     */
    protected $payment_provider_id;

    /**
     * @var string
     */
    protected $reference_id;

    /**
     * @var array
     */
    protected $response;

    /**
     * @var string
     */
    protected $settled;

    /**
     * @var int
     */
    protected $balance;

    /**
     * @var int
     */
    protected $amount_refundable;

    /**
     * @var string
     */
    protected $amount_formatted;

    /**
     * @var string
     */
    protected $balance_formatted;

    /**
     * @var string
     */
    protected $amount_refunded_formatted;

    /**
     * @var string
     */
    protected $amount_refundable_formatted;

    /**
     * @var string
     */
    protected $amount_disputed_formatted;

    /**
     * @var string
     */
    protected $amount_chargebacked_formatted;

    /**
     * @var \Buzz\Control\Objects\Refund[]
     */
    protected $refunds;

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

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
    public function getAmountDisputed()
    {
        return $this->amount_disputed;
    }

    /**
     * @param int $amount_disputed
     */
    public function setAmountDisputed($amount_disputed)
    {
        $this->amount_disputed = $amount_disputed;
    }

    /**
     * @return string
     */
    public function getAmountDisputedFormatted()
    {
        return $this->amount_disputed_formatted;
    }

    /**
     * @param string $amount_disputed_formatted
     */
    public function setAmountDisputedFormatted($amount_disputed_formatted)
    {
        $this->amount_disputed_formatted = $amount_disputed_formatted;
    }

    /**
     * @return string
     */
    public function getAmountFormatted()
    {
        return $this->amount_formatted;
    }

    /**
     * @param string $amount_formatted
     */
    public function setAmountFormatted($amount_formatted)
    {
        $this->amount_formatted = $amount_formatted;
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
     * @return string
     */
    public function getAuthorized()
    {
        return $this->authorized;
    }

    /**
     * @param string $authorized
     */
    public function setAuthorized($authorized)
    {
        $this->authorized = $authorized;
    }

    /**
     * @return int
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param int $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    /**
     * @return string
     */
    public function getBalanceFormatted()
    {
        return $this->balance_formatted;
    }

    /**
     * @param string $balance_formatted
     */
    public function setBalanceFormatted($balance_formatted)
    {
        $this->balance_formatted = $balance_formatted;
    }

    /**
     * @return string
     */
    public function getCaptured()
    {
        return $this->captured;
    }

    /**
     * @param string $captured
     */
    public function setCaptured($captured)
    {
        $this->captured = $captured;
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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * @return string
     */
    public function getPaymentProviderId()
    {
        return $this->payment_provider_id;
    }

    /**
     * @param string $payment_provider_id
     */
    public function setPaymentProviderId($payment_provider_id)
    {
        $this->payment_provider_id = $payment_provider_id;
    }

    /**
     * @return string
     */
    public function getReferenceId()
    {
        return $this->reference_id;
    }

    /**
     * @param string $reference_id
     */
    public function setReferenceId($reference_id)
    {
        $this->reference_id = $reference_id;
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
     * @return \Buzz\Control\Objects\Refund[]
     */
    public function getRefunds()
    {
        return $this->refunds;
    }

    /**
     * @param \Buzz\Control\Objects\Refund[] $refunds
     */
    public function setRefunds($refunds)
    {
        $this->refunds = new Collection($refunds);
    }

    /**
     * @return array
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param array $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * @return string
     */
    public function getSettled()
    {
        return $this->settled;
    }

    /**
     * @param string $settled
     */
    public function setSettled($settled)
    {
        $this->settled = $settled;
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
}
