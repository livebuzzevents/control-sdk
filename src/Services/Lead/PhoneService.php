<?php namespace Buzz\Control\Services\Lead;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Lead;
use Buzz\Control\Services\Service;

/**
 * Class PhoneService
 *
 * @package Buzz\Control\Services\Lead
 */
class PhoneService extends Service
{
    /**
     * @var
     */
    protected static $cast = Lead\Phone::class;

    /**
     * @param Lead       $lead
     * @param Lead\Phone $phone
     *
     * @return Lead\Phone
     * @throws ErrorException
     */
    public function get(Lead $lead, Lead\Phone $phone)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if (!$phone->getId()) {
            throw new ErrorException('Phone id required!');
        }

        return $this->callAndCast('get', "lead/{$lead->getId()}/phone/{$phone->getId()}");
    }

    /**
     * @param Lead       $lead
     * @param Lead\Phone $phone
     *
     * @throws ErrorException
     */
    public function delete(Lead $lead, Lead\Phone $phone)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if (!$phone->getId()) {
            throw new ErrorException('Phone id required!');
        }

        $this->call('delete', "lead/{$lead->getId()}/phone/{$phone->getId()}");
    }

    /**
     * @param Lead       $lead
     * @param Lead\Phone $phone
     *
     * @return Lead\Phone
     * @throws ErrorException
     */
    public function save(Lead $lead, Lead\Phone $phone)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if ($phone->getId()) {
            $verb = 'put';
            $url  = "lead/{$lead->getId()}/phone/{$phone->getId()}";
        } else {
            $verb = 'post';
            $url  = "lead/{$lead->getId()}/phone";
        }

        return $this->callAndCast($verb, $url, $phone->toArray());
    }

    /**
     * @param Lead $lead
     *
     * @throws ErrorException
     */
    public function deleteMany(Lead $lead)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        $this->call('delete', "lead/{$lead->getId()}/phones");
    }

    /**
     * @param Lead $lead
     *
     * @return Lead\Phone[]
     * @throws ErrorException
     */
    public function getMany(Lead $lead)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        return $this->callAndCastMany('get', "lead/{$lead->getId()}/phones");
    }

    /**
     * @param Lead         $lead
     * @param Lead\Phone[] $phones
     *
     * @return Lead\Phone[]
     * @throws ErrorException
     */
    public function saveMany(Lead $lead, array $phones)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        foreach ($phones as $key => $phone) {
            $phones[$key] = $phone->toArray();
        }

        return $this->callAndCastMany('post', "lead/{$lead->getId()}/phones", ['batch' => $phones]);
    }
}