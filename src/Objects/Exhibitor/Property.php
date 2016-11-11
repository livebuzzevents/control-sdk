<?php namespace Buzz\Control\Objects\Exhibitor;

use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Traits\BelongsToExhibitor;
use Buzz\Control\Objects\Traits\BelongsToParameter;

/**
 * Class Property
 *
 * @package Buzz\Control\Exhibitor
 */
class Property extends Base
{
    use BelongsToExhibitor, BelongsToParameter;

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
