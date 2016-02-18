<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Invite;

/**
 * Class ExhibitorService
 *
 * @package Buzz\Control\Services
 */
class ExhibitorService extends Service
{
    /**
     * @var
     */
    protected static $cast = Exhibitor::class;

    /**
     * @param Exhibitor $exhibitor
     *
     * @return Exhibitor
     * @throws ErrorException
     */
    public function get(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        return $this->callAndCast('get', "exhibitor/{$exhibitor->getId()}");
    }

    /**
     * @param Exhibitor $exhibitor
     *
     * @throws ErrorException
     */
    public function delete(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        $this->call('delete', "exhibitor/{$exhibitor->getId()}");
    }

    /**
     * @param Exhibitor $exhibitor
     *
     * @return Exhibitor
     * @throws ErrorException
     */
    public function save(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId() && !$exhibitor->getCampaignId() && !$exhibitor->getCampaign()) {
            throw new ErrorException('Exhibitor id or Campaign id/identifier required!');
        }

        if ($exhibitor->getId()) {
            $verb = 'put';
            $url  = 'exhibitor/' . $exhibitor->getId();
        } else {
            $verb = 'post';
            $url  = 'exhibitor';
        }

        return $this->callAndCast($verb, $url, $exhibitor->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'exhibitors');
    }

    /**
     * @return Exhibitor[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'exhibitors');
    }

    /**
     * @param Exhibitor[] $exhibitors
     *
     * @return Exhibitor[]
     * @throws ErrorException
     */
    public function saveMany(array $exhibitors)
    {
        foreach ($exhibitors as $key => $exhibitor) {
            if (!$exhibitor->getId() && !$exhibitor->getCampaignId() && !$exhibitor->getCampaign()) {
                throw new ErrorException('Exhibitor id or Campaign id/identifier required!');
            }

            $exhibitors[$key] = $exhibitor->toArray();
        }

        return $this->callAndCastMany('post', 'exhibitors', ['batch' => $exhibitors]);
    }

    public function attachCustomers(Exhibitor $exhibitor, $customers)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        $this->call('post', "exhibitor/{$exhibitor->getId()}/customer", ['customers' => $customers]);
    }

    public function detachCustomers(Exhibitor $exhibitor, $customers)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        $this->call('delete', "exhibitor/{$exhibitor->getId()}/customer", ['customers' => $customers]);
    }

    public function getEmailInvites(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        return $this->castMany($this->call('get', "exhibitor/{$exhibitor->getId()}/email-invites"), Invite::class);
    }
}