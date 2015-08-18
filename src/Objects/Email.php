<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class Email
 *
 * @package Buzz\Control\Objects\Email
 */
class Email extends Object
{
    use BelongsToCampaign, HasIdentifier;
}
