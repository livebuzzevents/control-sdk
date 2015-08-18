<?php namespace Buzz\Control\Objects;

/**
 * Class Mailer
 *
 * @package Buzz\Control\Objects\Mailer
 */
class Mailer extends Object
{
    /**
     * @var Email
     */
    protected $email;

    /**
     * @var Customer
     */
    protected $customer;

    /**
     * @var Exhibitor
     */
    protected $exhibitor;

    /**
     * @return Email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param Email $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return Exhibitor
     */
    public function getExhibitor()
    {
        return $this->exhibitor;
    }

    /**
     * @param Exhibitor $exhibitor
     */
    public function setExhibitor($exhibitor)
    {
        $this->exhibitor = $exhibitor;
    }
}