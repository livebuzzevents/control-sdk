<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\CanSendEmailMessage;
use Buzz\Control\Campaign\Traits\CanSendSmsMessage;
use Buzz\Control\Campaign\Traits\HasAreas;
use Buzz\Control\Campaign\Traits\HasFiles;
use Buzz\Control\Campaign\Traits\Taggable;
use Buzz\Control\Campaign\Traits\WithAnswerHelpers;
use Buzz\Control\Campaign\Traits\WithPropertyHelpers;
use Buzz\Control\Traits\SupportCrud;
use Carbon\Carbon;

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
 * @property bool $smart_match_synced
 * @property array $details
 * @property Carbon $expires_at
 * @property-read LeadGroup $group
 * @property-read Address[] $addresses
 * @property-read Answer[] $answers
 * @property-read EmailMessage[] $email_messages
 * @property-read Import $import
 * @property-read Link[] $links
 * @property-read Log[] $logs
 * @property-read Note[] $notes
 * @property-read Phone[] $phones
 * @property-read Property[] $properties
 * @property-read SmsMessage[] $sms_messages
 * @property-read Social[] $socials
 * @property-read ModelTag[] $tags
 */
class Lead extends SdkObject
{
    use CanSendEmailMessage,
        CanSendSmsMessage,
        HasAreas,
        HasFiles,
        SupportCrud,
        Taggable,
        WithAnswerHelpers,
        WithPropertyHelpers;
}
