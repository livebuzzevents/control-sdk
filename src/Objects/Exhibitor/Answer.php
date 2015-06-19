<?php namespace Buzz\Control\Objects\Exhibitor;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor\Answer\Option;
use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Question;
use Buzz\Control\Objects\Traits\BelongsToExhibitor;
use Buzz\Control\Objects\Traits\BelongsToQuestion;

/**
 * Class Answer
 *
 * @package Buzz\Control\Objects\Exhibitor
 */
class Answer extends Object
{
    use BelongsToExhibitor, BelongsToQuestion;

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
     * @param \Buzz\Control\Objects\Exhibitor\Answer\Option[] $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * @param \Buzz\Control\Objects\Exhibitor\Answer\Option $option
     *
     * @throws ErrorException
     */
    public function addOption(Option $option)
    {
        $this->options[] = $option;
    }
}