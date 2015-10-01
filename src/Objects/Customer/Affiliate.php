<?php namespace Buzz\Control\Objects\Customer;

use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Traits\BelongsToAffiliate;
use Buzz\Control\Objects\Traits\BelongsToCustomer;

/**
 * Class Address
 *
 * @package Buzz\Control\Objects\Customer
 */
class Affiliate extends Object
{
    use BelongsToCustomer, BelongsToAffiliate;
}
