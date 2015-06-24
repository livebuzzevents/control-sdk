<?php namespace Buzz\Control\Services\Product;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Product;

class Get implements Service
{
    /**
     * @var Product
     */
    private $product;

    public function __construct(Product $product)
    {
        if (!$product->getId()) {
            throw new ErrorException('Product id required!');
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
        return 'get';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "product/{$this->product->getId()}";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return [];
    }

    public function decorate($response)
    {
        return Product::createFromArray($response);
    }
}