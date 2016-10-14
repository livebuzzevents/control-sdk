<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Stream;

/**
 * Class StreamService
 *
 * @package Buzz\Control\Services
 */
class StreamService extends Service
{
    /**
     * @var
     */
    protected static $cast = Stream::class;

    /**
     * @param Stream $stream
     *
     * @return Stream
     * @throws ErrorException
     */
    public function get(Stream $stream)
    {
        if (!$stream->getId()) {
            throw new ErrorException('Stream id required!');
        }

        return $this->callAndCast('get', "stream/{$stream->getId()}");
    }

    /**
     * @param Stream $stream
     *
     * @throws ErrorException
     */
    public function delete(Stream $stream)
    {
        if (!$stream->getId()) {
            throw new ErrorException('Stream id required!');
        }

        $this->call('delete', "stream/{$stream->getId()}");
    }

    /**
     * @param Stream $stream
     *
     * @return Stream
     * @throws ErrorException
     */
    public function save(Stream $stream)
    {
        if (!$stream->getId() && !$stream->getCampaignId() && !$stream->getCampaign()) {
            throw new ErrorException('Stream id or Campaign id/identifier required!');
        }

        if ($stream->getId()) {
            $verb = 'put';
            $url  = 'stream/' . $stream->getId();
        } else {
            $verb = 'post';
            $url  = 'stream';
        }

        return $this->callAndCast($verb, $url, $stream->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'streams');
    }

    /**
     * @return Stream[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'streams');
    }

    /**
     * @param Stream[] $streams
     *
     * @return Stream[]
     * @throws ErrorException
     */
    public function saveMany(array $streams)
    {
        foreach ($streams as $key => $stream) {
            if (!$stream->getId() && !$stream->getCampaignId() && !$stream->getCampaign()) {
                throw new ErrorException('Stream id or Campaign id/identifier required!');
            }

            $streams[$key] = $stream->toArray();
        }

        return $this->callAndCastMany('post', 'streams', ['batch' => $streams]);
    }
}
