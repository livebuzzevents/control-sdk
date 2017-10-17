<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Traits\SupportCrud;
use JTDSoft\EssentialsSdk\Exceptions\ErrorException;

/**
 * Class Answer
 *
 * @property string $question_id
 * @property string $text
 *
 * @property-read \Buzz\Control\Campaign\Question $question
 * @property \Buzz\Control\Campaign\AnswerOption[] $options
 */
class Answer extends Object
{
    use Morphable,
        SupportCrud;

    /**
     * Answers a question
     */
    public function save(): void
    {
        if (!$this->isDirty()) {
            return;
        }

        $this->copyFromArray(
            $this->api()->post($this->getEndpoint(), $this->toArray())
        );

        $this->cleanDirtyAttributes();
    }

    /**
     * @param iterable $answers
     * @param array $rules
     *
     * @throws \JTDSoft\EssentialsSdk\Exceptions\ErrorException
     */
    public function validateMany(iterable $answers, array $rules = []): void
    {
        foreach ($answers as $key => $answer) {
            if (!$answer->id && !$answer->question_id) {
                throw new ErrorException('Answer id or Question id required!');
            }
            $answers[$key] = $answer->toArray();
        }

        $this->api()->post($this->getEndpoint("validate-many"), compact('answers', 'rules'));
    }

    /**
     * @throws \JTDSoft\EssentialsSdk\Exceptions\ErrorException
     */
    public function validate(): void
    {
        $this->api()->post($this->getEndpoint("validate"), $this->toArray());
    }

    /**
     * @param $identifier
     *
     * @return null
     */
    public function getOptionByIdentifier($identifier)
    {
        return $this->data['options']->where('question_option.identifier', $identifier)->first();
    }

    /**
     * @return static
     */
    public function getOptionsIdentifiers()
    {
        return $this->data['options']->pluck('question_option.identifier');
    }
}
