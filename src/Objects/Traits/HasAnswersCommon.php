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

    public function getAnswerByQuestionIdentifier($identifier)
    {
        $question = new Question();
        $question->setIdentifier($identifier);

        return $this->getAnswerByQuestion($question);
    }

    public function getAnsweredQuestionIdentifiers()
    {
        return array_keys($this->getAnswersGroupedByIdentifier());
    }

    public function getAnswersGroupedByIdentifier()
    {
        $answers = [];

        foreach ($this->answers as $answer) {
            $answers[$answer->getQuestion()->getIdentifier()] = $answer;
        }

        return $answers;
    }

    public function getAnswersByQuestionIdentifiers(array $identifiers)
    {
        $answers = $this->getAnswersGroupedByIdentifier();

        $match = null;

        foreach ($answers as $identified => $answer) {
            if (in_array($identified, $identifiers)) {
                $match[$identified] = $answer;
            }
        }

        return $match;
    }
}