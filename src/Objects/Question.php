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
    protected $name;

    /**
     * @var string
     */
    protected $description;

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
        array_push($this->options, $option);
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