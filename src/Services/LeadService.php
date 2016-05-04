<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Campaign;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Lead;

/**
 * Class LeadService
 *
 * @package Buzz\Control\Services
 */
class LeadService extends Service
{
    /**
     * @var
     */
    protected static $cast = Lead::class;

    /**
     * @param Lead $lead
     *
     * @return Lead
     * @throws ErrorException
     */
    public function get(Lead $lead)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        return $this->callAndCast('get', "lead/{$lead->getId()}");
    }

    /**
     * @param Lead $lead
     *
     * @throws ErrorException
     */
    public function delete(Lead $lead)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        $this->call('delete', "lead/{$lead->getId()}");
    }

    /**
     * @param Lead     $lead
     *
     * @param Campaign $campaign
     *
     * @return mixed
     * @throws ErrorException
     */
    public function cloneForCampaign(Lead $lead, Campaign $campaign)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if (!$campaign->getId()) {
            throw new ErrorException('Campaign id required!');
        }

        return $this->cast(
            $this->call('delete', "lead/{$lead->getId()}/clone-for-campaign/{$lead->getId()}"),
            Customer::class
        );
    }

    /**
     * @param Lead $lead
     *
     * @return Lead
     * @throws ErrorException
     */
    public function save(Lead $lead)
    {
        if (!$lead->getId() && !$lead->getCampaignId() && !$lead->getCampaign()) {
            throw new ErrorException('Lead id or Campaign id/identifier required!');
        }

        if ($lead->getId()) {
            $verb = 'put';
            $url  = 'lead/' . $lead->getId();
        } else {
            $verb = 'post';
            $url  = 'lead';
        }

        return $this->callAndCast($verb, $url, $lead->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'leads');
    }

    /**
     * @return Lead[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'leads');
    }

    /**
     * @param Lead[] $leads
     *
     * @return Lead[]
     * @throws ErrorException
     */
    public function saveMany(array $leads)
    {
        foreach ($leads as $key => $lead) {
            if (!$lead->getId() && !$lead->getCampaignId() && !$lead->getCampaign()) {
                throw new ErrorException('Lead id or Campaign id/identifier required!');
            }

            $leads[$key] = $lead->toArray();
        }

        return $this->callAndCastMany('post', 'leads', ['batch' => $leads]);
    }
}