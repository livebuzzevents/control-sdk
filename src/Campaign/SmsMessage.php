<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;

/**
 * Class SmsMessage
 *
 * @property-read object $model
 * @property string $model_type
 * @property string $model_id
 * @property string $single_shot_id
 * @property string $automation_id
 * @property string $sms_message_template_id
 * @property string $provider_id
 * @property string $from
 * @property string $message
 * @property string $phone_number
 * @property string $status
 * @property integer $clicks
 * @property array $details
 * @property string $process_id
 * @property-read \Buzz\Control\Campaign\SingleShot $single_shot
 * @property-read \Buzz\Control\Campaign\Automation $automation
 * @property-read \Buzz\Control\Campaign\SmsMessageTemplate $template
 */
class SmsMessage extends Object
{
}
