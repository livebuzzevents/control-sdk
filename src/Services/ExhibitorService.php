<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;

class ExhibitorService extends Service
{
    protected static $cast = Exhibitor::class;

    public function get(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        return $this->callAndCast('get', "exhibitor/{$exhibitor->getId()}");
    }

    public function delete(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        $this->call('delete', "exhibitor/{$exhibitor->getId()}");
    }

    public function save(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId() && !$exhibitor->getCampaignId()) {
            throw new ErrorException('Exhibitor id or Campaign id required!');
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

    public function deleteMany()
    {
        $this->call('delete', 'exhibitors');
    }

    public function getMany()
    {
        return $this->callAndCastMany('get', 'exhibitors');
    }

    public function saveMany(array $exhibitors)
    {
        foreach ($exhibitors as $key => $exhibitor) {
            if (!$exhibitor->getId() && !$exhibitor->getCampaignId()) {
                throw new ErrorException('Exhibitor id or Campaign id required!');
            }

            $exhibitors[$key] = $exhibitor->toArray();
        }

        return $this->callAndCastMany('post', 'exhibitors', $exhibitors);
    }
}