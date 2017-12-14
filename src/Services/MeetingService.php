<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Meeting;

/**
 * Class MeetingService
 *
 * @package Buzz\Control\Services
 */
class MeetingService extends Service
{
    /**
     * @var
     */
    protected static $cast = Meeting::class;

    /**
     * @param Meeting $meeting
     *
     * @return Meeting
     * @throws ErrorException
     */
    public function get(Meeting $meeting)
    {
        if (!$meeting->getId()) {
            throw new ErrorException('Meeting id required!');
        }

        return $this->callAndCast('get', "meeting/{$meeting->getId()}");
    }

    /**
     * @param Meeting $meeting
     *
     * @throws ErrorException
     */
    public function delete(Meeting $meeting)
    {
        if (!$meeting->getId()) {
            throw new ErrorException('Meeting id required!');
        }

        $this->call('delete', "meeting/{$meeting->getId()}");
    }

    /**
     * @param Meeting $meeting
     *
     * @return Meeting
     * @throws ErrorException
     */
    public function save(Meeting $meeting)
    {
        if ($meeting->getId()) {
            $verb = 'put';
            $url  = 'meeting/' . $meeting->getId();
        } else {
            $verb = 'post';
            $url  = 'meeting';
        }

        return $this->callAndCast($verb, $url, $meeting->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'meetings');
    }

    /**
     * @return Meeting[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'meetings');
    }

    /**
     * @param Meeting[] $meetings
     *
     * @return Meeting[]
     * @throws ErrorException
     */
    public function saveMany(array $meetings)
    {
        foreach ($meetings as $key => $meeting) {
            $meetings[$key] = $meeting->toArray();
        }

        return $this->callAndCastMany('post', 'meetings', ['batch' => $meetings]);
    }
}
