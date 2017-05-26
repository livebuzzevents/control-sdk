<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Campaign;
use Buzz\Control\Objects\Customer;
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
     * @param Campaign $campaign
     * @param Lead     $lead
     *
     * @return mixed
     * @throws ErrorException
     */
    public function clone(Campaign $campaign, Lead $lead)
    {
        if (!$campaign->getId() && $campaign->getIdentifier()) {
            throw new ErrorException('Campaign id or identifier required!');
        }

        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        return $this->cast(
            $this->call('get', "lead/clone/" . ($campaign->id ?? $campaign->identifier) . "/{$lead->getId()}"),
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
            $leads[$key] = $lead->toArray();
        }

        return $this->callAndCastMany('post', 'leads', ['batch' => $leads]);
    }

    /**
     * @param Lead   $lead
     * @param string $tag
     *
     * @return Lead
     * @throws ErrorException
     */
    public function tag(Lead $lead, $tag)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if (!$tag) {
            throw new ErrorException('Tag is required!');
        }

        return $this->callAndCast('post', "lead/{$lead->getId()}/tag/{$tag}");
    }

    /**
     * @param Lead   $lead
     * @param string $tag
     *
     * @return Lead
     * @throws ErrorException
     */
    public function untag(Lead $lead, $tag)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if (!$tag) {
            throw new ErrorException('Tag is required!');
        }

        return $this->callAndCast('delete', "lead/{$lead->getId()}/tag/{$tag}");
    }

    /**
     * @param Lead  $lead
     * @param array $tags
     *
     * @return Lead
     * @throws ErrorException*
     */
    public function syncTags(Lead $lead, array $tags = [])
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        return $this->callAndCast('post', "lead/{$lead->getId()}/tags", compact('tags'));
    }
}
