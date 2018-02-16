<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\CanSendEmailMessage;
use Buzz\Control\Campaign\Traits\CanSendSmsMessage;
use Buzz\Control\Campaign\Traits\Taggable;
use Buzz\Control\Campaign\Traits\WithAnswerHelpers;
use Buzz\Control\Campaign\Traits\WithPropertyHelpers;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class Lead
 *
 * @property string $group_id
 * @property string $import_id
 * @property-read string $avatar
 * @property string $identifier
 * @property string $email
 * @property string $source
 * @property string $source_id
 * @property string $title
 * @property-read string $name
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $job_title
 * @property string $company
 * @property string $sex
 * @property string $language
 * @property string $nationality
 * @property string $is_a_clone
 * @property string $cloned_id
 * @property string $cloned_type
 * @property string $cloned_campaign_id
 * @property array $details
 * @property \DateTime $expires_at
 * @property-read \Buzz\Control\Campaign\LeadGroup $group
 * @property-read \Buzz\Control\Campaign\Address[] $addresses
 * @property-read \Buzz\Control\Campaign\Answer[] $answers
 * @property-read \Buzz\Control\Campaign\EmailMessage[] $email_messages
 * @property-read \Buzz\Control\Campaign\File[] $files
 * @property-read \Buzz\Control\Campaign\Import $import
 * @property-read \Buzz\Control\Campaign\Link[] $links
 * @property-read \Buzz\Control\Campaign\Log[] $logs
 * @property-read \Buzz\Control\Campaign\Note[] $notes
 * @property-read \Buzz\Control\Campaign\Phone[] $phones
 * @property-read \Buzz\Control\Campaign\Property[] $properties
 * @property-read \Buzz\Control\Campaign\SmsMessage[] $sms_messages
 * @property-read \Buzz\Control\Campaign\Social[] $socials
 * @property-read \Buzz\Control\Campaign\ModelTag[] $tags
 *
 */
class Lead extends SdkObject
{
    use SupportCrud,
        CanSendEmailMessage,
        CanSendSmsMessage,
        Taggable,
        WithAnswerHelpers,
        WithPropertyHelpers;
}
