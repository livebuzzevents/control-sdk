<?php

namespace Buzz\Control\Campaign\Traits;

use Buzz\Control\Campaign\SmsMessage;

/**
 * Trait CanSendSmsMessage
 */
trait CanSendSmsMessage
{
    public function sendSmsMessage(
        string $sms_message_template_id,
        ?string $phone_number = null,
        bool $send_instantly = false
    ) {
        (new SmsMessage)->send($this, $sms_message_template_id, $phone_number, $send_instantly);
    }
}
