<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class Entrance
 *
 * @package Buzz\Control\Objects
 */
class Entrance extends Object
{
    use BelongsToCampaign, HasIdentifier;
}