<?php namespace Buzz\Control\Objects\Customer\Answer;

use Buzz\Control\Objects\Object;

/**
 * Class Option
 *
 * @package Buzz\Control\Objects\Customer\Answer
 */
class Option extends Object
{
    /**
     * @var int
     */
    protected $customer_answer_id;

    /**
     * @var \Buzz\Control\Objects\Customer\Answer
     */
    protected $customer_answer;

    /**
     * @var int
     */
    protected $question_option_id;

    /**
     * @var \Buzz\Control\Objects\Question\Option
     */
    protected $question_option;
    /**
     * @var string
     */
    protected $text;

    /**
     * @return int
     */
    public function getCustomerAnswerId()
    {
        return $this->customer_answer_id;
    }

    /**
     * @param int $customer_answer_id
     */
    public function setCustomerAnswerId($customer_answer_id)
    {
        $this->customer_answer_id = $customer_answer_id;
    }

    /**
     * @return int
     */
    public function getQuestionOptionId()
    {
        return $this->question_option_id;
    }

    /**
     * @param int $question_option_id
     */
    public function setQuestionOptionId($question_option_id)
    {
        $this->question_option_id = $question_option_id;
    }

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
     * @return \Buzz\Control\Objects\Customer\Answer
     */
    public function getCustomerAnswer()
    {
        return $this->customer_answer;
    }

    /**
     * @return \Buzz\Control\Objects\Question\Option
     */
    public function getQuestionOption()
    {
        return $this->question_option;
    }
}