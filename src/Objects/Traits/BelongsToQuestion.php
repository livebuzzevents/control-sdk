<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class BelongsToQuestion
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToQuestion
{
    /**
     * @var int
     */
    protected $question_id;

    /**
     * @var \Buzz\Control\Objects\Question
     */
    protected $question;

    /**
     * @return \Buzz\Control\Objects\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @return int
     */
    public function getQuestionId()
    {
        return $this->question_id;
    }

    /**
     * @param int $question_id
     */
    public function setQuestionId($question_id)
    {
        $this->question_id = $question_id;
    }
}