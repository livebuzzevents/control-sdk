<?php

namespace Buzz\Control\Campaign;

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
    /**
     * @param Object $model
     * @param string $sms_message_template_id
     * @param string|null $phone_number
     */
    public function send(
        Object $model,
        string $sms_message_template_id,
        string $phone_number = null
    ) {
        $model_type = class_basename($model);
        $model_id   = $model->id;

        $this->api()->post(
            'send/' . $sms_message_template_id,
            compact('model_id', 'model_type', 'phone_number')
        );
    }
}
