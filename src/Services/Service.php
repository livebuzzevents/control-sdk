<?php

namespace Buzz\Control\Services;

use Buzz\Control\Buzz;
use Buzz\Control\Contracts\Client;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Filter;
use Buzz\Control\GuzzleClient;
use Buzz\Control\Paging;

/**
 * Class Service
 *
 * @package Buzz\Control\Services
 */
abstract class Service
{
    /**
     * @var string
     */
    protected static $cast;

    /**
     * @var Buzz
     */
    protected $buzz;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var array
     */
    protected $settings = [
        'api_key'   => false,
        'keyBy'     => null,
        'page'      => 1,
        'per_page'  => 15,
        'order'     => 'id',
        'direction' => 'asc'
    ];

    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @param Buzz   $buzz
     * @param Client $client
     */
    public final function __construct(Buzz $buzz, Client $client = null)
    {
        $this->buzz   = $buzz;
        $this->client = $client ?: new GuzzleClient();
    }

    /**
     * @param int $page
     *
     * @return $this
     */
    public function page($page)
    {
        return $this->setSetting('page', $page);
    }

    /**
     * @param $key
     * @param $value
     *
     * @return $this
     */
    public function setSetting($key, $value)
    {
        $this->settings[$key] = $value;

        return $this;
    }

    /**
     * @param int $per_page
     *
     * @return $this
     */
    public function perPage($per_page)
    {
        return $this->setSetting('per_page', $per_page);
    }

    /**
     * @param string $order
     *
     * @return $this
     */
    public function order($order)
    {
        return $this->setSetting('order', $order);
    }

    /**
     * @param string $direction
     *
     * @return $this
     */
    public function direction($direction)
    {
        return $this->setSetting('direction', $direction);
    }

    /**
     * @param $parameter
     * @param $operator
     * @param $value
     *
     * @return Service
     */
    public final function where($parameter, $operator, $value)
    {
        $clone = clone $this;

        if (!$clone->filter) {
            $clone->filter = new Filter();
        }

        if ($clone->filter) {
            $clone->filter->add($parameter, $operator, $value);
        }

        return $clone;
    }

    /**
     * @param string $keyBy
     *
     * @return $this
     */
    public final function keyBy($keyBy = 'id')
    {
        return $this->setSetting('keyBy', $keyBy);
    }

    /**
     * @param ...$parameters
     *
     * @return mixed
     */
    protected final function callAndCast(...$parameters)
    {
        return $this->cast($this->call(...$parameters));
    }

    /**
     * @param $response
     *
     * @return mixed
     */
    protected final function cast($response)
    {
        $object = static::$cast;

        return new $object($response);
    }

    /**
     * @param       $verb
     * @param       $method
     * @param array $request
     *
     * @return mixed
     * @throws \Buzz\Control\Exceptions\ErrorException
     * @throws \Buzz\Control\Exceptions\ResponseException
     * @throws \Buzz\Control\Exceptions\ServerException
     * @throws \Buzz\Control\Exceptions\UnauthorizedException
     */
    protected final function call($verb, $method, array $request = [])
    {
        $request['_settings'] = $this->settings;

        if ($this->filter) {
            $request['_settings']['filters'] = $this->filter->getFilters();
        }

        $request['_settings']['api_key'] = $this->buzz->getCredentials()->getApiKey();

        if ($this->buzz->getScope()) {
            $request['_settings']['scope'] = $this->buzz->getScope()->getScope();
        }

        if ($this->buzz->getCustomerFlow()) {
            $request['_settings']['customer_flow'] = [
                'customer_id' => $this->buzz->getCustomerFlow()->getCustomer()->id,
                'step'        => $this->buzz->getCustomerFlow()->getStep(),
                'origin'      => $this->buzz->getCustomerFlow()->getOrigin()
            ];
        }

        return $this->client->request(
            $verb,
            $this->getUrl($method),
            $request
        );
    }

    /**
     * @param string $method
     *
     * @return string
     */
    private function getUrl($method)
    {
        return $this->buzz->getCredentials()->getEndpoint() . $this->buzz->getCredentials()->getOrganization() . '/' . $method;
    }

    /**
     * @param ...$parameters
     *
     * @return mixed
     */
    protected final function callAndCastMany(...$parameters)
    {
        return $this->castMany($this->call(...$parameters));
    }

    /**
     * @param $response
     *
     * @return mixed
     * @throws ErrorException
     */
    protected final function castMany($response)
    {
        $result = [];

        if (isset($response['total']) && isset($response['data'])) { //for paging
            $paging = new Paging();

            $paging->setTotal($response['total']);
            $paging->setLastPage($response['last_page']);
            $paging->setFrom($response['from']);
            $paging->setTo($response['to']);
            $paging->setItems($this->castMany($response['data']));

            return $paging;
        }

        foreach ($response as $key => $value) {
            if (!$this->getSetting('keyBy')) {
                $result[$key] = self::cast($value);
            } else {
                if (!is_array($value)) {
                    throw new ErrorException('KeyBy expects each result to be an array!');
                }
                if (!array_key_exists($this->getSetting('keyBy'), $value)) {
                    throw new ErrorException(sprintf('Parameter %1$s does not exist!', $this->keyBy));
                }

                $result[$value[$this->getSetting('keyBy')]] = self::cast($value);
            }
        }

        return $result;
    }

    /**
     * @param $key
     *
     * @return string
     */
    public function getSetting($key)
    {
        return isset($this->settings[$key]) ? $this->settings[$key] : null;
    }
}