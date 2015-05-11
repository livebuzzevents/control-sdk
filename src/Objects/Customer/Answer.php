<?php namespace Buzz\Control\Objects\Customer;

use Buzz\Control\Objects\Object;

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
    protected $question;

    /**
     * @var
     */
    protected $question_option;

    /**
     * @var
     */
    protected $answer;

    /**
     * @var
     */
    protected $customer_id;

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
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * @return mixed
     */
    public function getQuestionOption()
    {
        return $this->question_option;
    }

    /**
     * @param mixed $question_option
     */
    public function setQuestionOption($question_option)
    {
        $this->question_option = $question_option;
    }

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param mixed $answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }
}