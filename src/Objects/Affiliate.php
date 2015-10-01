<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToStream;

/**
 * Class Affiliate
 *
 * @package Buzz\Control\Objects
 */
class Affiliate extends Object
{
    use BelongsToStream;

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