<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class ChatConversation
 *
 * @property string $sender_type
 * @property string $sender_id
 * @property string $recipient_type
 * @property string $recipient_id
 * @property string $message
 * @property bool $read
 * @property string $conversation_id
 */
class ChatConversation extends SdkObject
{
    use SupportRead, SupportWrite;

    public function create(string $conversation_id): ChatConversation
    {
        return $this->api()->post(
            $this->getEndpoint('conversations/create'),
            [
                'id' => $conversation_id,]
        );
    }
}
