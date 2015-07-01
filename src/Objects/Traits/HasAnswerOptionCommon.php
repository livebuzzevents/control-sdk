<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Objects\Question\Option;

trait HasAnswerOptionsCommon
{
    public function hasOptionByQuestionOption(Option $option)
    {
        return (bool)$this->getOptionByQuestionOption($option);
    }

    public function getOptionByQuestionOption(Option $option)
    {
        if (!$this->options) {
            return null;
        }

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

        return null;
    }

    public function hasOptionByQuestionOptionIdentifier($identifier)
    {
        return (bool)$this->getOptionByQuestionOptionIdentifier($identifier);
    }

    public function getOptionByQuestionOptionIdentifier($identifier)
    {
        $option = new Option();
        $option->setIdentifier($identifier);

        return $this->getOptionByQuestionOption($option);
    }

    public function getOptionsQuestionOptionIdentifiers()
    {
        return array_keys($this->getOptionsGroupedByQuestionOptionIdentifier());
    }

    public function getOptionsGroupedByQuestionOptionIdentifier()
    {
        if (!$this->options) {
            return null;
        }

        $options = null;

        foreach ($this->options as $option) {
            $options[$option->getQuestionOption()->getIdentifier()] = $option;
        }

        return $options;
    }

    public function getOptionsByQuestionOptionIdentifiers(array $identifiers)
    {
        if (!$this->options) {
            return null;
        }

        $options = $this->getOptionsGroupedByQuestionOptionIdentifier();

        $match = null;

        foreach ($options as $identified => $option) {
            if (in_array($identified, $identifiers)) {
                $match[$identified] = $option;
            }
        }

        return $match;
    }
}