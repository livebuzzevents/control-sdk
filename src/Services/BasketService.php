<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Basket;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Order;
use Buzz\Control\Objects\PaymentProvider;
use Buzz\Control\Objects\Product;

/**
 * Class BasketService
 *
 * @package Buzz\Control\Services
 */
class BasketService extends Service
{
    /**
     * @var
     */
    protected static $cast = Basket::class;

    /**
     * @param Customer $customer
     * @param array    $options
     *
     * @return Basket
     * @throws ErrorException
     */
    public function create(Customer $customer, array $options = null)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->callAndCast('post', "basket/create/{$customer->getId()}", $options);
    }

    /**
     * @param Basket $basket
     *
     * @return Basket
     * @throws ErrorException
     */
    public function generate(Basket $basket)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        return $this->call('get', "basket/{$basket->getId()}/generate");
    }

    /**
     * @param Basket $basket
     *
     * @return Basket
     * @throws ErrorException
     */
    public function reset(Basket $basket)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        return $this->callAndCast('delete', "basket/{$basket->getId()}/reset");
    }

    /**
     * @param Basket  $basket
     * @param Product $product
     * @param int     $quantity
     *
     * @return Basket
     * @throws ErrorException
     */
    public function addProduct(Basket $basket, Product $product, $quantity = 1)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        if (!$product->getId()) {
            throw new ErrorException('Product id required!');
        }

        return $this->callAndCast('post', "basket/{$basket->getId()}/product/{$product->getId()}/{$quantity}");
    }

    /**
     * @param Basket  $basket
     * @param Product $product
     * @param int     $quantity
     *
     * @return Basket
     * @throws ErrorException
     */
    public function updateProduct(Basket $basket, Product $product, $quantity = 1)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        if (!$product->getId()) {
            throw new ErrorException('Product id required!');
        }

        return $this->callAndCast('put', "basket/{$basket->getId()}/product/{$product->getId()}/{$quantity}");
    }

    /**
     * @param Basket  $basket
     * @param Product $product
     *
     * @return Basket
     * @throws ErrorException
     */
    public function removeProduct(Basket $basket, Product $product)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        if (!$product->getId()) {
            throw new ErrorException('Product id required!');
        }

        return $this->callAndCast('delete', "basket/{$basket->getId()}/product/{$product->getId()}");
    }

    /**
     * @param Basket $basket
     * @param array  $product_ids
     *
     * @return Basket
     * @throws ErrorException
     */
    public function removeProducts(Basket $basket, array $product_ids = null)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        return $this->callAndCast('delete', "basket/{$basket->getId()}/products", compact('product_ids'));
    }

    /**
     * @param Basket $basket
     * @param array  $products
     *
     * @return Basket
     * @throws ErrorException
     */
    public function updateProducts(Basket $basket, array $products)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        return $this->callAndCast('put', "basket/{$basket->getId()}/products", compact('products'));
    }

    /**
     * @param Basket  $basket
     * @param Product $product
     * @param string  $name
     * @param array   $parameters
     *
     * @return Basket
     * @throws ErrorException
     */
    public function addAction(Basket $basket, Product $product, $name, array $parameters)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        if (!$product->getId()) {
            throw new ErrorException('Product id required!');
        }

        return $this->callAndCast(
            'post',
            "basket/{$basket->getId()}/action/{$product->getId()}",
            compact('name', 'parameters')
        );
    }

    /**
     * @param Basket  $basket
     * @param Product $product
     * @param array   $actions
     *
     * @return Basket
     * @throws ErrorException
     */
    public function updateActions(Basket $basket, Product $product, array $actions)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        if (!$product->getId()) {
            throw new ErrorException('Product id required!');
        }

        return $this->callAndCast(
            'put',
            "basket/{$basket->getId()}/actions/{$product->getId()}",
            compact('actions')
        );
    }

    /**
     * @param Basket  $basket
     * @param Product $product
     *
     * @return Basket
     * @throws ErrorException
     */
    public function removeActions(Basket $basket, Product $product)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        if (!$product->getId()) {
            throw new ErrorException('Product id required!');
        }

        return $this->callAndCast('delete', "basket/{$basket->getId()}/actions/{$product->getId()}");
    }

    /**
     * @param Basket          $basket
     * @param PaymentProvider $paymentProvider
     *
     * @return Basket
     * @throws ErrorException
     */
    public function setPaymentProvider(Basket $basket, PaymentProvider $paymentProvider)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        if (!$paymentProvider->getId()) {
            throw new ErrorException('Payment provider id required!');
        }

        return $this->callAndCast('post', "basket/{$basket->getId()}/payment-provider/{$paymentProvider->getId()}");
    }

    /**
     * @param Basket $basket
     *
     * @return Basket
     * @throws ErrorException
     *
     */
    public function unsetPaymentProvider(Basket $basket)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        return $this->callAndCast('delete', "basket/{$basket->getId()}/payment-provider");
    }

    /**
     * @param Basket $basket
     * @param        $code
     *
     * @return Basket
     * @throws ErrorException
     *
     */
    public function setDiscountCode(Basket $basket, $code)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        if (!$code) {
            throw new ErrorException('Code required!');
        }

        return $this->callAndCast('post', "basket/{$basket->getId()}/discount-code/{$code}");
    }

    /**
     * @param Basket $basket
     *
     * @return Basket
     * @throws ErrorException
     *
     */
    public function unsetDiscountCode(Basket $basket)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        return $this->callAndCast('delete', "basket/{$basket->getId()}/discount-code");
    }

    /**
     * @param Basket $basket
     * @param array  $details
     *
     * @return mixed
     * @throws ErrorException
     */
    public function setBillingDetails(Basket $basket, array $details)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        return $this->callAndCast('post', "basket/{$basket->getId()}/billing-details", $details);
    }

    /**
     * @param Basket $basket
     *
     * @return mixed
     * @throws ErrorException
     */
    public function unsetBillingDetails(Basket $basket)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        return $this->callAndCast('delete', "basket/{$basket->getId()}/billing-details");
    }

    /**
     * @param Basket $basket
     * @param array  $details
     *
     * @return mixed
     * @throws ErrorException
     */
    public function setShippingDetails(Basket $basket, array $details)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        return $this->callAndCast('post', "basket/{$basket->getId()}/shipping-details", $details);
    }

    /**
     * @param Basket $basket
     *
     * @return mixed
     * @throws ErrorException
     */
    public function unsetShippingDetails(Basket $basket)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        return $this->callAndCast('delete', "basket/{$basket->getId()}/shipping-details");
    }

    /**
     * @param Basket $basket
     * @param string $po_number
     *
     * @return mixed
     * @throws ErrorException
     */
    public function setPoNumber(Basket $basket, $po_number)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        return $this->callAndCast('post', "basket/{$basket->getId()}/po-number/{$po_number}");
    }

    /**
     * @param Basket $basket
     *
     * @return mixed
     * @throws ErrorException
     */
    public function unsetPoNumber(Basket $basket)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        return $this->callAndCast('delete', "basket/{$basket->getId()}/po-number");
    }

    /**
     * @param Basket $basket
     * @param string $vat_number
     *
     * @return mixed
     * @throws ErrorException
     */
    public function setVatNumber(Basket $basket, $vat_number)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        return $this->callAndCast('post', "basket/{$basket->getId()}/vat-number/{$vat_number}");
    }

    /**
     * @param Basket $basket
     *
     * @return mixed
     * @throws ErrorException
     */
    public function unsetVatNumber(Basket $basket)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        return $this->callAndCast('delete', "basket/{$basket->getId()}/vat-number");
    }

    /**
     * @param Basket $basket
     * @param string $vat_exempt
     *
     * @return mixed
     * @throws ErrorException
     */
    public function setVatExempt(Basket $basket, $vat_exempt)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        return $this->callAndCast('post', "basket/{$basket->getId()}/vat-exempt/{$vat_exempt}");
    }

    /**
     * @param Basket $basket
     *
     * @return mixed
     * @throws ErrorException
     */
    public function place(Basket $basket)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        return $this->cast(
            $this->call('get', "basket/{$basket->getId()}/place"),
            Order::class
        );
    }

    /**
     * @param Basket $basket
     *
     * @return Basket
     * @throws ErrorException
     */
    public function get(Basket $basket)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        return $this->callAndCast('get', "basket/{$basket->getId()}");
    }

    /**
     * @param Basket $basket
     *
     * @throws ErrorException
     */
    public function delete(Basket $basket)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        $this->call('delete', "basket/{$basket->getId()}");
    }

    /**
     * @param Basket $basket
     *
     * @return Basket
     * @throws ErrorException
     */
    public function save(Basket $basket)
    {
        if ($basket->getId()) {
            $verb = 'put';
            $url  = 'basket/' . $basket->getId();
        } else {
            $verb = 'post';
            $url  = 'basket';
        }

        return $this->callAndCast($verb, $url, $basket->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'baskets');
    }

    /**
     * @return Basket[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'baskets');
    }

    /**
     * @param Basket[] $baskets
     *
     * @return Basket[]
     * @throws ErrorException
     */
    public function saveMany(array $baskets)
    {
        foreach ($baskets as $key => $basket) {
            $baskets[$key] = $basket->toArray();
        }

        return $this->callAndCastMany('post', 'baskets', ['batch' => $baskets]);
    }
}