<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Charge;
use Buzz\Control\Objects\Order;
use Buzz\Control\Objects\PaymentProvider;

/**
 * Class PaymentService
 *
 * @package Buzz\Control\Services
 */
class PaymentService extends Service
{
    public function cancel(Order $order, Charge $charge)
    {
        if (!$order->getId()) {
            throw new ErrorException('Order id required!');
        }
        if (!$charge->getId()) {
            throw new ErrorException('Charge id required!');
        }

        return $this->call('delete', "order/{$order->getId()}/payment/cancel/{$charge->getId()}");
    }

    public function generate(Order $order, PaymentProvider $paymentProvider)
    {
        if (!$order->getId()) {
            throw new ErrorException('Order id required!');
        }

        return $this->call('post', "order/{$order->getId()}/payment/generate", $paymentProvider);
    }
}
