<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Collection;
use Buzz\Control\Objects\Question;

/**
 * Class HasAnswersCommon
 *
 * @package Buzz\Control\Objects\Traits
 */
trait HasAnswersCommon
{
    /**
     * @param Question $question
     *
     * @return bool
     */
    public function hasAnsweredQuestion(Question $question)
    {
        return (bool)$this->getAnswerByQuestion($question);
    }

    /**
     * @param Question $question
     *
     * @return null
     */
    public function getAnswerByQuestion(Question $question)
    {
        if (!$this->answers) {
            return null;
        }

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

        return null;
    }

    /**
     * @param $identifier
     *
     * @return null
     */
    public function getAnswerByIdentifier($identifier)
    {
        $question = new Question();
        $question->setIdentifier($identifier);

        return $this->getAnswerByQuestion($question);
    }

    /**
     * @return static
     */
    public function getAnsweredIdentifiers()
    {
        return $this->getAnswersGroupedByIdentifier()->keys();
    }

    /**
     * @return Collection|null
     */
    public function getAnswersGroupedByIdentifier()
    {
        if (!$this->answers) {
            return null;
        }

        $answers = [];

        foreach ($this->answers as $answer) {
            $answers[$answer->getQuestion()->getIdentifier()] = $answer;
        }

        return new Collection($answers);
    }

    /**
     * @param array $identifiers
     *
     * @return Collection|null
     */
    public function getAnswersByIdentifiers(array $identifiers)
    {
        if (!$this->answers) {
            return null;
        }

        $answers = $this->getAnswersGroupedByIdentifier();

        $match = null;

        foreach ($answers as $identified => $answer) {
            if (in_array($identified, $identifiers)) {
                $match[$identified] = $answer;
            }
        }

        return $match ?: new Collection($match);
    }

    /**
     * @return mixed
     */
    public function getAnswers()
    {
        return $this->answers;
    }
}