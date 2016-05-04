<?php namespace Buzz\Control\Services;

use Buzz\Control\Collection;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Campaign;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Invite;

/**
 * Class CustomerService
 *
 * @package Buzz\Control\Services
 */
class CustomerService extends Service
{
    /**
     * @var
     */
    protected static $cast = Customer::class;

    /**
     * @param array $credentials
     *
     * @return Customer
     */
    public function login(array $credentials)
    {
        $user_information = [
            'user_agent'      => !empty($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : null,
            'accept_language' => !empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : null,
        ];

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $user_information['x_ip'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        if (!empty($_SERVER['REMOTE_ADDR'])) {
            $user_information['ip'] = $_SERVER['REMOTE_ADDR'];
        }

        $credentials['user_information'] = $user_information;

        return $this->callAndCast('get', 'customer/login', $credentials);
    }

    /**
     * @param Customer $customer
     *
     * @throws ErrorException
     */
    public function sendPasswordResetEmail(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('get', "customer/send-password-reset-email/{$customer->getId()}");
    }

    /**
     * @param string $token
     *
     * @return mixed
     */
    public function activatePasswordReset($token)
    {
        return $this->callAndCast('get', "customer/activate-password-reset/{$token}");
    }

    /**
     * @param string   $provider
     * @param Customer $customer
     *
     * @return mixed
     */
    public function socialConnect($provider, Customer $customer = null)
    {
        $url = "customer/social-connect/{$provider}";

        if ($customer) {
            $url .= '/' . $customer->id;
        }

        $response = $this->call('get', $url);

        return $response['url'];
    }

    /**
     * @param Customer $customer
     *
     * @return Customer
     * @throws ErrorException
     */
    public function get(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->callAndCast('get', "customer/{$customer->getId()}");
    }

    /**
     * @param Customer $customer
     *
     * @throws ErrorException
     */
    public function delete(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}");
    }

    /**
     * @param Customer $customer
     *
     * @param Campaign $campaign
     *
     * @return mixed
     * @throws ErrorException
     */
    public function cloneForCampaign(Customer $customer, Campaign $campaign)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$campaign->getId()) {
            throw new ErrorException('Campaign id required!');
        }

        return $this->callAndCast('delete', "customer/{$customer->getId()}/clone-for-campaign/{$customer->getId()}");
    }

    /**
     * @param Customer $customer
     *
     * @return Customer
     * @throws ErrorException
     */
    public function save(Customer $customer)
    {
        if (!$customer->getId() && !$customer->getCampaignId() && !$customer->getCampaign()) {
            throw new ErrorException('Customer id or Campaign id/identifier required!');
        }

        if ($customer->getId()) {
            $verb = 'put';
            $url  = 'customer/' . $customer->getId();
        } else {
            $verb = 'post';
            $url  = 'customer';
        }

        return $this->callAndCast($verb, $url, $customer->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'customers');
    }

    /**
     * @return Customer[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'customers');
    }

    /**
     * @param Customer[] $customers
     *
     * @return Customer[]
     * @throws ErrorException
     */
    public function saveMany(array $customers)
    {
        foreach ($customers as $key => $customer) {
            if (!$customer->getId() && !$customer->getCampaignId() && !$customer->getCampaign()) {
                throw new ErrorException('Customer id or Campaign id/identifier required!');
            }

            $customers[$key] = $customer->toArray();
        }

        return $this->callAndCastMany('post', 'customers', ['batch' => $customers]);
    }

    /**
     * @param Customer $customer
     * @param int      $count
     *
     * @return mixed
     * @throws ErrorException
     */
    public function suggestExhibitors(Customer $customer, $count = 15)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $exhibitors = $this->call('get', "customer/{$customer->getId()}/suggest-exhibitors/{$count}");

        return $this->castMany($exhibitors, Exhibitor::class);
    }

    /**
     * @param Customer $customer
     *
     * @return mixed
     * @throws ErrorException
     */
    public function suggestConnections(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return new Collection($this->call('get', "customer/{$customer->getId()}/suggest-connections"));
    }

    /**
     * @param Customer $customer
     *
     * @return mixed
     * @throws ErrorException
     */
    public function getEmailInvites(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->castMany($this->call('get', "customer/{$customer->getId()}/email-invites"), Invite::class);
    }

    /**
     * @param Customer $customer
     * @param Invite   $invite
     *
     * @return mixed
     * @throws ErrorException
     */
    public function attachInvite(Customer $customer, Invite $invite)
    {
        if (!$customer->getId() || !$invite->getId()) {
            throw new ErrorException('Customer id and Invite id required!');
        }

        $exhibitors = $this->call('get', "customer/{$customer->getId()}/invite/{$invite->getId()}/attach");

        return $this->castMany($exhibitors, Exhibitor::class);
    }

    /**
     * @param Customer $customer
     *
     * @return Collection
     * @throws ErrorException
     */
    public function detachInvite(Customer $customer, Invite $invite)
    {
        if (!$customer->getId() || !$invite->getId()) {
            throw new ErrorException('Customer id and Invite id required!');
        }

        return new Collection($this->call('get', "customer/{$customer->getId()}/invite/{$invite->getId()}/detach"));
    }
}