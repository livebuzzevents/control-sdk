<?php namespace Buzz\Control\Objects\Badge\Answer;

use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Traits\BelongsToQuestionOption;

/**
 * Class Option
 *
 * @package Buzz\Control\Objects\Badge\Answer
 */
class Option extends Object
{
    use BelongsToQuestionOption;

    /**
     * @var int
     */
    protected $customer_answer_id;

    /**
     * @var \Buzz\Control\Objects\Badge\Answer
     */
    protected $customer_answer;

    /**
     * @var string
     */
    protected $text;

    /**
     * @return int
     */
    public function getBadgeAnswerId()
    {
        return $this->customer_answer_id;
    }

    /**
     * @param int $customer_answer_id
     */
    public function setBadgeAnswerId($customer_answer_id)
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
     * @return \Buzz\Control\Objects\Badge\Answer
     */
    public function getBadgeAnswer()
    {
        return $this->customer_answer;
    }
}