<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class QuestionOption
 *
 * @property string $identifier
 * @property string $body
 * @property string $description
 * @property string $question_id
 * @property string $open
 * @property array $rules
 * @property int $order
 * @property-read \Buzz\Control\Campaign\Question $question
 * @property-read \Buzz\Control\Campaign\QuestionOptionGroup $question_option_group
 * @property-read \Buzz\Control\Campaign\AnswerOption[] $answer_options
 */
class QuestionOption extends SdkObject
{
    use SupportCrud,
        Translatable;
}
