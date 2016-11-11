<?php namespace Buzz\Control\Objects\Customer;

use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToLead;

/**
 * Class Lead
 *
 * @package Buzz\Contract\Objects
 */
class Lead extends Base
{
    use BelongsToCustomer, BelongsToLead;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var int
     */
    protected $confidence;

    /**
     * @return int
     */
    public function getConfidence()
    {
        return $this->confidence;
    }

    /**
     * @param int $confidence
     */
    public function setConfidence($confidence)
    {
        $this->confidence = $confidence;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }
}
