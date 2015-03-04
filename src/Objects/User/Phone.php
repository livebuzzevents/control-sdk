<?php namespace Buzz\Control\Objects\User;

use Buzz\Control\Objects\Object;

/**
 * Class Phone
 *
 * @package Buzz\Control\Objects\User
 */
class Phone extends Object
{
    /**
     * @var
     */
    protected $type;
    /**
     * @var
     */
    protected $number;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }
}
