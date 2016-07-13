<?php namespace Buzz\Control\Services\Product;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Product;
use Buzz\Control\Services\Service;

/**
 * Class PropertyService
 *
 * @package Buzz\Control\Services\Product
 */
class PropertyService extends Service
{
    /**
     * @var
     */
    protected static $cast = Product\Property::class;

    /**
     * @param Product          $product
     * @param Product\Property $property
     *
     * @return Product\Property
     * @throws ErrorException
     */
    public function get(Product $product, Product\Property $property)
    {
        if (!$product->getId()) {
            throw new ErrorException('Product id required!');
        }

        if (!$property->getId()) {
            throw new ErrorException('Property id required!');
        }

        return $this->callAndCast('get', "product/{$product->getId()}/property/{$property->getId()}");
    }

    /**
     * @param Product          $product
     * @param Product\Property $property
     *
     * @throws ErrorException
     */
    public function delete(Product $product, Product\Property $property)
    {
        if (!$product->getId()) {
            throw new ErrorException('Product id required!');
        }

        if (!$property->getId()) {
            throw new ErrorException('Property id required!');
        }

        $this->call('delete', "product/{$product->getId()}/property/{$property->getId()}");
    }

    /**
     * @param Product          $product
     * @param Product\Property $property
     *
     * @return Product\Property
     * @throws ErrorException
     */
    public function save(Product $product, Product\Property $property)
    {
        if (!$product->getId()) {
            throw new ErrorException('Product id required!');
        }

        if ($property->getId()) {
            $verb = 'put';
            $url  = "product/{$product->getId()}/property/{$property->getId()}";
        } else {
            $verb = 'post';
            $url  = "product/{$product->getId()}/property";
        }

        return $this->callAndCast($verb, $url, $property->toArray());
    }

    /**
     * @param Product $product
     *
     * @throws ErrorException
     */
    public function deleteMany(Product $product)
    {
        if (!$product->getId()) {
            throw new ErrorException('Product id required!');
        }

        $this->call('delete', "product/{$product->getId()}/properties");
    }

    /**
     * @param Product $product
     *
     * @return Product\Property[]
     * @throws ErrorException
     */
    public function getMany(Product $product)
    {
        if (!$product->getId()) {
            throw new ErrorException('Product id required!');
        }

        return $this->callAndCastMany('get', "product/{$product->getId()}/properties");
    }

    /**
     * @param Product            $product
     * @param Product\Property[] $properties
     *
     * @return Product\Property[]
     * @throws ErrorException
     */
    public function saveMany(Product $product, array $properties)
    {
        if (!$product->getId()) {
            throw new ErrorException('Product id required!');
        }

        foreach ($properties as $key => $property) {
            $properties[$key] = $property->toArray();
        }

        return $this->callAndCastMany('post', "product/{$product->getId()}/properties", ['batch' => $properties]);
    }
}