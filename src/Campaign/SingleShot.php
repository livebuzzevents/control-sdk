<?php

namespace Buzz\Control\Campaign;

use Carbon\Carbon;

/**
 * Class SingleShot
 *
 * @property string $identifier
 * @property string $name
 * @property string $entity_list_id
 * @property object $template
 * @property string $template_id
 * @property string $template_type
 * @property int $stopped
 * @property Carbon $sends_at
 * @property-read string $nice_type
 * @property-read bool $allow_modification
 * @property-read SingleShotEntityListMember[] $members
 * @property-read EntityList[] $entity_list
 */
class SingleShot extends SdkObject {}
