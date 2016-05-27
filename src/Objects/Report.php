<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCampaign;

/**
 * Class Report
 *
 * @package Buzz\Control\Objects
 */
class Report extends Object
{
    use BelongsToCampaign;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $data;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }
}