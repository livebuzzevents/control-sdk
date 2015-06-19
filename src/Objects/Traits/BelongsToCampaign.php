<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class BelongsToCampaign
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToCampaign
{
    /**
     * @var int
     */
    protected $campaign_id;

    /**
     * @var \Buzz\Control\Objects\Campaign
     */
    protected $campaign;

    /**
     * @return \Buzz\Control\Objects\Campaign
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * @return int
     */
    public function getCampaignId()
    {
        return $this->campaign_id;
    }

    /**
     * @param int $campaign_id
     */
    public function setCampaignId($campaign_id)
    {
        $this->campaign_id = $campaign_id;
    }
}