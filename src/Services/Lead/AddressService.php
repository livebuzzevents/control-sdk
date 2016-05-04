<?php namespace Buzz\Control\Services\Lead;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Lead;
use Buzz\Control\Services\Service;

/**
 * Class AddressService
 *
 * @package Buzz\Control\Services\Lead
 */
class AddressService extends Service
{
    /**
     * @var
     */
    protected static $cast = Lead\Address::class;

    /**
     * @param Lead         $lead
     * @param Lead\Address $address
     *
     * @return Lead\Address
     * @throws ErrorException
     */
    public function get(Lead $lead, Lead\Address $address)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if (!$address->getId()) {
            throw new ErrorException('Address id required!');
        }

        return $this->callAndCast('get', "lead/{$lead->getId()}/address/{$address->getId()}");
    }

    /**
     * @param Lead         $lead
     * @param Lead\Address $address
     *
     * @throws ErrorException
     */
    public function delete(Lead $lead, Lead\Address $address)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if (!$address->getId()) {
            throw new ErrorException('Address id required!');
        }

        $this->call('delete', "lead/{$lead->getId()}/address/{$address->getId()}");
    }

    /**
     * @param Lead         $lead
     * @param Lead\Address $address
     *
     * @return Lead\Address
     * @throws ErrorException
     */
    public function save(Lead $lead, Lead\Address $address)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if ($address->getId()) {
            $verb = 'put';
            $url  = "lead/{$lead->getId()}/address/{$address->getId()}";
        } else {
            $verb = 'post';
            $url  = "lead/{$lead->getId()}/address";
        }

        return $this->callAndCast($verb, $url, $address->toArray());
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

        $this->call('delete', "lead/{$lead->getId()}/addresses");
    }

    /**
     * @param Lead $lead
     *
     * @return Lead\Address[]
     * @throws ErrorException
     */
    public function getMany(Lead $lead)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        return $this->callAndCastMany('get', "lead/{$lead->getId()}/addresses");
    }

    /**
     * @param Lead           $lead
     * @param Lead\Address[] $addresses
     *
     * @return Lead\Address
     * @throws ErrorException
     */
    public function saveMany(Lead $lead, array $addresses)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        foreach ($addresses as $key => $address) {
            $addresses[$key] = $address->toArray();
        }

        return $this->callAndCastMany('post', "lead/{$lead->getId()}/addresses", ['batch' => $addresses]);
    }
}