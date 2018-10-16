<?php namespace Buzz\Control\Objects\Question\Option;

use Buzz\Control\Objects\Answer;
use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Traits\BelongsToQuestionOption;
use Buzz\Control\Objects\Traits\HasAnswerOptionsCommon;
use Buzz\Control\Objects\Traits\HasAnswersCommon;

/**
 * Class Answer
 *
 * @package Buzz\Control\Objects\Exhibitor
 */
class AnswerOption extends Base
{
    use HasAnswersCommon, BelongsToQuestionOption, HasAnswerOptionsCommon;

    /**
     * @var \Buzz\Control\Objects\Answer
     */
    protected $answer;

    /**
     * @var string
     */
    protected $text;

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
     * @return \Buzz\Control\Objects\Answer
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param \Buzz\Control\Objects\Answer $answer
     */
    public function setAnswer(Answer $answer)
    {
        $this->answer = $answer;
    }
}
