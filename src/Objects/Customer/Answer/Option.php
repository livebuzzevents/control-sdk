<?php namespace Buzz\Control\Objects\Customer\Answer;

use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Traits\BelongsToQuestionOption;

/**
 * Class Option
 *
 * @package Buzz\Control\Objects\Customer\Answer
 */
class Option extends Base
{
    use BelongsToQuestionOption;

    /**
     * @var string
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
     * @return string
     */
    public function getCustomerAnswerId()
    {
        return $this->customer_answer_id;
    }

    /**
     * @param string $customer_answer_id
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
