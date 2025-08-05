<?php

namespace Buzz\Control\Campaign;

use Buzz\EssentialsSdk\Exceptions\ErrorException;

/**
 * Class Lookup
 */
class Lookup extends SdkObject
{
    /**
     * @param string $country
     * @param string $postcode
     *
     * @return mixed
     * @throws \Buzz\EssentialsSdk\Exceptions\ErrorException
     */
    public function addressByPostcode(string $country, string $postcode)
    {
        if (!$country) {
            throw new ErrorException('Country required!');
        }
        if (!$postcode) {
            throw new ErrorException('Postcode required!');
        }

        return $this->api()->get($this->getEndpoint("address-by-postcode/{$country}/{$postcode}"));
    }

    /**
     * @param string $country
     * @param string $term
     * @param string $id
     *
     * @return mixed
     * @throws ErrorException
     */
    public function addressByTerm(string $country)
    {
        return $this->api()->post($this->getEndpoint("address-by-term/$country"), request()->input());
    }

    /**
     * @param string $email
     *
     * @return mixed
     * @throws \Buzz\EssentialsSdk\Exceptions\ErrorException
     */
    public function email(string $email)
    {
        if (!$email) {
            throw new ErrorException('Email required!');
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new ErrorException('Invalid email address');
        }

        return $this->api()->get($this->getEndpoint('email/' . $email));
    }

    /**
     * @param string $ip
     *
     * @return mixed
     * @throws \Buzz\EssentialsSdk\Exceptions\ErrorException
     */
    public function ip(string $ip)
    {
        if (!$ip) {
            throw new ErrorException('Ip required!');
        }
        if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
            throw new ErrorException('Invalid IP address');
        }

        return $this->api()->get($this->getEndpoint('ip/' . $ip));
    }

    /**
     * @param string|null $country
     *
     * @return mixed
     */
    public function country(string $country = null)
    {
        return $this->api()->get($this->getEndpoint(sprintf('country/%s', $country, app()->getLocale())), [
            'locale' => app()->getLocale(),
        ]);
    }

    public function states()
    {
        return $this->api()->get($this->getEndpoint('states'));
    }
}
