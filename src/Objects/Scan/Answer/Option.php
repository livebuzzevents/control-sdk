<?php namespace Buzz\Control\Objects\Scan\Answer;

use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Traits\BelongsToQuestionOption;

/**
 * Class Option
 *
 * @package Buzz\Control\Objects\Scan\Answer
 */
class Option extends Base
{
    use BelongsToQuestionOption;

    /**
     * @var string
     */
    protected $scan_answer_id;

    /**
     * @var \Buzz\Control\Objects\Scan\Answer
     */
    protected $scan_answer;

    /**
     * @var string
     */
    protected $text;

    /**
     * @return string
     */
    public function getScanAnswerId()
    {
        return $this->scan_answer_id;
    }

    /**
     * @param string $scan_answer_id
     */
    public function setScanAnswerId($scan_answer_id)
    {
        $this->scan_answer_id = $scan_answer_id;
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
     * @return \Buzz\Control\Objects\Scan\Answer
     */
    public function getScanAnswer()
    {
        return $this->scan_answer;
    }
}
