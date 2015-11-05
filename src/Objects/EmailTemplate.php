<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class EmailTemplate
 *
 * @package Buzz\Control\Objects\EmailTemplate
 */
class EmailTemplate extends Object
{
    use BelongsToCampaign, HasIdentifier;
}
