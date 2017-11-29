<?php namespace Buzz\Control\Services;

use Buzz\Control\Objects\Question;

/**
 * Class QuestionOptionService
 *
 * @package Buzz\Control\Services
 */
class QuestionOptionService extends Service
{
    /**
     * @var
     */
    protected static $cast = Question\Option::class;

    /**
     * @return Question\Option[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'question-options');
    }
}
