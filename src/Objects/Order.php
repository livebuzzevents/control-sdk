<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToExhibitor;
use Buzz\Control\Objects\Traits\HasDestination;

/**
 * Class Order
 *
 * @package Buzz\Control\Objects
 */
class Order extends Object
{
    use BelongsToCustomer,
        BelongsToExhibitor,
        BelongsToCampaign,
        HasDestination;
}