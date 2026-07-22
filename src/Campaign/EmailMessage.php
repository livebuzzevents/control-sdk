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
 * @property Carbon $provider_deleted_at
 * @property-read SingleShot $single_shot
 * @property-read Automation $automation
 * @property-read EmailMessageTemplate $template
 */

use Buzz\Control\Campaign\Traits\Morphable;
use Carbon\Carbon;

/**
 * Class EmailMessage
 */
class EmailMessage extends SdkObject
{
    use Morphable;

    public function send(
        SdkObject $model,
        string $email_message_template_id,
        ?string $to_address = null,
        ?string $subject = null,
        ?array $custom_data = null,
        bool $send_instantly = false
    ) {
        $model_type = class_basename($model);
        $model_id   = $model->id;

        $this->api()->post(
            $this->getEndpoint("send/{$email_message_template_id}"),
            compact('model_id', 'model_type', 'to_address', 'subject', 'custom_data', 'send_instantly')
        );
    }
}
