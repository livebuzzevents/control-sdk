<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToOrder;

/**
 * Class Charge
 *
 * @package Buzz\Control\Objects
 */
class Charge extends Object
{
    use BelongsToCampaign,
        BelongsToCustomer,
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

}