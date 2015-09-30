<?php namespace Buzz\Control;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Stream;
use Buzz\Control\Objects\Traits\BelongsToStream;

/**
 * Class Credentials
 *
 * Holds the api credentials for the SDK REST calls
 *
 * @package Buzz\Control
 */
class CustomerFlow
{
    use BelongsToStream;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * Instantiates and fills Rest SDK customer flow
     *
     * @param Customer|null $customer
     * @param Stream|null   $stream
     */
    public function __construct(Customer $customer = null, Stream $stream = null)
    {
        $this->setCustomer($customer);
        $this->setStream($stream);
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

    public function getFlow()
    {
        if (!$this->stream) {
            throw new ErrorException('Stream is required for flow');
        }

        if (!$this->customer) {
            return ['stream' => $this->stream->toArray()];
        }

        return [
            'customer_id' => $this->customer->id,
            'stream'      => $this->stream->toArray(),
        ];
    }
}