<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;
use Buzz\EssentialsSdk\Cast;
use Buzz\EssentialsSdk\SdkObject as EssentialsSdkObject;

/**
 * Class ChatMessage
 *
 * @property string $sender_type
 * @property string $sender_id
 * @property string $recipient_type
 * @property string $recipient_id
 * @property string $message
 * @property bool $read
 * @property string $conversation_id
 */
class ChatMessage extends SdkObject
{
    use SupportRead, SupportWrite;

    public function send(string $message, string $sender_id, string $recipient_id): ChatMessage
    {
        return $this->api()->post(
            $this->getEndpoint('messages/send'),
            [
                'message' => $message,
                'sender_id' => $sender_id,
                'recipient_id' => $recipient_id,
            ]
        );
    }
}
