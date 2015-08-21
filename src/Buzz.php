<?php namespace Buzz\Control;

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
