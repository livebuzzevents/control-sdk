<?php namespace Buzz\Control\Objects\Customer;

use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Traits\BelongsToAffiliate;
use Buzz\Control\Objects\Traits\BelongsToCustomer;

/**
 * Class Address
 *
 * @package Buzz\Control\Objects\Customer
 */
class Affiliate extends Object
{
    use BelongsToCustomer, BelongsToAffiliate;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $token;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }
}
