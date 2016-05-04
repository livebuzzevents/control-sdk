<?php namespace Buzz\Control\Objects\Lead;

use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Traits\BelongsToLead;

/**
 * Class Job
 *
 * @package Buzz\Control\Objects\Lead
 */
class Job extends Object
{
    use BelongsToLead;

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
