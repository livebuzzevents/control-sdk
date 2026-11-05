<?php

namespace Buzz\Control\Campaign\Traits;

use Buzz\Control\Campaign\EmailMessage;

/**
 * Trait CanSendEmailMessage
 */
trait CanSendEmailMessage
{
    public function sendEmailMessage(
        string $email_message_template_id,
        ?string $to_address = null,
        ?string $subject = null,
        ?array $custom_data = null,
        bool $send_instantly = false
    ) {
        (new EmailMessage)->send(
            $this,
            $email_message_template_id,
            $to_address,
            $subject,
            $custom_data,
            $send_instantly
        );
    }
}
