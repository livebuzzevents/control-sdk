<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToExhibitor;
use Buzz\Control\Objects\Traits\BelongsToQuestion;

/**
 * Class Answer
 *
 * @package Buzz\Control\Objects\Customer
 */
class Answer extends Base
{
    use BelongsToCustomer, BelongsToQuestion, BelongsToExhibitor;

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
}
