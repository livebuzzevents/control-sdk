<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToOrder;
use Buzz\Control\Objects\Traits\BelongsToOrderProduct;

/**
 * Class OrderProduct
 *
 * @package Buzz\Control\Objects
 */
class OrderAction extends Object
{
    use BelongsToOrder, BelongsToOrderProduct;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $parameters;

    /**
     * @var array
     */
    protected $results;

    /**
     * @var string
     */
    protected $executed;

    /**
     * @var string
     */
    protected $rolled_back;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @return array
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @param array $results
     */
    public function setResults($results)
    {
        $this->results = $results;
    }

    /**
     * @return string
     */
    public function getExecuted()
    {
        return $this->executed;
    }

    /**
     * @param string $executed
     */
    public function setExecuted($executed)
    {
        $this->executed = $executed;
    }

    /**
     * @return string
     */
    public function getRolledBack()
    {
        return $this->rolled_back;
    }

    /**
     * @param string $rolled_back
     */
    public function setRolledBack($rolled_back)
    {
        $this->rolled_back = $rolled_back;
    }
}
