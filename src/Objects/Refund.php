<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\BelongsToCharge;
use Buzz\Control\Objects\Traits\BelongsToCustomer;

/**
 * Class Refund
 *
 * @package Buzz\Control\Objects
 */
class Refund extends Object
{
    use BelongsToCampaign,
        BelongsToCustomer,
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
}