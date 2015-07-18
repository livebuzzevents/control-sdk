<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Entrance;

class EntranceService extends Service
{
    protected static $cast = Entrance::class;

    public function get(Entrance $entrance)
    {
        if (!$entrance->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        return $this->callAndCast('get', "entrance/{$entrance->getId()}");
    }

    public function delete(Entrance $entrance)
    {
        if (!$entrance->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        $this->call('delete', "entrance/{$entrance->getId()}");
    }

    public function save(Entrance $entrance)
    {
        if (!$entrance->getId() && !$entrance->getCampaignId()) {
            throw new ErrorException('Entrance id or Campaign id required!');
        }

        if ($entrance->getId()) {
            $verb = 'put';
            $url  = 'entrance/' . $entrance->getId();
        } else {
            $verb = 'post';
            $url  = 'entrance';
        }

        return $this->callAndCast($verb, $url, $entrance->toArray());
    }

    public function deleteMany()
    {
        $this->call('delete', 'entrances');
    }

    public function getMany()
    {
        return $this->callAndCastMany('get', 'entrances');
    }

    public function saveMany(array $entrances)
    {
        foreach ($entrances as $key => $entrance) {
            if (!$entrance->getId() && !$entrance->getCampaignId()) {
                throw new ErrorException('Entrance id or Campaign id required!');
            }

            $entrances[$key] = $entrance->toArray();
        }

        return $this->callAndCastMany('post', 'entrances', $entrances);
    }
}