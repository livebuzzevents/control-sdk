<?php namespace Buzz\Control\Objects\Exhibitor;

use Buzz\Control\Collection;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor\Answer\Option;
use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Question;
use Buzz\Control\Objects\Traits\BelongsToExhibitor;
use Buzz\Control\Objects\Traits\BelongsToQuestion;
use Buzz\Control\Objects\Traits\HasAnswerOptionsCommon;

/**
 * Class Answer
 *
 * @package Buzz\Control\Objects\Exhibitor
 */
class Answer extends Base
{
    use BelongsToExhibitor, BelongsToQuestion, HasAnswerOptionsCommon;

    /**
     * @var \Buzz\Control\Objects\Exhibitor\Answer\Option[]
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
     * @return \Buzz\Control\Objects\Exhibitor\Answer\Option[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param \Buzz\Control\Objects\Exhibitor\Answer\Option[]|Collection $options
     */
    public function setOptions($options)
    {
        $this->options = new Collection($options);
    }

    /**
     * @param \Buzz\Control\Objects\Exhibitor\Answer\Option $option
     *
     * @throws ErrorException
     */
    public function addOption(Option $option)
    {
        $this->add($this->options, $option);
    }
}