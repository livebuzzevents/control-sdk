<?php

namespace Buzz\Control\Campaign\Traits;

use Buzz\Control\Campaign\EmailMessage;

/**
 * Trait CanSendEmailMessage
 *
 * @package Buzz\Control\Campaign\Traits
 */
trait CanSendEmailMessage
{
    /**
     * @param string $email_message_template_id
     * @param string|null $to_address
     * @param string|null $subject
     * @param array|null $custom_data
     * @param bool $send_instantly
     */
    public function sendEmailMessage(
        string $email_message_template_id,
        string $to_address = null,
        string $subject = null,
        array $custom_data = null,
        bool $send_instantly = false
    ) {
        (new EmailMessage())->send($this, $email_message_template_id, $to_address, $subject, $custom_data, $send_instantly);
    }
}
