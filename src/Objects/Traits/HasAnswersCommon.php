<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Objects\Question;

trait HasAnswersCommon
{
    public function hasAnsweredQuestion(Question $question)
    {
        return (bool)$this->getAnswerByQuestion($question);
    }

    public function getAnswerByQuestion(Question $question)
    {
        foreach ($this->answers as $answer) {
            if ($question->getId()) {
                if ($answer->getQuestion()->getId() === $question->getId()) {
                    return $answer;
                }
            } elseif ($question->getIdentifier()) {
                if ($answer->getQuestion()->getIdentifier() === $question->getIdentifier()) {
                    return $answer;
                }
            }
        }

        return false;
    }

    public function getAnswersByIdentifier()
    {
        $answers = [];

        foreach ($this->answers as $answer) {
            $answers[$answer->getQuestion()->getIdentifier()] = $answer;
        }

        return $answers;
    }
}