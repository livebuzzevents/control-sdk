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
            $streams[$key] = $stream->toArray();
        }

        return $this->callAndCastMany('post', 'streams', ['batch' => $streams]);
    }

    /**
     * @param Stream $stream
     * @param array  $parameters
     *
     * @return mixed
     * @throws ErrorException
     */
    public function signedUrl(Stream $stream, array $parameters)
    {
        if (!$stream->getId() && !$stream->getIdentifier()) {
            throw new ErrorException('Stream id or identifier required!');
        }

        if (!isset($parameters['customer_id'])
            && !isset($parameters['exhibitor_id'])
            && !isset($parameters['source_id'])
        ) {
            throw new ErrorException('customer_id, exhibitor_id or source_id required!');
        }

        return $this->call(
            'get',
            "stream/" . ($stream->getId() ?: $stream->getIdentifier()) . "/signed-url",
            $parameters
        );
    }
}
