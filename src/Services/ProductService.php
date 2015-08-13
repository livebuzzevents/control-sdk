<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Product;

/**
 * Class ProductService
 *
 * @package Buzz\Control\Services
 */
class ProductService extends Service
{
    /**
     * @var
     */
    protected static $cast = Product::class;

    /**
     * @param Product $product
     *
     * @return Product
     * @throws ErrorException
     */
    public function get(Product $product)
    {
        if (!$product->getId()) {
            throw new ErrorException('Product id required!');
        }

        return $this->callAndCast('get', "product/{$product->getId()}");
    }

    /**
     * @param Product $product
     *
     * @throws ErrorException
     */
    public function delete(Product $product)
    {
        if (!$product->getId()) {
            throw new ErrorException('Product id required!');
        }

        $this->call('delete', "product/{$product->getId()}");
    }

    /**
     * @param Product $product
     *
     * @return Product
     * @throws ErrorException
     */
    public function save(Product $product)
    {
        if (!$product->getId() && !$product->getCampaignId() && !$product->getCampaign()) {
            throw new ErrorException('Product id or Campaign id/identifier required!');
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

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'products');
    }

    /**
     * @return Product[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'products');
    }

    /**
     * @param Product[] $products
     *
     * @return Product[]
     * @throws ErrorException
     */
    public function saveMany(array $products)
    {
        foreach ($products as $key => $product) {
            if (!$product->getId() && !$product->getCampaignId() && !$product->getCampaign()) {
                throw new ErrorException('Product id or Campaign id/identifier required!');
            }

            $products[$key] = $product->toArray();
        }

        return $this->callAndCastMany('post', 'products', ['batch' => $products]);
    }
}