<?php namespace Buzz\Control\Objects\Question;

use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Traits\BelongsToQuestion;

/**
 * Class Option
 *
 * @package Buzz\Control\Objects\Question
 */
class Option extends Object
{
    use BelongsToQuestion;

    /**
     * @var string
     */
    protected $body;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var string
     */
    protected $active;
    /**
     * @var string
     */
    protected $open;
    /**
     * @var int
     */
    protected $order;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getOpen()
    {
        return $this->open;
    }

    /**
     * @param mixed $open
     */
    public function setOpen($open)
    {
        $this->open = $open;
    }

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