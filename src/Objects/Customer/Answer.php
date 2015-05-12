<?php namespace Buzz\Control\Objects\Customer;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Question;

/**
 * Class Answer
 *
 * @package Buzz\Control\Objects\Customer
 */
class Answer extends Object
{
    /**
     * @var
     */
    protected $question_id;

    /**
     * @var
     */
    protected $options;

    /**
     * @var
     */
    protected $customer_id;

    /**
     * @var
     */
    protected $text;

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * @param mixed $customer_id
     */
    public function setCustomerId($customer_id)
    {
        $this->customer_id = $customer_id;
    }

    /**
     * @return Question
     */
    public function getQuestionId()
    {
        return $this->question_id;
    }

    /**
     * @param Question $question_id
     * @param null     $text
     */
    public function setQuestion($question_id, $text = null)
    {
        $this->question_id = $question_id;
        $this->text        = $text;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param      $option_id
     * @param null $text
     *
     * @throws ErrorException
     */
    public function addOption($option_id, $text = null)
    {
        if (isset($this->options[$option_id])) {
            throw new ErrorException('Option already exists');
        }

        $this->options[$option_id] = compact('option_id', 'text');
    }
}