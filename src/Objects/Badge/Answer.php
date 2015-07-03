<?php namespace Buzz\Control\Objects\Badge;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Badge\Answer\Option;
use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Question;
use Buzz\Control\Objects\Traits\BelongsToBadge;
use Buzz\Control\Objects\Traits\BelongsToQuestion;
use Buzz\Control\Objects\Traits\HasAnswerOptionsCommon;

/**
 * Class Answer
 *
 * @package Buzz\Control\Objects\Badge
 */
class Answer extends Object
{
    use BelongsToBadge, BelongsToQuestion, HasAnswerOptionsCommon;

    /**
     * @var \Buzz\Control\Objects\Badge\Answer\Option[]
     */
    protected $options;

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
     * @return \Buzz\Control\Objects\Badge\Answer\Option[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param \Buzz\Control\Objects\Badge\Answer\Option[] $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * @param \Buzz\Control\Objects\Badge\Answer\Option $option
     *
     * @throws ErrorException
     */
    public function addOption(Option $option)
    {
        $this->options[] = $option;
    }
}