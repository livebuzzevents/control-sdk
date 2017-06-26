<?php namespace Buzz\Control\Objects\Lead;

use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Traits\BelongsToLead;
use Buzz\Control\Objects\Traits\BelongsToParameter;

/**
 * Class Property
 *
 * @package Buzz\Control\Lead
 */
class Property extends Base
{
    use BelongsToLead, BelongsToParameter;

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
