<?php namespace Buzz\Control\Objects\Lead;

use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Traits\BelongsToLead;
use Buzz\Control\Objects\Traits\BelongsToTag;

/**
 * Class Tag
 *
 * @package Buzz\Control\Lead
 */
class Tag extends Base
{
    use BelongsToLead, BelongsToTag;
}
