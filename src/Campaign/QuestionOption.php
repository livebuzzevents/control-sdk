<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;

/**
 * Class Question
 *
 * @property string $identifier
 * @property string $body
 * @property string $description
 * @property string $question_id
 * @property string $open
 * @property array $rules
 * @property int $order
 * @property-read \Buzz\Control\Campaign\Question $question
 * @property-read \Buzz\Control\Campaign\AnswerOption[] $answer_options
 */
class QuestionOption extends SdkObject
{
    use Translatable;
}
