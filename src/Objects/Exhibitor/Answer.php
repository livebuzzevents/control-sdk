<?php namespace Buzz\Control\Objects\Exhibitor;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Question;

/**
 * Class Answer
 *
 * @package Buzz\Control\Objects\Exhibitor
 */
class Answer extends Object
{
    /**
     * @var
     */
    protected $question_id;

    /**
     * @var
     */
    protected $options;

    /**
     * @var
     */
    protected $exhibitor_id;

    /**
     * @var
     */
    protected $text;

    /**
     * @return mixed
     */
    public function getExhibitorId()
    {
        return $this->exhibitor_id;
    }

    /**
     * @param mixed $exhibitor_id
     */
    public function setExhibitorId($exhibitor_id)
    {
        $this->exhibitor_id = $exhibitor_id;
    }

    /**
     * @return Question
     */
    public function getQuestionId()
    {
        return $this->question_id;
    }

    /**
     * @param Question $question_id
     * @param null     $text
     */
    public function setQuestionId($question_id, $text = null)
    {
        $this->question_id = $question_id;
        $this->text        = $text;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param      $option_id
     * @param null $text
     *
     * @throws ErrorException
     */
    public function addOption($option_id, $text = null)
    {
        if (isset($this->options[$option_id])) {
            throw new ErrorException('Option already exists');
        }

        $this->options[$option_id] = [
            'id'   => $option_id,
            'text' => $text
        ];
    }
}