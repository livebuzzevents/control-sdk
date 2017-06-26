<?php namespace Buzz\Control\Objects\Lead\Answer;

use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Traits\BelongsToQuestionOption;

/**
 * Class Option
 *
 * @package Buzz\Control\Objects\Lead\Answer
 */
class Option extends Base
{
    use BelongsToQuestionOption;

    /**
     * @var string
     */
    protected $lead_answer_id;

    /**
     * @var \Buzz\Control\Objects\Lead\Answer
     */
    protected $lead_answer;

    /**
     * @var string
     */
    protected $text;

    /**
     * @return string
     */
    public function getLeadAnswerId()
    {
        return $this->lead_answer_id;
    }

    /**
     * @param string $lead_answer_id
     */
    public function setLeadAnswerId($lead_answer_id)
    {
        $this->lead_answer_id = $lead_answer_id;
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
     * @return \Buzz\Control\Objects\Lead\Answer
     */
    public function getLeadAnswer()
    {
        return $this->lead_answer;
    }
}
