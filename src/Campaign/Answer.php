<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportCrud;
use JTDSoft\EssentialsSdk\Core\Cast;
use JTDSoft\EssentialsSdk\Core\Collection;
use JTDSoft\EssentialsSdk\Exceptions\ErrorException;

/**
 * Class Answer
 *
 * @property-read object $model
 * @property string $model_type
 * @property string $model_id
 * @property string $question_id
 * @property string $text
 *
 * @property-read \Buzz\Control\Campaign\Question $question
 */
class Answer extends Object
{
    use SupportCrud;

    /**
     * @param iterable $answers
     * @param array $rules
     *
     * @return \JTDSoft\EssentialsSdk\Core\Collection
     * @throws \JTDSoft\EssentialsSdk\Exceptions\ErrorException
     */
    public function validateMany(iterable $answers, array $rules = []): Collection
    {
        foreach ($answers as $key => $answer) {
            if (!$answer->id && !$answer->question_id) {
                throw new ErrorException('Answer id or Question id required!');
            }
            $answers[$key] = $answer->toArray();
        }

        return Cast::many(self::class, $this->api()->post($this->getEndpoint("validate-many"), [
            'batch' => $answers,
            'rules' => $rules,
        ]));
    }
}
