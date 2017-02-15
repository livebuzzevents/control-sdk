<?php namespace Buzz\Control\Objects\Customer;

use Buzz\Control\Collection;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer\Answer\Option;
use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Question;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToQuestion;
use Buzz\Control\Objects\Traits\HasAnswerOptionsCommon;

/**
 * Class Answer
 *
 * @package Buzz\Control\Objects\Customer
 */
class Answer extends Base
{
    use BelongsToCustomer, BelongsToQuestion, HasAnswerOptionsCommon;

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
     * @return \Buzz\Control\Objects\Customer\Answer\Option[]|Collection
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param \Buzz\Control\Objects\Customer\Answer\Option[]|Collection $options
     */
    public function setOptions($options)
    {
        $this->options = new Collection($options);
    }

    /**
     * @param \Buzz\Control\Objects\Customer\Answer\Option $option
     *
     * @throws ErrorException
     */
    public function addOption(Option $option)
    {
        $this->add($this->options, $option);
    }
}
