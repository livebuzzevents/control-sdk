<?php namespace Buzz\Control\Services\Product;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Campaign;
use Buzz\Control\Objects\Product;

/**
 * Class Create
 *
 * @package Buzz\Control\Services\Product
 */
class Create implements Service
{
    /**
     * @var Product
     */
    private $product;

    /**
     * @var
     */
    private $campaign;

    /**
     * @param Campaign $campaign
     * @param Product $product
     *
     * @throws ErrorException
     */
    public function __construct(Campaign $campaign, Product $product)
    {
        if (empty($campaign->getId())) {
            throw new ErrorException('Campaign id required!');
        }

        $this->product = $product;
        $this->campaign = $campaign;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return 'product/' . $this->campaign->getId();
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->product->toArray();
    }

    /**
     * @param $response
     *
     * @return static
     */
    public function decorate($response)
    {
        return Product::createFromArray($response);
    }
}