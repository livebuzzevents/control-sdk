<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\HasActive;
use Buzz\Control\Objects\Traits\HasDestination;

/**
 * Class Product
 *
 * @package Buzz\Control\Objects\Channel
 */
class PaymentProvider extends Object
{
    use BelongsToCampaign, HasDestination, HasActive;

    /**
     * @var string
     */
    protected $provider;

    /**
     * @var array
     */
    protected $settings;

    /**
     * @var array
     */
    protected $fees;
}