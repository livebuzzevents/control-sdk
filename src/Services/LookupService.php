<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Question;

/**
 * Class QuestionService
 *
 * @package Buzz\Control\Services
 */
class LookupService extends Service
{
    public function addressByPostcode($country, $postcode)
    {
        if (!$country) {
            throw new ErrorException('Country required!');
        }

        if (!$postcode) {
            throw new ErrorException('Postcode required!');
        }

        return $this->call('get', "lookup/address-by-postcode/{$country}/{$postcode}");
    }

    public function addressByTerm($country, $term)
    {
        if (!$country) {
            throw new ErrorException('Country required!');
        }

        if (!$term) {
            throw new ErrorException('Term required!');
        }

        return $this->call('get', "lookup/address-by-term/{$country}/{$term}");
    }

    public function email($email)
    {
        if (!$email) {
            throw new ErrorException('Email required!');
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new ErrorException('Invalid email address');
        }

        return $this->call('get', "lookup/email/{$email}");
    }

    public function ip($ip)
    {
        if (!$ip) {
            throw new ErrorException('Ip required!');
        }

        if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
            throw new ErrorException('Invalid IP address');
        }

        return $this->call('get', "lookup/ip/{$ip}");
    }

    public function country($country = null)
    {
        return $this->call('get', "lookup/country/{$country}");
    }
}
