<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Affiliate;

/**
 * Class AffiliateService
 *
 * @package Buzz\Control\Services
 */
class AffiliateService extends Service
{
    /**
     * @var
     */
    protected static $cast = Affiliate::class;

    /**
     * @param Affiliate $affiliate
     *
     * @return Affiliate
     * @throws ErrorException
     */
    public function get(Affiliate $affiliate)
    {
        if (!$affiliate->getId()) {
            throw new ErrorException('Affiliate id required!');
        }

        return $this->callAndCast('get', "affiliate/{$affiliate->getId()}");
    }

    /**
     * @param Affiliate $affiliate
     *
     * @throws ErrorException
     */
    public function delete(Affiliate $affiliate)
    {
        if (!$affiliate->getId()) {
            throw new ErrorException('Affiliate id required!');
        }

        $this->call('delete', "affiliate/{$affiliate->getId()}");
    }

    /**
     * @param Affiliate $affiliate
     *
     * @return Affiliate
     * @throws ErrorException
     */
    public function save(Affiliate $affiliate)
    {
        if (!$affiliate->getId() && !$affiliate->getCampaignId() && !$affiliate->getCampaign()) {
            throw new ErrorException('Affiliate id or Campaign id/identifier required!');
        }

        if ($affiliate->getId()) {
            $verb = 'put';
            $url  = 'affiliate/' . $affiliate->getId();
        } else {
            $verb = 'post';
            $url  = 'affiliate';
        }

        return $this->callAndCast($verb, $url, $affiliate->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'affiliates');
    }

    /**
     * @return Affiliate[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'affiliates');
    }

    /**
     * @param Affiliate[] $affiliates
     *
     * @return Affiliate[]
     * @throws ErrorException
     */
    public function saveMany(array $affiliates)
    {
        foreach ($affiliates as $key => $affiliate) {
            if (!$affiliate->getId() && !$affiliate->getCampaignId() && !$affiliate->getCampaign()) {
                throw new ErrorException('Affiliate id or Campaign id/identifier required!');
            }

            $affiliates[$key] = $affiliate->toArray();
        }

        return $this->callAndCastMany('post', 'affiliates', ['batch' => $affiliates]);
    }
}