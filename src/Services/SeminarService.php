<?php

namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\CustomerSeminar;
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
            $seminars[$key] = $seminar->toArray();
        }

        return $this->callAndCastMany('post', 'seminars', ['batch' => $seminars]);
    }

    /**
     * @param Seminar $seminar
     * @param Topic   $topic
     *
     * @throws ErrorException
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
     *
     * @throws ErrorException
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
            $topics[$key] = $topic->toArray();
        }

        $this->call('post', "seminar/{$seminar->getId()}/topic/sync", ['batch' => $topics]);
    }

    /**
     * @param Seminar  $seminar
     * @param Customer $creator
     * @param string   $role
     * @param string   $type
     *
     * @throws ErrorException
     */
    public function allocateSpace(Seminar $seminar, Customer $creator, string $role, string $type = null)
    {
        $this->validateSeminar($seminar);

        if (!$creator->getId()) {
            throw new ErrorException('Creator id required!');
        }

        $url = "seminar/{$seminar->getId()}/creator/{$creator->getId()}/role/{$role}/allocate-space";

        if ($type) {
            $url .= "/{$type}";
        }

        $this->call('get', $url);
    }

    /**
     * @param Seminar  $seminar
     * @param Customer $creator
     * @param string   $role
     * @param string   $type
     *
     * @throws ErrorException
     */
    public function unallocateSpace(Seminar $seminar, CustomerSeminar $customerSeminar)
    {
        $this->validateSeminar($seminar);

        if (!$customerSeminar->getId()) {
            throw new ErrorException('Customer seminar id required!');
        }

        $url = "seminar/{$seminar->getId()}/customer-seminar/{$customerSeminar->getId()}";

        $this->call('delete', $url);
    }

    /**
     * @param Seminar  $seminar
     * @param Customer $creator
     * @param Customer $customer
     */
    public function assignCustomer(Seminar $seminar, Customer $creator, Customer $customer)
    {
        $this->validateSeminar($seminar);

        if (!$creator->getId()) {
            throw new ErrorException('Creator id required!');
        }

        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('get', "seminar/{$seminar->getId()}/creator/{$creator->getId()}/customer/{$customer->getId()}/assign");
    }

    /**
     * @param Seminar  $seminar
     * @param Customer $creator
     * @param string   $role
     * @param Customer $customer
     * @param string   $type
     */
    public function attachCustomer(Seminar $seminar, Customer $creator, string $role, Customer $customer, string $type = null)
    {
        $this->validateSeminar($seminar);

        if (!$creator->getId()) {
            throw new ErrorException('Creator id required!');
        }

        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $url = "seminar/{$seminar->getId()}/creator/{$creator->getId()}/role/{$role}/customer/{$customer->getId()}/attach";

        if ($type) {
            $url .= "/{$type}";
        }

        $this->call('get', $url);
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

        $this->call('get', "seminar/{$seminar->getId()}/customer/{$customer->getId()}/detach");
    }

    /**
     * @param Seminar  $seminar
     * @param Customer $customer
     */
    public function detachCustomer(Seminar $seminar, Customer $customer)
    {
        $this->validateSeminar($seminar);

        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('get', "seminar/{$seminar->getId()}/customer/{$customer->getId()}/detach");
    }
}
