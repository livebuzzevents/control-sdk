<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Channel;

/**
 * Class ChannelService
 *
 * @package Buzz\Control\Services
 */
class ChannelService extends Service
{
    /**
     * @var
     */
    protected static $cast = Channel::class;

    /**
     * @param Channel $channel
     *
     * @return Channel
     * @throws ErrorException
     */
    public function get(Channel $channel)
    {
        if (!$channel->getId()) {
            throw new ErrorException('Channel id required!');
        }

        return $this->callAndCast('get', "channel/{$channel->getId()}");
    }

    /**
     * @param Channel $channel
     *
     * @throws ErrorException
     */
    public function delete(Channel $channel)
    {
        if (!$channel->getId()) {
            throw new ErrorException('Channel id required!');
        }

        $this->call('delete', "channel/{$channel->getId()}");
    }

    /**
     * @param Channel $channel
     *
     * @return Channel
     * @throws ErrorException
     */
    public function save(Channel $channel)
    {
        if ($channel->getId()) {
            $verb = 'put';
            $url  = 'channel/' . $channel->getId();
        } else {
            $verb = 'post';
            $url  = 'channel';
        }

        return $this->callAndCast($verb, $url, $channel->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'channels');
    }

    /**
     * @return Channel[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'channels');
    }

    /**
     * @param Channel[] $channels
     *
     * @return Channel[]
     * @throws ErrorException
     */
    public function saveMany(array $channels)
    {
        foreach ($channels as $key => $channel) {
            $channels[$key] = $channel->toArray();
        }

        return $this->callAndCastMany('post', 'channels', ['batch' => $channels]);
    }
}