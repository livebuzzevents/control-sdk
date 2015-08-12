<?php namespace Buzz\Control\Objects\Entrance;

use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Traits\BelongsToEntrance;
use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class Scanner
 *
 * @package Buzz\Control\Objects\Entrance
 */
class Scanner extends Object
{
    use BelongsToEntrance, HasIdentifier;
}