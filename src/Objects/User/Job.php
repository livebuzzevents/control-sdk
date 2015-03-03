<?php namespace Buzz\Control\Objects\User;

use Buzz\Control\Objects\Object;

/**
 * Class Job
 *
 * @package Buzz\Control\Objects\User
 */
class Job extends Object
{
    /**
     * @var
     */
    protected $id;
    /**
     * @var
     */
    protected $company;
    /**
     * @var
     */
    protected $job_title;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
}
