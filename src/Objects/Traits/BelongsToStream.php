<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Objects\Stream;

/**
 * Class BelongsToStream
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToStream
{
    /**
     * @var string
     */
    protected $stream_id;

    /**
     * @var \Buzz\Control\Objects\Stream
     */
    protected $stream;

    /**
     * @return \Buzz\Control\Objects\Stream
     */
    public function getStream()
    {
        return $this->stream;
    }

    /**
     * @param Stream $stream
     */
    public function setStream(Stream $stream)
    {
        $this->stream = $stream;
    }

    /**
     * @return string
     */
    public function getStreamId()
    {
        return $this->stream_id;
    }

    /**
     * @param string $stream_id
     */
    public function setStreamId($stream_id)
    {
        $this->stream_id = $stream_id;
    }
}