<?php

namespace Buzz\Control\Campaign\Traits;

use Buzz\Control\Campaign\SmsMessage;

/**
 * Trait CanSendSmsMessage
 *
 * @package Buzz\Control\Campaign\Traits
 */
trait CanSendSmsMessage
{
    /**
     * @param string $sms_message_template_id
     * @param string|null $phone_number
     */
    public function sendSmsMessage(
        string $sms_message_template_id,
        string $phone_number = null
    ) {
        (new SmsMessage())->send($this, $sms_message_template_id, $phone_number);
    }
}
