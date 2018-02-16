<?php

namespace Buzz\Control\Campaign;

/**
 * Class SocialToken
 *
 * @property string $token
 * @property string $customer_id
 * @property string $stream_id
 * @property string $provider
 * @property-read string $url
 * @property-read boolean $expired
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\Stream $stream
 *
 */
class SocialToken extends SdkObject
{

    /**
     * @param string $provider
     * @param string|null $customer_id
     *
     * @return \Buzz\Control\Campaign\SocialToken
     */
    public function request(string $provider, string $customer_id = null): self
    {
        if ($customer_id) {
            return new self(
                $this->api()->get($this->getEndpoint("/request/{$provider}/{$customer_id}"))
            );
        } else {
            return new self(
                $this->api()->get($this->getEndpoint("/request/{$provider}"))
            );
        }
    }
}
