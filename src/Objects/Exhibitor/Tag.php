<?php namespace Buzz\Control\Objects\Exhibitor;

use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Traits\BelongsToExhibitor;
use Buzz\Control\Objects\Traits\BelongsToTag;

/**
 * Class Tag
 *
 * @package Buzz\Control\Customer
 */
class Tag extends Base
{
    use BelongsToExhibitor, BelongsToTag;
}
