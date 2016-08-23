<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToOrder;
use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class OrderProduct
 *
 * @package Buzz\Control\Objects
 */
class OrderProduct extends Object
{
    use BelongsToOrder, HasIdentifier;
}
