<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Campaign\Traits\WithAnswerHelpers;
use Buzz\Control\Traits\SupportCrud;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

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
 * @property-read \Buzz\Control\Campaign\Answer[] $answers
 */
class Question extends Object
{
    use SupportCrud,
        Translatable,
        WithAnswerHelpers;
}
