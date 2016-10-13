<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\StreamMenuItem;

/**
 * Class StreamMenuItemService
 *
 * @package Buzz\Control\Services
 */
class StreamMenuItemService extends Service
{
    /**
     * @var
     */
    protected static $cast = StreamMenuItem::class;

    /**
     * @param StreamMenuItem $streamMenuItem
     *
     * @return StreamMenuItem
     * @throws ErrorException
     */
    public function get(StreamMenuItem $streamMenuItem)
    {
        if (!$streamMenuItem->getId()) {
            throw new ErrorException('StreamMenuItem id required!');
        }

        return $this->callAndCast('get', "stream-menu-item/{$streamMenuItem->getId()}");
    }

    /**
     * @param StreamMenuItem $streamMenuItem
     *
     * @throws ErrorException
     */
    public function delete(StreamMenuItem $streamMenuItem)
    {
        if (!$streamMenuItem->getId()) {
            throw new ErrorException('StreamMenuItem id required!');
        }

        $this->call('delete', "stream-menu-item/{$streamMenuItem->getId()}");
    }

    /**
     * @param StreamMenuItem $streamMenuItem
     *
     * @return StreamMenuItem
     * @throws ErrorException
     */
    public function save(StreamMenuItem $streamMenuItem)
    {
        if (!$streamMenuItem->getId() && !$streamMenuItem->getCampaignId() && !$streamMenuItem->getCampaign()) {
            throw new ErrorException('StreamMenuItem id or Campaign id/identifier required!');
        }

        if ($streamMenuItem->getId()) {
            $verb = 'put';
            $url  = 'stream-menu-item/' . $streamMenuItem->getId();
        } else {
            $verb = 'post';
            $url  = 'stream-menu-item';
        }

        return $this->callAndCast($verb, $url, $streamMenuItem->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'stream-menu-items');
    }

    /**
     * @return StreamMenuItem[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'stream-menu-items');
    }

    /**
     * @param StreamMenuItem[] $streamMenuItems
     *
     * @return StreamMenuItem[]
     * @throws ErrorException
     */
    public function saveMany(array $streamMenuItems)
    {
        foreach ($streamMenuItems as $key => $streamMenuItem) {
            if (!$streamMenuItem->getId() && !$streamMenuItem->getCampaignId() && !$streamMenuItem->getCampaign()) {
                throw new ErrorException('StreamMenuItem id or Campaign id/identifier required!');
            }

            $streamMenuItems[$key] = $streamMenuItem->toArray();
        }

        return $this->callAndCastMany('post', 'stream-menu-items', ['batch' => $streamMenuItems]);
    }
}