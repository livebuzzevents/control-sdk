<?php namespace Buzz\Control\Objects;

/**
 * Class Channel
 *
 * @package Buzz\Control\Objects
 */
class Channel extends Object
{
    /**
     * @var
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}