<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Collection;
use Buzz\Control\Objects\Question\Option;

/**
 * Class HasAnswerOptionsCommon
 *
 * @package Buzz\Control\Objects\Traits
 */
trait HasAnswerOptionsCommon
{
    /**
     * @param Option $option
     *
     * @return bool
     */
    public function hasOptionByQuestionOption(Option $option)
    {
        return (bool)$this->getOptionByQuestionOption($option);
    }

    /**
     * @param Option $option
     *
     * @return null
     */
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

    /**
     * @param $identifier
     *
     * @return bool
     */
    public function hasOptionByIdentifier($identifier)
    {
        return (bool)$this->getOptionByIdentifier($identifier);
    }

    /**
     * @param $identifier
     *
     * @return null
     */
    public function getOptionByIdentifier($identifier)
    {
        $option = new Option();
        $option->setIdentifier($identifier);

        return $this->getOptionByQuestionOption($option);
    }

    /**
     * @return mixed
     */
    public function getOptionIdentifier()
    {
        return $this->getOptionsIdentifiers()[0];
    }

    /**
     * @return static
     */
    public function getOptionsIdentifiers()
    {
        return $this->getOptionsGroupedByIdentifier()->keys();
    }

    /**
     * @return Collection|null
     */
    public function getOptionsGroupedByIdentifier()
    {
        if (!$this->options) {
            return null;
        }

        $options = null;

        foreach ($this->options as $option) {
            $options[$option->getQuestionOption()->getIdentifier()] = $option;
        }

        return new Collection($options);
    }

    /**
     * @param array $identifiers
     *
     * @return null
     */
    public function getOptionsByIdentifiers(array $identifiers)
    {
        if (!$this->options) {
            return null;
        }

        $options = $this->getOptionsGroupedByIdentifier();

        $match = null;

        foreach ($options as $identified => $option) {
            if (in_array($identified, $identifiers)) {
                $match[$identified] = $option;
            }
        }

        return $match;
    }
}