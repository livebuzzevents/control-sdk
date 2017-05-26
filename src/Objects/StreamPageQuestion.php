<?php

namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToQuestion;
use Buzz\Control\Objects\Traits\BelongsToStreamMenuItem;

/**
 * Class StreamPageQuestion
 *
 * @package Buzz\Contract\Objects
 */
class StreamPageQuestion extends Base
{
    use BelongsToStreamMenuItem, BelongsToQuestion;

    /**
     * @var int
     */
    protected $order;

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }
}
