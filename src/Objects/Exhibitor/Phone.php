<?php namespace Buzz\Control\Objects\Exhibitor;

use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Traits\BelongsToExhibitor;

/**
 * Class Phone
 *
 * @package Buzz\Control\Objects\Exhibitor
 */
class Phone extends Base
{
    use BelongsToExhibitor;

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
