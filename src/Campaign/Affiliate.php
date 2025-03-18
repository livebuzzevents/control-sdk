<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\HasFiles;
use Buzz\Control\Traits\SupportCrud;

/**
 * Class Affiliate
 *
 * @property string $name
 * @property string $token
 * @property string $stream_id
 * @property int $cost
 * @property-read string $url
 * @property-read string $pretty_url
 * @property-read string $currency
 *
 * @property-read \Buzz\Control\Campaign\Stream $stream
 */
class Affiliate extends SdkObject
{
    use SupportCrud, HasFiles;

    /**
     * @param int $size
     *
     * @return string
     */
    public function getQrCodeImage($size = 125): string
    {
        return $this->api()->get(
            $this->getEndpoint($this->id . '/qrcode-image'),
            compact('size')
        )['image'];
    }
}
