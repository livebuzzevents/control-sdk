<?php

namespace Buzz\Control\Campaign;

/**
 * Class CustomerFlow
 *
 * @property string $token
 * @property string $customer_id
 * @property string $stream_id
 * @property int $step
 * @property string $status
 * @property-read string $signed_url
 * @property-read array $social_connect_urls
 * @property-read Customer $customer
 * @property-read Stream $stream
 * @property-read CustomerFlowLog[] $logs
 */
class CustomerFlow extends SdkObject {}
