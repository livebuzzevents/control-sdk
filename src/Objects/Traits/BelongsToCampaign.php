<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Objects\Campaign;

/**
 * Class BelongsToCampaign
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToCampaign
{
    /**
     * @var string
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
     * @param \Buzz\Control\Objects\Campaign $campaign
     */
    public function setCampaign(Campaign $campaign)
    {
        $this->campaign = $campaign;
    }

    /**
     * @return string
     */
    public function getCampaignId()
    {
        return $this->campaign_id;
    }

    /**
     * @param string $campaign_id
     */
    public function setCampaignId($campaign_id)
    {
        $this->campaign_id = $campaign_id;
    }
}