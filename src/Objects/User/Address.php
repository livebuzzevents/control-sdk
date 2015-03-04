<?php namespace Buzz\Control\Objects\User;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Object;

/**
 * Class Address
 *
 * @package Buzz\Control\Objects\User
 */
class Address extends Object
{
    /**
     * @var
     */
    protected $type;
    /**
     * @var
     */
    protected $postcode;
    /**
     * @var
     */
    protected $address;
    /**
     * @var
     */
    protected $city;
    /**
     * @var
     */
    protected $country;
    /**
     * @var
     */
    protected $county;

    /**
     * @return mixed
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param mixed $postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param $country
     *
     * @throws ErrorException
     */
    public function setCountry($country)
    {
        if (strlen($country) !== 2) {
            throw new ErrorException('Country must be in ISO 3166 format');
        }

        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * @param $county
     */
    public function setCounty($county)
    {
        $this->county = $county;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
