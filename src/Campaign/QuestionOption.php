<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class QuestionOption
 *
 * @property bool $active
 * @property string $identifier
 * @property string $body
 * @property string $description
 * @property string $question_id
 * @property string $open
 * @property array $rules
 * @property int $order
 * @property-read Question $question
 * @property-read QuestionOptionGroup $question_option_group
 * @property-read AnswerOption[] $answer_options
 */
class QuestionOption extends SdkObject
{
    use SupportCrud,
        Translatable;
}
