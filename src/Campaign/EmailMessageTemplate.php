<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\HasFiles;
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
 * @property bool $marketing
 * @property array $settings
 * @property-read EmailMessage[] $email_messages
 * @property-read SingleShot[] $single_shots
 */
class EmailMessageTemplate extends SdkObject
{
    use HasFiles,
        SupportRead,
        SupportWrite,
        Translatable;
}
