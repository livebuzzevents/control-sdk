<?php namespace Buzz\Control\Objects\Customer\Answer;

use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Traits\BelongsToQuestionOption;

/**
 * Class Option
 *
 * @package Buzz\Control\Objects\Customer\Answer
 */
class Option extends Object
{
    use BelongsToQuestionOption;

    /**
     * @var int
     */
    protected $customer_answer_id;

    /**
     * @var \Buzz\Control\Objects\Customer\Answer
     */
    protected $customer_answer;

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
}