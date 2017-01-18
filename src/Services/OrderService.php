<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Order;

/**
 * Class OrderService
 *
 * @package Buzz\Control\Services
 */
class OrderService extends Service
{
    /**
     * @var
     */
    protected static $cast = Order::class;

    /**
     * @param Order $order
     *
     * @return Order
     * @throws ErrorException
     */
    public function get(Order $order)
    {
        if (!$order->getId()) {
            throw new ErrorException('Order id required!');
        }

        return $this->callAndCast('get', "order/{$order->getId()}");
    }

    /**
     * @param Order $order
     * @param array $request
     *
     * @return Order
     * @throws ErrorException
     */
    public function getCheckoutLink(Order $order, array $request)
    {
        if (!$order->getId()) {
            throw new ErrorException('Order id required!');
        }

        return $this->call('get', "order/{$order->getId()}/checkout-link", $request)['checkout-link'];
    }

    /**
     * @param Order $order
     *
     * @return Order
     * @throws ErrorException
     */
    public function getInvoice(Order $order)
    {
        if (!$order->getId()) {
            throw new ErrorException('Order id required!');
        }

        return base64_decode($this->call('get', "order/{$order->getId()}/invoice")['invoice']);
    }

    /**
     * @return Order[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'orders');
    }

    /**
     * @param Order $order
     *
     * @return Order
     * @throws ErrorException
     */
    public function complete(Order $order)
    {
        if (!$order->getId()) {
            throw new ErrorException('Order id required!');
        }

        return $this->callAndCast('get', "order/{$order->getId()}/complete");
    }
}
