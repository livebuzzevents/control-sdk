<?php namespace Buzz\Control\Objects\Lead;

use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Traits\BelongsToLead;

/**
 * Class Phone
 *
 * @package Buzz\Control\Objects\Lead
 */
class Phone extends Object
{
    use BelongsToLead;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $number;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }
}
