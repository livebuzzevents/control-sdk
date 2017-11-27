<?php namespace Buzz\Control\Objects\Order;

use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Traits\BelongsToOrder;
use Buzz\Control\Objects\Traits\BelongsToTag;

/**
 * Class Tag
 *
 * @package Buzz\Control\Lead
 */
class Tag extends Base
{
    use BelongsToOrder, BelongsToTag;
}
