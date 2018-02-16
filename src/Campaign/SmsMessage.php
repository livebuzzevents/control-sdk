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
 * @property-read \Buzz\Control\Campaign\SingleShot $single_shot
 * @property-read \Buzz\Control\Campaign\Automation $automation
 * @property-read \Buzz\Control\Campaign\SmsMessageTemplate $template
 */
class SmsMessage extends SdkObject
{
    use Morphable;

    /**
     * @param SdkObject $model
     * @param string $sms_message_template_id
     * @param string|null $phone_number
     */
    public function send(
        SdkObject $model,
        string $sms_message_template_id,
        string $phone_number = null
    ) {
        $model_type = class_basename($model);
        $model_id   = $model->id;

        $this->api()->post(
            $this->getEndpoint("send/{$sms_message_template_id}"),
            compact('model_id', 'model_type', 'phone_number')
        );
    }
}
