<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCharge;
use Buzz\Control\Objects\Traits\BelongsToCustomer;

/**
 * Class Refund
 *
 * @package Buzz\Control\Objects
 */
class Refund extends Object
{
    use BelongsToCustomer,
        BelongsToCharge;

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
    protected $fee;

    /**
     * @var int
     */
    protected $fee_refunded;

    /**
     * @var string
     */
    protected $reason;

    /**
     * @var string
     */
    protected $description;

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
    protected $captured;

    /**
     * @var string
     */
    protected $settled;

    /**
     * @var string
     */
    protected $amount_formatted;

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
     * @return int
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @param int $fee
     */
    public function setFee($fee)
    {
        $this->fee = $fee;
    }

    /**
     * @return int
     */
    public function getFeeRefunded()
    {
        return $this->fee_refunded;
    }

    /**
     * @param int $fee_refunded
     */
    public function setFeeRefunded($fee_refunded)
    {
        $this->fee_refunded = $fee_refunded;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
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
}
