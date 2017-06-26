<?php namespace Buzz\Control\Objects\Vote\Answer;

use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Traits\BelongsToQuestionOption;

/**
 * Class Option
 *
 * @package Buzz\Control\Objects\Vote\Answer
 */
class Option extends Base
{
    use BelongsToQuestionOption;

    /**
     * @var string
     */
    protected $vote_answer_id;

    /**
     * @var \Buzz\Control\Objects\Vote\Answer
     */
    protected $vote_answer;

    /**
     * @var string
     */
    protected $text;

    /**
     * @return string
     */
    public function getVoteAnswerId()
    {
        return $this->vote_answer_id;
    }

    /**
     * @param string $vote_answer_id
     */
    public function setVoteAnswerId($vote_answer_id)
    {
        $this->vote_answer_id = $vote_answer_id;
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
     * @return \Buzz\Control\Objects\Vote\Answer
     */
    public function getVoteAnswer()
    {
        return $this->vote_answer;
    }
}
