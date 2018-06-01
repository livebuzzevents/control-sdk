<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class IntegrationProvider
 *
 * @property string $identifier
 * @property string $name
 * @property string $provider
 * @property array $settings
 * @property array $supported_methods
 * @property boolean $active
 * @property-read \Buzz\Control\Campaign\Question $question
 * @property-read \Buzz\Control\Campaign\AnswerOption[] $answer_options
 */
class IntegrationProvider extends SdkObject
{
    use SupportCrud,
        Translatable;
}
