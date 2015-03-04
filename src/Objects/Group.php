<?php namespace Buzz\Control\Objects;

/**
 * Class Group
 *
 * @package Buzz\Control\Objects
 */
class Group extends Object
{
    /**
     * @var
     */
    protected $id;
    /**
     * @var
     */
    protected $name;

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

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}