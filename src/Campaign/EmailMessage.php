<?php

namespace Buzz\Control\Campaign;

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
 * @property-read \Buzz\Control\Campaign\SingleShot $single_shot
 * @property-read \Buzz\Control\Campaign\Automation $automation
 * @property-read \Buzz\Control\Campaign\EmailMessageTemplate $template
 */
/**
 * Class EmailMessage
 *
 * @package Buzz\Control\Campaign
 */
class EmailMessage extends Object
{
    /**
     * @param Object $model
     * @param string $email_message_template_id
     * @param string|null $to_address
     * @param string|null $subject
     * @param array|null $custom_data
     */
    public function send(
        Object $model,
        string $email_message_template_id,
        string $to_address = null,
        string $subject = null,
        array $custom_data = null
    ) {
        $model_type = class_basename($model);
        $model_id   = $model->id;

        $this->api()->post(
            'send/' . $email_message_template_id,
            compact('model_id', 'model_type', 'to_address', 'subject', 'custom_data')
        );
    }
}
