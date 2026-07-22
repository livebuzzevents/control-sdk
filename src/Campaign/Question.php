<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Campaign\Traits\WithAnswerHelpers;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class Question
 *
 * @property bool $active
 * @property string $identifier
 * @property string $body
 * @property string $description
 * @property string $exhibitor_id
 * @property string $type
 * @property array $rules
 * @property int $order
 * @property QuestionOption[] $options
 * @property-read Exhibitor $exhibitor
 * @property-read QuestionOptionGroup[] $question_option_groups
 * @property-read Answer[] $answers
 */
class Question extends SdkObject
{
    use SupportCrud,
        Translatable,
        WithAnswerHelpers;
}
