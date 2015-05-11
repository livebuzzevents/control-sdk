<?php namespace Buzz\Control\Objects;

/**
 * Class Entrance
 *
 * @package Buzz\Control\Objects
 */
class Entrance extends Object
{
    /**
     * @var
     */
    protected $identifier;

    /**
     * @var
     */
    protected $campaign_id;

    /**
     * @return mixed
     */
    public function getCampaignId()
    {
        return $this->campaign_id;
    }

    /**
     * @param mixed $campaign_id
     */
    public function setCampaignId($campaign_id)
    {
        $this->campaign_id = $campaign_id;
    }

    /**
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param mixed $identifier
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    }
}