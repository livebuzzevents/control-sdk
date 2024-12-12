<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class ChatConversation
 *
 * @property string $conversation_id
 * @property string $sender_id
 * @property string $recipient_id
 */
class ChatConversation extends SdkObject
{
    use SupportRead, SupportWrite;

    public function create(string $conversation_id, string $sender_id, string $recipient_id)
    {
        return $this->api()->post(  
            $this->getEndpoint('create'),
            [
                'conversation_id' => $conversation_id,
                'sender_id' => $sender_id,
                'recipient_id' => $recipient_id,
            ]
        );
    }

    public function fetchMessages(string $sender_id, string $recipient_id)
    {
        return $this->api()->get(
            $this->getEndpoint('fetch-messages'),
            [
                'sender_id' => $sender_id,
                'recipient_id' => $recipient_id,
            ]
        );
    }

    public function fetchConversations(string $customer_id)
    {
        try {
            return $this->api()->get(
                $this->getEndpoint(`fetch-conversations/{$customer_id}`),
            );
        } catch (\Exception $e) {
            Log::error('Error fetching conversations', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}