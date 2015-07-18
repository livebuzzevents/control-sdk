<?php namespace Buzz\Control\Services;

use Buzz\Control\Buzz;
use Buzz\Control\Contracts\Client;
use Buzz\Control\Filter;
use Buzz\Control\GuzzleClient;

abstract class Service
{
    /**
     * @var
     */
    protected static $cast;

    /**
     * @var Filter
     */
    protected $filter;

    public final function __construct(Client $client = null)
    {
        $this->client = $client ?: new GuzzleClient(Buzz::getCredentials());
    }

    public function where($parameter, $operator, $value)
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

    protected final function callAndCast(...$parameters)
    {
        return $this->cast($this->call(...$parameters));
    }

    protected final function cast($response)
    {
        $object = static::$cast;

        return $object::createFromArray($response);
    }

    protected final function call($verb, $method, array $request = [])
    {
        if ($this->filter) {
            $request['filters'] = $this->filter->getFilters();
        }

        return $this->client->request($verb, $method, $request);
    }

    protected final function callAndCastMany(...$parameters)
    {
        return $this->castMany($this->call(...$parameters));
    }

    protected final function castMany($response)
    {
        foreach ($response as $key => $value) {
            $response[$key] = self::cast($value);
        }

        return $response;
    }
}