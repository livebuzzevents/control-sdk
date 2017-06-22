<?php namespace Buzz\Control\Objects;

use Buzz\Control\Collection;
use Buzz\Control\Objects\Traits\BelongsToExhibitor;
use Buzz\Control\Objects\Traits\HasIdentifier;
use Buzz\Control\Objects\Traits\Translatable;

/**
 * Class Question
 *
 * @package Buzz\Control\Objects
 */
class Question extends Base
{
    use BelongsToExhibitor, HasIdentifier, Translatable;

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
     * @var array
     */
    protected $rules;

    /**
     * @return array
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * @param array $rules
     */
    public function setRules($rules)
    {
        $this->rules = $rules;
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
        $this->add($this->options, $option);
    }

    /**
     * @return Question\Option[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param Question\Option[]|Collection $options
     */
    public function setOptions($options)
    {
        $this->options = new Collection($options);
    }
}
