<?php namespace Buzz\Control\Objects\Badge;

use Buzz\Control\Objects\Badge;
use Buzz\Control\Objects\Object;

/**
 * Class Details
 *
 * @package Buzz\Control\Objects\Badge
 */
class Details extends Object
{
    /**
     * @var array
     */
    protected $objectMap = [
        'badge' => Badge::class,
    ];

    /**
     * @var
     */
    protected $badge;
    /**
     * @var
     */
    protected $badge_id;
    /**
     * @var
     */
    protected $customer_title;
    /**
     * @var
     */
    protected $customer_first_name;
    /**
     * @var
     */
    protected $customer_middle_name;
    /**
     * @var
     */
    protected $customer_last_name;
    /**
     * @var
     */
    protected $job_company;
    /**
     * @var
     */
    protected $job_title;
    /**
     * @var
     */
    protected $badge_type_override;

    /**
     * @return mixed
     */
    public function getBadge()
    {
        return $this->badge;
    }

    /**
     * @return mixed
     */
    public function getBadgeId()
    {
        return $this->badge_id;
    }

    /**
     * @param mixed $badge_id
     */
    public function setBadgeId($badge_id)
    {
        $this->badge_id = $badge_id;
    }

    /**
     * @return mixed
     */
    public function getCustomerTitle()
    {
        return $this->customer_title;
    }

    /**
     * @param mixed $customer_title
     */
    public function setCustomerTitle($customer_title)
    {
        $this->customer_title = $customer_title;
    }

    /**
     * @return mixed
     */
    public function getCustomerFirstName()
    {
        return $this->customer_first_name;
    }

    /**
     * @param mixed $customer_first_name
     */
    public function setCustomerFirstName($customer_first_name)
    {
        $this->customer_first_name = $customer_first_name;
    }

    /**
     * @return mixed
     */
    public function getCustomerMiddleName()
    {
        return $this->customer_middle_name;
    }

    /**
     * @param mixed $customer_middle_name
     */
    public function setCustomerMiddleName($customer_middle_name)
    {
        $this->customer_middle_name = $customer_middle_name;
    }

    /**
     * @return mixed
     */
    public function getCustomerLastName()
    {
        return $this->customer_last_name;
    }

    /**
     * @param mixed $customer_last_name
     */
    public function setCustomerLastName($customer_last_name)
    {
        $this->customer_last_name = $customer_last_name;
    }

    /**
     * @return mixed
     */
    public function getJobCompany()
    {
        return $this->job_company;
    }

    /**
     * @param mixed $job_company
     */
    public function setJobCompany($job_company)
    {
        $this->job_company = $job_company;
    }

    /**
     * @return mixed
     */
    public function getJobTitle()
    {
        return $this->job_title;
    }

    /**
     * @param mixed $job_title
     */
    public function setJobTitle($job_title)
    {
        $this->job_title = $job_title;
    }

    /**
     * @return mixed
     */
    public function getBadgeTypeOverride()
    {
        return $this->badge_type_override;
    }

    /**
     * @param mixed $badge_type_override
     */
    public function setBadgeTypeOverride($badge_type_override)
    {
        $this->badge_type_override = $badge_type_override;
    }
}