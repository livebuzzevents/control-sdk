<?php

namespace Buzz\Control\Campaign;

/**
 * Class EmailMessage
 *
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
 * @property int $clicks
 * @property int $opens
 * @property array $details
 * @property string $process_id
 * @property \DateTime $provider_deleted_at
 * @property-read \Buzz\Control\Campaign\SingleShot $single_shot
 * @property-read \Buzz\Control\Campaign\Automation $automation
 * @property-read \Buzz\Control\Campaign\EmailMessageTemplate $template
 */

use Buzz\Control\Campaign\Traits\Morphable;

/**
 * Class EmailMessage
 *
 * @package Buzz\Control\Campaign
 */
class EmailMessage extends Object
{
    use Morphable;
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
            'send',
            compact('email_message_template_id', 'model_id', 'model_type', 'to_address', 'subject', 'custom_data')
        );
    }
}
