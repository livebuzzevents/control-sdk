<?php namespace Buzz\Control\Objects;

/**
 * Class Question
 *
 * @package Buzz\Control\Objects
 */
class Question extends Object
{
    /**
     * @var string
     */
    protected $identifier;
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
    protected $type;
    /**
     * @var \Buzz\Control\Objects\Question\Option[]
     */
    protected $options;

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    }

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
     * @return string
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param string $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param Question\Option $option
     */
    public function addOption(Question\Option $option)
    {
        $this->options[] = $option;
    }

    /**
     * @return Question\Option[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param Question\Option[] $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }
}