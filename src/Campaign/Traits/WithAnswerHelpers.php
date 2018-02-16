<?php namespace Buzz\Control\Campaign\Traits;

/**
 * Class WithAnswerHelpers
 *
 * @package Buzz\Control\Campaign\Traits
 */
trait WithAnswerHelpers
{
    /**
     * @param $identifier
     *
     * @return null
     */
    public function getAnswerByIdentifier($identifier)
    {
        return $this->answers ? $this->answers->where('question.identifier', $identifier)->first() : null;
    }

    /**
     * @return static
     */
    public function getAnsweredIdentifiers()
    {
        return $this->answers ? $this->answers->pluck('question.identifier') : null;
    }
}
