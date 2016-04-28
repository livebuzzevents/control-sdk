<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Basket;
use Buzz\Control\Objects\Campaign;
use Buzz\Control\Objects\Order;
use Buzz\Control\Objects\PaymentProvider;

/**
 * Class PaymentProviderService
 *
 * @package Buzz\Control\Services
 */
class PaymentProviderService extends Service
{
    /**
     * @var
     */
    protected static $cast = PaymentProvider::class;

    /**
     * @param PaymentProvider $paymentProvider
     *
     * @return PaymentProvider
     * @throws ErrorException
     */
    public function get(PaymentProvider $paymentProvider)
    {
        if (!$paymentProvider->getId()) {
            throw new ErrorException('PaymentProvider id required!');
        }

        return $this->callAndCast('get', "paymentProvider/{$paymentProvider->getId()}");
    }

    /**
     * @param Campaign $campaign
     * @param string   $destination
     * @param null     $amount
     *
     * @return PaymentProvider
     * @throws ErrorException
     */
    public function getAvailableForCampaign(Campaign $campaign, $destination, $amount)
    {
        if (!$campaign->getId()) {
            throw new ErrorException('Basket id required!');
        }

        return $this->callAndCastMany(
            'get',
            "paymentProvider/available-for-campaign/{$campaign->getId()}",
            compact('destination', 'amount')
        );
    }

    /**
     * @param Basket $basket
     * @param null   $amount
     *
     * @return PaymentProvider
     * @throws ErrorException
     */
    public function getAvailableForBasket(Basket $basket, $amount = null)
    {
        if (!$basket->getId()) {
            throw new ErrorException('Basket id required!');
        }

        return $this->callAndCastMany(
            'get',
            "paymentProvider/available-for-basket/{$basket->getId()}",
            compact('amount')
        );
    }

    /**
     * @param Order $order
     * @param null  $amount
     *
     * @return PaymentProvider
     * @throws ErrorException
     */
    public function getAvailableForOrder(Order $order, $amount = null)
    {
        if (!$order->getId()) {
            throw new ErrorException('Order id required!');
        }

        return $this->callAndCastMany(
            'get',
            "paymentProvider/available-for-order/{$order->getId()}",
            compact('amount')
        );
    }

    /**
     * @param PaymentProvider $paymentProvider
     *
     * @throws ErrorException
     */
    public function delete(PaymentProvider $paymentProvider)
    {
        if (!$paymentProvider->getId()) {
            throw new ErrorException('PaymentProvider id required!');
        }

        $this->call('delete', "paymentProvider/{$paymentProvider->getId()}");
    }

    /**
     * @param PaymentProvider $paymentProvider
     *
     * @return PaymentProvider
     * @throws ErrorException
     */
    public function save(PaymentProvider $paymentProvider)
    {
        if (!$paymentProvider->getId() && !$paymentProvider->getCampaignId() && !$paymentProvider->getCampaign()) {
            throw new ErrorException('PaymentProvider id or Campaign id/identifier required!');
        }

        if ($paymentProvider->getId()) {
            $verb = 'put';
            $url  = 'paymentProvider/' . $paymentProvider->getId();
        } else {
            $verb = 'post';
            $url  = 'paymentProvider';
        }

        return $this->callAndCast($verb, $url, $paymentProvider->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'paymentProviders');
    }

    /**
     * @return PaymentProvider[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'paymentProviders');
    }

    /**
     * @param PaymentProvider[] $paymentProviders
     *
     * @return PaymentProvider[]
     * @throws ErrorException
     */
    public function saveMany(array $paymentProviders)
    {
        foreach ($paymentProviders as $key => $paymentProvider) {
            if (!$paymentProvider->getId() && !$paymentProvider->getCampaignId() && !$paymentProvider->getCampaign()) {
                throw new ErrorException('PaymentProvider id or Campaign id/identifier required!');
            }

            $paymentProviders[$key] = $paymentProvider->toArray();
        }

        return $this->callAndCastMany('post', 'paymentProviders', ['batch' => $paymentProviders]);
    }
}