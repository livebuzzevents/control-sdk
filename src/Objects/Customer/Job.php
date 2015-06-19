<?php namespace Buzz\Control\Objects\Customer;

use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Traits\BelongsToCustomer;

/**
 * Class Job
 *
 * @package Buzz\Control\Objects\Customer
 */
class Job extends Object
{
    use BelongsToCustomer;

    /**
     * @var string
     */
    protected $company;

    /**
     * @var string
     */
    protected $title;

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}
