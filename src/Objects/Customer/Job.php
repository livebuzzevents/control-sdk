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
     * @var
     */
    protected $customer_id;

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * @param mixed $customer_id
     */
    public function setCustomerId($customer_id)
    {
        $this->customer_id = $customer_id;
    }

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
