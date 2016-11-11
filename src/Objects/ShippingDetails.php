<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToOrder;

/**
 * Class Order
 *
 * @package Buzz\Control\Objects
 */
class ShippingDetails extends Base
{
    use BelongsToOrder;

    /**
     * @var
     */
    protected $email;

    /**
     * @var
     */
    protected $title;

    /**
     * @var
     */
    protected $first_name;

    /**
     * @var
     */
    protected $middle_name;

    /**
     * @var
     */
    protected $last_name;

    /**
     * @var
     */
    protected $phone;

    /**
     * @var
     */
    protected $postcode;

    /**
     * @var
     */
    protected $line_1;

    /**
     * @var string
     */
    protected $line_2;

    /**
     * @var
     */
    protected $line_3;

    /**
     * @var
     */
    protected $city;

    /**
     * @var
     */
    protected $county;

    /**
     * @var
     */
    protected $country;

    /**
     * @var
     */
    protected $client;

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param string $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * @param string $county
     */
    public function setCounty($county)
    {
        $this->county = $county;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getLine1()
    {
        return $this->line_1;
    }

    /**
     * @param string $line_1
     */
    public function setLine1($line_1)
    {
        $this->line_1 = $line_1;
    }

    /**
     * @return string
     */
    public function getLine2()
    {
        return $this->line_2;
    }

    /**
     * @param string $line_2
     */
    public function setLine2($line_2)
    {
        $this->line_2 = $line_2;
    }

    /**
     * @return string
     */
    public function getLine3()
    {
        return $this->line_3;
    }

    /**
     * @param string $line_3
     */
    public function setLine3($line_3)
    {
        $this->line_3 = $line_3;
    }

    /**
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middle_name;
    }

    /**
     * @param string $middle_name
     */
    public function setMiddleName($middle_name)
    {
        $this->middle_name = $middle_name;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param string $postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}
