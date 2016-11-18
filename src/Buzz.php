<?php namespace Buzz\Control;

use Buzz\Control\Objects\Stream;

/**
 * Class Buzz
 *
 * @package Buzz\Control
 */
class Buzz
{
    /**
     * @var Credentials
     */
    protected $credentials;

    /**
     * @var Stream
     */
    protected $stream;

    /**
     * @var CustomerFlow
     */
    protected $customerFlow;

    /**
     * @return Credentials
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * @param Credentials $credentials
     */
    public function setCredentials(Credentials $credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * @param $stream
     */
    public function setStream($stream)
    {
        $this->stream = $stream;
    }

    /**
     * @return Stream
     */
    public function getStream()
    {
        return $this->stream;
    }

    /**
     * @return CustomerFlow
     */
    public function getCustomerFlow()
    {
        return $this->customerFlow;
    }

    /**
     * @param CustomerFlow $customerFlow
     */
    public function setCustomerFlow(CustomerFlow $customerFlow)
    {
        $this->customerFlow = $customerFlow;
    }
}
