<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class EmailMessageTemplate
 *
 * @package Buzz\Control\Objects\EmailMessageTemplate
 */
class EmailMessageTemplate extends Object
{
    use BelongsToCampaign, HasIdentifier;
}
