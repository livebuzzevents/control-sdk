<?php namespace Buzz\Control\Objects\Customer;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Traits\BelongsToCustomer;

/**
 * Class Address
 *
 * @package Buzz\Control\Objects\Customer
 */
class Address extends Object
{
    use BelongsToCustomer;

    /**
     * @var string
     */
    protected $type;
    /**
     * @var string
     */
    protected $postcode;
    /**
     * @var string
     */
    protected $line_1;
    /**
     * @var string
     */
    protected $line_2;
    /**
     * @var string
     */
    protected $line_3;
    /**
     * @var string
     */
    protected $city;
    /**
     * @var string
     */
    protected $country;
    /**
     * @var string
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
    public function getLine1()
    {
        return $this->line_1;
    }

    /**
     * @param mixed $line_1
     */
    public function setLine1($line_1)
    {
        $this->line_1 = $line_1;
    }

    /**
     * @return mixed
     */
    public function getLine2()
    {
        return $this->line_2;
    }

    /**
     * @param mixed $line_2
     */
    public function setLine2($line_2)
    {
        $this->line_2 = $line_2;
    }

    /**
     * @return mixed
     */
    public function getLine3()
    {
        return $this->line_3;
    }

    /**
     * @param mixed $line_3
     */
    public function setLine3($line_3)
    {
        $this->line_3 = $line_3;
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
            throw new ErrorException("Country must be in ISO 3166 format '{$country}'");
        }

        $this->country = mb_strtoupper($country);
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
