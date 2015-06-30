<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Objects\Question\Option;

trait HasAnswerOptionsCommon
{
    public function hasAnsweredQuestionOption(Option $option)
    {
        return (bool)$this->getOptionByQuestionOption($option);
    }

    public function getOptionByQuestionOption(Option $option)
    {
        foreach ($this->options as $answer_option) {
            if ($option->getId()) {
                if ($answer_option->getQuestionOption()->getId() === $option->getId()) {
                    return $answer_option;
                }
            } elseif ($option->getIdentifier()) {
                if ($answer_option->getQuestionOption()->getIdentifier() === $option->getIdentifier()) {
                    return $answer_option;
                }
            }
        }

        return false;
    }
}