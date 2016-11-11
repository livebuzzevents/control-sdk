<?php namespace Buzz\Control\Objects\Customer;

use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToTag;

/**
 * Class Tag
 *
 * @package Buzz\Control\Customer
 */
class Tag extends Base
{
    use BelongsToCustomer, BelongsToTag;
}
