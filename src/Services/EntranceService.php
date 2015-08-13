<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Entrance;

/**
 * Class EntranceService
 *
 * @package Buzz\Control\Services
 */
class EntranceService extends Service
{
    /**
     * @var
     */
    protected static $cast = Entrance::class;

    /**
     * @param Entrance $entrance
     *
     * @return Entrance
     * @throws ErrorException
     */
    public function get(Entrance $entrance)
    {
        if (!$entrance->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        return $this->callAndCast('get', "entrance/{$entrance->getId()}");
    }

    /**
     * @param Entrance $entrance
     *
     * @throws ErrorException
     */
    public function delete(Entrance $entrance)
    {
        if (!$entrance->getId()) {
            throw new ErrorException('Entrance id required!');
        }

        $this->call('delete', "entrance/{$entrance->getId()}");
    }

    /**
     * @param Entrance $entrance
     *
     * @return Entrance
     * @throws ErrorException
     */
    public function save(Entrance $entrance)
    {
        if (!$entrance->getId() && !$entrance->getCampaignId() && !$entrance->getCampaign()) {
            throw new ErrorException('Entrance id or Campaign id/identifier required!');
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

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'entrances');
    }

    /**
     * @return mixed
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'entrances');
    }

    /**
     * @param Entrance[] $entrances
     *
     * @return Entrance[]
     * @throws ErrorException
     */
    public function saveMany(array $entrances)
    {
        foreach ($entrances as $key => $entrance) {
            if (!$entrance->getId() && !$entrance->getCampaignId() && !$entrance->getCampaign()) {
                throw new ErrorException('Entrance id or Campaign id/identifier required!');
            }

            $entrances[$key] = $entrance->toArray();
        }

        return $this->callAndCastMany('post', 'entrances', ['batch' => $entrances]);
    }
}