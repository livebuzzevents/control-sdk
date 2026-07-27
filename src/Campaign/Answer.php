<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Traits\SupportCrud;
use Buzz\EssentialsSdk\Cast;
use Buzz\EssentialsSdk\Collection;
use Buzz\EssentialsSdk\Exceptions\ErrorException;

/**
 * Class Answer
 *
 * @property string $question_id
 * @property string $text
 * @property-read \Buzz\Control\Campaign\Question $question
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 * @property-read \Buzz\Control\Campaign\Lead $lead
 * @property-read \Buzz\Control\Campaign\Scan $scan
 * @property-read \Buzz\Control\Campaign\Vote $vote
 * @property-read \Buzz\Control\Campaign\Product $product
 * @property \Buzz\Control\Campaign\AnswerOption[] $options
 */
class Answer extends SdkObject
{
    use Morphable,
        SupportCrud;

    /**
     * Answers a question
     */
    public function save(): void
    {
        if (! $this->isDirty()) {
            return;
        }

        $this->copyFromArray(
            $this->api()->post($this->getEndpoint(), $this->prepareRequestData(false))
        );

        $this->cleanDirtyAttributes();
    }

    /**
     * @throws \Buzz\EssentialsSdk\Exceptions\ErrorException
     */
    public function saveMany(iterable $answers): Collection
    {
        foreach ($answers as $key => $answer) {
            if (! $answer->id && ! $answer->question_id) {
                throw new ErrorException('Answer id or Question id required!');
            }
            $answers[$key] = $answer->prepareRequestData(false);
        }

        return Cast::many(
            $this,
            $this->api()->post($this->getEndpoint('save-many'), compact('answers'))
        );
    }

    /**
     * @throws \Buzz\EssentialsSdk\Exceptions\ErrorException
     */
    public function validateMany(iterable $answers, array $rules = []): void
    {
        foreach ($answers as $key => $answer) {
            if (! $answer->id && ! $answer->question_id) {
                throw new ErrorException('Answer id or Question id required!');
            }
            $answers[$key] = $answer->prepareRequestData(false);
        }

        $this->api()->post($this->getEndpoint('validate-many'), compact('answers', 'rules'));
    }

    public function deleteByIdentifiers(SdkObject $object, array $identifiers)
    {
        $this->api()->delete(
            $this->getEndpoint('by-identifiers'),
            [
                'model_type'  => class_basename($object),
                'model_id'    => $object->id,
                'identifiers' => $identifiers,
            ]
        );
    }

    public function copyByIdentifiers(SdkObject $source, SdkObject $target, array $identifiers): Collection
    {
        return Cast::many(
            $this,
            $this->api()->post(
                $this->getEndpoint('copy-by-identifiers'),
                [
                    'source_type' => class_basename($source),
                    'source_id'   => $source->id,
                    'target_type' => class_basename($target),
                    'target_id'   => $target->id,
                    'identifiers' => $identifiers,
                ]
            )
        );
    }

    public function validate(): void
    {
        $this->api()->post($this->getEndpoint('validate'), $this->prepareRequestData(false));
    }

    /**
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
