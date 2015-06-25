<?php namespace Buzz\Control\Services\Product;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Product;

class Save implements Service
{
    /**
     * @var Product
     */
    private $product;

    public function __construct(Product $product)
    {
        if (!$product->getId() && !$product->getCampaignId()) {
            throw new ErrorException('Product id or Campaign id is required!');
        }

        $this->product = $product;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return $this->product->getId() ? 'put' : 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "product/" . ($this->product->getId() ?: $this->product->getCampaignId());
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

    public function decorate($response)
    {
        return Product::createFromArray($response);
    }
}