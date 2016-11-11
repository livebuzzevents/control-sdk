<?php namespace Buzz\Control\Objects\Exhibitor\Answer;

use Buzz\Control\Objects\Base;

/**
 * Class Option
 *
 * @package Buzz\Control\Objects\Exhibitor\Answer
 */
class Option extends Base
{
    /**
     * @var string
     */
    protected $exhibitor_answer_id;

    /**
     * @var \Buzz\Control\Objects\Exhibitor\Answer
     */
    protected $exhibitor_answer;

    /**
     * @var string
     */
    protected $text;

    /**
     * @return string
     */
    public function getExhibitorAnswerId()
    {
        return $this->exhibitor_answer_id;
    }

    /**
     * @param string $exhibitor_answer_id
     */
    public function setExhibitorAnswerId($exhibitor_answer_id)
    {
        $this->exhibitor_answer_id = $exhibitor_answer_id;
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
     * @return \Buzz\Control\Objects\Exhibitor\Answer
     */
    public function getExhibitorAnswer()
    {
        return $this->exhibitor_answer;
    }
}
