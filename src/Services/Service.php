<?php namespace Buzz\Control\Services;

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
     * @var string
     */
    protected $keyBy = null;
    /**
     * @var int
     */
    protected $page = 1;

    /**
     * @var int
     */
    protected $per_page = 15;

    /**
     * @var string
     */
    protected $order = 'id';

    /**
     * @var string
     */
    protected $direction = 'asc';

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
     * @param int $page
     *
     * @return $this
     */
    public function page($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @param int $per_page
     *
     * @return $this
     */
    public function perPage($per_page)
    {
        $this->per_page = $per_page;

        return $this;
    }

    /**
     * @param string $order
     *
     * @return $this
     */
    public function order($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @param string $direction
     *
     * @return $this
     */
    public function direction($direction)
    {
        $this->direction = $direction;

        return $this;
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

        $request['page']      = $this->page;
        $request['per_page']  = $this->per_page;
        $request['order']     = $this->order;
        $request['direction'] = $this->direction;

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
            if (!$this->keyBy) {
                $result[$key] = self::cast($value);
            } else {
                if (!is_array($value)) {
                    throw new ErrorException('KeyBy expects each result to be an array!');
                }
                if (!array_key_exists($this->keyBy, $value)) {
                    throw new ErrorException(sprintf('Parameter %1$s does not exist!', $this->keyBy));
                }

                $result[$value[$this->keyBy]] = self::cast($value);
            }
        }

        return $result;
    }
}