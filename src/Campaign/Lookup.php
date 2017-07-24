<?php

namespace Buzz\Control\Campaign;

use JTDSoft\EssentialsSdk\Exceptions\ErrorException;

/**
 * Class Lookup
 */
class Lookup extends Object
{
    /**
     * @param string $country
     * @param string $postcode
     *
     * @return mixed
     * @throws \JTDSoft\EssentialsSdk\Exceptions\ErrorException
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
     *
     * @return mixed
     * @throws \JTDSoft\EssentialsSdk\Exceptions\ErrorException
     */
    public function addressByTerm(string $country, string $term)
    {
        if (!$country) {
            throw new ErrorException('Country required!');
        }
        if (!$term) {
            throw new ErrorException('Term required!');
        }

        return $this->api()->get($this->getEndpoint("address-by-term/{$country}/{$term}"));
    }

    /**
     * @param string $email
     *
     * @return mixed
     * @throws \JTDSoft\EssentialsSdk\Exceptions\ErrorException
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
     * @throws \JTDSoft\EssentialsSdk\Exceptions\ErrorException
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
        return $this->api()->get($this->getEndpoint('country/' . $country));
    }
}
