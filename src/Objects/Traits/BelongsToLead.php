<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class BelongsToLead
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToLead
{
    /**
     * @var string
     */
    protected $lead_id;

    /**
     * @var \Buzz\Control\Objects\Lead
     */
    protected $lead;

    /**
     * @return \Buzz\Control\Objects\Lead
     */
    public function getLead()
    {
        return $this->lead;
    }

    /**
     * @return string
     */
    public function getLeadId()
    {
        return $this->lead_id;
    }

    /**
     * @param string $lead_id
     */
    public function setLeadId($lead_id)
    {
        $this->lead_id = $lead_id;
    }
}