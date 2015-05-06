<?php namespace Buzz\Control\Objects\Customer;

use Buzz\Control\Objects\Object;

/**
 * Class Job
 *
 * @package Buzz\Control\Objects\Customer
 */
class Job extends Object
{
    /**
     * @var
     */
    protected $company;
    /**
     * @var
     */
    protected $title;

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}
