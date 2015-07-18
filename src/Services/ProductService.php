<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Product;

class ProductService extends Service
{
    protected static $cast = Product::class;

    public function get(Product $product)
    {
        if (!$product->getId()) {
            throw new ErrorException('Product id required!');
        }

        return $this->callAndCast('get', "product/{$product->getId()}");
    }

    public function delete(Product $product)
    {
        if (!$product->getId()) {
            throw new ErrorException('Product id required!');
        }

        $this->call('delete', "product/{$product->getId()}");
    }

    public function save(Product $product)
    {
        if (!$product->getId() && !$product->getCampaignId()) {
            throw new ErrorException('Product id or Campaign id required!');
        }

        if ($product->getId()) {
            $verb = 'put';
            $url  = 'product/' . $product->getId();
        } else {
            $verb = 'post';
            $url  = 'product';
        }

        return $this->callAndCast($verb, $url, $product->toArray());
    }

    public function deleteMany()
    {
        $this->call('delete', 'products');
    }

    public function getMany()
    {
        return $this->callAndCastMany('get', 'products');
    }

    public function saveMany(array $products)
    {
        foreach ($products as $key => $product) {
            if (!$product->getId() && !$product->getCampaignId()) {
                throw new ErrorException('Product id or Campaign id required!');
            }

            $products[$key] = $product->toArray();
        }

        return $this->callAndCastMany('post', 'products', $products);
    }
}