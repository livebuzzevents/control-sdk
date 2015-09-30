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
     * @var Scope
     */
    protected $scope;

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
     * @return Scope
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @param Scope $scope
     */
    public function setScope(Scope $scope)
    {
        $this->scope = $scope;
    }

    /**
     * @param Stream $stream
     */
    public function setStream(Stream $stream)
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
