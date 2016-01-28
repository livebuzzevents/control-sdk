<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Objects\Question\Option;

/**
 * Class BelongsToQuestionOption
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToQuestionOption
{
    /**
     * @var string
     */
    protected $question_option_id;

    /**
     * @var \Buzz\Control\Objects\Question\Option
     */
    protected $question_option;

    /**
     * @return \Buzz\Control\Objects\Question\Option
     */
    public function getQuestionOption()
    {
        return $this->question_option;
    }

    /**
     * @return \Buzz\Control\Objects\Question\Option
     */
    public function setQuestionOption(Option $question_option)
    {
        $this->question_option = $question_option;
    }

    /**
     * @return string
     */
    public function getQuestionOptionId()
    {
        return $this->question_option_id;
    }

    /**
     * @param string $question_option_id
     */
    public function setQuestionOptionId($question_option_id)
    {
        $this->question_option_id = $question_option_id;
    }
}