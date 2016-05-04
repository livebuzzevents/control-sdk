<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Campaign;

/**
 * Class CampaignService
 *
 * @package Buzz\Control\Services
 */
class CampaignService extends Service
{
    /**
     * @var
     */
    protected static $cast = Campaign::class;

    /**
     * @param Campaign $campaign
     *
     * @return Campaign
     * @throws ErrorException
     */
    public function get(Campaign $campaign)
    {
        if (!$campaign->getId()) {
            throw new ErrorException('Campaign id required!');
        }

        return $this->callAndCast('get', "campaign/{$campaign->getId()}");
    }

    /**
     * @param Campaign $campaign
     *
     * @throws ErrorException
     */
    public function delete(Campaign $campaign)
    {
        if (!$campaign->getId()) {
            throw new ErrorException('Campaign id required!');
        }

        $this->call('delete', "campaign/{$campaign->getId()}");
    }

    /**
     * @param Campaign $campaign
     *
     * @return Campaign
     * @throws ErrorException
     */
    public function save(Campaign $campaign)
    {
        if ($campaign->getId()) {
            $verb = 'put';
            $url  = 'campaign/' . $campaign->getId();
        } else {
            $verb = 'post';
            $url  = 'campaign';
        }

        return $this->callAndCast($verb, $url, $campaign->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'campaigns');
    }

    /**
     * @return Campaign[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'campaigns');
    }

    /**
     * @param Campaign[] $campaigns
     *
     * @return Campaign[]
     * @throws ErrorException
     */
    public function saveMany(array $campaigns)
    {
        foreach ($campaigns as $key => $campaign) {
            $campaigns[$key] = $campaign->toArray();
        }

        return $this->callAndCastMany('post', 'campaigns', ['batch' => $campaigns]);
    }
}