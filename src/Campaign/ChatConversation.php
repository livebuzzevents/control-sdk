<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class ChatConversation
 *
 */
class ChatConversation extends SdkObject
{
    use SupportRead, SupportWrite;

    public function create(string $conversation_id)
    {
        return $this->api()->post(
            $this->getEndpoint('create'),
            [
                'id' => $conversation_id,]
        );
    }
}
