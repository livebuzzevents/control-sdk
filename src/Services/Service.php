<?php

namespace Buzz\Control\Services;

use Buzz\Control\Buzz;
use Buzz\Control\Collection;
use Buzz\Control\Contracts\Client;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Filter;
use Buzz\Control\GuzzleClient;
use Buzz\Control\Paging;
use GuzzleHttp\Client as Guzzle;

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
        'with'      => null,
        'page'      => 1,
        'per_page'  => 15,
        'order'     => 'id',
        'direction' => 'asc',
    ];

    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var array
     */
    protected $headers;

    /**
     * @param Buzz   $buzz
     * @param Client $client
     */
    public final function __construct(Buzz $buzz, Client $client = null)
    {
        $this->buzz   = $buzz;
        $this->client = $client ?: new GuzzleClient(new Guzzle([
            'proxy'  => $buzz->getCredentials()->getProxy(),
            'verify' => $buzz->getCredentials()->verify(),
        ]));
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
    public final function where($parameter, $operator, $value = null)
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
     * @param Filter $filter
     *
     * @return $this
     */
    public function setFilter(Filter $filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * @return Filter
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers ?: [];
    }

    /**
     * @param array $headers
     * @return $this
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;

        return $this;
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
     * @param array $relations
     *
     * @return $this
     */
    public final function with($relations)
    {
        if (is_string($relations)) {
            $relations = func_get_args();
        }

        return $this->setSetting('with', $relations);
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
     * @param      $response
     * @param null $cast
     *
     * @return mixed
     */
    protected final function cast($response, $cast = null)
    {
        $class = $cast ?: static::$cast;

        return new $class($response);
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
    protected final function call($verb, $method, array $request = null)
    {
        if (is_null($request)) {
            $request = [];
        }

        $request['_settings'] = $this->settings;

        if ($this->filter) {
            $request['_settings']['filters'] = $this->filter->toArray();
        }

        $request['_settings']['api_key']  = $this->buzz->getCredentials()->getApiKey();
        $request['_settings']['campaign'] = $this->buzz->getCredentials()->getCampaign();

        if ($this->buzz->getCustomerFlow()) {
            $request['_settings']['customer_flow'] = $this->buzz->getCustomerFlow()->getFlow();
        }

        if ($this->buzz->getStream()) {
            $request['_settings']['stream'] = $this->buzz->getStream();
        }

        return $this->client->request(
            $verb,
            $this->getUrl($method),
            $request,
            $this->getHeaders()
        );
    }

    /**
     * @param string $method
     *
     * @return string
     */
    private function getUrl($method)
    {
        $endpoint = sprintf(
            '%s://%s.%s/%s/%s',
            $this->buzz->getCredentials()->getProtocol(),
            $this->buzz->getCredentials()->getOrganization(),
            $this->buzz->getCredentials()->getDomain(),
            $this->buzz->getCredentials()->getVersion(),
            $method
        );

        return $endpoint;
    }

    /**
     * @param array ...$parameters
     *
     * @return mixed
     */
    protected final function callAndCastMany(...$parameters)
    {
        return $this->castMany($this->call(...$parameters));
    }

    /**
     * @param      $response
     * @param null $cast
     *
     * @return mixed
     * @throws ErrorException
     */
    protected final function castMany($response, $cast = null)
    {
        $result = [];

        if (!$response) {
            return $result;
        }

        if (isset($response['total']) && isset($response['data'])) { //for paging
            $paging = new Paging();

            $paging->setPage($response['current_page']);
            $paging->setTotal($response['total']);
            $paging->setLastPage($response['last_page']);
            $paging->setFrom($response['from']);
            $paging->setTo($response['to']);
            $paging->setItems($this->castMany($response['data'], $cast));

            return $paging;
        }

        foreach ($response as $key => $value) {
            if (!$this->getSetting('keyBy')) {
                $result[$key] = self::cast($value, $cast);
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

        return new Collection($result);
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

    /**
     * @param array ...$parameters
     *
     * @return mixed
     * @throws ErrorException
     */
    public function getOne(...$parameters)
    {
        if (!method_exists($this, 'getMany')) {
            throw new ErrorException('This service does not support getOne()');
        }

        return $this->perPage(1)->getMany(...$parameters)->first();
    }

    /**
     * @param       $identifiers
     * @param array ...$parameters
     *
     * @return mixed
     * @throws ErrorException
     */
    public function getByIdentifiers($identifiers, ...$parameters)
    {
        if (!method_exists($this, 'getMany')) {
            throw new ErrorException('This service does not support getByIdentifiers()');
        }

        return $this->where('identifier', 'in', $identifiers)->getMany(...$parameters)->keyBy('identifier');
    }

    /**
     * @param array ...$parameters
     *
     * @return mixed
     * @throws ErrorException
     */
    public function getByIdentifier($identifier, ...$parameters)
    {
        if (!method_exists($this, 'getByIdentifiers')) {
            throw new ErrorException('This service does not support getByIdentifier()');
        }

        return $this->perPage(1)->getByIdentifiers([$identifier], ...$parameters)->first();
    }
}
