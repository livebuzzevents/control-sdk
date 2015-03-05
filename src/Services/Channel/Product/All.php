<?php namespace Buzz\Control\Services\Channel\Product;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Channel;
use Buzz\Control\Objects\Channel\Product;
use Buzz\Control\Objects\Filter;

/**
 * Class All
 *
 * @package Buzz\Control\Services\Channel\Address
 */
class All implements Service
{
    /**
     * @var Channel
     */
    private $channel;
    /**
     * @var Filter
     */
    private $filter;

    /**
     * @param Channel $channel
     * @param Filter  $filter
     *
     * @throws ErrorException
     */
    public function __construct(Channel $channel, Filter $filter = null)
    {
        if (empty($channel->getId())) {
            throw new ErrorException('Channel id required!');
        }

        $this->channel = $channel;
        $this->filter = $filter;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return 'get';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "channel/{$this->channel->getId()}/product";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->filter ? ['filter' => $this->filter->getFilters()] : [];
    }

    /**
     * @param $response
     *
     * @return array
     */
    public function decorate($response)
    {
        $decorated = [];

        foreach ($response as $product) {
            array_push($decorated, Product::createFromArray($product));
        }

        return $decorated;
    }
}