<?php namespace Buzz\Control\Objects\Exhibitor;

use Buzz\Control\Objects\Object;

/**
 * Class Phone
 *
 * @package Buzz\Control\Objects\Exhibitor
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
     * @var
     */
    protected $exhibitor_id;

    /**
     * @return mixed
     */
    public function getExhibitorId()
    {
        return $this->exhibitor_id;
    }

    /**
     * @param mixed $exhibitor_id
     */
    public function setExhibitorId($exhibitor_id)
    {
        $this->exhibitor_id = $exhibitor_id;
    }

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
