<?php namespace Buzz\Control\Objects\Customer;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Object;
use Buzz\Control\Objects\Question;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToQuestion;

/**
 * Class Answer
 *
 * @package Buzz\Control\Objects\Customer
 */
class Answer extends Object
{
    use BelongsToCustomer, BelongsToQuestion;

    /**
     * @var array
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
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
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