<?php namespace Buzz\Control\Services;

use Buzz\Control\Buzz;
use Buzz\Control\Contracts\Client;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Filter;
use Buzz\Control\GuzzleClient;

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
     * @var string
     */
    protected $keyBy = null;

    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @param Client $client
     */
    public final function __construct(Client $client = null)
    {
        $this->client = $client ?: new GuzzleClient(Buzz::getCredentials());
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
        $this->keyBy = $keyBy;

        return $this;
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
        if ($this->filter) {
            $request['filters'] = $this->filter->getFilters();
        }

        return $this->client->request($verb, $method, $request);
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

        foreach ($response as $key => $value) {
            if (!$this->keyBy) {
                $result[$key] = self::cast($value);
            } else {
                if (!array_key_exists($value, $this->keyBy)) {
                    throw new ErrorException('Parameter %1$s does not exist!');
                }

                $result[$value[$this->keyBy]] = self::cast($value);
            }
        }

        return $result;
    }
}