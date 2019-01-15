<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class QuestionOptionGroup
 *
 * @property string $identifier
 * @property string $name
 * @property string $question_id
 * @property-read \Buzz\Control\Campaign\Question $question
 * @property-read \Buzz\Control\Campaign\QuestionOption[] $question_options
 */
class QuestionOptionGroup extends SdkObject
{
    use SupportCrud,
        Translatable;
}
