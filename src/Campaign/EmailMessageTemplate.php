<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;
use Buzz\Control\Objects\Traits\Translatable;

/**
 * Class EmailMessageTemplate
 *
 * @property string $identifier
 * @property string $name
 * @property string $html
 * @property string $text
 * @property string $subject
 * @property string $from_email
 * @property string $from_name
 * @property boolean $marketing
 * @property array $settings
 *
 * @property-read \Buzz\Control\Campaign\EmailMessage[] $email_messages
 * @property-read \Buzz\Control\Campaign\SingleShot[] $single_shots
 * @property-read \Buzz\Control\Campaign\File[] $files
 */
class EmailMessageTemplate extends Object
{
    use Translatable;
}
