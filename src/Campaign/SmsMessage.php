<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;

/**
 * Class SmsMessage
 *
 * @property string $single_shot_id
 * @property string $automation_id
 * @property string $sms_message_template_id
 * @property string $provider_id
 * @property string $from
 * @property string $message
 * @property string $phone_number
 * @property string $status
 * @property int $clicks
 * @property array $details
 * @property string $process_id
 * @property-read SingleShot $single_shot
 * @property-read Automation $automation
 * @property-read SmsMessageTemplate $template
 */
class SmsMessage extends SdkObject
{
    use Morphable;

    public function send(
        SdkObject $model,
        string $sms_message_template_id,
        ?string $phone_number = null,
        bool $send_instantly = false
    ) {
        $model_type = class_basename($model);
        $model_id   = $model->id;

        $this->api()->post(
            $this->getEndpoint("send/{$sms_message_template_id}"),
            compact('model_id', 'model_type', 'phone_number', 'send_instantly')
        );
    }
}
