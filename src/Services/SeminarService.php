<?php

namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Seminar;
use Buzz\Control\Objects\Topic;

/**
 * Class SeminarService
 *
 * @package Buzz\Control\Services
 */
class SeminarService extends Service
{
    /**
     * @var
     */
    protected static $cast = Seminar::class;

    /**
     * @param Seminar $seminar
     *
     * @throws ErrorException
     */
    private function validateSeminar(Seminar $seminar)
    {
        if (!$seminar->getId()) {
            throw new ErrorException('Seminar id required!');
        }
    }

    /**
     * @param Seminar $seminar
     *
     * @return Seminar
     * @throws ErrorException
     */
    public function get(Seminar $seminar)
    {
        $this->validateSeminar($seminar);

        return $this->callAndCast('get', "seminar/{$seminar->getId()}");
    }

    /**
     * @param Seminar $seminar
     *
     * @throws ErrorException
     */
    public function delete(Seminar $seminar)
    {
        $this->validateSeminar($seminar);

        $this->call('delete', "seminar/{$seminar->getId()}");
    }

    /**
     * @param Seminar $seminar
     *
     * @return Seminar
     * @throws ErrorException
     */
    public function save(Seminar $seminar)
    {
        if (!$seminar->getId() && !$seminar->getCampaignId() && !$seminar->getCampaign()) {
            throw new ErrorException('Seminar id or Campaign id/identifier required!');
        }

        if ($seminar->getId()) {
            $verb = 'put';
            $url  = 'seminar/' . $seminar->getId();
        } else {
            $verb = 'post';
            $url  = 'seminar';
        }

        return $this->callAndCast($verb, $url, $seminar->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'seminars');
    }

    /**
     * @return Seminar[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'seminars');
    }

    /**
     * @param Seminar[] $seminars
     *
     * @return Seminar[]
     * @throws ErrorException
     */
    public function saveMany(array $seminars)
    {
        foreach ($seminars as $key => $seminar) {
            if (!$seminar->getId() && !$seminar->getCampaignId() && !$seminar->getCampaign()) {
                throw new ErrorException('Seminar id or Campaign id/identifier required!');
            }

            $seminars[$key] = $seminar->toArray();
        }

        return $this->callAndCastMany('post', 'seminars', ['batch' => $seminars]);
    }

    /**
     * @param Seminar $seminar
     * @param Topic   $topic
     */
    public function attachTopic(Seminar $seminar, Topic $topic)
    {
        $this->validateSeminar($seminar);

        if (!$topic->getId()) {
            throw new ErrorException('Topic id required!');
        }

        $this->call('get', "seminar/{$seminar->getId()}/topic/{$topic->getId()}/attach");
    }

    /**
     * @param Seminar $seminar
     * @param Topic   $topic
     */
    public function detachTopic(Seminar $seminar, Topic $topic)
    {
        $this->validateSeminar($seminar);

        if (!$topic->getId()) {
            throw new ErrorException('Topic id required!');
        }

        $this->call('get', "seminar/{$seminar->getId()}/topic/{$topic->getId()}/detach");
    }

    /**
     * @param Seminar $seminar
     * @param Topic[] $topics
     */
    public function syncTopics(Seminar $seminar, array $topics)
    {
        $this->validateSeminar($seminar);

        foreach ($topics as $key => $topic) {
            if (!$topic->getId() && !$topic->getCampaignId() && !$topic->getCampaign()) {
                throw new ErrorException('Topic id or Campaign id/identifier required!');
            }

            $topics[$key] = $topic->toArray();
        }

        $this->call('post', "seminar/{$seminar->getId()}/topic/sync", ['batch' => $topics]);
    }

    /**
     * @param Seminar  $seminar
     * @param Customer $customer
     */
    public function attachAttendee(Seminar $seminar, Customer $customer)
    {
        $this->validateSeminar($seminar);

        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('get', "seminar/{$seminar->getId()}/attendee/{$customer->getId()}/attach");
    }

    /**
     * @param Seminar  $seminar
     * @param Customer $customer
     */
    public function detachAttendee(Seminar $seminar, Customer $customer)
    {
        $this->validateSeminar($seminar);

        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('get', "seminar/{$seminar->getId()}/attendee/{$customer->getId()}/detach");
    }

    /**
     * @param Seminar    $seminar
     * @param Customer[] $customers
     */
    public function syncAttendees(Seminar $seminar, array $customers)
    {
        $this->validateSeminar($seminar);

        foreach ($customers as $key => $customer) {
            if (!$customer->getId() && !$customer->getCampaignId() && !$customer->getCampaign()) {
                throw new ErrorException('Customer id or Campaign id/identifier required!');
            }

            $customers[$key] = $customer->toArray();
        }

        $this->call('post', "seminar/{$seminar->getId()}/attendee/sync", ['batch' => $customers]);
    }

    /**
     * @param Seminar  $seminar
     * @param Customer $customer
     */
    public function attachSpeaker(Seminar $seminar, Customer $customer)
    {
        $this->validateSeminar($seminar);

        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('get', "seminar/{$seminar->getId()}/speaker/{$customer->getId()}/attach");
    }

    /**
     * @param Seminar  $seminar
     * @param Customer $customer
     */
    public function detachSpeaker(Seminar $seminar, Customer $customer)
    {
        $this->validateSeminar($seminar);

        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('get', "seminar/{$seminar->getId()}/speaker/{$customer->getId()}/detach");
    }

    /**
     * @param Seminar    $seminar
     * @param Customer[] $customers
     */
    public function syncSpeakers(Seminar $seminar, array $customers)
    {
        $this->validateSeminar($seminar);

        foreach ($customers as $key => $customer) {
            if (!$customer->getId() && !$customer->getCampaignId() && !$customer->getCampaign()) {
                throw new ErrorException('Customer id or Campaign id/identifier required!');
            }

            $customers[$key] = $customer->toArray();
        }

        $this->call('post', "seminar/{$seminar->getId()}/speaker/sync", ['batch' => $customers]);
    }
}
