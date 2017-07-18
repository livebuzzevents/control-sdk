<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;

/**
 * Class EmailMessage
 *
 * @property-read object $model
 * @property string $model_type
 * @property string $model_id
 * @property string $single_shot_id
 * @property string $automation_id
 * @property string $email_message_template_id
 * @property string $provider_id
 * @property string $html
 * @property string $text
 * @property string $subject
 * @property string $from_name
 * @property string $email
 * @property string $status
 * @property string $bounced
 * @property string $complained
 * @property integer $clicks
 * @property integer $opens
 * @property array $details
 * @property string $process_id
 * @property \DateTime $provider_deleted_at
 *
 * @property-read \Buzz\Control\Campaign\SingleShot $single_shot
 * @property-read \Buzz\Control\Campaign\Automation $automation
 * @property-read \Buzz\Control\Campaign\EmailMessageTemplate $template
 */
class EmailMessage extends Object
{
}
