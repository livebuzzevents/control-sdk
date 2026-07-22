<?php

namespace Buzz\Control\Campaign;

use Carbon\Carbon;

/**
 * Class LeadGroup
 *
 * @property string $identifier
 * @property string $name
 * @property string $description
 * @property-read int $leads_count
 * @property Carbon $expired_at
 */
class LeadGroup extends SdkObject {}
