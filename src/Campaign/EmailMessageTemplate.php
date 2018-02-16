<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

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
 * @property-read \Buzz\Control\Campaign\EmailMessage[] $email_messages
 * @property-read \Buzz\Control\Campaign\SingleShot[] $single_shots
 * @property-read \Buzz\Control\Campaign\File[] $files
 */
class EmailMessageTemplate extends SdkObject
{
    use SupportRead,
        SupportWrite,
        Translatable;
}
