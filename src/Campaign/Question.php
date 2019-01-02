<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Campaign\Traits\WithAnswerHelpers;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class Question
 *
 * @property string $identifier
 * @property string $body
 * @property string $description
 * @property string $exhibitor_id
 * @property string $type
 * @property array $rules
 * @property \Buzz\Control\Campaign\QuestionOption[] $options
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 * @property-read \Buzz\Control\Campaign\QuestionOptionGroup[] $question_option_groups
 * @property-read \Buzz\Control\Campaign\Answer[] $answers
 */
class Question extends SdkObject
{
    use SupportCrud,
        Translatable,
        WithAnswerHelpers;
}
