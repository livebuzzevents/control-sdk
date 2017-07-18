<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;
use Buzz\Control\Objects\Traits\Translatable;

/**
 * Class Question
 *
 * @property string $identifier
 * @property string $body
 * @property string $description
 * @property string $exhibitor_id
 * @property string $type
 * @property array $rules
 *
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 * @property-read \Buzz\Control\Campaign\QuestionOption[] $options
 * @property-read \Buzz\Control\Campaign\Answer[] $answers
 */
class Question extends Object
{
    use Translatable;
}
