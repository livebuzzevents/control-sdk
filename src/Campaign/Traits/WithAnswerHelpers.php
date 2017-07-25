<?php namespace Buzz\Control\Campaign\Traits;

/**
 * Class HasAnswersCommon
 *
 * @package Buzz\Control\Objects\Traits
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
        return $this->answers->where('question.identifier', $identifier)->first();
    }

    /**
     * @return static
     */
    public function getAnsweredIdentifiers()
    {
        return $this->answers->pluck('question.identifier');
    }
}
