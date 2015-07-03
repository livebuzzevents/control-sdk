<?php namespace Buzz\Control\Objects\Badge;

use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Traits\BelongsToBadge;
use Buzz\Control\Objects\Traits\BelongsToParameter;

/**
 * Class Property
 *
 * @package Buzz\Control\Badge
 */
class Property extends Object
{
    use BelongsToBadge, BelongsToParameter;

    /**
     * @var string
     */
    protected $value;

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}
