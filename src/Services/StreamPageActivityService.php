<?php

namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\StreamPageActivity;

/**
 * Class StreamPageActivityService
 *
 * @package Buzz\Control\Services
 */
class StreamPageActivityService extends Service
{
    /**
     * @var
     */
    protected static $cast = StreamPageActivity::class;

    /**
     * @param StreamPageActivity $streamPageActivity
     *
     * @return StreamPageActivity
     * @throws ErrorException
     */
    public function get(StreamPageActivity $streamPageActivity)
    {
        if (!$streamPageActivity->getId()) {
            throw new ErrorException('StreamPageActivity id required!');
        }

        return $this->callAndCast('get', "stream-page-activity/{$streamPageActivity->getId()}");
    }

    /**
     * @param StreamPageActivity $streamPageActivity
     *
     * @throws ErrorException
     */
    public function delete(StreamPageActivity $streamPageActivity)
    {
        if (!$streamPageActivity->getId()) {
            throw new ErrorException('StreamPageActivity id required!');
        }

        $this->call('delete', "stream-page-activity/{$streamPageActivity->getId()}");
    }

    /**
     * @param StreamPageActivity $streamPageActivity
     *
     * @return StreamPageActivity
     * @throws ErrorException
     */
    public function save(StreamPageActivity $streamPageActivity)
    {
        if ($streamPageActivity->getId()) {
            $verb = 'put';
            $url  = 'stream-page-activity/' . $streamPageActivity->getId();
        } else {
            $verb = 'post';
            $url  = 'stream-page-activity';
        }

        return $this->callAndCast($verb, $url, $streamPageActivity->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'stream-page-activities');
    }

    /**
     * @return StreamPageActivity[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'stream-page-activities');
    }

    /**
     * @param StreamPageActivity[] $streamPageActivities
     *
     * @return StreamPageActivity[]
     * @throws ErrorException
     */
    public function saveMany(array $streamPageActivities)
    {
        foreach ($streamPageActivities as $key => $streamPageActivity) {
            $streamPageActivities[$key] = $streamPageActivity->toArray();
        }

        return $this->callAndCastMany('post', 'stream-page-activities', ['batch' => $streamPageActivities]);
    }
}
