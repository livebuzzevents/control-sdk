<?php namespace Buzz\Control\Objects\Customer;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer\Answer\Option;
use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Question;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToQuestion;

/**
 * Class Answer
 *
 * @package Buzz\Control\Objects\Customer
 */
class Answer extends Object
{
    use BelongsToCustomer, BelongsToQuestion;

    /**
     * @var \Buzz\Control\Objects\Customer\Answer\Option[]
     */
    protected $options;

    /**
     * @var string
     */
    protected $text;

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return \Buzz\Control\Objects\Customer\Answer\Option[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param \Buzz\Control\Objects\Customer\Answer\Option[] $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * @param Option $option
     *
     * @throws ErrorException
     */
    public function addOption(Option $option)
    {
        $this->options[] = $option;
    }
}