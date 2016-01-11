<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Event;

/**
 * Class EventService
 *
 * @package Buzz\Control\Services
 */
class EventService extends Service
{
    /**
     * @var string
     */
    protected static $cast = Event::class;

    /**
     * @param Event $event
     *
     * @return Event
     * @throws ErrorException
     */
    public function get(Event $event)
    {
        if (!$event->getId()) {
            throw new ErrorException('Event id required!');
        }

        return $this->callAndCast('get', "event/{$event->getId()}");
    }

    /**
     * @return Event[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'events');
    }
}